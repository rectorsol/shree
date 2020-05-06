<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

public function __construct(){
      parent::__construct();
      check_login_user();
     $this->load->model('common_model');
     $this->load->model('login_model');
     $this->load->model('Orders_model');;
     $this->load->library('barcode');
     $this->load->library('pdf');
  }
  public function index()
  {
      $data = array();
      $data['page_name'] = 'ORDER';
      $data['all_Order_list'] = $this->Orders_model->select('order_product');
      $data['data_cat'] = $this->common_model->select('data_category');
      $data['all_Order'] = $this->Orders_model->get_order_value();
      $data['main_content'] = $this->load->view('admin/order/order', $data, TRUE);
      $this->load->view('admin/index', $data);
  }

  public function dashboard()
  {
      $data = array();
      $data['page_name'] = 'ORDER DASHBORD';
       $data['cause'] = $this->common_model->select('cause_list');
      $data['order_count'] = $this->Orders_model->get_order_count();
      $data['get_complete'] = $this->Orders_model->get_order_complete();
      $data['get_cancel'] = $this->Orders_model->get_order_cancel();
      $data['get_pending'] = $this->Orders_model->get_order_pending();
      $data['main_content'] = $this->load->view('admin/order/dashboard', $data, TRUE);
      $this->load->view('admin/index', $data);
  }

  public function order_flow() {
    $data = array();
    $data['page_name'] = 'ORDER FLOW CHART';
    $data['main_content'] = $this->load->view('admin/order/order_flow_chart', $data, TRUE);
    $this->load->view('admin/index', $data);
  }

  public function add_new_order() {
    if($_POST)
  	{
  		$data=array(
  			'order_number'=>$_POST['order_number'],
        'customer_name'=>$_POST['customer_name'],
        'session' => $_POST['session'],
        'data_category' =>$_POST['category'],
        'order_type' => $_POST['order_type'],
  			'order_date'=>date('Y-m-d')
  		);
  		$order_number =	$this->Orders_model->insert($data, 'order_table');
  		if ($order_number) {
  			for($i = 0; $i < count($_POST['serial_number']); $i++) {
            $lastId = $this->Orders_model->last_id();
  					$data=array(
                'product_order_id' => 'O'. ($lastId + 1),
                'order_id' => $order_number,
  							'series_number' => $_POST['serial_number'][$i],
  							'unit' => $_POST['unit'][$i],
  							'quantity' => $_POST['quantity'][$i],
  							'priority' => $_POST['priority'][$i],
  							'order_barcode' => $_POST['order_barcode'][$i],
  							'design_name' => $_POST['design_name'][$i],
  							'design_code' => $_POST['design_code'][$i],
  							'remark' => $_POST['remark'][$i],
  							'fabric_name'=> $_POST['fabric_name'][$i],
  							'hsn'=> $_POST['hsn'][$i],
  							'stitch'=> $_POST['stitch'][$i],
  							'dye'=> $_POST['dye'][$i],
  							'matching'=> $_POST['matching'][$i]
  						);
              $this->Orders_model->insert($data,'order_product');
          }
          $txt = 'order save <a href="'.base_url('admin/Orders').'"> show order </a>';
          $this->session->set_flashdata(array('error' => 0, 'msg' => $txt));
          redirect(base_url('admin/Orders/addOrders'));
        }else{
          $this->session->set_flashdata(array('error' => 1, 'msg' => 'order data not save try again'));
          redirect(base_url('admin/Orders/addOrders'));
        }
    }
  }

  public function addOrders()
  {
    $data = array();
    $data['name'] = 'Add Orders';
    $data['febName']=$this->common_model->febric_name();
    $data['designname'] = $this->Orders_model->get_design_name();
    $data['designCode'] = $this->Orders_model->get_design_code();
    $data['unit'] = $this->Orders_model->get_unit();
    $data['all_Order'] = $this->Orders_model->select_order_type('order_type');
    $data['data_cat'] = $this->common_model->select('data_category');
    $data['customer'] = $this->common_model->select('customer_detail');
    $data['all_session'] = $this->Orders_model->select_order_type('session');
    $data['main_content'] = $this->load->view('admin/order/addOrder', $data, TRUE);
    $this->load->view('admin/index', $data);
  }
public function getFabricDetails(){
     $id= $this->security->xss_clean($_POST['id']);
    $data = array();
     $data['febName']=$this->Orders_model->getFabricDetails($id);
     echo json_encode($data['febName']);
  }
  public function getFabricName(){
    if ($_POST) {
    $fabric=$this->security->xss_clean($_POST);
     $data['febName']=$this->Orders_model->get_fabric_by_name($fabric['search']);
     echo json_encode($data['febName']);
     }
  }
  public function getDesignDetails(){
     $id= $this->security->xss_clean($_POST['id']);
    $data = array();
     $data['design']=$this->Orders_model->getDesignDetails($id);
     echo json_encode($data['design']);
  }
  public function CheckOrder(){
    $order = $this->security->xss_clean($_POST['order']);
    $query=$this->Orders_model->checkorder($order);
    if($query){
      echo "taken";
    }else{
      echo "not_taken";
    }
  }

  public function show_prm_data() {
        if($_POST) {
          $order_id = $_POST['order_number'];
          $data=array();
          $data['order_number']=$order_id;
          $data['session']=$_POST['session'];
          $data['category']=$_POST['category'];
          $data['order_type']=$_POST['order_type'];
          $data['old_order_number']=$_POST['order_number'];
          $data['name']='Order PRM List';
          $data['order_data']=$this->Orders_model->get_order_by_id($order_id);
          //  print_r($data['order_data']);exit;
          $data['main_content'] = $this->load->view('admin/order/show_prm', $data, TRUE);
          $this->load->view('admin/index', $data);
        }else {
          show_404();
        }
      }

    public function add_fresh_data()
    {
      if($_POST)
    	{
    		$data=array(
    			'order_number'=>$_POST['order_number'],
          'customer_name'=>$_POST['customer_name'],
          'session' => $_POST['session'],
          'data_category' =>$_POST['category'],
          'order_type' => $_POST['order_type'],
    			'order_date'=>date('Y-m-d')
    		);
    		$order_number =	$this->Orders_model->insert($data, 'order_table');
    		if ($order_number) {
    			for($i = 0; $i < count($_POST['serial_number']); $i++){
    					$data=array(
                  'order_id' => $order_number,
    							'series_number' => $_POST['serial_number'][$i],
                  'unit' => $_POST['unit'][$i],
                  'design_barcode' => $_POST['dbc'][$i],
    							'quantity' => $_POST['quantity'][$i],
    							'priority' => $_POST['priority'][$i],
    							'order_barcode' => $_POST['order_barcode'][$i],
    							'design_name' => $_POST['design_name'][$i],
    							'design_code' => $_POST['design_code'][$i],
    							'remark' => $_POST['remark'][$i],
    							'fabric_name'=> $_POST['fabric_name'][$i],
    							'hsn'=> $_POST['hsn'][$i],
    							'stitch'=> $_POST['stitch'][$i],
    							'dye'=> $_POST['dye'][$i],
    							'matching'=> $_POST['matching'][$i]
    						);
                $this->Orders_model->insert($data,'order_product');
            }
            $txt = 'order save <a href="'.base_url('admin/Orders').'"> show order </a>';
            $this->session->set_flashdata(array('error' => 0, 'msg' => $txt));
            redirect(base_url('admin/Orders/addOrders'));
          }else{
            $this->session->set_flashdata(array('error' => 1, 'msg' => 'order data not save try again'));
            redirect(base_url('admin/Orders/addOrders'));
          }
      }
    }

// Dashbord Actions

    public function update_status($status, $order_id){

      if (self::check_order($order_id)) {
        try {
          $data = [
            'status' => $status
          ];
          $this->Orders_model->edit_by_node('product_order_id', $order_id, $data, 'order_product');
          $this->session->set_flashdata(array('error' => 0, 'msg' => 'ORDER FOUND'));
          redirect($_SERVER['HTTP_REFERER']);
        } catch (\Exception $e) {
          $error = $e->getMessage();
          $this->session->set_flashdata(array('error' => 1, 'msg' => $error));
          redirect($_SERVER['HTTP_REFERER']);

        }
      }else {
        $this->session->set_flashdata(array('error' => 1, 'msg' => 'ORDER NOT FOUND'));
        redirect($_SERVER['HTTP_REFERER']);
      }

    }

    public function check_order($order_id){
      return $this->Orders_model->get_order_product_by_id($order_id);
    }

    public function get_details($order_id)
    {
        $order_id = sanitize_url($order_id);
        $data=array();
        $data['name']='Order List';
        $data['order_data']=$this->Orders_model->get_order($order_id);
        $data['main_content'] = $this->load->view('admin/order/show_order', $data, TRUE);
        $this->load->view('admin/index', $data);

    }


    public function edit_order_product_details($order_id)
        {
            $data=array();
            $data['name']='Order List';
            $data['order_data']=$this->Orders_model->get_order_product($order_id);
          //  echo"<pre>"; print_r($data['order_data']);exit;
            $data['main_content'] = $this->load->view('admin/order/edit_order_details', $data, TRUE);
            $this->load->view('admin/index', $data);

        }


        public function edit_order_product($order_id)
        {
          if($_POST) {
            $data=$this->input->post();
            $data = $this->security->xss_clean($data);
            $result = $this->Orders_model->edit_order_product_details($data, $order_id, 'order_product');
            if ($result) {
              $this->session->set_flashdata(array('error' => 0, 'msg' => 'ORDER PRODUCT UPDATE DONE'));
            }else{
              $this->session->set_flashdata(array('error' => 1, 'msg' => 'ORDER PRODUCT UPDATE FAILD'));
            }
            redirect($_SERVER['HTTP_REFERER']);
          }
        }

    public function add_prm()
      {

      $order_id =$this->Orders_model->insert($data,'order_product');
            //  redirect(base_url('admin/Orders/addOrders'));
       }



       //  public function design_print($id){
       //  $data['data'] = $this->Orders_model->get_single_value($id,'order_tb');
       //
       //  $data['bar']=$ojbect = $this->barcode->getBarCode('$data->designCode');
       //  $data['bar']=$ojbect->getBarcodeHTML(2, 30, 'black');
       //     // echo print_r($data['bar']);exit;
       //  $data['pdf'] = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
       //  $this->load->view('admin/order/print', $data);
       // }
public function cancel_status(){
  if($_POST) {
    //  echo "<pre>"; print_r($_POST);exit;
        try {
          $data = [
            'status' => 'CANCEL'
          ];
           $ids = $this->input->post('ids');
       $userid= explode(",", $ids);
       foreach ($userid as $value) {
          $this->Orders_model->edit_by_node('product_order_id', $value, $data, 'order_product');
          $data1 = [
            'order_id' => $value,
            'cause' => $this->input->post('cause'),
            'date' => $this->input->post('date'),
          ];
          $this->Orders_model->insert($data1,'order_cancel_cause');
        }
        } catch (\Exception $e) {
          $error = $e->getMessage();
          $this->session->set_flashdata(array('error' => 1, 'msg' => $error));
          redirect($_SERVER['HTTP_REFERER']);

        }
    }
        redirect($_SERVER['HTTP_REFERER']);
    }
public function done_status(){
  if($_POST) {
    //  echo "<pre>"; print_r($_POST);exit;
        try {
          $data = [
            'status' => 'DONE'
          ];
           $ids = $this->input->post('ids');
       $userid= explode(",", $ids);
       foreach ($userid as $value) {
          $this->Orders_model->edit_by_node('product_order_id', $value, $data, 'order_product');
        
        }
        } catch (\Exception $e) {
          $error = $e->getMessage();
          $this->session->set_flashdata(array('error' => 1, 'msg' => $error));
          redirect($_SERVER['HTTP_REFERER']);

        }
    }
        
    }

          public function deleteOrders($id)
          {
            $this->Orders_model->OrdersDelete_table($id);
            redirect(base_url('admin/Orders'));
          }

       public function deleteorder(){
       $ids = $this->input->post('ids');
       $userid= explode(",", $ids);
       foreach ($userid as $value) {
     $this->db->delete('order_table', array('order_id' => $value));
  }
}
  public function editOrders($id)
  {
      if($_POST){
      $data=$this->input->post();
      // $data=$this->input->post('')
      $this->Orders_model->edit_order($data,$id,'order_table');
      redirect(base_url('admin/Orders'));
    }
  }


// public function order_number(){
//   if(isset($_POST['search'])){
//       $search = $_POST['search'];
//       $data = $this->Orders_model->get_order_number($search);
//       echo print_r($data);exit;
//       foreach ($data as $value) {
//         $response[] = array("value"=>$value['order_number'],"label"=>$value['order_number']);
//         }
//       }
//       echo json_encode($response);
// }

    public function get_order_details()
        {
          $data=array();
            if ($_POST) {
             $output = '';
             $data['all_Order_list'] = $this->Orders_model->get_order_detail_value($_POST['oreder_id'],'order_product');
             $data['data']=$this->load->view('admin/order/show_order', $data,TRUE);
             $this->load->view('admin/order/index', $data);
        }
      }

          public function back()
                {
                  redirect(base_url('admin/Orders'));
                }

                  public function get_order_number(){
                        $lastId = $this->Orders_model->getLastId();
                        //echo print_r($lastId);exit;
                        $pre = explode("ORD", $lastId->order_number);
                        $newId = (int)($pre[1]) + 1;
                        //echo print_r($newId);exit;
                        $id = "ORD".(string)$newId;
                        return $id;
                    }


                public function add_cell(){
                  $data=array();
                  $data['order_tb_value']= $this->Orders_model->getLastId();
                  //echo print_r($data['order_tb_value']);exit;
                      $data=array(
                        'order_id' => $data['order_tb_value']->order_number,
                        'customer_name' => $data['order_tb_value']->customer_name
                      );
                      //echo print_r($data);exit;
                      $order_number =$this->Orders_model->insert($data,'order_product');
                      echo $customer_name;
                      echo $order_id;
                }

                public function get_order_data()
                {
                  $data=array();
                  $data['order_tb_value']= $this->Orders_model->getLastId();
                  $value=$data['order_tb_value']->order_number;
                  $data = $this->Orders_model->select_order_product($value);
                  // echo "<pre>";
                  // echo print_r($data);exit;
                  header('Content-type: application/json');
                  echo json_encode($data);
                }

                public function get_order_prm()
                {
                  $data=array();
                  if($_POST){
                  $data = $this->Orders_model->select_order_product($_POST['order_number']);
                  //echo print_r($data['order_tbl_value']);exit;

                  header('Content-type: application/json');
                  echo json_encode($data);
                }
              }

                public function update()
                {
                  $id=$_POST['product_order_id'];
                 if(isset($_POST['series_number'])){
                  $data = array();
                  $data['series_number'] =$_POST['series_number'];
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['customer_name'])){
                  $data = array();
                  $data['customer_name'] = $_POST['customer_name'];
                  // echo $id;
                  // echo print_r($data);exit;
                  $status = $this->Orders_model->Update($id,$data);

                }
                if(isset($_POST['unit'])){
                  $data = array();
                  $data['unit'] = $_POST['unit'];
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['quantity'])){
                  $data = array();
                  $data['quantity'] = $_POST['quantity'];
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['priority'])){
                  $data = array();
                  $data['priority'] = $_POST['priority'];
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['order_barcode'])){
                  $data = array();
                  $data['order_barcode'] = $_POST['order_barcode'];
                  echo $id;
                  echo print_r($data);exit;
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['remark'])){
                  $data = array();
                  $data['remark'] = $_POST['remark'];
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['design_code'])){
                  $data = array();
                  $data['design_code'] = $_POST['design_code'];
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['fabric_name'])){
                  $data = array();
                  $data['fabric_name'] = $_POST['fabric_name'];
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['hsn'])){
                  $data = array();
                  $data['hsn'] = $_POST['hsn'];
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['design_name'])){
                  $data = array();
                  $data['design_name'] = $_POST['design_name'];
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['stitch'])){
                  $data = array();
                  $data['stitch'] = $_POST['stitch'];
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['dye'])){
                  $data = array();
                  $data['dye'] = $_POST['dye'];
                  $status = $this->Orders_model->Update($id,$data);
                }
                if(isset($_POST['matching'])){
                  $data = array();
                  $data['matching'] = $_POST['matching'];
                  $status = $this->Orders_model->Update($id,$data);
                }

                if($status=='true'){
                  echo "success";
                }
                }
    }
