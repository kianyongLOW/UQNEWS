
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
                            
                           
                            $("#loginResponse").fadeOut(2000);
                            setTimeout(function() {
                                document.location.href = "abc.php";
                            }, 1000);
                        }else if(data == "incorrect"){
                            document.getElementById("loginResponse").innerHTML = "Invalid password or email.";
                            $("#loginResponse").fadeOut(5000);
                        }else if(data == "unsuccessful"){
                            document.getElementById("loginResponse").innerHTML = "Invalid password or email.";
                            $("#loginResponse").fadeOut(5000);
                        }
                    }
                   
                });
             });