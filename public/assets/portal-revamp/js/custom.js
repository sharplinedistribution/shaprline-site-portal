
(function(){
    $('.menu-toggle').on('click', function(){
      $('body').toggleClass('msb-x');
      $('.overlay').toggleClass('d-none')
    });

    $('.overlay').on('click', function(){
      $('body').toggleClass('msb-x');
      $('.overlay').toggleClass('d-none')
    });
  }());

function showPassword()
{
 if ($(".pass").attr("type")=="password") {
 $(".pass").attr("type", "text");
 $('#passIcon1').toggleClass("fa-eye fa-eye-slash");
 }
 else{
 $(".pass").attr("type", "password");
 $('#passIcon1').toggleClass("fa-eye fa-eye-slash");
//  document.getElementById('s_show_hide').innerHTML="SHOW";
 }
}

function showPassword2()
{
 if ($(".pass2").attr("type")=="password") {
 $(".pass2").attr("type", "text");
 $('#passIcon2').toggleClass("fa-eye fa-eye-slash");
 }
 else{
 $(".pass2").attr("type", "password");
 $('#passIcon2').toggleClass("fa-eye fa-eye-slash");
//  document.getElementById('s_show_hide').innerHTML="SHOW";
 }
}