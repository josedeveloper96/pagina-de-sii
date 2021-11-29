$('document').ready(function(){
  
    //boton de activar politica de privasidad
    $("#modalButton").click(function(){
       $("#modal").modal('show')
               .find("#modalContent")
               .load($(this).attr('href'));
       return false;
   });


 
   
  
});