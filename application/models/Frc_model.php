<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frc_model extends CI_Model {


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

public function get()
 {
   $this->db->select("fabric_challan.challan_no,fabric_challan.id,branch_detail.sort_name,fabric_challan.challan_date,fabric_stock_received.fabric_id,unit.unitName,fabric_stock_received.stock_quantity");
   $this->db->from('fabric_challan');
   $this->db->join('fabric_stock_received','fabric_stock_received.fabric_challan_id=fabric_challan.id','inner');
  $this->db->join('branch_detail','branch_detail.id=fabric_challan.challan_from','inner');
  $this->db->join('unit','unit.id=fabric_stock_received.stock_unit','inner');
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
 public function search($searchByCat,$searchValue)
 {
   $this->db->select('*');
   $this->db->from('fabric');
   $this->db->like($searchByCat, $searchValue);
   $rec=$this->db->get();
   return $rec->result_array();
   // print_r($searchValue);
   // print_r($this->db->last_query());

 }

public function select($table)
 {
   $this->db->select('*');
   $this->db->from($table);
   
   $rec=$this->db->get();
   return $rec->result_array();
 

 }

 public function select_PBC()
 {
   $this->db->select('*');
   $this->db->from('fabric_stock_received');
   $this->db->where("parent",NULL);
   $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
    $this->db->join('unit','unit.id=fabric_stock_received.stock_unit','inner');
   $rec=$this->db->get();
  //  echo $this->db->last_query();exit;
   return $rec->result_array();
 

 }
 
 public function select_PBC_by_parent($pbc)
 {
   $this->db->select('*');
   $this->db->from('fabric_stock_received');
   $this->db->where("parent",$pbc);
   $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
    $this->db->join('unit','unit.id=fabric_stock_received.stock_unit','inner');
   $rec=$this->db->get();
  //  echo $this->db->last_query();exit;
   return $rec->result_array();
 

 }
public function getPBC_deatils($id)
 {
   $this->db->select('fabric_stock_received.fabric_id,fabric.fabricName,fabric_stock_received.stock_quantity,fabric_challan.created,fabric_stock_received.challan_no,fabric_stock_received.ad_no');
   $this->db->from("fabric_stock_received");
   $this->db->where("parent_barcode",$id);
   $this->db->join('fabric','fabric.id=fabric_stock_received.fabric_id','inner');
   $this->db->join('fabric_challan','fabric_challan.id=fabric_stock_received.fabric_challan_id','inner');
   $rec=$this->db->get();
   return $rec->result_array();
 

 }

}

/* End of file Branch_model.php */
/* Location: ./application/models/Branch_model.php */
?>
