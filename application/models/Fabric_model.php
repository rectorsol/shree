 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fabric_model extends CI_Model {

	public function add($data)
	{
		$this->db->insert('fabric', $data);
	}
	public function get()
	{
		$this->db->from('fabric');
	 
		$rec=$this->db->get();
		return $rec->result();

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
     	$this->db->delete('fabric');
	}
	public function search($searchByCat,$searchValue)
	{
		$this->db->select('id,fabricName,fabHsnCode,fabricType,fabricCode,purchase');
		$this->db->from('fabric');
		$this->db->like($searchByCat, $searchValue);
		$rec=$this->db->get();
		return $rec->result_array();
		// print_r($searchValue);
		// print_r($this->db->last_query());

	}

  function get_fabric_exist($fabricName){
        $this->db->select('fabricName');
        $this->db->from('fabric');
        $this->db->where('fabricName',$fabricName);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        if($query->num_rows()>=1) {
            return true;
        }else{
            return false;
        }
    }



}

/* End of file Branch_model.php */
/* Location: ./application/models/Branch_model.php */
 ?>
