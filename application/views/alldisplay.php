<!DOCTYPE html>
<html>

<head>
    <title>Display</title>
</head>
<?php
    if($this->session->userdata('loggedin')){
        echo "session set";?>
        <tr>
	    	<td>
	    		<a href="logout">Logout</a>
	    	</td>
	    </tr>    
<?php
    }else{
?>
<body>
	<h1 style="text-align: center; color:chocolate">Display Data with CURL</h1>
    <table border="1" style="border-collapse: collapse; margin: auto; text-align: center;" width="600" height="1000">
        <tr>
            <th>Srno.</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <tr>
		<?php for($i=0;$i<count($data['details']);$i++){ ?>
            <td>
                <?php print_r($data['details'][$i]['srno']);?>
            </td>	
            <td>
                <?php echo $data['details'][$i]['name'];?>
            </td>	
            <td>
                <?php echo $data['details'][$i]['email'];?>
            </td>
		</tr>	
		<?php
            } 
        }        
        ?>               
    </table>
</body>

</html>
