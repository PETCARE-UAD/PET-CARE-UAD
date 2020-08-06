<?php  


/**
* 
*/
class m_pemilikhewan extends CI_Model
{
	
	private $table_name = "tb_pemilikhewan";

	private $primary = "id_pemilik";

	function get_all($email){

		#Get all data pemilikhewan
		$this->db->where("email",$email);
		$data=$this->db->get($this->table_name);
		return $data->result();

	}

	function get_by_id($id){

		#Get data PemilikHewan by id
		$this->db->where($this->primary,$id);
		$data=$this->db->get($this->table_name);

		return $data->row();
	}


	function get_by_nama_pemilik_email($nama_pemilik,$email){		
		#Get data by nama_pemilik or email
		$this->db->where('nama_pemilik',$nama_pemilik);
		$this->db->or_where('email',$email);
		$data=$this->db->get($this->table_name)->row();

		return $data;
	}


	function insert($data){

		#Insert data to table tb_pemilikhewan
		$insert=$this->db->insert($this->table_name,$data);

		return $insert;
	}

	function delete($id){
		#Delete data PemilikHewan by id
		$this->db->where($this->primary,$id);
		$delete=$this->db->delete($this->table_name);

		return $delete;
	}

	function update($id,$data){
		#Update data PemilikHewan by id
		$this->db->where($this->primary,$id);
		$update=$this->db->update($this->table_name,$data);
		if ($update) {
			$update=$this->get_by_id($id);
		}

		return $update;
	}

}

?>