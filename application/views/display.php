<!DOCTYPE html>
<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/display.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/display.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css');?>">
	<title>Display</title>
</head>
<body>
<?php
	include("nav.php");
	if($this->session->userdata('loggedin')){?>
		<h1 id="demo"></h1>
		<h1 id="h1" style="width:300px;"><?php echo "Welcome " .$_SESSION['name'];?></h1>	

	<table id="login_display" border="1" width="850" height="250">
		<tr id="display">
			<td>Srno</td>
			<td>Name</td>
			<td>Email</td>
			<td>Country</td>
			<td>State</td>
			<td>City</td>	
		</tr>
		<!-- <tr>
			<td class="update" colspan="3"> <div class="div_update"><a id="update" href="">Update</a></div> </td>
			<td class="delete" colspan="3"> <div class="div_del"><a id="delete" href="">Delete</a></div> </td>
		</tr> -->
		<tr>
			<td colspan="6"><div class="div_logout"><a class="button" href="logout">Logout</a></div></td>
		</tr>
	</table>
<?php 
	}
	else { ?>
		<h1 id="h1_displayall">Display Data with CURL</h1>
		<form action="display" method="post">
		<input class="search" type="text" placeholder="search..." name="search">
		</form>
			<table id="alltable" class="table" border="1" style="border-collapse: collapse; margin: auto; text-align: center;" width="1300">		
			<tr id="alldisplay">
				<td>Srno</td>
				<td>Name</td>
				<td>Email</td>
				<td>Country</td>
				<td>State</td>
				<td>City</td>
				<td>Password</td>
				<td>Confirm Password</td>
			</tr>
			<?php } ?>               
		</table>		
</body>
<script>
	var session = false;
	<?php
		if($this->session->userdata('loggedin')){?>
			session = true;
	<?php	}else{?>
		session= false;
	<?php }	?>

</script>

</html>