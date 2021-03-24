<nav>
    <ul>
        <li><a id="a_display" href="../api/login_controller/display_ajax">Display</a></li>
        <?php
            if($this->session->userdata("loggedin")){?>
                <li><a id="a_update" href="../login_controller/update">Update</a></li>
                <li class="delete"><a href="../login_controller/deletedata">Delete</a></li> 
                <li><a href="logout">Logout</a></li>        
            <?php }else{
        ?>
        <li><a id="a_login" href="../api/login_controller">Login</a></li>
        <li><a id="a_signup" href="../api/signup_controller">Signup</a></li>
        <?php } ?>
    </ul>    
</nav>