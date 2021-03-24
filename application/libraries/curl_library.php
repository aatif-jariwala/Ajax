<?php
class Curl_library{
	public function login($name,$password){
		$curl=curl_init();
				curl_setopt_array($curl,array(
				CURLOPT_URL => "http://localhost/api/index.php/api/form/login",
				CURLOPT_RETURNTRANSFER =>true,
				CURLOPT_ENCODING =>"",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('name' => $name,'password'=>$password)
				));
				$response = curl_exec($curl);
				$err =curl_error($curl);
				curl_close($curl);

				if ($err){
					return "cURL Error #:" . $err;
				}
				else{
					return $response;
				} 
	}
	public function signup($name,$email,$password,$cpassword,$country,$state,$city){
		$curl=curl_init();
		curl_setopt_array($curl,array(
		CURLOPT_URL => "http://localhost/api/index.php/api/form/signup",
		CURLOPT_RETURNTRANSFER =>true,
		CURLOPT_ENCODING =>"",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('name' => $name,'email'=>$email,'password' =>$password,'cpassword'=>$cpassword,'country'=>$country,'state'=>$state,'city'=>$city),
		// CURLOPT_HTTPHEADER => array("Authorization:Basic F0aWY6MzEy","Content-Type:application/json")
		));
		$response = curl_exec($curl);
		$err =curl_error($curl);
		curl_close($curl);
		if ($err){
			return "cURL Error #:" . $err;
		} 
		else{
			return $response;
				}
	}
	public function display(){
		$curl=curl_init();
		curl_setopt_array($curl,array(
		CURLOPT_URL => "http://localhost/api/index.php/api/form/",
		CURLOPT_RETURNTRANSFER =>true,
		CURLOPT_ENCODING =>"",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		// CURLOPT_HTTPHEADER => array("Authorization:Basic F0aWY6MzEy","Content-Type:application/json")
		));
		$response = curl_exec($curl);
		$err =curl_error($curl);
		curl_close($curl);
		if ($err){
			return "cURL Error #:" . $err;
		} 
		else{
			return $response;
		}
	}
	public function update($srno,$name,$email,$password,$cpassword,$country,$state,$city){
		$data=array('srno'=>$srno,'name' => $name,'email'=>$email,'password' =>$password,'cpassword'=>$cpassword,'country'=>$country,'state'=>$state,'city'=>$city);
		$req = json_encode($data);
		// $req = JSON.stringify($data);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/api/index.php/api/form/update",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "PUT",
		CURLOPT_POSTFIELDS =>$req ,
		CURLOPT_HTTPHEADER => array(
			"content-type: application/json",
			//"content-type: application/x-www-form-urlencoded",
			//"postman-token: f5764cdf-6c7e-d2a2-849d-1a1ad1ee5b02"
		),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		return "cURL Error #:" . $err;
		} else {
			// print_r($response);die;
		return $response;
		}
			
	}
	public function delete($srno){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/api/index.php/api/form/$srno",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "DELETE",
		// CURLOPT_POSTFIELDS => array('srno'=>$srno),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		return "cURL Error #:" . $err;
		} else {
		return $response;
		}
	}	
	public function country(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/api/index.php/api/form/country",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_POSTFIELDS => "",
		CURLOPT_HTTPHEADER => array("content-type: application/json"),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		return "cURL Error #:" . $err;
		} else {
		return $response;
		}
	}
	public function state(){
		// $input=$this->input->post('countryID');
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/api/index.php/api/form/state",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_POSTFIELDS => "",
		CURLOPT_HTTPHEADER => array("content-type: application/json"),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		return "cURL Error #:" . $err;
		} else {
		return $response;
		}
	}
	public function city(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/api/index.php/api/form/city",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_POSTFIELDS => "",
		CURLOPT_HTTPHEADER => array("content-type: application/json"),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		return "cURL Error #:" . $err;
		} else {
		return $response;
		}
	}
}
?>