<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PrintThis extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('Design_model');
       $this->load->model('login_model');
       $this->load->library('barcode');
       $this->load->library('pdf');
    }
    public function index($print){
			$data['print'] = $print;
			$this->load->view('admin/print/index', $data);
    }
    public function designmultiprint()
    {
					if ($_POST['ids']) {
						foreach ($_POST['ids'] as $value) {
							if ($value != "") {
								$data['data'][] = $this->Design_model->get_multi_value_by_id($value);
							}
						}
						$data['main_content'] = $this->load->view('admin/master/design/multi_list_print', $data, TRUE);
						$this->load->view('admin/print/index', $data);

					}
    }

  }
