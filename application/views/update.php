<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/update.css">
<script type="text/javascript" src="<?php echo base_url("assets/js/update.js"); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css');?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Data</title>
</head>
<body>
    <?php include("nav.php");?>
    <div id="message">
        <span id="validation"></span>	
	    <span id="close"></span>
    </div>
    <h1 id="h1_update">Update Your Data</h1>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <table border="1" style="border-collapse: collapse; margin: auto; text-align: center; border-collapse:collapse;" height="500" width="600">
		<?php
            if(!$this->input->post('update')){
        ?>
        <tr>
            <th><label for="srno">Srno:</label></th>
            <td>       
		        <input type="text" id="srno" name="srno" value="" disabled>
            </td>
        </tr>
        <tr>    
            <th><label for="name">Name</label></th>
            <td>
                <input type="text" id="name" name="name"  value="">
            </td>
        </tr>  
        <tr>  
            <th><label for="email">Email</label></th>
            <td>
		        <input type="email" id="email" name="email"  value="">
            </td>
        </tr> 
        <tr> 
            <th><label for="country">Country</label></th>            
            <td>
                <select id="country" name="country" required>
                    <option value="" ></option>
                </select>  
            </td>
        </tr> 
        <tr> 
            <th><label for="state">State</label></th>            
            <td>
		        <select id="state" name="state" required>
                    <option value="" ></option>
                </select>
            </td>
        </tr>   
        <tr> 
            <th><label for="city">City</label></th>            
            <td>
                <select id="city" name="city">
                    <option value=""></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="password">Password</label></th>
            <td>
                <input type="password" id="password" name="password"  value="">
                <span toggle="#password-field" class="fa fa-fw fa-eye-slash field_icon toggle-password" style="font-size:25px;cursor:pointer;" aria-hidden="true"></span>
            </td>
        </tr>
        <tr>  
            <th><label for="cpassword">Confirm Password</label></th>
            <td>
        		<input type="password" id="cpassword" name="cpassword"  value="">
                <span toggle="#password-field" class="fa fa-fw fa-eye-slash field_icon toggle-cpassword" style="font-size:25px;cursor:pointer;" aria-hidden="true"></span>
            </td> 
        </tr>    
            <?php }  ?>
            <tr>
                <td id="td_update" colspan="2" height="50">
                    <input type="submit" class="update" id="update" name="update" value="Update">
                    <input type=reset id="reset" value="Reset">
                </td>
            </tr>       
        </tr>             
	</form>
</body>
<script>
	var session = false;
	<?php
		if($this->session->userdata('loggedin')){ ?>
			session =true;
	<?php }else{?>
		session= false;
	<?php }	?>

</script>

</html>