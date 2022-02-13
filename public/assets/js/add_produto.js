var App = function(){
    
    var calcula_frete = function(){
      
      
      $("#btn-calcula-frete").on('click', function (){
          
          var produto_id = $(this).attr('data-id');
          var cep = $("#cep").val();
          
         //alert('Produto ID: ' + produto_id + 'CEP' + cep);
         
         
         $.ajax({
             
             type : 'post',
             url : BASE_URL + 'ajax/index',
             dataType: 'json',
             data:{
                 cep : cep,
                 produto_id : produto_id,
             },
             beforeSend: function (){
                 $('#btn-calcula-frete').html('<span class="text-white"><i class="fa fa-cog fa-spin"></i>&nbsp;Processando...</span>');
             },
         }).then(function (response){
             
             $('#btn-calcula-frete').html('<span class="text-white">ok</span>');
             $('#retorno-frete').html(response.retorno_endereco);
             
             console.log(response);
             
         });
         
      });
      
      
    };
         
         
    
    return{
        
        init: function (){
            
            calcula_frete();
        }
        
    }
    
}();//Inicializa ao carregar


jQuery(document).ready(function(){
    
    $(window).keydown(function(){
        
        if(event.keyCode == 13){
            
            event.preventDefault();
            return false;
            
        }
       
        
    });
    
    App.init();
    
    
});
