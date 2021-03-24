<?php
// require APPPATH .'libraries/curl_librarie.php';
	class Login_controller extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Curl_model');
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('curl_library');
			// $this->Curl_library->get();				
		} 

		public function index(){
			if($this->session->userdata('loggedin')){
				redirect(base_url('index.php/api/login_controller/display_ajax'));			
			}else{
				// $this->login();
				$this->load->view('login');
			}
		} 
		// public function login(){
		// 	if($this->session->userdata('loggedin')){
		// 		redirect(base_url('index.php/api/login_controller/display'));
		// 	}
		// 	else{
		// 		// $this->load->view('login');
		// 		// $this->login_process();
		// 	}
		// }
		public function login_process(){
			// $this->load->view('login');
			if($this->input->post()){
				$name=$this->input->post('name');
				$password=$this->input->post('password');				
				// print_r($this->input->post());
				// echo "<br>hello<br>";
				$login_response= $this->curl_library->login($name,$password);
				$object= json_decode($login_response,1);	
				echo $login_response; 
				// if(!$name==''){
				// 	if (!$password=='') {
						if($object['status']==1){
							$this->session->set_userdata(array('name'=>$name,'loggedin'=>true,'response'=>$object));
							}
							
					// 	}
					// 	else{
					// 		echo "enter password";
					// 	}
					// }
					// else{
					// 	echo "enter name";
					// }	
			}
			// else{
			// 	$this->load->view('login');
			// }	
		}
		public function display_ajax(){
			$this->load->view('display');
		}
		public function display(){
			if($this->session->userdata('loggedin')){
				$name = $this->session->userdata('response');
				echo json_encode($name);				
			}	
			else{
				$response=$this->curl_library->display();
				echo $response;
				// $decode['data'] = json_decode($response,true);
				// // print_r($decode);
				// $this->load->view('display',$decode);
			}
				
		}	
		public function logout(){
			if($this->session->userdata('loggedin')){
				$this->session->unset_userdata('name');
				$this->session->sess_destroy();
				redirect(base_url('index.php/api/login_controller'));
			}
			else{
				echo "not";
			}
		}	
		public function update(){
			$this->load->view('update');
		}
		public function updatedata(){
			// $this->load->helper('url');
			// if($this->session->userdata('loggedin')){
				if($this->input->post()){
					$srno=$this->input->post('srno');
					$name=$this->input->post('name');
					$email=$this->input->post('email');
					$password=$this->input->post('password');
					$cpassword=$this->input->post('cpassword');
					$country=$this->input->post('country');
					$state=$this->input->post('state');
					$city=$this->input->post('city');
					$r = $this->curl_library->update($srno,$name,$email,$password,$cpassword,$country,$state,$city);
					echo $r;
					// $decode2=json_decode($r,true);
					// print_r($decode2);
					// $this->load->view('update');
					// redirect(base_url('index.php/api/login_controller/display'));
				}
				else{
					// $decode['id']=$this->input->get('id');
					// $response=$this->curl_library->display();
					// echo $response;
					$response = $this->session->userdata('response');
					echo json_encode($response);
					// $decode['data2'] = json_decode($response,true);	
					// $this->load->view('update',$decode);

					// $country = $this->curl_library->country();
					// $decode['data'] = json_decode($country,true);
					// $this->load->view('update',$decode);

				}			
			// }
			
		}
		public function deletedata(){
				$srno=$this->input->get('id');
				$response=$this->curl_library->delete($srno);
				$decode=json_decode($response,true);
				if($decode){
					if(!$this->session->userdata('loggedin')){
						redirect(base_url('index.php/api/login_controller/display_ajax'));
					}
					else{
						$this->logout();
					}
				}
				else{
					echo "not delete";
				}
		}
	}
?>