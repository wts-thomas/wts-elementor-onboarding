
var $ =jQuery.noConflict();
	$(document).ready(function() {
 
   $('.table-responsive-stack').each(function (i) {
      var id = $(this).attr('id');
      //alert(id);
      $(this).find("th").each(function(i) {
         $('#'+id + ' td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">'+ $(this).text() + ':</span> ');
         $('.table-responsive-stack-thead').hide();
         
      });
      
   });

$( '.table-responsive-stack' ).each(function() {
  var thCount = $(this).find("th").length; 
   var rowGrow = 100 / thCount + '%';
   //console.log(rowGrow);
   $(this).find("th, td").css('flex-basis', rowGrow);   
});
   
   
function flexTable(){
   if ($(window).width() < 961) {
      
   $(".table-responsive-stack").each(function (i) {
      $(this).find(".table-responsive-stack-thead").show();
      $(this).find('thead').hide();
   });
      
    
   // window is less than 961px   
   } else {
      
   $(".table-responsive-stack").each(function (i) {
      $(this).find(".table-responsive-stack-thead").hide();
      $(this).find('thead').show();
   }); 

   }

}      
 
flexTable();
   
window.onresize = function(event) {
    flexTable();
};
   
});