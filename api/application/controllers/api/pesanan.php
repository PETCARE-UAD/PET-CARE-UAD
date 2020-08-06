<?php  


/**
* 
*/
require APPPATH . 'libraries/REST_Controller.php';
class pesanan extends REST_Controller
{
	
	function __construct()
	{

		parent::__construct();
		#Configure limit request methods
		$this->methods['index_get']['limit']=10; #10 requests per hour per pesanan/key
		$this->methods['index_post']['limit']=10; #10 requests per hour per pesanan/key
		$this->methods['index_delete']['limit']=10; #10 requests per hour per pesanan/key
		$this->methods['index_put']['limit']=10; #10 requests per hour per pesanan/key
		$this->methods['history']['limit']=10; #10 requests per hour per pesanan/key
		$this->load->helper('url');
		#Configure load model api table pesanan
		$this->load->model('m_pesanan');
	}

	function index_get($id=null, $userid=null, $trid=null){	
		// $as='[{"HARGA_MOBIL":"350000","ID_MOBIL":"2","MERK_MOBIL":"TOYOTA","NAMA_MOBIL":"Brio Satya E CVT","PLAT_NO_MOBIL":"D 0011 FZA","TGL_AKHIR_PENYEWAAN":"2017-11-29","TGL_SEWA":"2017-10-29","TOTAL":"11200000"},{"HARGA_MOBIL":"350000","ID_MOBIL":"15","MERK_MOBIL":"Datsun","NAMA_MOBIL":"Datsun Go","PLAT_NO_MOBIL":"D 1000 FX","TGL_AKHIR_PENYEWAAN":"2017-12-29","TGL_SEWA":"2017-10-29","TOTAL":"21700000"}]';
		// foreach (json_decode($as,true) as $row) {
		// 	echo $row["HARGA_MOBIL"];
		// 	// var_dump($row);
		// }
		// // var_dump();

		// exit();
		// var_dump($id == 'history'); die();

		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'Success get pesanan' , 'data' => null );
		
		#Set response API if Not Found
		$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'No pesanan were found' , 'data' => null );
        
		#
		if($id == 'history'){
			if ($trid==null) {
				#Call method get_all_by_userid from m_pesanan model
				$pesanan=$this->m_pesanan->get_pesanan_by_userid($userid);
			}else{
				#Call method get_by_iduser from m_pesanan model
				$pesanan=$this->m_pesanan->get_detail_by_id($trid);
				// var_dump($pesanan);
				// exit();
			}
		}else{
			
			if (!empty($this->get('id_transaksi')))
				$id=$this->get('id_transaksi');
	            

			if ($id==null) {
				#Call methode get_all from m_pesanan model
				$pesanan=$this->m_pesanan->get_all();
			
			}else{
				$id=str_replace("_", "-", $id);
				#Check if id <= 0
				// if ($id<=0) {
				// 	$this->response($response['NOT_FOUND'], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
				// }

				#Call methode get_by_id from m_pesanan model
				$pesanan=$this->m_pesanan->get_detail_by_id($id);
				// var_dump($pesanan);
				// exit();
			}
		}
			
        # Check if the pesanan data store contains pesanan
		if ($pesanan) {
			// if (count($pesanan)==1)
			// 	$pesanan->IMAGE=explode(',', $pesanan->IMAGE);
			// else
			// 	for ($i=0; $i <count($pesanan) ; $i++)
			// 		$pesanan[$i]->IMAGE=explode(',', $pesanan[$i]->IMAGE);

			$response['SUCCESS']['data']=$pesanan;

			#if found pesanan
			$this->response($response['SUCCESS'] , REST_Controller::HTTP_OK);

		}else{

	        #if Not found pesanan
	        $this->response($response['NOT_FOUND'], REST_Controller::HTTP_NOT_FOUND); # NOT_FOUND (404) being the HTTP response code

		}

	}

	// function history($userid, $id=null){
	function history(){
	 	var_dump("hello");die();	
		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'Success get pesanan' , 'data' => null );
		
		#Set response API if Not Found
		$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'No pesanan were found' , 'data' => 10 );
        
		#
		if (!empty($this->get('id_transaksi')))
			$id=$this->get('id_transaksi');
            
       

		if ($id==null) {
			#Call methode get_all_by_userid from m_pesanan model
			$pesanan=$this->m_pesanan->get_pesanan_by_userid($userid);
		
		}

		if ($id!=null) {
			#Check if id <= 0
			// if ($id<=0) {
			// 	$this->response($response['NOT_FOUND'], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			// }

			#Call method get_by_iduser from m_pesanan model
			$pesanan=$this->m_pesanan->get_history_user($id);
			// var_dump($pesanan);
			// exit();
		}


        # Check if the pesanan data store contains pesanan
		if ($pesanan) {
			// if (count($pesanan)==1)
			// 	$pesanan->IMAGE=explode(',', $pesanan->IMAGE);
			// else
			// 	for ($i=0; $i <count($pesanan) ; $i++)
			// 		$pesanan[$i]->IMAGE=explode(',', $pesanan[$i]->IMAGE);

			$response['SUCCESS']['data']=$pesanan;

			#if found pesanan
			$this->response($response['SUCCESS'] , REST_Controller::HTTP_OK);

		}else{

	        #if Not found pesanan
	        $this->response($response['NOT_FOUND'], REST_Controller::HTTP_NOT_FOUND); # NOT_FOUND (404) being the HTTP response code

		}

	}

	function index_post(){
		#
		$kode=$this->m_pesanan->get_id_transaksi();
		$id_transaksi="id_transaksi"."-".$kode->id_transaksi;


		$pesanan_data = array('id_transaksi' => $id_transaksi ,
							'penerima' => $this->post('penerima') ,
							'tgl_pembayaran' => date("Y-m-d H:m:s") ,
							'jenis_patcare' => $this->post('jenis_patcare') , 
							'total_pembayaran' => $this->post('total_pembayaran') ,
							'status_pembayaran' => $this->post('status_pembayaran') ,
							'id_pemilik' => $id_pemilik ,
							'id_hewan' => $id_hewan ,
							'id_reservasi' => $id_reservasi ,
							'id_penitipan_dan_reservasi' => $id_penitipan_dan_reservasi ,
							'id_petcare' => $id_petcare ,
						);


		// $as='[{"HARGA_MOBIL":"350000","ID_MOBIL":"2","MERK_MOBIL":"TOYOTA","NAMA_MOBIL":"Brio Satya E CVT","PLAT_NO_MOBIL":"D 0011 FZA","TGL_AKHIR_PENYEWAAN":"2017-11-29","TGL_SEWA":"2017-10-29","TOTAL":"11200000"},{"HARGA_MOBIL":"350000","ID_MOBIL":"15","MERK_MOBIL":"Datsun","NAMA_MOBIL":"Datsun Go","PLAT_NO_MOBIL":"D 1000 FX","TGL_AKHIR_PENYEWAAN":"2017-12-29","TGL_SEWA":"2017-10-29","TOTAL":"21700000"}]';

		$detail_pesanan=array();
		foreach (json_decode($this->post("LIST_CART"),true) as $row) {

					$temp= array('id_transaksi' => $id_transaksi , 
							'id_hewan' => $row["id_hewan"],
							'tgl_pembayaran' => $row["tgl_pembayaran"] , 
							'harga' => $row["harga"],
							'total_pembayaran' => $row["total_pembayaran"] ,
							'jenis_hewan' => $row["jenis_hewan"] ,
						);
					$detail_pesanan[]=$temp;
		}


		
		// id_transaksi
		// $temp=$pesanan_data;
		// $pesanan_data["BUKTI_PEMBAYARAN"]=$temp;

		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success insert data' , 'data' => $pesanan_data);

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail insert data' , 'data' => null );
		
		#Set response API if exist data
		$response['EXIST'] = array('status' => FALSE, 'message' => 'exist data' , 'data' => null );

		#Check if insert pesanan_data Success
		if ($this->m_pesanan->insert($pesanan_data,$detail_pesanan)) {
			
			#If success
			$this->response($response['SUCCESS'],REST_Controller::HTTP_CREATED);

		}else{
			#If fail
			$this->response($response['FAIL'],REST_Controller::HTTP_FORBIDDEN);

		}

		
	}


	function index_delete($id=null){

		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success delete pesanan'  );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail delete pesanan'  );
		
		#Set response API if pesanan not found
		$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'no pesanan were found' );


		#Check available pesanan
		if (!$this->validate($id))
			$this->response($response['NOT_FOUND'],REST_Controller::HTTP_NOT_FOUND);
		

		if (!empty($this->get('id_transaksi')))
			$id=$this->get('id_transaksi');
		
		if ($this->m_pesanan->delete($id)) {
			
			#If success
			$this->response($response['SUCCESS'],REST_Controller::HTTP_CREATED);
		
		}else{

			#If Fail
			$this->response($response['FAIL'],REST_Controller::HTTP_CREATED);
			
		}

	}

	function index_put(){

		$id=$this->put('id_transaksi');

		$pesanan_data = array('jenis_hewan_pesanan' =>$this->put('jenis_hewan_pesanan') , 
							'ras_hewan_pesanan' => $this->put('ras_hewan_pesanan') ,
							'ciri_khusus_pesanan' => $this->put('ciri_khusus_pesanan') , 
							'jk_pesanan' => $this->put('jk_pesanan') ,
							'id_pemilik_pesanan' => $this->put('id_pemilik_pesanan') ,
						);

		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success update pesanan' , 'data' => $pesanan_data );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail update pesanan' , 'data' => $pesanan_data );
		
		#Set response API if pesanan not found
		$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'no pesanan were found' , 'data' => $pesanan_data );

		#Set response API if exist data
		$response['EXIST'] = array('status' => FALSE, 'message' => 'exist data' , 'data' => $pesanan_data );

		#Check available pesanan
		if (!$this->validate($id))
			$this->response($response['NOT_FOUND'],REST_Controller::HTTP_NOT_FOUND);

		if ($this->m_pesanan->get_by_ciri($this->put('ciri_khusus_pesanan'))!=null&&$this->m_pesanan->get_by_ciri($this->put('ciri_khusus_pesanan'))->id_transaksi!=$id)
			$this->response($response['EXIST'],REST_Controller::HTTP_FORBIDDEN);

		if ($this->m_pesanan->update($id,$pesanan_data)) {
			
			#If success
			$this->response($response['SUCCESS'],REST_Controller::HTTP_CREATED);
		
		}else{

			#If Fail
			$this->response($response['FAIL'],REST_Controller::HTTP_CREATED);
			
		}

	}

}

?>