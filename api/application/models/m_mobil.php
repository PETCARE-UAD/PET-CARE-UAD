<?php  

/**
* 
*/
class m_hewan extends CI_Model
{
	private $table_name="tb_hewan";
	private $primary="id_hewan";
	private $ciri="ciri_khusus"; 

	function get_all(){
		$this->db->select($this->table_name);
		$this->db->group_by($this->ciri);
		return $this->db->get($this->table_name)->result();
	}

	function get_by_id($id){
		$this->db->select($this->table_name);
		$this->db->group_by($this->ciri);
		$this->db->where($this->table_name.'.'.$this->primary,$id);
		return $this->db->get($this->table_name)->row();
	}

	function delete($id){
		$this->db->where($this->primary,$id);
		$delete=$this->db->delete($this->table_name);
		return $delete;
	}

	function get_by_ciri($plat_no){
		$this->db->where($this->ciri,$ciri_khusus);
		$data=$this->db->get($this->table_name)->row();
		return $data;
	}
}

?>