	$(document).ready(function() {
	    load_country();
		$("body").on('click', '.toggle-password', function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $("#password");
			if (input.attr("type") === "password") {
			  input.attr("type", "text");
			} else {
			  input.attr("type", "password");
			}		  
		});
		// $(".fa").on('click', function() {
		// 	$(this).toggleClass("fa-eye fa-eye-slash");
		// 	var input = $("#password");
		// 	if (input.attr("type") === "password") {
		// 	  input.attr("type", "text");
		// 	} else {
		// 	  input.attr("type", "password");
		// 	}		  
		// });
		$("body").on('click', '.toggle-cpassword', function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $("#cpassword");
			if (input.attr("type") === "password") {
			  input.attr("type", "text");
			} else {
			  input.attr("type", "password");
			}		  
		});
		$("nav").css("margin-bottom","20px");
		$("#a_signup").hide();
	    $('select#country').on("change", function(e) {
	        e.preventDefault();
	        var countryID = $(this).val();
	        state(countryID);
	    });
	    $('select#state').on("change", function(e) {
	        e.preventDefault();
	        var state_id = $(this).val();
	        // if(state_id){
	        // 	console.log("hii");
	        // }
	        city(state_id);
	    });
		
	    $("#signup").on("click", function(e) {
	        e.preventDefault();
	        var name = $("#name").val();
	        var email = $("#email").val();
	        var password = $("#password").val();
	        var cpassword = $("#cpassword").val();
	        var country = $("#country").val();
	        var state = $("#state").val();
	        var city = $("#city").val();
	        // if(name && email && password && cpassword && country && state && city){
	        // 	console.log("ok");
	        // }
	        var form = new FormData();
	        form.append("name", name);
	        form.append("email", email);
	        form.append("password", password);
	        form.append("cpassword", cpassword);
	        form.append("country", country);
	        form.append("state", state);
	        form.append("city", city);
			function display_close(){
				$("#message").css('display','flex');
				$("#close").click(function(){
					$("#message").hide();
				});
				$("#close").html('&#x2716;');
			}
			if (name.length == '') {
				display_close();
				$("#demo").text("Enter Name");
			} else if (email.length == '') {
				display_close();
				$("#demo").text("Enter Email");
			} else if (password.length == '') {
				display_close();
				$("#demo").text("Enter Password");
			} else if (cpassword.length == '') {
				display_close();
				$("#demo").text("Enter Confirm Password");
			} else if (!(password.length == cpassword.length)) {
				display_close();
				$("#demo").text("Password Do Not Match");
			} else if (country.length == '') {
				display_close();
				$("#demo").text("Select Country");
			} else if (state.length == '') {
				display_close();
				$("#demo").text("Select State");
			} else if (city.length == '') {
				display_close();
				$("#demo").text("Select City");
			} else {
				$.ajax({
					url: "http://localhost/api/index.php/api/signup_controller/signup_process",
					type: "post",
					contentType: false,
					processData: false,
					data: form,
					success: function(signup) {
						console.log(typeof(signup));
						// console.info(signup);
						object = JSON.parse(signup);
						console.log(object.status);
						if (object.status == 1) {
							display_close();
							$("#demo").text("Signup Successfull");
						} else {
							display_close();
							$("#demo").text("Username Already Exist");
						}
						console.log(typeof(object));
						console.log(object);
					},
					error: function(xhr, thrownError, ajaxOptions) {
						console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			}

	    });

	});

	function load_country() {
	    $.ajax({
	        url: "http://localhost/api/index.php/api/signup_controller/country_process",
	        type: "get",
	        dataType: "json",
	        success: function(country) {
	            console.log(country);
	            var json = country.Country;
	            var option = "";
	            option += '<option value="">Select Country</option>';
	            for (i = 0; i < json.length; i++) {
	                option += '<option value="' + json[i].id + '">' + json[i].name + '</option>';
	            }
	            $("select#country").html(option);
	        },
	    });
	}

	function state(countryID) {

	    $.ajax({
	        url: "http://localhost/api/index.php/api/signup_controller/state_process",
	        type: "post",
	        dataType: "json",
	        data: { countryID: countryID },
	        beforeSend: function() {
	            $('select#state').find("option:eq(0)").html("Please wait..");
	        },
	        success: function(json) {
	            var option = "";
	            option += '<option value="">Select State</option>';
	            var a = json.states;
	            for (var i = 0; i < a.length; i++) {
	                if (a[i].country_id == countryID) {
	                    option += '<option value="' + a[i].id + '">' + a[i].name + '</option>';
	                }
	            }
	            $('select#state').html(option);
	        },
	        error: function(xhr, ajaxOptions, thrownError) {
	            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	        }
	    });
	}

	function city(state_id) {
	    $.ajax({
	        url: "http://localhost/api/index.php/api/signup_controller/city_process",
	        type: "post",
	        dataType: "json",
	        data: { stateID: state_id },
	        beforeSend: function() {
	            $('select#city').find("option:eq(0)").html("Please wait...");
	        },
	        success: function(json) {
	            // console.log("text");
	            // var a=json;
	            // console.log(json);				
	            var option = "";
	            option += '<option value="">Select City</option>';
	            json_data = json.city;
	            // console.log(json_data.length);
	            // console.log(json.status);
	            if (json.status == '1') {
	                for (var i = 0; i < json_data.length; i++) {
	                    if (json_data[i].state_id == state_id) {
	                        option += '<option value="' + json_data[i].id + '">' + json_data[i].name + '</option>';
	                    }
	                }
	            }
	            $('select#city').html(option);
	        },
	        error: function(xhr, ajaxOption, thrownError) {
	            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	        }
	    });
	}