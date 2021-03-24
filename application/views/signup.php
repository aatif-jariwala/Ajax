<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/signup.css">
<script type="text/javascript" src="<?php echo base_url('assets/js/signup.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css');?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Signup</title>
</head>
<body>
<?php include("nav.php");?>
<div id="message">
	<span id ="demo"></span>
	<span id="close"></span>
</div>
	<form method="post">
		<table class="table" border="1" width="800" height="450">
			<tr><td colspan="2" class="h1">Signup Form</td></tr>
			<tr>
				<th>Name</th>
				<td>
					<i class="fa fa-user-circle" style="font-size: 30px;position:relative;left:30px;color:red;" aria-hidden="true"></i>
					<input type="text" placeholder="Enter Username..." id="name" name="name">
				</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>
					<i class="fa fa-envelope"  style="font-size: 30px;position:relative;left:30px;color:red" aria-hidden="true"></i>
					<input type="Email" placeholder="Email Address..." id="email" name="email">
				</td>
			</tr>
			<tr>
				<th>Password</th>
				<td>
					<i class="fa fa-key"  style="font-size: 30px;position:relative;left:70px;color:red" aria-hidden="true"></i>
					<input type="password" id="password" placeholder="Enter Password..." name="password">
					<span toggle="#password-field" class="fa fa-fw fa-eye-slash field_icon toggle-password" style="font-size:25px;cursor:pointer;left:20px;position:relative;" aria-hidden="true"></span>
				</td>
			</tr>
			<tr>
				<th>Confirm Password</th>
				<td>
					<i class="fa fa-key" style="font-size: 30px;position:relative;left:70px;color:red" aria-hidden="true"></i>
					<input type="password" placeholder="Enter Password..." id="cpassword" name="cpassword">
					<span toggle="#password-field" class="fa fa-fw fa-eye-slash field_icon toggle-cpassword" style="font-size:25px;cursor:pointer;left:20px;position:relative;" aria-hidden="true"></span>
				</td>
			</tr>
			<tr>
				<th>
					Country
				</th>
				<td>
					<select id="country" name="country">
						<option value="">Select Country</option>					
					</select>
				</td>
			</tr>
			<tr>
				<th>
					State
				</th>
				<td>
					<select id="state" name="state">
						<option value=""> Select State </option>
					</select>
				</td>
			</tr>
			<tr>
				<th>
					 City
				</th>
				<td>
					<select id="city" name="city">
						<option value="">Select City</option>					
					</select>
				</td>
			</tr>
			<tr >
				<td style="border-bottom:0;border-right:0;border-left:0;" colspan="2">
				<i class="fa fa-user-plus" style="position:relative;left:220px;font-size:30px;line-height:37px;color:darkgreen" aria-hidden="true"></i>
				<input type="submit" name="submit2" id="signup" value="Signup Now">
				<input type="reset" id="reset" value="Reset"> </td>
			</tr>
		</table>
	</form>	
</body>
</html>