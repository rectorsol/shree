<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FDA_model extends CI_Model {


      public function insert($data,$table){
      $this->db->insert($table,$data);
      return $this->db->insert_id();
    }

      function edit_option($action, $id, $table){
        $this->db->where('id',$id);
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
 public function get_fda_fabric_name()
 {
   $this->db->select('*');
   $this->db->group_by('fabric_name');
   $this->db->from('fda_table');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }
 public function get_fda_data($fabric_name)
 {
   $this->db->select('fda_table.id AS id, fda_table.asign_date, fda_table.fabric_name AS fabric_name, fda_table.fabric_type, design.designName, design.designSeries, design.designCode');
   $this->db->from('fda_table');
   $this->db->join('design ','design.designName = fda_table.design','inner');
   $this->db->where('fabric_name', $fabric_name);
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }

 public function get_fda_group_list()
 {
   $this->db->select('id,  count(design) AS dcount, fabric_name, fabric_type, asign_date');
   $this->db->from('fda_table');
   $this->db->group_by('fabric_name');
   $query = $this->db->get();
   $query = $query->result_array();
   return $query;
 }


 public function get_design_details($fabricType, $fabric_name)
  {
    // $sql = 'SELECT * FROM design WHERE designOn = "'.$fabricType.'" AND id NOT IN (SELECT design_id FROM fda_table WHERE fabric_type = "'.$fabricType.'")';
    // $sql = 'SELECT * FROM design WHERE designOn = "'.$fabricType.'" AND id NOT IN (SELECT design_id FROM fda_table WHERE fabric_name = "'.$fabric_name.'")';
    $sql = 'SELECT distinct designName, desCode, rate, stitch,  designOn FROM design_view
           
            WHERE designOn = "'.$fabricType.'" AND designName NOT IN (SELECT design FROM fda_table WHERE fabric_name = "'.$fabric_name.'") Group BY designName ';
    $query = $this->db->query($sql);
    //print_r($this->db->last_query());
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




}

/* End of file Branch_model.php */
/* Location: ./application/models/Branch_model.php */
?>
