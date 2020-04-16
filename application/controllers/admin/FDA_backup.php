<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FDA extends CI_Controller {

		public function __construct(){
        parent::__construct();
		check_login_user();
        $this->load->model('Fabric_model');
        $this->load->model('Design_model');
	    $this->load->model('FDA_model');

    	}


    	public function index(){
	        $data = array();
	        $data['name']='Fabric Design Asign';
	        $data['fabric_data']=$this->FDA_model->get_fabric_name();
					// $data['fda_data']=$this->FDA_model->get_fda_data();
					$data['fabric_name']=$this->FDA_model->get_fda_fabric_name();
	        //echo print_r($data['fabric_data']);exit;
		      $data['main_content'] = $this->load->view('admin/FDA/asign', $data, TRUE);
  	      $this->load->view('admin/index', $data);
    	}


          public function delete($id)
        {
            $this->Fabric_model->delete($id);
            redirect(base_url('admin/Fabric'));
        }

				public function deletefabric(){
					$ids = $this->input->post('ids');
					$userid= explode(",", $ids);
					foreach ($userid as $value) {
					$this->db->delete('fabric', array('id' => $value));
					}
				}

			public function get_fabric_name_value()
				{
						if ($_POST) {
							$data=array();
							$data['fabric_data']=$this->FDA_model->get_fabric_name();
							$data['data_value'] = $this->FDA_model->get_design_details($_POST['fabricType']);
							$data['data'] = $this->load->view('admin/FDA/asign_page', $data, TRUE);
		  	      $this->load->view('admin/FDA/index', $data);
				       }
		  	}
							public function get_fda_details()
								{
										if ($_POST) {
											$data=array();
											$data['fda_data']=$this->FDA_model->get_fda_data($_POST['fabric_id']);
										//	echo print_r($data['fda_data']);exit;
											$data['data'] = $this->load->view('admin/FDA/a', $data, TRUE);
 					   	        $this->load->view('admin/FDA/fda_details', $data);
								       }
						  	}



	      	public function submit_value()
				          {
						if ($_POST) {
							$data=array();
							// $data['fabric_data']=$this->FDA_model->get_fabric_name();
							$data['data_value'] = $_POST['selected'];
							$design_value=$_POST['selected'];
							 // echo print_r($design_value);exit;
							$count = count($data['data_value']);
							 //echo ($count);exit;
							$fabric= $_POST['value'];
							// echo print_r($fabric);
							for($i = 0; $i<=$count; $i++){
							$data=array(
                                'fabric_id' =>$fabric,
    							'design_id' =>$design_value[$i],
    							'asign_date' =>date('Y-m-d')
    						);
    				     	$insert_id=	$this->FDA_model->insert($data,'fda_table');

								if($insert_id){

						 		$data=array(
						 			'details_status'=>0
						 		);
								foreach($design_value as $value)
								{
						 		  $this->FDA_model->edit_option($data,$value,'design');
						 		}
						 	}

                        }

							 }
							$data['data'] = $this->load->view('admin/FDA/asign_page', $data, TRUE);
							$this->load->view('admin/FDA/index', $data);
						}





	}


 ?>
