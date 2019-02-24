$(document).ready(function() {
	
	paginar_onload();
	crearPaginacion();
});

function listarEmpleados(){

	$.ajax({
		url: '../ajax/empleado.php?op=listar',
		type: 'GET',
		dataType: 'html',
		data: {},
		erro:function(e){
			console.log("error en la peticion ajax");
		},
		success:function(data,status){
			$("#read_content").html(data);
		}
	});
	
}

function crearPaginacion(){  //barra de paginacion

	$.ajax({
		url: '../ajax/empleado.php?op=mostrarPaginacion',
		type: 'GET',
		dataType: 'html',
		success:function(data,status){

           $("#pagination").html(data);

           paginar();
		}
	});	
}
function paginar(){  //paginacion al evento click

     $(".page-link").on('click',function(){

     	console.log($(this).text());

			 $.ajax({
				url: '../ajax/empleado.php?op=paginacion',
				type: 'GET',
				dataType: 'html',
				data: {pagina:$(this).text()},
				success:function(data,status){
					$("#read_content").html(data);
				}
			});	     

     });

}

function paginar_onload(){  //paginacion al cargar la pagina 

	$.ajax({
				url: '../ajax/empleado.php?op=paginacion',
				type: 'GET',
				dataType: 'html',
				data: {pagina:'1'},
				success:function(data,status){
					$("#read_content").html(data);
				}
			});	 
}
