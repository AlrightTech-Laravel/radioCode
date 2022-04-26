// MENU MOBILE ===============================================================================
// Collpsable menu mobile and tablets

	$("#megamenu-button-mobile").click(function(){
		$(".megamenu").slideToggle(400);
		$(this).toggleClass("active");
	});

// MENU DROP DOWN ====================================== //
 $(document).ready(function() {
    
    $(".megamenu .drop-down").click(function() {
      if($(this).next("div").is(":visible")){
        $(this).next("div").slideToggle("normal");
      } else {
        $(".megamenu .drop-down-container").fadeOut("fast");
        $(this).next("div").slideToggle("slow");

      }
    });
  });
  
 <!-- Tooltip -->	
$('.tooltip-2').tooltip();


<!-- forms -->	
$(document).ready(function(){   
		
		//Pace holder
		$('input, textarea').placeholder();
	
    });

		
		
<!-- Preloader -->		
	
//<![CDATA[
		$(window).load(function() { // makes sure the whole site is loaded
			$('#status').fadeOut(); // will first fade out the loading animation
			$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
			$('body').delay(350).css({'overflow':'visible'});
		})
	//]]>


<!-- Gallery -->		
	
//<![CDATA[
$('.gallery').magnificPopup({
  delegate: 'a', // child items selector, by clicking on it popup will open
  gallery:{enabled:true},
  type: 'image'
  // other options
});
  $('.video').magnificPopup({type:'iframe'});	
  $('.map').magnificPopup({type:'iframe'});	
//]]>

