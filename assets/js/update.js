$(document).ready(function () {
	// update_country();
	update();
	$("body").on('click', '.toggle-password', function() {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $("#password");
		if (input.attr("type") === "password") {
		  input.attr("type", "text");
		} else {
		  input.attr("type", "password");
		}
	  
	  });
	  $("body").on('click', '.toggle-cpassword', function() {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $("#cpassword");
		if (input.attr("type") === "password") {
		  input.attr("type", "text");
		} else {
		  input.attr("type", "password");
		}
	  
	  });
	  $(".delete a").on("click", function() {
        if (confirm("do you want to delete?")) {
            return true;
        } else {
            return false;
        }
    });
	// });
	$('select#country').on("change", function (e) {
		e.preventDefault();
		// console.log("click");
		var countryID = $(this).val();
		// if(countryID){
		//     console.log("click");
		// }
		state(countryID);
	});
	$('select#state').on("change", function (e) {
		e.preventDefault();
		var stateID = $(this).val();
		// if(stateID){
		//     console.log("hello");   
		// }
		city(stateID);
	});
	$("#a_update").hide();
	$("#a_display").attr("href","../login_controller/display_ajax");

	$("#update").on("click", function (e) {
		e.preventDefault();
		var srno = $("#srno").val();
		var name = $("#name").val();
		var email = $("#email").val();
		var country = $("#country").val();
		var state = $("#state").val();
		var city = $("#city").val();
		var password = $("#password").val();
		var cpassword = $("#cpassword").val();
		var form = new FormData();
		form.append("srno", srno);
		form.append("name", name);
		form.append("email", email);
		form.append("country", country);
		form.append("state", state);
		form.append("city", city);
		form.append("password", password);
		form.append("cpassword", cpassword);

		function display_close() {
			$("#message").css('display', 'flex');
			$("#close").click(function () {
				$("#message").hide();
			});
			$("#close").html('&#x2716;');
		}
		$.ajax({
			url: "http://localhost/api/index.php/api/login_controller/updatedata",
			type: "post",
			// dataType:"json",
			contentType: false,
			processData: false,
			data: form,
			success: function (update) {
				if (name.length == '') {
					display_close();
					$("#validation").text("Enter Name");
				} else if (email == '') {
					display_close();
					$("#validation").text("Enter Email");
				} else if (country == '') {
					display_close();
					$("#validation").text("Select Country");
				} else if (state == '') {
					display_close();
					$("#validation").text("Select State");
				} else if (city == '') {
					display_close();
					$("#validation").text("Select City");
				} else if (password == '') {
					display_close();
					$("#validation").text("Enter Password");
				} else if (cpassword == '') {
					display_close();
					$("#validation").text("Enter Password");
				} else if (!(password == cpassword)) {
					display_close();
					$("#validation").text("Password do not Match");
				} else {
					console.log(typeof (update));
					json = JSON.parse(update);
					if (json.status == 1) {
						if (session == true) {
							window.location.replace("http://localhost/api/index.php/api/login_controller/display_ajax");
						}
					}
					console.info(json);
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	});
});

function update() {
	$.ajax({
		url: "http://localhost/api/index.php/api/login_controller/updatedata",
		type: "post",
		dataType: "json",
		success: function (update) {
			// console.log(update);
			json = update.Details;
			$("#srno").val(json.srno);
			$("#name").val(json.name);
			$("#email").val(json.email);
			window.user_country = json.country;
			window.user_state = json.state;
			window.user_city = json.city;
			// load update_country here
			update_country();
			$("#password").val(json.password);
			$("#cpassword").val(json.cpassword);
		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}

function state(countryID) {
	$.ajax({
		url: "http://localhost/api/index.php/api/signup_controller/state_process",
		type: "post",
		dataType: "json",
		data: {
			countryID: countryID
		},
		beforeSend: function () {
			$('select#state').find("option:eq(0)").html("Please wait...");
		},
		success: function (json) {
			//    console.log("hello");
			var option = "";
			option += '<option value="">Select State</option>';
			var a = json.states;
			var user_id = '';
			//    var data=window.user_state;
			// console.log(user_state);

			for (var i = 0; i < a.length; i++) {
				if (a[i].country_id == countryID) {
					option += '<option value="' + a[i].id + '">' + a[i].name + '</option>';
					if (user_state == a[i].name) {
						//    console.log(user_state);
						user_id = a[i].id;
					}
				}
			}
			$('select#state').html(option);
			$("#state").val(user_id).trigger("change");
			$('#state option[value=" ' + user_id + ' "]').attr('selected', 'selected');
		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}

function city(stateID) {
	$.ajax({
		url: "http://localhost/api/index.php/api/signup_controller/city_process",
		type: "post",
		data: {
			stateID: stateID
		},
		dataType: "json",
		beforeSend: function () {
			$('select#city').find("option:eq(0)").html("Please Wait...");
		},
		success: function (json) {
			// console.log(json);
			var option = "";
			option += '<option value="">Select City</option>';
			json_data = json.city;
			var user_id = '';
			//    console.log(user_city);
			for (i = 0; i < json_data.length; i++) {
				if (json_data[i].state_id == stateID) {
					option += '<option value="' + json_data[i].id + '">' + json_data[i].name + '</option>';
					if (user_city == json_data[i].name) {
						//    console.log(user_city);
						user_id = json_data[i].id;
					}
				}
			}
			$('select#city').html(option);
			$("#city").val(user_id).trigger("change");
			$('#city option[value=" ' + user_id + ' "]').attr('selected', 'selected');
		}
	});
}

function update_country() {
	$.ajax({
		url: "http://localhost/api/index.php/api/signup_controller/country_process",
		type: "get",
		dataType: "json",
		success: function (country) {
			var option = '';
			//    var data2='';
			//    console.log(user_country);
			//    console.log(country);            
			var json = country.Country;
			var user_id = '';
			option += '<option value="">Select Country</option>';
			for (var i = 0; i < json.length; i++) {
				option += '<option value="' + json[i].id + '">' + json[i].name + '</option>';
				if (user_country == json[i].name) {
					//   console.log(user_country);
					user_id = json[i].id;

				}
			}
			$("#country").html(option);
			$('#country option[value=" ' + user_id + ' "]').attr('selected', 'selected');
			$("#country").val(user_id).trigger("change");
		},
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}
