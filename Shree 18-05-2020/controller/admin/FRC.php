<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FRC extends CI_Controller {

		public function __construct(){
        parent::__construct();
		check_login_user();
       
	    
        $this->load->model('Common_model');
        $this->load->model('Branch_model');
        $this->load->model('Frc_model');
        $this->load->library('pdf');
        $this->load->library('barcode');
    	}


    	public function index(){
	        $data = array();
	        $data['name']='Fabric Return Chalan';
			$data['febName']=$this->Common_model->febric_name();
			$data['unit']=$this->Frc_model->select('unit');
			$data['branch_data']=$this->Branch_model->get();
	        //echo print_r($data['fabric_data']);exit;
		      $data['main_content'] = $this->load->view('admin/FRC/return/addFrc', $data, TRUE);
  	      $this->load->view('admin/index', $data);
    	}
		  public function showRecieve(){
	        $data = array();
			$data['name']='Add Fabric Recieve Challan';
			$data['febName']=$this->Common_model->febric_name();
			$data['unit']=$this->Frc_model->select('unit');
			$data['branch_data']=$this->Branch_model->get();
            
		      $data['main_content'] = $this->load->view('admin/FRC/recieve/addRecieve', $data, TRUE);
  	      $this->load->view('admin/index', $data);
    	}  
		
		public function showRecieveList(){
	        $data = array();
			$data['name']='FRC List';
			$type='recieve';
            $data['frc_data']=$this->Frc_model->get($type);
		      $data['main_content'] = $this->load->view('admin/FRC/recieve/list_recieve', $data, TRUE);
  	      $this->load->view('admin/index', $data);
		}

		public function recieve_print($id){
			$data['data'] = $this->Frc_model->get_recieve_value_by_id($id);
			// print_r($data['data']);exit;
			$data['pdf'] = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			$this->load->view('admin/FRC/recieve/receive_print', $data);
		}

		public function showReturnList(){
	        $data = array();
			$data['name']='Return List';
			$type='return';
            $data['frc_data']=$this->Frc_model->get($type);
		      $data['main_content'] = $this->load->view('admin/FRC/return/list_return', $data, TRUE);
  	      $this->load->view('admin/index', $data);
    	}

    	public function return_print($id){
			$data['data'] = $this->Frc_model->get_return_value_by_id($id);
			// print_r($data['data']);exit;
			$data['pdf'] = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			$this->load->view('admin/FRC/return/return_print', $data);
		}

		public function addPBC(){
	        $data = array();
	        $data['name']='2nd PBC';
			$data['febName']=$this->Common_model->febric_name();
			$data['unit']=$this->Frc_model->select('unit');
		      $data['main_content'] = $this->load->view('admin/FRC/2ndpbc/2ndPbc', $data, TRUE);
  	      $this->load->view('admin/index', $data);
    	}
          public function delete($id)
        {
            
           $ids = $this->input->post('ids');

		 $userid= explode(",", $ids);
		 foreach ($userid as $value) {
		  $this->db->delete( 'fabric_challan',array('id' => $value));
		}
        }
  		public function delete_fda($id)
        {
            $this->FDA_model->delete($id);
            redirect($_SERVER['HTTP_REFERER']);
        }
		public function addRecieve(){
			if($_POST){
				$data = $this->security->xss_clean($_POST);
				// echo "<pre>"; print_r($data);exit;
				$count =count($data['pbc']);
				$total_qty=0; 
				$total_val =0;
				for ($i=0; $i < $count ; $i++) { 
					$total_qty =$total_qty +  $data['qty'][$i];
					$total_val =$total_val + $data['total'][$i];
				}
				$data1 =[
					'challan_from' =>$data['fromGodown'],
					'challan_to'  => $data['toGodown'],
					'challan_date' => $data['PBC_date'],
					'created_by' => $_SESSION['userID'],
					'challan_no' =>  $data['PBC_challan'],
					'total_pcs' => $count,
					'total_quantity' => $total_qty,
					'total_amount' => $total_val,
					'fabric_type' => $data['fabType'][0],
					'unit' => $data['unit'][0],
					'challan_type' => 'recieve'
				];
				$id =	$this->Frc_model->insert($data1, 'fabric_challan');
				for ($i=0; $i < $count; $i++) { 
				$data2=[
					'fabric_challan_id' => $id,
					'parent_barcode' =>$data['pbc'][$i],
					'fabric_id' => $data['fabric_name'][$i],
					'fabric_type' =>$data['fabType'][$i],
					'hsn' => $data['hsn'][$i],
					'stock_quantity' => $data['qty'][$i],
					'stock_unit' => $data['unit'][$i],
					'ad_no ' => $data['ADNo'][$i],
					'color_name ' => $data['color'][$i],
					'purchase_code' => $data['pcode'][$i],
					'purchase_rate' => $data['prate'][$i],
					'total_value' =>$data['total'][$i]
				]	;
					$this->Frc_model->insert($data2, 'fabric_stock_received');
				}
				
			} redirect($_SERVER['HTTP_REFERER']);
		}
		
		public function addFrc(){
			if($_POST){
				$data = $this->security->xss_clean($_POST);
				// echo "<pre>"; print_r($data);exit;
				$count =count($data['pbc']);
				$total_qty=0;
				for ($i=0; $i < $count ; $i++) { 
					$total_qty =$total_qty +  $data['quantity'][$i];
				}
				$data1 =[
					'challan_from' =>$data['fromGodown'],
					'challan_to'  => $data['toGodown'],
					'challan_date' => $data['PBC_date'],
					'created_by' => $_SESSION['userID'],
					'challan_no' =>  $data['PBC_challan'],
					'total_pcs' => $count,
					'total_quantity' => $total_qty,
					'challan_type' => 'return'

				];
				$id =	$this->Frc_model->insert($data1, 'fabric_challan');
				for ($i=0; $i < $count; $i++) { 
				$data2=[
					'fabric_challan_id' => $id,
					'parent_barcode' =>$data['pbc'][$i],
					'fabric_id' => $data['fabric_name'][$i],
					'fabric_type' =>$data['fabType'][$i],
					'hsn' => $data['hsn'][$i],
					'stock_quantity' => $data['quantity'][$i],
					'stock_unit' => $data['unit'][$i],
					'challan_no' => $data['challan'][$i],
					'ad_no ' => $data['ADNo'][$i],
					'purchase_code' => $data['pcode'][$i]
				]	;
					$this->Frc_model->insert($data2, 'fabric_stock_received');
				}
				
			} redirect($_SERVER['HTTP_REFERER']);
		}
		
	   public function submitPbc(){
			if($_POST){
				$data = $this->security->xss_clean($_POST);
				// echo "<pre>"; print_r($data);exit;
				$count =count($data['sno']);
				$tc=0;
				for ($i=0; $i < $count; $i++) { 
					$tc=$tc+$data['tc'][$i];
				}
				$data2=['current_stock' => $data['Cur_quantity'],
				'stock_quantity' => $data['Tquantity'],
				'tc' => $tc
			];
				$this->Frc_model->update($data2,'parent_barcode',$data['pbc'], 'fabric_stock_received');
				for ($i=0; $i < $count; $i++) { 
				
				$data1=[
					'parent_barcode' => $data['2pbc'][$i],
					'parent' =>$data['pbc'],
					'fabric_id' => $data['fabric_id'],
					'current_stock' => $data['quantity'][$i],
					
					'created_date' =>$data['date'][$i],
					'challan_no' => $data['challan_no'],
					'ad_no ' => $data['ad_no'],
					'tc' =>$data['tc'][$i],
					'color_name' =>$data['color'][$i],
					'purchase_rate' =>$data['rate'][$i],
					'total_value' =>(double) $data['value'][$i],
				];	
				
					$this->Frc_model->insert($data1, 'fabric_stock_received');
				}
				
			} redirect($_SERVER['HTTP_REFERER']);
		}
		 public function Show_PBC(){
			 $data = array();
	        $data['name']='Show PBC';
			
			$data['pbc_data']=$this->Frc_model->select_PBC();
		    $data['main_content'] = $this->load->view('admin/FRC/2ndpbc/showPBC', $data, TRUE);
  	      	$this->load->view('admin/index', $data);

		 } 
		 public function Get2ndPbc($pbc){
			  $pbc = sanitize_url($pbc);
			$data = array();
	        $data['name']='Details';
			
			$data['pbc_data']=$this->Frc_model->select_PBC_by_parent($pbc);
		    $data['main_content'] = $this->load->view('admin/FRC/2ndpbc/showPBC', $data, TRUE);
  	      	$this->load->view('admin/index', $data);

		 }  
 public function getPBC()
    {
      $id= $this->security->xss_clean($_POST['id']);
    $data = array();
     $data['pbc']=$this->Frc_model->getPBC_deatils($id);
     echo json_encode($data['pbc']);

    }
		public function filter()
        {
            $data=array();
            if ($_POST) {
              $data['cat']=$this->input->post('searchByCat');
			  $data['Value']=$this->input->post('searchValue');
			  $data['type']=$this->input->post('type');
                $output = "";

				$data=$this->Frc_model->search($data);
				
                foreach ($data as $value) {
                    
                    $output .= "<tr id='tr_".$value['fc_id']."'>";
                    $output .="<td><input type='checkbox' class='sub_chk' data-id=".$value['fc_id']."></td>";
						 $output .="<td>".$value['challan_date']."</td>

                                          <td>".$value['sort_name']."</td>
                                         <td>". $value['challan_no']."</td>
                                           <td>". $value['fabric_type']."</td>
                                          
                                          <td>".$value['total_quantity']."</td>
                                          <td>".$value['unitName']."</td>
                                          <td>". $value['total_amount']."</td>";
                    
                    $output .= "<td><a href='#".$value['fc_id']."' class='text-center tip' data-toggle='modal' data-original-title='Edit'><i class='fas fa-edit blue'></i></a>
                    
                    </td>";
                   $output .= "</tr>";
                            }
              echo json_encode($output);
            }
        }
public function date_filter()
        {
            $data=array();
            if ($_POST) {
             
			  $data['from']=$this->input->post('date_from');
			  $data['to']=$this->input->post('date_to');
			  $data['type']=$this->input->post('type');
                $output = "";

				$data=$this->Frc_model->search_by_date($data);
				
                foreach ($data as $value) {
                    
                    $output .= "<tr id='tr_".$value['fc_id']."'>";
                    $output .="<td><input type='checkbox' class='sub_chk' data-id=".$value['fc_id']."></td>";
						 $output .="<td>".$value['challan_date']."</td>

                                          <td>".$value['sort_name']."</td>
                                         <td>". $value['challan_no']."</td>
                                           <td>". $value['fabric_type']."</td>
                                          
                                          <td>".$value['total_quantity']."</td>
                                          <td>".$value['unitName']."</td>
                                          <td>". $value['total_amount']."</td>";
                    
                    $output .= "<td><a href='#".$value['fc_id']."' class='text-center tip' data-toggle='modal' data-original-title='Edit'><i class='fas fa-edit blue'></i></a>
                    
                    </td>";
                   $output .= "</tr>";
                            }
              echo json_encode($output);
            }
        }


	}


 ?>
