$(document).ready('.page-scroll').on('click',"a",function(event){
    var tujuan=($(this).attr('href'));
    var elemenTujuan = $(tujuan);
  
    $('html,body').animate({
      scrollTop:elemenTujuan.offset().top - 60
    },1000,'easeInOutExpo');
    event.preventDefault();
  });
  
  parallax
  $(window).on('load',function(){
  $('.pkiri').addclass('pmuncul');
  $('.pkanan').addclass('pmuncul');
   });
 
  