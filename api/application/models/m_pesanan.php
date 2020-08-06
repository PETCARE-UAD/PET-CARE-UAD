<?php  


/**
* 
*/
class m_pesanan extends CI_Model
{
	
	private $table_name 	= "tb_transaksi";
	private $table_pemilikhewan		= "table_pemilikhewan";
	private $table_hewan	= "tb_hewan";
	private $primary 		= "id_transaksi";

	function get_all(){

		#Get all data pemilikhewan
		$this->db->select("t_tran.*,t_pemilikhewan.nama_pemilik");
		$data=$this->db->join($this->table_pemilikhewan." t_pemilikhewan","t_pemilikhewan.id_pemilik=t_tran.id_pemilik");
		$data=$this->db->get($this->table_name." t_tran");
		return $data->result();


	}

	function get_pesanan_by_userid($id){

		#Get all data pesanan by userid
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where($this->table_name.".id_pemilik",$id);
		// $data=$this->db->join($this->table_detail,$this->table_detail.".id_transaksi=".$this->table_name.".id_transaksi");
		$data=$this->db->get();
		return $data->result();


	}

	function get_by_id($id){

		#Get data pemilikhewan by id
		$this->db->where($this->primary,$id);
		$data=$this->db->get($this->table_name);

		return $data->row();
	}

	function get_detail_by_id($id){

		#Get data user by id
		$this->db->where($this->primary,$id);
		$this->db->join($this->table_hewan." t_hewan","t_hewan.id_hewan=".$this->table_detail.".id_hewan");
		$data=$this->db->get($this->table_detail);

		return $data->result();
	}

	// function get_history_user($id){

	// 	#Get history by id user
	// 	$this->db->where("id_hewan",$id);
	// 	$this->db->join($this->table_mobil." t_hewan","t_hewan.id_hewan=".$this->table_detail.".id_hewan");
	// 	$data=$this->db->get($this->table_detail);

	// 	return $data->result();
	// }


	function get_by_nama_pemilik_email($nama_pemilik,$email){		
		#Get data by nama_pemilik or email
		$this->db->where('nama_pemilik',$nama_pemilik);
		$this->db->or_where('email',$email);
		$data=$this->db->get($this->table_name)->row();

		return $data;
	}


	function insert($data,$detail_pesanan){

		#Insert data to table tb_pemilikhewan
		$insert=$this->db->insert($this->table_name,$data);
		$this->db->insert_batch($this->table_detail,$detail_pesanan);
		return $insert;
	}

	function delete($id){
		#Delete data pemilikhewan by id
		$this->db->where($this->primary,$id);
		$delete=$this->db->delete($this->table_name);

		return $delete;
	}

	function update($id,$data){
		#Update data hewan by id
		$this->db->where($this->primary,$id);
		$update=$this->db->update($this->table_name,$data);

		return $update;
	}

	function get_id_transaksi(){
		$this->db->select("count('id_transaksi') AS id_transaksi");
		return $this->db->get($this->table_name)->row();
	}

}

?>