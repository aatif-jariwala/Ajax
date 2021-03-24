$(document).ready(function() {
    $("#a_display").hide();
    $('.search').on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $('.table tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $(".delete a").on("click", function() {
        if (confirm("do you want to delete?")) {
            return true;
        } else {
            return false;
        }
    });
    // userdisplay();
    displayall();
    $("#demo").text("Login Successfull").css({ "color": "brown"}).fadeOut(4000);
    $("#a_login").attr("href","../login_controller");
    $("#a_signup").attr("href","../signup_controller");
    // $(".update").css("color:red");
    // $(".table").css("font-size","20px");
});


function displayall() {
    $.ajax({
        url: "http://localhost/api/index.php/api/login_controller/display",
        type: "get",
        dataType: "json",
        success: function(display) {
            if (!session == true) {
                console.log(display);
                var disp = display.details;
                console.log(disp.length);
                var table = '';
                for (var i = 0; i < disp.length; i++) {
                    table += "<tr class='border_id'>" +
                        '<td>' + disp[i].srno + '</td>' +
                        '<td>' + disp[i].name + '</td>' +
                        '<td>' + disp[i].email + '</td>' +
                        '<td>' + disp[i].country + '</td>' +
                        '<td>' + disp[i].state + '</td>' +
                        '<td>' + disp[i].city + '</td>' +
                        '<td>' + disp[i].password + '</td>' +
                        '<td>' + disp[i].cpassword + '</td>' +
                        // "<td class='update' colspan='3'> <a href=''>Update</a> </td>" +
                        // "<td id='delete' colspan='3'> <a href=''>Delete</a> </td>" +
                        "</tr>";
                        // $(".update a").attr('href', "update?id=" + disp[i].srno);
                        // $("#delete a").attr('href', "deletedata?id=" + disp[i].srno);
                }
                    $("#alldisplay").after(table);
            } else {
                var table = '';
                details = display.Details;
                console.log(display.Details);
                console.log(details.srno);
                table += "<tr class='table'>" +
                    "<td>" + details.srno + "</td>" +
                    "<td>" + details.name + "</td>" +
                    "<td>" + details.email + "</td>" +
                    "<td>" + details.country + "</td>" +
                    "<td>" + details.state + "</td>" +
                    "<td>" + details.city + "</td>" +
                    "</tr>";
                // $("#login_display").html(table);
                $("#display").after(table);
                $(".update a").attr('href', "update?id=" + details.srno);
                $(".delete a").attr('href', "deletedata?id=" + details.srno);
            }
        },
        error: function(xhr, ajaxOption, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}