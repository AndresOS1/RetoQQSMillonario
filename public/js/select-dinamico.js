$(document).ready(function(){
    
    $('#select-nivel').on('change', onSelectLevel);
    $('#select-question').on('change', onSelectQuestion);
});


function onSelectLevel(){

   let niveles_id =  $(this).val(); 

   if(! niveles_id){
        $('#select-category').html('<option value="" selected>Seleccione la Categoria</option>');
        return
   }    

   $.get('/api/nivel/'+niveles_id+'/category', function (data){

    let html_select = '<option value="" selected>Seleccione la Categoria</option>'

    for (let i = 0; i < data.length; i++) {

        html_select += '<option value="' + data[i].id_categorias + '">' + data[i].nombreCategoria + '</option>'
        
        $('#select-category').html(html_select);

    }
   })
}

function onSelectQuestion(){
    
}

