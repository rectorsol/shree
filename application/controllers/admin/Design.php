<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Design extends CI_Controller {

		public function __construct(){
        parent::__construct();
				check_login_user();
        $this->load->model('Design_model');
        $this->load->model('common_model');
        $this->load->library('barcode');
			  $this->load->library('pdf');
			  $this->load->library("pagination");
			  $this->load->helper('url');
    	}



    	public function index(){
			 $config = array();
        $config["base_url"] = base_url() . "admin/design";
        $config["total_rows"] = $this->Design_model->get_count();
        $config["per_page"] = 100;
		$config["uri_segment"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul>';
    $config['attributes']       = ['class' => 'page-link'];
    $config['first_tag_open']   = '<li class="page-item">';
    $config['first_tag_close']  = '</li>';
    $config['prev_tag_open']    = '<li class="page-item">';
    $config['prev_tag_close']   = '</li>';
    $config['next_tag_open']    = '<li class="page-item">';
    $config['next_tag_close']   = '</li>';
    $config['last_tag_open']    = '<li class="page-item">';
    $config['last_tag_close']   = '</li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['num_tag_open']     = '<li class="page-item">';
    $config['num_tag_close']    = '</li>';	
		$this->pagination->initialize($config);
		 $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		
		
				$data = array();
				$data["links"] = $this->pagination->create_links();
				$data['name']=' Design';
				$data['design_data']=$this->Design_model->get($config["per_page"], $page);
				$data['febName']=$this->common_model->febric_name();
				$data['febType']=$this->common_model->febric_type();
				$data['main_content'] = $this->load->view('admin/master/design/design', $data, TRUE);
				$this->load->view('admin/index', $data);
    	}

    	public function fabricOn(){
    	    if($_POST){
			   $data = $this->common_model->febric_type_byId($_POST['fabricName']);
			//    print_r($data);exit;
    	       echo $data->fabricType;
    	    }
    	}

    	public function addDesign()
    	{


    		if ($_POST)
    		{
    			$config['upload_path']          = './upload/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 11264;
				$config['max_width']            = 3840;
				$config['max_height']           = 2160;

				$this->load->library('upload', $config);
                $this->upload->do_upload('designPic');
				$img=$this->upload->data();
                //  echo "<pre>";
                //  print_r($img);
                //  exit();
                         $pic=$img['file_name'];
                
                        $lastId = $this->Design_model->getLastId();
						$pre = explode("D", $lastId->barCode);
						$newId = (int)($pre[1]) + 1;
						$id = "D".(string)$newId;
						
						if(!empty($pic)){

    					$data=array(
    				'designName'=>$_POST['designName'],

    				'designSeries'=>$_POST['designSeries'],
    				// 'designCode'=>$_POST['designCode'],
    				'stitch'=>$_POST['stitch'],
                    'dye'=>$_POST['dye'],
                    'matching'=>$_POST['matching'],
    				// 'saleRate'=>$_POST['saleRate'],
                    'htCattingRate'=>$_POST['htCattingRate'],
    				'designPic'=>$pic,
    				'fabricName'=>$_POST['fabricName'],
		     	    'barCode'=>$id,
		     	    'designOn'=>trim($_POST['designOn'])
    			);
    			//print_r($data); exit();
    			$this->Design_model->add($data);
    			redirect(base_url('admin/Design'));
						}
						else{

						    $data=array(
    				'designName'=>$_POST['designName'],

    				'designSeries'=>$_POST['designSeries'],
    				// 'designCode'=>$_POST['designCode'],
    				'stitch'=>$_POST['stitch'],
                    'dye'=>$_POST['dye'],
                    'matching'=>$_POST['matching'],
    				// 'saleRate'=>$_POST['saleRate'],
                    'htCattingRate'=>$_POST['htCattingRate'],

    				'fabricName'=>$_POST['fabricName'],
		     	    'barCode'=>$id,
		     	   'designOn'=>trim($_POST['designOn'])
    			);
    			// print_r($data); exit();
    			$this->Design_model->add($data);
    			redirect(base_url('admin/Design'));

						}

    		}
    	}
			public function design_print($id){

		     	    $data['data'] = $this->Design_model->get_single_value_by_id($id);
		     		$data['pdf'] = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		     		$this->load->view('admin/master/design/index', $data);
		     }
			public function getDesign(){
			
					$id=$this->security->xss_clean($_POST['id']);
					
					 $data['data'] = $this->Design_model->get_single_value_by_id($id);
					
		     		echo json_encode($data['data']);
		     }


     public function edit()
        {
            if ($_POST)

            {
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048000;
                $config['max_width']            = 1500;
                $config['max_height']           = 1000;
                $this->load->library('upload', $config);
                $this->upload->do_upload('designPic');
                $img=$this->upload->data();

				$pic=$img['file_name'];
				$id=$_POST['designId'];
              if($pic!='')
              {
                $data=array(
                    'designName'=>$_POST['designName'],
                    'designSeries'=>$_POST['designSeries'],
                    // 'designCode'=>$_POST['designCode'],
                    'stitch'=>$_POST['stitch'],
                    'dye'=>$_POST['dye'],
                    'matching'=>$_POST['matching'],
                    // 'saleRate'=>$_POST['saleRate'],
                    'htCattingRate'=>$_POST['htCattingRate'],
                    'designPic'=>$pic,
                    'fabricName'=>$_POST['fabricName'],
                    'designOn'=>trim($_POST['designOn'])

                );

                }
                 else{
                     $data=array(
                    'designName'=>$_POST['designName'],
                    'designSeries'=>$_POST['designSeries'],
                    // 'designCode'=>$_POST['designCode'],
                    'stitch'=>$_POST['stitch'],
                    'dye'=>$_POST['dye'],
                    'matching'=>$_POST['matching'],
                    // 'saleRate'=>$_POST['saleRate'],
                    'htCattingRate'=>$_POST['htCattingRate'],
                    'fabricName'=>$_POST['fabricName'],
                    'designOn'=>trim($_POST['designOn'])
                );
                }

            }
                // print_r($data); exit();
                $this->Design_model->edit($id,$data);
                redirect(base_url('admin/Design'));
            }


         public function delete($id)
        {
            $this->Design_model->delete($id);
            redirect(base_url('admin/Design'));
        }


	     public function deleteUser(){
		 $ids = $this->input->post('ids');

		 $userid= explode(",", $ids);
		 foreach ($userid as $value) {
		  $this->db->delete( 'design',array('id' => $value));

		}

	}


	public function get_data(){
        $ids = $this->input->post('ids');
        $userid= explode(",", $ids);
        foreach ($userid as $value) {
        $data[] = $this->Design_model->select_value('design', $value);
        }
       $data['pdf'] = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      	$this->load->view('admin/master/design/multiple', $data);


	}

				public function designExist()
			{
					if ($_POST) {
						$output = '';
						$check = $this->security->xss_clean($_POST);
						$data = $this->Design_model->get_design_set_exist($check);
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
											$data['design_data']=$this->Design_model->search1($data1);

								}else{
								if(isset($_POST['designName']) && $_POST['designName']!="" ){
									$data1['cat'][]='designName';
									$fab=$this->input->post('designName');
									$data1['Value'][]=$fab;
									$caption=$caption.' designName'." = ".$fab." ";
									}
									if(isset($_POST['designSeries']) && $_POST['designSeries']!="" ){
										$data1['cat'][]='designSeries';
											$fab=$this->input->post('designSeries');
										$data1['Value'][]=$fab;
										$caption=$caption.'designSeries '." = ".$fab." ";
										}
										if(isset($_POST['desCode']) && $_POST['desCode']!="" ){
											 $data1['cat'][]='desCode';
												$fab=$this->input->post('desCode');
											 $data1['Value'][]=$fab;
											$caption=$caption.'desCode'." = ".$fab." ";
											}
											if(isset($_POST['rate']) && $_POST['rate']!="" ){
											$data1['cat'][]='rate';
											$fab=$this->input->post('rate');
											$data1['Value'][]=$fab;
											$caption=$caption.'rate'." = ".$fab." ";
											}
											if(isset($_POST['stitch']) && $_POST['stitch']!="" ){
												$data1['cat'][]='stitch';
												$fab=$this->input->post('stitch');
												$data1['Value'][]=$fab;
												$caption=$caption.'stitch'." = ".$fab." ";
												}
												if(isset($_POST['dye']) && $_POST['dye']!="" ){
												$data1['cat'][]='dye';
												$fab=$this->input->post('dye');
												$data1['Value'][]=$fab;
												$caption=$caption.'dye'." = ".$fab." ";
												}
												if(isset($_POST['matching']) && $_POST['matching']!="" ){
													$data1['cat'][]='matching';
													$fab=$this->input->post('matching');
													$data1['Value'][]=$fab;
													$caption=$caption.'matching'." = ".$fab." ";
													}
													if(isset($_POST['sale_rate']) && $_POST['sale_rate']!="" ){
													$data1['cat'][]='sale_rate';
													$fab=$this->input->post('sale_rate');
													$data1['Value'][]=$fab;
													$caption=$caption.'sale_rate'." = ".$fab." ";
													}
													if(isset($_POST['htCattingRate']) && $_POST['htCattingRate']!="" ){
														$data1['cat'][]='htCattingRate';
														$fab=$this->input->post('htCattingRate');
														$data1['Value'][]=$fab;
														$caption=$caption.'htCattingRate'." = ".$fab." ";
														}
														if(isset($_POST['fabricName']) && $_POST['fabricName']!="" ){
														$data1['cat'][]='fabricName';
														$fab=$this->input->post('fabricName');
														$data1['Value'][]=$fab;
														$caption=$caption.'fabricName'." = ".$fab." ";
														}
														if(isset($_POST['barCode']) && $_POST['barCode']!="" ){
															$data1['cat'][]='barCode';
															$fab=$this->input->post('barCode');
															$data1['Value'][]=$fab;
															$caption=$caption.'barCode'." = ".$fab." ";
															}
															if(isset($_POST['designOn']) && $_POST['designOn']!="" ){
															$data1['cat'][]='designOn';
															$fab=$this->input->post('designOn');
															$data1['Value'][]=$fab;
															$caption=$caption.'designOn'." = ".$fab." ";
															}
									$data['design_data']=$this->Design_model->search1($data1);
								}
									if($data1['type']=='design'){
										$data['caption']=$caption;
										$data['febName']=$this->common_model->febric_name();
										$data['febType']=$this->common_model->febric_type();
										$data["links"] = $this->pagination->create_links();
										$data['main_content'] = $this->load->view('admin/master/design/design', $data, TRUE);
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
