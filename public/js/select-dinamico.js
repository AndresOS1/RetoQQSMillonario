$(document).ready(function(){
    
    $('#select-nivel').on('change', onSelectLevel);
    $('#select-category').on('change', onSelectQuestion);
    $('#select-question').on('change', onSelectResponse);
});


function onSelectLevel(){

   let niveles_id =  $(this).val(); 
   alert(niveles_id);

   if(! niveles_id){
        $('#select-category').html('<option value="" selected>Seleccione la Categoria</option>');
       return;
   }    

   $.get('/api/nivel/'+niveles_id+'/category', function (data){

    let html_select = '<option value="" selected>Seleccione la Categoria</option>'

    for (let i = 0; i < data.length; i++) {

        html_select += '<option value="' + data[i].niveles_id + '">' + data[i].nombreCategoria + '</option>'
        
        $('#select-category').html(html_select);
        console.log(html_select);
       

    }
   })
}

function onSelectQuestion(){

    let categoria_id = $(this).val();

    alert(categoria_id);
    if(! categoria_id){
        $('#select-question').html('<option value="" selected>Seleccione la Categoria</option>');
       return;
   }  

    $.get('/api/category/'+categoria_id+'/question', function(data){

        
    let html_select = '<option value="" selected>Seleccione la Pregunta</option>'

    for (let i = 0; i < data.length; i++) {


        console.log(data[i]);
        html_select += '<option value="' + data[i].categoria_id + '">' + data[i].pregunta + '</option>'
        
        console.log(html_select);
        $('#select-question').html(html_select);
        

    }
    });

}

    function  onSelectResponse(){

        let pregunta_id = $(this).val();

        alert(pregunta_id);

      

        $.get('/api/question/'+pregunta_id+'/responses', function(data){


            let html_select = '<option value="" selected>Seleccione la Respuesta</option>'
            for (let i = 0; i < data.length; i++){
               
                html_select += '<option value="' + data[i].pregunta_id + '">' + data[i].respuesta + '</option>'
                console.log(html_select);
                $('#select-responses').html(html_select);


            }
        })

    }

