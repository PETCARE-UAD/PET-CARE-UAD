<?php  


/**
* 
*/
require APPPATH . 'libraries/REST_Controller.php';

class PemilikHewan extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		#Configure limit request methods
		$this->methods['index_get']['limit']=10; #10 requests per hour per user/key
		$this->methods['index_post']['limit']=10; #10 requests per hour per user/key
		$this->methods['index_delete']['limit']=10; #10 requests per hour per user/key
		$this->methods['index_put']['limit']=10; #10 requests per hour per user/key
		
		#Configure load model api table users
		$this->load->model('m_pemilikhewan');
	}


	function index_get($group_user=null,$id=null){	
		
		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success get PemilikHewan' , 'data' => null );
		
		#Set response API if Not Found
		$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'no pemilikhewan were found' , 'data' => null );
        
		#
		if (!empty($this->get('id_pemilik')))
			$id=$this->get('id_pemilik');


		#
		if (!empty($this->get('email')))
			$email=$this->get('email');
        


		if ($id==null||$id==0) {
			#Call methode get_all from m_pemilikhewan model
			$pemilikhewan=$this->m_pemilikhewan->get_all($email);
		
		}


		if ($id!=null&&$id!=0) {
			
			#Check if id <= 0
			if ($id<=0) {
				$this->response($response['NOT_FOUND'], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			}

			#Call methode get_by_id from m_users model
			$pemilikhewan=$this->m_pemilikhewan>get_by_id($id);
		}


        # Check if the pemilikhewan data store contains pemilikhewan
		if ($pemilikhewan) {
			$response['SUCCESS']['data']=$pemilikhewan;

			#if found pemilikhewan
			$this->response($response['SUCCESS'] , REST_Controller::HTTP_OK);

		}else{

	        #if Not found Users
	        $this->response($response['NOT_FOUND'], REST_Controller::HTTP_NOT_FOUND); # NOT_FOUND (404) being the HTTP response code

		}

	}

	function index_post(){
		
		#
		$PemilikHewan_data = array(	'nama_pemilik' =>$this->post('nama_pemilik') , 
							'alamat' => $this->post('alamat') ,
							'nohp' => $this->post('nohp') ,
							'email' => $this->post('email') , 
							'id_akun' => $this->post('id_akun') ,
						);
		

		#Initialize image name
		$image_name=round(microtime(true)).date("Ymdhis").".jpg";

		#Upload avatar
		if ($this->Upload_Images($image_name))
			$PemilikHewan_data['PHOTO']=$image_name;
	
		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success insert data' , 'data' => $PemilikHewan_data );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail insert data' , 'data' => null );
		
		#Set response API if exist data
		$response['EXIST'] = array('status' => FALSE, 'message' => 'exist data' , 'data' => null );

		if ($this->m_pemilikhewan->get_by_nama_pemilik_email($this->post('nama_pemilik'),$this->post('email'))){
			#Remove image user
			if ($PemilikHewan_data['PHOTO']!=null) {
				$this->remove_image($PemilikHewan_data['PHOTO']);
			}

			$this->response($response['EXIST'],REST_Controller::HTTP_FORBIDDEN);

		}

		#Check if insert PemilikHewan_data Success
		if ($this->m_pemilikhewan->insert($PemilikHewan_data)) {
			
			#If success
			$this->response($response['SUCCESS'],REST_Controller::HTTP_CREATED);

		}else{
			#Remove image PemilikHewan
			if ($PemilikHewan_data['PHOTO']!=null) {
				$this->remove_image($PemilikHewan_data['PHOTO']);
			}
			
			#If fail
			$this->response($response['FAIL'],REST_Controller::HTTP_FORBIDDEN);

		}

	}

	function index_delete($id=null){

		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'Success delete PemilikHewan'  );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'Fail delete PemilikHewan'  );
		
		#Set response API if user not found
		$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'No pemilikhewan were found' );


		#Check available user
		if (!$this->validate($id))
			$this->response($response['NOT_FOUND'],REST_Controller::HTTP_NOT_FOUND);
		

		if (!empty($this->get('id_pemilik')))
			$id=$this->get('id_pemilik');
		
		if ($this->m_pemilikhewan->delete($id)) {
			
			#If success
			$this->response($response['SUCCESS'],REST_Controller::HTTP_CREATED);
		
		}else{

			#If Fail
			$this->response($response['FAIL'],REST_Controller::HTTP_CREATED);
			
		}

	}

	function index_put(){

		$id=$this->put('id_pemilik');

		$PemilikHewan_data = array(	'nama_pemilik' =>$this->post('nama_pemilik') , 
							'alamat' => $this->post('alamat') ,
							'nohp' => $this->post('nohp') ,
							'email' => $this->post('email') , 
							'id_akun' => $this->post('id_akun') ,
						);
		if ($this->put('alamat')) {
			$PemilikHewan_data['alamat'] = md5($this->put('alamat'));
		}

		#Initialize image name
		$image_name=round(microtime(true)).date("Ymdhis").".jpg";

		#Upload avatar
		if ($this->Upload_Images($image_name))
			$PemilikHewan_data['PHOTO']=$image_name;


		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success update PemilikHewan' , 'data' => $PemilikHewan_data );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail update PemilikHewan' , 'data' => $PemilikHewan_data );
		
		#Set response API if user not found
		$response['NOT_FOUND']=array('status' => FALSE, 'message' => 'no pemilikhewan were found' , 'data' => $PemilikHewan_data );

		#Set response API if exist data
		$response['EXIST'] = array('status' => FALSE, 'message' => 'exist insert data' , 'data' => $PemilikHewan_data );

		#Check available user
		if (!$this->validate($id))
			$this->response($response['NOT_FOUND'],REST_Controller::HTTP_NOT_FOUND);

		
		if ($this->m_pemilikhewan->get_by_nama_pemilik_email($this->put('nama_pemilik'),$this->put('email'))->id_pemilik!=null&&$this->m_pemilikhewan->get_by_nama_pemilik_email($this->put('nama_pemilik'),$this->put('email'))->id_pemilik!=$id)
			$this->response($response['EXIST'],REST_Controller::HTTP_FORBIDDEN);
		$up=$this->m_pemilikhewan->update($id,$PemilikHewan_data);
		if ($up) {
			
			$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success update PemilikHewan' , 'data' => $up );			
			#If success
			$this->response($response['SUCCESS'],REST_Controller::HTTP_CREATED);
		
		}else{

			#If Fail
			$this->response($response['FAIL'],REST_Controller::HTTP_CREATED);
			
		}

	}

	function validate($id){
		$pemilikhewan=$this->m_pemilikhewan->get_by_id($id);
		if ($pemilikhewan)
			return TRUE;
		else
			return FALSE;
	}

	function Upload_Images($name) 
    {

    		if ($this->post('PHOTO')) {
	    		$strImage = str_replace('data:image/png;base64,', '', $this->post('PHOTO'));			
    		}else{
    			$strImage = str_replace('data:image/png;base64,', '', $this->put('PHOTO'));
    		}
    		if (!empty($strImage)) {
    			$img = imagecreatefromstring(base64_decode($strImage));
							
				if($img != false)
				{
				   if (imagejpeg($img, './upload/avatars/'.$name)) {
				   	return true;
				   }else{
				   	return false;
				   }
				}
			}
	}


	function remove_image($name){
		$path='./upload/avatars/'.$name;
		unlink($path);
	}


}

?>