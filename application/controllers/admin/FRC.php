<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FRC extends CI_Controller {

		public function __construct(){
        parent::__construct();
		check_login_user();
       
	    
        $this->load->model('Common_model');
        $this->load->model('Branch_model');
        $this->load->model('Frc_model');
    	}


    	public function index(){
	        $data = array();
	        $data['name']='Fabric Return Chalan';
			$data['febName']=$this->Common_model->febric_name();
			$data['unit']=$this->Frc_model->select('unit');
			$data['branch_data']=$this->Branch_model->get();
	        //echo print_r($data['fabric_data']);exit;
		      $data['main_content'] = $this->load->view('admin/FRC/addFrc', $data, TRUE);
  	      $this->load->view('admin/index', $data);
    	}
            public function showFrc(){
	        $data = array();
	        $data['name']='FRC List';
            $data['frc_data']=$this->Frc_model->get();
		      $data['main_content'] = $this->load->view('admin/FRC/list', $data, TRUE);
  	      $this->load->view('admin/index', $data);
    	}
		public function addPBC(){
	        $data = array();
	        $data['name']='2nd PBC';
			$data['febName']=$this->Common_model->febric_name();
			$data['unit']=$this->Frc_model->select('unit');
		      $data['main_content'] = $this->load->view('admin/FRC/2ndPbc', $data, TRUE);
  	      $this->load->view('admin/index', $data);
    	}
          public function delete($id)
        {
            $this->Fabric_model->delete($id);
            redirect(base_url('admin/Fabric'));
        }
  		public function delete_fda($id)
        {
            $this->FDA_model->delete($id);
            redirect($_SERVER['HTTP_REFERER']);
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
					'created' => date('Y-m-d'),
					'created_by' => $_SESSION['userID'],
					'total_pcs' => $count,
					'total_quantity' => $total_qty

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
				$data2=['current_stock' => $data['Cur_quantity'],
				'stock_quantity' => $data['Tquantity']
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
		    $data['main_content'] = $this->load->view('admin/FRC/showPBC', $data, TRUE);
  	      	$this->load->view('admin/index', $data);

		 } 
		 public function Get2ndPbc($pbc){
			  $pbc = sanitize_url($pbc);
			$data = array();
	        $data['name']='Details';
			
			$data['pbc_data']=$this->Frc_model->select_PBC_by_parent($pbc);
		    $data['main_content'] = $this->load->view('admin/FRC/showPBC', $data, TRUE);
  	      	$this->load->view('admin/index', $data);

		 }  
 public function getPBC()
    {
      $id= $this->security->xss_clean($_POST['id']);
    $data = array();
     $data['pbc']=$this->Frc_model->getPBC_deatils($id);
     echo json_encode($data['pbc']);

    }


	}


 ?>
