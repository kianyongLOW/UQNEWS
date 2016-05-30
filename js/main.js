
function main() {

(function () {
    
    $(window).bind('scroll', function() {
        var navHeight = $(window).height() - 100;
        if ($(window).scrollTop() > navHeight) {
            $('.navbar-default').addClass('bar');
        } else {
            $('.navbar-default').removeClass('bar');
        }
    });
    
    $('body').scrollspy({ 
        target: '.navbar-default',
        offset: 60
    });

  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
    
    

}());
}


main();

$("#frmLogin").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "php/login_action.php",
                    data: $("#frmLogin").serialize(),
                    async:false,
                    success: function(data) {
                        if(data == "success"){
                            document.getElementById("loginResponse").innerHTML = "Logging in..";
                           
                            $("#loginResponse").fadeOut(2000);
                            setTimeout(function() {
                                document.location.href = "index.php";
                            }, 1000);
                        }else if(data == "incorrect"){
                            document.getElementById("loginResponse").innerHTML = "Invalid password or email.";
                            $("#loginResponse").fadeOut(5000);
                            $("#frmLogin").trigger("reset");
                        }else if(data == "unsuccessful"){
                            document.getElementById("loginResponse").innerHTML = "Invalid password or email.";
                            $("#loginResponse").fadeOut(5000);
                            $("#frmLogin").trigger("reset");
                        }
                    }
                   
                });
             });


$("#frmReg").submit(function(e){
     e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "php/register_action.php",
                    data: $("#frmReg").serialize(),
                    async:false,
                    dataType:"JSON",
                    success: function(data) {
                        
                        if (data["success"] == 1) {
                            if(data["message"] == "registered"){
                                    document.getElementById("registerResponse").innerHTML = "Successfully registered";
                                    $("#registerResponse").fadeOut(2000);
                                    setTimeout(function() {
                                        document.getElementById("frmReg").reset();
                                        document.location.href = "index.php";
                                    }, 1000);
                            }else if(data["message"]  == "email_used") {
                                document.getElementById("emailError1").innerHTML = "Email in used";
                                $("#emailError1").fadeOut(4000);
                                $("#frmReg").trigger("reset");
                            } else if (data["message"]  == "password_not_match") {
                                document.getElementById("password").innerHTML = "Password not match with password repeats";
                                document.getElementById("passwordRepeat").innerHTML = "Password not match with password repeats";
                                    $("#password1").fadeOut(4000);
                                    $("#passwordRepeat1").fadeOut(4000);
                                    $("#frmReg").trigger("reset");
                           
                            }
                        } else {
                           
                        }
                    }
                   
                });
});


