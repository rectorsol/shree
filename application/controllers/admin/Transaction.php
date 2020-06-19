<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Transaction extends CI_Controller {

		public function __construct(){
        parent::__construct();
		check_login_user();
       
	    
        $this->load->model('Common_model');
        $this->load->model('Job_work_party_model');
        $this->load->model('Transaction_model');
        
    	}


    	public function index(){
	        $data = array();
	        $data['name']='Fabric Return Chalan';
			$data['febName']=$this->Common_model->febric_name();
			$data['unit']=$this->Transaction_model->select('unit');
			$data['pbc']=$this->Transaction_model->GetPBC();
			$data['branch_data']=$this->Job_work_party_model->get();
	        //echo print_r($data['fabric_data']);exit;
		      $data['main_content'] = $this->load->view('admin/transaction/challan/add', $data, TRUE);
  	      $this->load->view('admin/index', $data);
    	}
		  public function showRecieve(){
	        $data = array();
			$data['name']='Add Dye Recieve Transaction';
			$data['febName']=$this->Common_model->febric_name();
			$data['unit']=$this->Transaction_model->select('unit');
			$data['branch_data']=$this->Job_work_party_model->get();
            
		      $data['main_content'] = $this->load->view('admin/transaction/bill/add', $data, TRUE);
  	      $this->load->view('admin/index', $data);
    	}  
		
		public function showRecieveList(){
	        $data = array();
			$data['name']='FRC List';
			$type='recieve';
            $data['frc_data']=$this->Transaction_model->get($type);
		      $data['main_content'] = $this->load->view('admin/transaction/bill/list_bill', $data, TRUE);
  	      $this->load->view('admin/index', $data);
		}
		public function showReturnList(){
	        $data = array();
			$data['name']='Return List';
			$type='return';
            $data['frc_data']=$this->Transaction_model->get($type);
		      $data['main_content'] = $this->load->view('admin/transaction/challan/list_challan', $data, TRUE);
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
					$this->Transaction_model->insert($data2, 'fabric_stock_received');
				}
				
			} redirect($_SERVER['HTTP_REFERER']);
		}
		
		public function addChallan(){
			if($_POST){
				$data = $this->security->xss_clean($_POST);
				// echo "<pre>"; print_r($data);exit;
				$count =count($data['pbc']);
				
				$data1 =[
					'from_godown' =>$data['FromGodown'],
					'to_godown'  => $data['ToGodown'],
					'fromParty' =>$data['FromParty'],
					'toParty'  => $data['toParty'],
					'created_at' => date('Y-m-d'),
					'created_by' => $_SESSION['userID'],
					
					'jobworkType' => $data['workType'],
					
					'transaction_type' => 'challan'

				];
				$id =	$this->Transaction_model->insert($data1, 'transaction');
				for ($i=0; $i < $count; $i++) { 
				$data2=[
					'transaction_id' => $id,
					'pbc' =>$data['pbc'][$i],
					'order_barcode' =>$data['obc'][$i],
					'order_no' =>$data['orderNo'][$i],
					'design_name' => $data['design'][$i],
					'design_code' =>$data['designCode'][$i],
					'dye' => $data['dye'][$i],
					'matching' =>$data['matching'][$i],
					'fabric' => $data['fabric_name'][$i],
					
					'hsn' => $data['hsn'][$i],
					'current_qty' => $data['quantity'][$i],
					'unit' => $data['unit'][$i],
					'image' => $data['image'][$i],
					'days_left ' => $data['days'][$i],
					'remark' => $data['remark'][$i]
				]	;
					$this->Transaction_model->insert($data2, 'transaction_meta');
				}
				
			} redirect($_SERVER['HTTP_REFERER']);
		}
		
	   
		   
 public function getOBC()
    {
      $id= $this->security->xss_clean($_POST['id']);
    $data = array();
     $data['pbc']=$this->Transaction_model->getOBC_deatils($id);
     echo json_encode($data['pbc']);

    }
     public function get_godown()
    {
      $id= $this->security->xss_clean($_POST['party']);
    $data = array();
     $data['godown']=$this->Transaction_model->get_godown($id);
     echo json_encode($data['godown']);

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
		public function filter1()
							{
						$data1=array();
						$this->security->xss_clean($_POST);
								if ($_POST) {
						//	echo"<pre>";	print_r($_POST); exit;
								$data1['from']=$this->input->post('date_from');
								$data1['to']=$this->input->post('date_to');
								$data1['search']=$this->input->post('search');
								$data1['type']=$this->input->post('type');

								$data['from']=$data1['from'];
								$data['to']=$data1['to'];
								$data['type']=$data1['type'];
								$caption='Search Result For : ';
										if($data1['search']=='simple'){
											if($_POST['searchByCat']!="" || $_POST['searchValue']!=""){
												$data1['cat']=$this->input->post('searchByCat');
												$data1['Value']=$this->input->post('searchValue');
												$caption=$caption.$data1['cat']." = ".$data1['Value']." ";
											}
										$data['frc_data']=$this->Transaction_model->search1($data1);

							}else{
							if(isset($_POST['sort_name']) && $_POST['sort_name']!="" ){
								$data1['cat'][]='sort_name';
								$fab=$this->input->post('sort_name');
								$data1['Value'][]=$fab;
								$caption=$caption.' sort_name'." = ".$fab." ";
								}
								if(isset($_POST['challan']) && $_POST['challan']!="" ){
								  $data1['cat'][]='challan_no';
										$fab=$this->input->post('challan');
									$data1['Value'][]=$fab;
									$caption=$caption.'Challan No'." = ".$fab." ";
									}
									if(isset($_POST['unitName']) && $_POST['unitName']!="" ){
										 $data1['cat'][]='unitName';
											$fab=$this->input->post('unitName');
									   $data1['Value'][]=$fab;
										$caption=$caption.'unitName'." = ".$fab." ";
										}
										if(isset($_POST['total_amount']) && $_POST['total_amount']!="" ){
										$data1['cat'][]='total_amount';
										$fab=$this->input->post('total_amount');
										$data1['Value'][]=$fab;
										$caption=$caption.'total_amount'." = ".$fab." ";
										}
										if(isset($_POST['total_quantity']) && $_POST['total_quantity']!="" ){
											$data1['cat'][]='total_quantity';
											$fab=$this->input->post('total_quantity');
											$data1['Value'][]=$fab;
											$caption=$caption.'total_quantity'." = ".$fab." ";
											}
											if(isset($_POST['fabric_type']) && $_POST['fabric_type']!="" ){
										  $data1['cat'][]='fabric_type';
											$fab=$this->input->post('fabric_type');
											$data1['Value'][]=$fab;
											$caption=$caption.'fab_type'." = ".$fab." ";
											}
								$data['frc_data']=$this->Transaction_model->search1($data1);
							}
								if($data1['type']=='recieve'){
									$data['caption']=$caption;
									$data['febName']=$this->Common_model->febric_name();
									$data['main_content'] = $this->load->view('admin/transaction/bill/list_bill', $data, TRUE);
									$this->load->view('admin/index', $data);

								}	elseif($data1['type']=='return'){
												$data['caption']=$caption;
												$data['febName']=$this->Common_model->febric_name();
												$data['main_content'] = $this->load->view('admin/transaction/challan/list_challan', $data, TRUE);
												$this->load->view('admin/index', $data);
											}
												else{
													 $data['main_content'] = $this->load->view('admin/FRC/stock/search');
													 $this->load->view('admin/index', $data);
												}


									}
							}


	}


 ?>
