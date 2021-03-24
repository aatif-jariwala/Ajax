<?php
	require APPPATH ."libraries/REST_Controller.php";
	class Form extends REST_Controller{
		public function  __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function index_get($id=''){
			if($id==''){
				$display=$this->db->get('form')->result_array();
				$this->response(['status'=>"1","details"=>$display],200);
			}
			else{
				$display=$this->db->get_where('form',array('srno'=>$id))->result_array();
			    $this->response(['status'=>"1","details"=>$display],200);
			}
		}
		public function country_get($id=''){
			if($id==''){
				$country = $this->db->get('countries')->result_array();
				$this->response(["status"=>"1","Country"=>$country],200);
			}
			else{
				$country=$this->db->get_where('countries',array('id'=>$id))->result_array();
				$this->response(['status'=>"1","Country"=>$country],200);			
			}
		}
		public function state_get($id=''){
			if($id==''){
				$state=$this->db->get('states')->result_array();
				$this->response(['status'=>"1","states"=>$state],200);
			}
			else{
				// $input=$this->post("countryID");
				$state=$this->db->get_where('states',array('country_id'=>$id))->result_array();
				$this->response(['status'=>"1","states"=>$state],200);
			}
		}
		public function city_get($id=''){
			if($id==''){
				$city=$this->db->get('cities')->result_array();
				$this->response(['status'=>"1","city"=>$city],200);
			}
			else{
				$city=$this->db->get_where('cities',array('id'=>$id))->result_array();
				$this->response(['status'=>"1","city"=>$city],200);
			}
		}
		public function login_post(){
			$name=$this->post('name');
			$password=$this->post('password');

			if(!$name=='' && !$password==''){
			// if($name || $password){
				$data = $this->db->get_where('form',['name'=>$name,'password'=>$password])->row_array();
				if ($data) {
					$this->response(['status'=>"1",'message'=>'Welcome '.$data['name'],'Details'=>$data],REST_Controller::HTTP_OK);			
				}
				else{
					// $this->response($data,REST_Controller::HTTP_BAD_REQUEST);
					$this->response(['status'=>"0",'message'=>'enter correct name and password'],REST_Controller::HTTP_BAD_REQUEST);
				}
			}
			elseif($name=='' && $password==''){
				// $select=$this->db->get('form')->result_array();
				$this->response(['status'=>"0",'message'=>'Enter name and password'],REST_Controller::HTTP_BAD_REQUEST);
			}
			elseif ($name=='') {
				$this->response(['status'=>"0",'message'=>'Enter name '],REST_Controller::HTTP_UNAUTHORIZED);
			}
			elseif ($password=='') {
				$this->response(['status'=>"0",'message'=>'Enter password'],REST_Controller::HTTP_UNAUTHORIZED);
			}
			else{

			}
						
		}
		public function signup_post(){
			$input=$this->post();	
			$input['name'] = $this->post('name');
			$input['email'] = $this->post('email');
			$input['password'] = $this->post('password');
			$input['cpassword'] = $this->post('cpassword');
			$country['country'] = $this->post('country');
			$country['state'] = $this->post('state');
			$country['city'] = $this->post('city');
			$select=$this->db->get_where('form',['name'=>$input['name']])->row_array();
			if(!$select){
				if (!$input['name']=='') {
					if(!$input['email']=='') {
						if(!$input['password']=='' && !$input['cpassword']==''){
							if($input['password']==$input['cpassword']){
								$this->db->select('name');
								$this->db->where(array('id'=>$country['country']));
								$data['country']=$this->db->get('countries')->row_array();
								$input['country']=$data['country']['name'];

								// $this->response($input['country']);
								// $input['country']->result();

								$this->db->select('name');
								$this->db->where(['id'=>$country['state']]);
								$data['state']=$this->db->get('states')->row_array();
								$input['state']=$data['state']['name'];


								$this->db->select('name');
								$this->db->where(array('id'=>$country['city']));
								$data['city']=$this->db->get('cities')->row_array();
								$input['city']=$data['city']['name'];


								$insert=$this->db->insert('form',$input);
								if($insert){
									$this->response(['status'=>"1",'message'=>'Signup Successfull'],REST_Controller::HTTP_OK);
								}
							}
							else{
								$this->response(['status'=>"0",'message'=>'password do not match'],REST_Controller::HTTP_NOT_ACCEPTABLE);
							}
						}
						else{
							$this->response(['status'=> "0",'message'=>'enter password and cpasword'],REST_Controller::HTTP_NOT_ACCEPTABLE);
						}											
					}
					else{
						$this->response(['status'=>"0",'message'=>'enter email'],REST_Controller::HTTP_NOT_ACCEPTABLE);
					}		
				}
				else{
					$this->response(['status'=>"0",'message'=>'enter name in postman'],REST_Controller::HTTP_NOT_ACCEPTABLE);	
				}					
			}else{
				$this->response(['status'=>"0",'message'=>'Username Already Exist'],REST_Controller::HTTP_UNAUTHORIZED);
			}			
		}
		public function index_delete($id){
			$this->get($id);
			$this->db->where('srno',$id);
			$query=$this->db->delete('form');
			if($query){
				$this->response(['status'=>"1",'message'=>'Delete Data Successfull'],REST_Controller::HTTP_OK);
			}else{
				$this->response(['status'=>"0",'message'=>'Enter Valid Srno'],REST_Controller::HTTP_NOT_ACCEPTABLE);
			}
		} 
		public function update_put(){
			$input=$this->put();
			$id['update_id']=$this->put('srno');
			// $id=$this->get($id);
			// $input['srno']=$id;
			$input['name']=$this->put('name');
			$input['email']=$this->put('email');
			$input['password']=$this->put('password');
			$input['cpassword']=$this->put('cpassword');
			$country['country']=$this->put('country');
			$country['state']=$this->put('state');
			$country['city']=$this->put('city');
			if($input['srno']==''){
				$this->response(['status'=>"0",'message'=>'enter srno'],REST_Controller::HTTP_NOT_ACCEPTABLE);	
			}
			elseif($input['name']==''){
				$this->response(['status'=>"0",'message'=>'enter name'],REST_Controller::HTTP_NOT_ACCEPTABLE);	
			}
			elseif($input['email']==''){
				$this->response(['status'=>"0",'message'=>'enter email'],REST_Controller::HTTP_NOT_ACCEPTABLE);	
			}
			elseif($input['password']==''){
				$this->response(['status'=>"0",'message'=>'enter password'],REST_Controller::HTTP_NOT_ACCEPTABLE);	
			}
			elseif($input['cpassword']==''){
				$this->response(['status'=>"0",'message'=>'enter cpassword'],REST_Controller::HTTP_NOT_ACCEPTABLE);	
			}
			elseif(!($input['password']==$input['cpassword']))
			{
				$this->response(['status'=>"0",'message'=>'enter correct password'],REST_Controller::HTTP_NOT_ACCEPTABLE);	
			}
			else{
				$this->db->select('name');
				$this->db->where(array('id'=>$country['country']));
				$data['country']=$this->db->get('countries')->row_array();
				$input['country']=$data['country']['name'];

				$this->db->select('name');
				$this->db->where(['id'=>$country['state']]);
				$data['state']=$this->db->get('states')->row_array();
				$input['state']=$data['state']['name'];

				$this->db->select('name');
				$this->db->where(array('id'=>$country['city']));
				$data['city']=$this->db->get('cities')->row_array();
				$input['city']=$data['city']['name'];

				$this->db->select('srno');
				$update_id=$this->db->get_where('form',['srno'=>$id['update_id']])->row_array();
				$select = $this->db->where('srno',$id['update_id']);
				// $select = $this->db->where('srno',$id);
				$query=$this->db->update('form',$input);
				if($query && $update_id['srno']==$id['update_id']){
					// $this->response([$update_id['srno'],$id['update_id']],REST_Controller::HTTP_ACCEPTED);	
					$this->response(['status'=>"1",'message'=>'Update Succesfull'],REST_Controller::HTTP_ACCEPTED);	
				}else{
					$this->response(['status'=>"0",'message'=>'Error'],REST_Controller::HTTP_ACCEPTED);
				}
			}				
		}
	}
?>