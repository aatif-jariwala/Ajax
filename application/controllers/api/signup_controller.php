<?php
	class Signup_controller extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library(array('curl_library','session'));
			$this->load->helper('url');

		}
		public function index(){
			// $this->load->view('signup');
			$this->signup_process();
			$country = $this->curl_library->country();
			$decode['data'] = json_decode($country,true);
			$this->load->view('signup',$decode);
		}
		public function signup_process(){
			// $this->load->helper('url');
			if($this->input->post()){
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$cpassword=$this->input->post('cpassword');
				$country = $this->input->post('country');
				$state = $this->input->post('state');
				$city = $this->input->post('city');
				// print_r($this->input->post());
				$signup_response=$this->curl_library->signup($name,$email,$password,$cpassword,$country,$state,$city);
				print_r($signup_response);
				// $array=json_decode($signup_response,1);
				// if ($array['status']==1) {
				// 	echo "Signup Successfull";
				// }
				// else{
				// 	echo "Username Already Exist";
				// }					
			}
			// else{
			// 	$this->load->view("signup");
			// }
			// $this->country_process();
		}
		public function country_process(){
			$country = $this->curl_library->country();
			echo $country;
			// $decode['data'] = json_decode($country,true);
			// $this->load->view('signup',$decode);
			// print_r($country);
		}
		public function state_process(){
			$state = $this->curl_library->state();
			echo $state;
		}
		public function city_process(){
			$city = $this->curl_library->city();
			echo $city;
		}
	}
?>