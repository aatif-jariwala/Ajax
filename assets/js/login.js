$(document).ready(function() {
    $("#a_login").hide();
    // $(".delete a").on("click", function() {
    //     if (confirm("do you want to delete?")) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // });
    $("#login").on("click", function(e) {
        e.preventDefault();
        var name = $("#name").val();
        // if(name){
        // 	console.log(name);
        // }
        var password = $("#password").val();
        // var input = $("#demo").serializeArray();
        // if(input){
        // 	console.log(input);
        // }
        var form = new FormData();
        form.append("name", name);
        form.append("password", password);
        function display_close(){
            $("#message").css({'display':'flex','margin-bottom':'20px'});
            $("nav").css("margin-bottom","20px");
            $("#close").click(function(){
                $("#message").hide();
            });
            $("#close").html('&#x2716;');
        }
        if (name.length == '' && password.length == '') {
            display_close();
            $("#demo").text("Enter Name and Password");
        } else if (name.length == '') {
            display_close();
            $("#demo").text("Enter Name");
        } else if (password.length == '') {
            display_close();
            $("#demo").text("Enter Password");
        }
        else {           
            $.ajax({
                url: "http://localhost/api/index.php/api/login_controller/login_process",
                type: "POST",
                // async : false,
                // contentType : "application/json",
                contentType: false,
                processData: false,
                // dataType : "json",
                data: form,
                success: function(userdata) {
                    // console.log(userdata);
                    var parse = JSON.parse(userdata);
                    // console.log(parse.status);                
                    if (parse.status == 1) {
                        window.location.replace("http://localhost/api/index.php/api/login_controller/display_ajax");
                    } else{
                        display_close();
                        $("#demo").text("Enter Valid Name and Password");
                    }
                    // console.log(parse);

                },
                error: function(xhr, thrownError, ajaxOptions) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    });
});