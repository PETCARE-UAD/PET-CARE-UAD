<?php  


/**
* 
*/
require APPPATH . 'libraries/REST_Controller.php';

class Hewan extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		#Configure limit request methods
		$this->methods['index_get']['limit']=10; #10 requests per hour per mobil/key
		$this->methods['index_post']['limit']=10; #10 requests per hour per mobil/key
		$this->methods['index_delete']['limit']=10; #10 requests per hour per mobil/key
		$this->methods['index_put']['limit']=10; #10 requests per hour per mobil/key
		
		#Configure load model api table mobil
		$this->load->model('m_hewan');
	}


	function index_get($id=null){	
		
		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'Success get hewan' , 'data' => null );
		
		#Set response API if Not Found
		$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'No hewan were found' , 'data' => null );
        
		#
		if (!empty($this->get('id_hewan')))
			$id=$this->get('id_hewan');
            

		if ($id==null) {
			#Call methode get_all from m_mobil model
			$hewan=$this->m_hewan->get_all();
		
		}


		if ($id!=null) {
			
			#Check if id <= 0
			if ($id<=0) {
				$this->response($response['NOT_FOUND'], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			}

			#Call methode get_by_id from m_mobil model
			$hewan=$this->m_hewan->get_by_id($id);
		}


        # Check if the hewan data store contains hewan
		if ($hewan) {
			if (count($hewan)==1)
				if (isset($hewan->IMAGE)) {
					$hewan->IMAGE=explode(',', $hewan->IMAGE);
				}else{
					$hewan[0]->IMAGE=explode(',', $hewan[0]->IMAGE);
				}
			else
				for ($i=0; $i <count($hewan) ; $i++)
					$hewan[$i]->IMAGE=explode(',', $hewan[$i]->IMAGE);
			// exit();
			$response['SUCCESS']['data']=$hewan;

			#if found hewan
			$this->response($response['SUCCESS'] , REST_Controller::HTTP_OK);

		}else{
 
	        $this->response($response['NOT_FOUND'], REST_Controller::HTTP_NOT_FOUND); # NOT_FOUND (404) being the HTTP response code

		}

	}

	function index_post(){

		#
		$hewan_data = array('jenis_hewan' =>$this->put('jenis_hewan') , 
							'ras_hewan' => $this->put('ras_hewan') ,
							'ciri_khusus' => $this->put('ciri_khusus') , 
							'jk_' => $this->put('jk') ,
							'id_pemilik' => $this->put('id_pemilik') ,
						);

		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'Success insert data' , 'data' => $hewan_data );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'Fail insert data' , 'data' => null );
		
		#Set response API if exist data
		$response['EXIST'] = array('status' => FALSE, 'message' => 'exist data' , 'data' => null );

		if ($this->m_hewan->get_by_ciri($this->post('ciri_khusus'))){
		
			$this->response($response['EXIST'],REST_Controller::HTTP_FORBIDDEN);

		}

		#Check if insert hewan_data Success
		$id=$this->m_hewan->insert($hewan);
		if ($id) {
			$hewan_data["id_hewan"]=$id;
			$response['SUCCESS'] = array('status' => TRUE, 'message' => 'Success insert data' , 'data' => $hewan_data );

			#If success
			$this->response($response['SUCCESS'],REST_Controller::HTTP_CREATED);

		}else{
		}

	}

	function index_delete($id=null){

		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success delete hewan'  );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail delete hewan'  );
		
		#Set response API if hewan not found
		$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'no hewan were found' );


		#Check available hewan
		if (!$this->validate($id))
			$this->response($response['NOT_FOUND'],REST_Controller::HTTP_NOT_FOUND);
		

		if (!empty($this->get('id_hewan')))
			$id=$this->get('id_hewan');
		
		if ($this->m_hewan->delete($id)) {
			
			#If success
			$this->response($response['SUCCESS'],REST_Controller::HTTP_CREATED);
		
		}else{

			#If Fail
			$this->response($response['FAIL'],REST_Controller::HTTP_CREATED);
			
		}

	}

	function index_put(){

		$id=$this->put('id_hewan');

		$hewan_data = array('jenis_hewan' =>$this->put('jenis_hewan') , 
							'ras_hewan' => $this->put('ras_hewan') ,
							'ciri_khusus' => $this->put('ciri_khusus') , 
							'jk_' => $this->put('jk') ,
							'id_pemilik' => $this->put('id_pemilik') ,
						);


		

		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success update hewan' , 'data' => $hewan_data );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail update hewan' , 'data' => $hewan_data );
		
		#Set response API hewan not found
		$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'no hewan were found' , 'data' => $hewan_data );

		#Set response API if exist data
		$response['EXIST'] = array('status' => FALSE, 'message' => 'exist data' , 'data' => $hewan_data );

		#Check available hewan
		if (!$this->validate($id))
			$this->response($response['NOT_FOUND'],REST_Controller::HTTP_NOT_FOUND);

		if ($this->m_hewan->get_by_ciri($this->put('ciri_khusus'))!=null&&$this->m_hewan->get_by_ciri($this->put('ciri_khusus'))->id_hewan!=$id)
			$this->response($response['EXIST'],REST_Controller::HTTP_FORBIDDEN);

		$update=$this->m_hewan->update($id,$hewan_data);
		if ($update) {
			
			#If success
			$this->response($response['SUCCESS'],REST_Controller::HTTP_CREATED);
		
		}else{

			#If Fail
			$this->response($response['FAIL'],REST_Controller::HTTP_CREATED);
			
		}

	}

	function validate($id){
		$hewan=$this->m_hewan->get_by_id($id);
		if ($hewan)
			return TRUE;
		else
			return FALSE;
	}

	
}
?>