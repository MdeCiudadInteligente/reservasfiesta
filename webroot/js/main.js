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
	$('#jcf_num_doc').blur(function(){
 		$('#Info').html('<img src="img/loader.gif" alt="" />').fadeOut(1000);
 		var jcf_num_doc = $(this).val();		
 		var dataString =jcf_num_doc;
 		
 		$.ajax({
             type: "POST",
             url: "Institutions/find_code.json",
             dataType:'json',
             data: {string:dataString},
             success: function(data) {
 				$('#Info').fadeIn(1000).html(data.response);
 				console.log(data);
             }
         });
     });    
	
	
	$('#boton-responsable').on('click',function(){
		$('.responsable').fadeIn();
	});		
	
	$('#lista-responsable').on('change',function(){
		$('.desplegable').fadeIn();
	});	

}

