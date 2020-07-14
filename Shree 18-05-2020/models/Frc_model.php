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
  public function get_fabric_recieve($id)
  {
    $this->db->select('*');
    $this->db->from('fabric_challan');
    $this->db->where('fc_id',$id);
    $this->db->join('branch_detail','branch_detail.id=fabric_challan.challan_to','inner');
 $this->db->join('unit','unit.id=fabric_challan.unit','inner');
    $rec=$this->db->get();
    
    // print_r($this->db->last_query());
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


 public function get_recieve_value_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('fabric_challan');
    $this->db->where('fc_id',$id);
    $rec=$this->db->get();
    return $rec->row();

  }

  public function get_return_value_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('fabric_challan');
    $this->db->where('fc_id',$id);
    $rec=$this->db->get();
    return $rec->row();

  }
	
}

/* End of file Branch_model.php */
/* Location: ./application/models/Branch_model.php */
?>
