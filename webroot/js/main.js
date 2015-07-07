var app=null;
var isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
var waypoints=null;

$(document).ready(function(){
	app=new App;
});


var App = function(){
	app = this;
	app.bind();
}

App.prototype.bind=function(){

	$(document).on('change','#Institutioncode_education',function(){
		$('#Info').html('<img src="img/loader.gif" alt="" />').fadeOut(1000);
 		var code = $(this).val();		
 		var dataString =code;
 		
 		$.ajax({
             type: "POST",
             url: "find_code.json",
             dataType:'json',
             data: {string:dataString},
             success: function(data) {
            	 console.log(data.data.response);
            	 console.log(data);
 				 $('#Info').fadeIn(1000).html(data.data.response);
             }
         });
     });    
	
	$(document).on('change','#username',function(){
 		var usern = $(this).val();		
 		var dataString =usern;
 		$.ajax({
             type: "POST",
             url: absPath+"Institutions/find_username.json",
             dataType:'json',
             data: {string:dataString},
             success: function(data) {
 				 $('#Infouser').fadeIn(1000).html(data.data.response);
                 console.log(data.data.existe);
                 if(data.data.existe){
                    $('#username').val(''); 
                 }
             }
         });
     });    
	
	
	$('#lista-responsable').on('change',function(){
		var selected=$(this).val();
		console.log(selected);
		if(selected=="Institución Educativa"){
			$('.educativa').fadeIn();
			$('.independiente').hide();
		}else if(selected=="Institución Independiente"){
			$('.independiente').fadeIn();
			$('.educativa').hide();			
		}
		$('.autocompleted').fadeIn();
	});	
	
	
	$('#boton-responsable').on('click',function(){
		$('.responsable').fadeIn();
	});	
	
	app.bindAutocompleteInstitutions('.Institution-autocomplete');
}

App.prototype.afterBind=function(){
	app.bindAutocompleteInstitutions('.Institution-autocomplete');
}

/* Autocomplete Institutions */
App.prototype.bindAutocompleteInstitutions=function(selector){

    if($(selector).length){
        var limit=($(selector).data('limit'))?$(selector).data('limit'):100;
        var serivce_route=absPath+"Institutions/getInstitution.json";
        $(selector).autoSuggest(serivce_route,
            {   minChars: 2,
                formatList: function(data, elem){
                var new_elem = elem.html('<div class="suggest-cont"><div class=\'suggest_info clearer_auto\'>  <b>Código DANE:</b> '+data.code_education+' </div><div class=\'suggest_info clearer_auto\'>  <b>Nombre:</b> '+data.name+' </div></div>');
                return new_elem;
                },
                emptyText:'No se encontro la institución por favor ingresala por medio del enlace que se encuentra en la parte de arriba.</a> ',
                selectedItemProp: 'name',
                selectedValuesProp:'code_education',
                searchObjProps: 'code_education,name',
                selectionLimit:limit,
                starText: 'Seleccione la institución',

                resultClick: function(data){
                    //Variables de datos
                    var id=data.attributes.id_institution;
                    var data_name=$('.results-input').data('input-name');
                    var elementID='val-input-'+id;
                    $('.results-input').append('<input id="'+elementID+'" type="hidden" value="'+id+'" name="'+data_name+'">');
                    
                },selectionRemoved: function(elem){
                    var prop_data=elem.data('prop-data');
                    var cod=prop_data['id_institution'];
                    var elementID='val-input-'+cod;
                    $('#'+elementID).remove();
                    elem.remove();
                    $('.boton').hide();
                },selectionAdded:function(elem){
                    $('.boton').fadeIn();
                }
        });    
    
    
        if($(selector).data('required')){
            var parentForm=$(selector).closest('form');
            var inputContainer=$($(selector).data('valcontainer'));
            var emptyMsg=$(selector).data('emptymsg');
            parentForm.on('submit',function(e){
                if(inputContainer.find('input').length==0){
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: $(selector).offset().top-100
                    }, 500);
                    setTimeout(function(){
                        alert(emptyMsg);
                    },500);
                    return false;
                }
            });
        }

        if($(selector).data('load')){
            var inputContainer=$($(selector).data('valcontainer'));
            var loadInstitutions=inputContainer.find('input');
            var autoList=$(selector).closest('ul');
            $.each(loadInstitutions,function(){
                var id=$(this).attr('id');
                var name=$(this).data('display');
                autoList.prepend('<li id="as-selection-1" data-relvalue="'+id+'" class="as-selection-item blur"><a class="as-close close-load">x</a>'+name+'</li>');
            });

            $('.close-load').on('click',function(){
                var parentLi=$(this).closest('li');
                var relInput='#'+parentLi.data('relvalue');
                parentLi.remove();
                $(relInput).remove();

            });
        }


    }



};


