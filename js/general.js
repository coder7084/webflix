$(document).ready(function() {  
   var max = 9999999999;
   var min = 1000000000;
   var id =  Math.round(Math.floor(Math.random() * (max - min)) / 10) ;
   $('input[name=id]').val(id);  
   

$('#submitbutton').click( function(){    
   $('.account_id').removeAttr('disabled');
   
 });
 
}); //end of doc.ready

