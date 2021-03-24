
<?php
	class Curl_model extends CI_model{
		public function __construct(){
			parent::__construct();
			// $this->load->model('Curl_model');
			// $this->load->helper('url');
			// $this->load->database();
			$this->load->library('curl_library');
			// $this->Curl_library->get();				
		} 
		function display_record(){			
			$query=$this->db->get('form');
			return $query->result();
		}
		function login_record($name){
			$query=$this->db->get_where('form',array('name'=>$name))->result_array();
			return $query;
			
		}
		// function login_process($object){
		// 	if($this->input->post('submit')){
		// 		$name=$this->input->post('name');
		// 		$password=$this->input->post('password');
				
		// 		$login_response= $this->curl_library->login($name,$password);
		// 			// $object= $this->object;
		// 			$object= json_decode($login_response,1);
		// 			echo "<pre>";
		// 			print_r($object);     
		// 			echo "</pre>";					
		// 			if($name=='' || $password==''){
		// 				echo $object['message'];
		// 			}	
		// 			else{
		// 				echo $object['message'];
		// 				redirect(base_url().'index.php/api/login_controller/display');	
		// 			}	
		// 			// $var['data']=$object;  
		// 			// $this->load->view('display',$var);
		// 			// $this->display($var);
		// 	}
		// 	else{
		// 		echo "GET";
		// 	}
		// }		
	}
?>