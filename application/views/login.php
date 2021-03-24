<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="<?php echo base_url('assets/js/login.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css');?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login</title>
</head>
<body class="container">
	<?php include("nav.php");?>
<div id="message">
	<span id ="demo"></span>
	<span id="close"></span>
</div>
	<!-- <form method="post" name="form" id="form" action="<?php base_url('index.php/api/login_controller/display');?>"> -->
	<table id="table" width="750" height="400">
		<tr>
			<td colspan="2">
				<h1 class="h1">Login Here</h1>
			</td>
		</tr>
			<tr>
				<th>Name:</th>
				<td>
					<i class="fa fa-user-secret" style="font-size: 30px;position:relative;left:30px;color:lightblue;" aria-hidden="true"></i>
					<input id="name" type="text" placeholder="Enter Username..." name="name" >
				</td>
			</tr>
			<tr>
				<th>Password:</th>
				<td>
					<i class="fa fa-key"  style="font-size: 30px;position:relative;left:30px;color:lightblue" aria-hidden="true"></i>
					<input id="password" type="password" placeholder="Enter Password..." name="password">
				</td>
			</tr>
			<tr>
				<td colspan="2"><input class="login" id="login" type="submit" name="submit" value="Login">
				<p  class="new">New User </p>  <a class="a_signup" href="signup_controller">Signup</a></td>
			</tr>
		</table>
	<!-- </form> -->
</body>
</html>