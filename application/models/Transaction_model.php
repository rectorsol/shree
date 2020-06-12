<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {


      public function insert($data,$table){
      $this->db->insert($table,$data);
      return $this->db->insert_id();
    }

      function edit_option($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    }
    function update($action, $id,$column, $table){
        $this->db->where($id,$column);
        $this->db->update($table,$action);
        return;
    }

 public function add($data)
 {
   $this->db->insert('fabric', $data);
 }

 public function get_fabric_name()
 {
   $this->db->select('id ,fabricType, fabricName, fabricCode');
   $this->db->from('fabric');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }
public function get_godown($id)
 {
   $this->db->select('subDeptName,job_work_type');
   $this->db->from('job_work_party');
   $this->db->where('id',$id);
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }
public function get($type)
 {
   $this->db->select("*");
   $this->db->from('fabric_challan');
   $this->db->where("challan_type", $type);
  $this->db->join('branch_detail','branch_detail.id=fabric_challan.challan_from','inner');
 $this->db->join('unit','unit.id=fabric_challan.unit','inner');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
   
 }

 public function edit($id,$data)
 {
   // print_r($data);
   // print_r($id);
   $this->db->where('id', $id);
   $this->db->update('fabric', $data);
   return true;
 }
 public function delete($id)
 {
   $this->db->where('id', $id);
     $this->db->delete('fda_table');
 }
 public function search($data)
 {
   $this->db->select('fabric_challan.fc_id,fabric_challan.challan_date,branch_detail.sort_name, fabric_challan.challan_no,fabric_challan.fabric_type, fabric_challan.total_quantity,unit.unitName,fabric_challan.total_amount');
   $this->db->from('fabric_challan');

   $this->db->like($data['cat'], $data['Value']);
   $this->db->where("challan_type", $data['type']);
    $this->db->join('branch_detail','branch_detail.id=fabric_challan.challan_to','inner');
 $this->db->join('unit','unit.id=fabric_challan.unit','inner');
   $rec=$this->db->get();
  //  print_r($rec);
  //  print_r($this->db->last_query());
   return $rec->result_array();
   // print_r($searchValue);
   

 }
 public function search_by_date($data)
 {
   $this->db->select('fabric_challan.fc_id,fabric_challan.challan_date,branch_detail.sort_name, fabric_challan.challan_no,fabric_challan.fabric_type, fabric_challan.total_quantity,unit.unitName,fabric_challan.total_amount');
   $this->db->from('fabric_challan');
   $this->db->where('fabric_challan.challan_date >=', $data['from']);
   $this->db->where('fabric_challan.challan_date <=', $data['to']);
    $this->db->where("challan_type", $data['type']);
   
    $this->db->join('branch_detail','branch_detail.id=fabric_challan.challan_to','inner');
 $this->db->join('unit','unit.id=fabric_challan.unit','inner');
   $rec=$this->db->get();
  //  print_r($rec);
  //  print_r($this->db->last_query());
   return $rec->result_array();
   // print_r($searchValue);
   

 }

public function select($table)
 {
   $this->db->select('*');
   $this->db->from($table);
   
   $rec=$this->db->get();
   return $rec->result_array();
 

 }
public function getOBC_deatils($id)
 {
   $this->db->select('order_table.order_number,order_table.order_date,order_product.unit,order_product.quantity,order_product.fabric_name,order_product.hsn,order_product.design_name,order_product.dye,order_product.matching,order_product.design_code,order_product.remark,order_product.image	');
   $this->db->from("order_product");
   $this->db->join('order_table','order_table.order_id=order_product.order_id','inner');
   $this->db->where("product_order_id",$id );
   $rec=$this->db->get();
   return $rec->result_array();
 

 } 
 public function getPBC()
 {
   $this->db->select('parent_barcode');
   $this->db->from("fabric_stock_received");
  
   
   $rec=$this->db->get();
   return $rec->result_array();
 

 } 

}


?>
