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
	
	$('#lista-responsable').on('change',function(){
		$('.desplegable').fadeIn();
	});
	
	$('#boton-responsable').on('click',function(){
		$('.responsable').fadeIn();
	});		
	
	
}



