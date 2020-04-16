<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ERC extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('Erc_model');
    }
    public function index()
    {
        $data = array();
        $data['name'] = 'ERC';
		$data['designname'] = $this->Erc_model->get_design_name();
		$data['fresh_designname'] = $this->Erc_model->get_design_fresh_value();

        $data['main_content'] = $this->load->view('admin/master/erc/erc', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function getlist()
    {

		$designname = $this->Erc_model->get_design();
		header('Content-type: application/json');
		echo json_encode($designname);

	}

	 public function getDesignName()
    {
		$designname = $this->Erc_model->get_design_name();
// 		echo print_r($designname);exit;
        foreach($designname as $row ) {
        foreach($row as $value){
        $result_array[]= $value;
        }
    }


		header('Content-type: application/json');
		echo json_encode($result_array);
    }
     public function get_src_fabcode()
    {

		$fabcode = $this->Erc_model->get_src_fabcode_value();
		//echo print_r( $fabcode);exit;

        foreach($fabcode as $row ) {

        foreach($row as $value){
        $result_array[]= $value;
        }
        //echo  print_r($result_array);exit;

    }
		header('Content-type: application/json');
		echo json_encode($result_array);


    }

public function update()
    {

				$id=$_POST['id'];
				if(isset($_POST['designName'])){
					$data = array();
					$data['desName'] =$_POST['designName'];
					$data['updated_at'] = date('Y-m-d H:i:s');
					$data['created_at'] = date('Y-m-d H:i:s');
					//echo $data['desName'].$id;exit;
					$data_value= $this->Erc_model->get_erc_name($data['desName']);
				//	echo $data_value;exit;
					if(isset($data_value))
					{
	  			      $this->session->set_flashdata('msg','designName already exits ');
	  			 }
					 else
					{
					   	$status = $this->Erc_model->Update($id,$data);
					}
				}
				if(isset($_POST['designCode'])){
					$data = array();
					$data['desCode'] =$_POST['designCode'];
					$data['updated_at'] = date('Y-m-d H:i:s');
					$data['created_at'] = date('Y-m-d H:i:s');
					$status = $this->Erc_model->Update($id,$data);
				}
				if(isset($_POST['rate'])){
					$data = array();
					$data['rate'] =$_POST['rate'];
					$data['updated_at'] = date('Y-m-d H:i:s');
					$data['created_at'] = date('Y-m-d H:i:s');
					$status = $this->Erc_model->Update($id,$data);
				}
					$data['desName']=$this->Erc_model->get_design_value('erc');
				// 			echo print_r($data['desName']);
				  $designName=$data['desName']->desName;
				  //echo $designName;

				  if(isset($_POST['designCode'])){
						$data = array();
						$data['designCode'] =$_POST['designCode'];
						// 			echo $data['designCode'].$designName;
						$status = $this->Erc_model->Update_design($designName,$data);
					}
					if(isset($_POST['rate'])){
						$data = array();
						$data['rate'] =$_POST['rate'];

						$status = $this->Erc_model->Update_design($designName,$data);
					}

					if($status=='true'){
					echo "success";
					}
    }
		public function add_erc(){

			$data=array();

					$data=array(
					'desName' => "NULL",

					);
					$id =$this->Erc_model->insert($data,'erc');
					echo $id;

		}

    // public function Adduser(){
    //   	if ($_POST)
    // 		{
    //       $data=$this->input->post();
    //       $data['password']=md5($this->input->post('password'));
    // 			//print_r($data);
    // 			$this->Employee_model->add($data);
    // 			redirect(base_url('admin/Employee'));
    // 		}
    // }

		public function checkAvailable(){
				if ($_POST) {
					$output = '';
					$check = $this->security->xss_clean($_POST);
					$data = $this->Erc_model->get_ERC_set_exist($check);
					//echo print_r($data);exit;
						if($data){
							 echo 1;
						}else{
							echo 0;
						}
				}else{
						echo json_encode(array('error'=>true, 'msg'=>'somthing want wrong :('));
				}
		}

  }
