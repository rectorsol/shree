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
    	}



    	public function index(){
				$data = array();
				$data['name']=' Design';
				$data['design_data']=$this->Design_model->get();
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



     public function edit($id)
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
// 	 public function deleteUser(){
// 		 $ids = $this->input->post('ids');

// 		 $userid= explode(",", $ids);
// 		 foreach ($userid as $value) {
// 		  $this->db->delete( 'design',array('id' => $value));
// 		  echo $this->db->last_query();exit;

// 		}
// 	}

        public function filter()
        {
            $data=array();
            if ($_POST) {
              $searchByCat=$this->input->post('searchByCat');
              $searchValue=$this->input->post('searchValue');
                $output = "";

                $data=$this->Design_model->search($searchByCat,$searchValue);
                foreach ($data as $value) {
                    $url= base_url('/upload/').$value['designPic'];
                    $output .= "<tr id='tr_".$value['id']."'>";
                    $output .="<td><input type='checkbox' class='sub_chk' data-id=".$value['id']."></td>";

                    foreach ($value as $temp)
                    {
                        $output .= "<td>".$temp."</td>";
                    }

                    $output .="<td><a class='btn default btn-outline image-popup-vertical-fit el-link' href=' ".$url."'><img src='".$url."' alt='image' style='height: 40px; width: 40px;'></a></td> ";
                    $output .= "<td><a href='#".$value['id']."' class='text-center tip' data-toggle='modal' data-original-title='Edit'><i class='fas fa-edit blue'></i></a>
                    <a class='text-danger text-center tip' href='javascript:void(0)' onclick='delete_detail(".$value['id'].")' data-original-title='Delete'><i class='mdi mdi-delete red' ></i></a>
                    </td>";
                   $output .= "</tr>";
                            }
              echo json_encode($output);
            }
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


	}

	/* End of file Dashboard.php */
	/* Location: ./application/controllers/admin/Dashboard.php */
 ?>
