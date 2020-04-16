<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EMB extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('Erc_model');
      	$this->load->model('Emb_model');
    }
    public function index()
    {
        $data = array();
        $data['name'] = 'ERC';
		    $data['designname'] = $this->Erc_model->get_design_name();
		    $data['fresh_designname'] = $this->Erc_model->get_design_fresh_value();

        $data['main_content'] = $this->load->view('admin/master/emb/emb', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function get_emb_list()
    {
		$designname = $this->Emb_model->get_emb();
		header('Content-type: application/json');
		echo json_encode($designname);
	}

	 public function getDesignName()
    {

		$designname = $this->Emb_model->get_design_name();
// 		echo print_r($designname);exit;
        foreach($designname as $row ) {
        foreach($row as $value){
        $result_array[]= $value;
        }

    }
		header('Content-type: application/json');
		echo json_encode($result_array);


    }
     public function get_workporty_name()
    {

		$name = $this->Emb_model->get_worker_name();
		//echo print_r( $fabcode);exit;

        foreach($name as $row ) {

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
			 $data['designName'] = $_POST['designName'];
			 $workerName=$_POST['workerName1'];
			 //echo $workerName. $data['designName'];exit;
			 $data['created_date'] = date('Y-m-d H:i:s');
       // $status = $this->Emb_model->update($id,$data);
			 //echo $data['desName'].$id;exit;
 			  $data_value= $this->Emb_model->get_emb_name($data['designName'],$workerName);
 			 if($data_value)
 			 {
 			      $this->session->set_flashdata('msg','Same record not exit');
 			 }
 			 else{
 			      $status = $this->Emb_model->update($id,$data);
 			 }
		}
		if(isset($_POST['workerName'])){
			$data = array();
			$data['workerName'] = $_POST['workerName'];
			   $designName=$_POST['designName1'];
				 //echo $designName.$data['workerName'];exit;
			$data['created_date'] = date('Y-m-d H:i:s');
		  // $status = $this->Emb_model->update($id,$data);

			 $data_value= $this->Emb_model->get_emb_name($designName,$data['workerName']);
			 //echo $data_value;exit;
			if($data_value)
			{
			     $this->session->set_flashdata('msg',' Same record not exit');
			}
			else{
			     $status = $this->Emb_model->update($id,$data);
			}
		}
		if(isset($_POST['rate'])){
			$data = array();
			$data['rate'] =$_POST['rate'];

			$data['created_date'] = date('Y-m-d H:i:s');
			$status = $this->Emb_model->update($id,$data);
		}


		if($status=='true'){
			echo "success";
		}
    }
		public function add_emb(){

			$data=array();

					$data=array(
					'designName' => "NULL",
                    'created_date' => date('Y-m-d H:i:s'),

					);
					$id =$this->Emb_model->insert($data,'emb');
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

  }
