$(document).ready(function(){
    
  var name, email, mensaje; // Declaro las variables 

  $('#btnSend').click(function(){
      
      var errores = ''; // se crea la variable errores dentro de la funcion con valor vacio
      //
      
      name = $("#name").val(); 
      email = $("#email").val(); 
      mensaje = $("#mensaje").val(); 
      
      // Validado Nombre ==============================
      if (name.length == 0){ //consulto si name está vacío 
          errores += '<p>Escriba un nombre</p>';
          
          $('#name').css("border-bottom-color", "#F14B4B");
      } else{
            $('#name').css("border-bottom-color", "#d1d1d1");
        }
        
        // Validado Correo ==============================
      if (email.length == 0){ 
          errores += '<p>Ingrese un correo</p>';
          
          $('#email').css("border-bottom-color", "#F14B4B");
      } else{
            $('#email').css("border-bottom-color", "#d1d1d1");
        }
        
        // Validado Mensaje ==============================
      if (mensaje.length == 0){ 
          errores += '<p>Escriba un mensaje</p>';
          
          $('#mensaje').css("border-bottom-color", "#F14B4B");
      } else{
            $('#mensaje').css("border-bottom-color", "#d1d1d1");
        }
        
        // ENVIANDO MENSAJE ============================
        if(errores == '' == false){
            var mensajeModal = '<div class="modal-wrap">'+
                                    '<div class="mensaje-modal">'+
                                        '<h3>Errores encontrados</h3>'+
                                        errores+
                                        '<span id="btnclose">Cerrar</span>'+
                                    '</div>'+
                                '</div>'

            $('body').append(mensajeModal);
        }

        // CERRANDO MODAL ==============================
        $('#btnclose').click(function(){
            $('.modal-wrap').remove(); 
        });
  });
  
});