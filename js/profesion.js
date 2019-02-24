$(document).ready(function(){

listarProfesiones();
buscadorProfesion();
});

function listarProfesiones(){
	$.get("../ajax/profesion.php?op=listarProfesiones",{},function(data,status){
         $("#read_content").html(data);
	});
}

function llamarUsuario(id){

   $.post('../ajax/profesion.php?op=profesionPorId', {id: id}, function(data, status) {

	var usuario=JSON.parse(data);

	$("#edit_nombre").val(usuario.nombre);
	$("#edit_sueldo").val(usuario.sueldo);
	$("#edit_id").val(usuario.id);

	$("#editModal").modal("show");
		
});

}

function editarUsuario(){

	var id=$("#edit_id").val();
	var nombre=$("#edit_nombre").val();
	var sueldo=$("#edit_sueldo").val();


	$.post('../ajax/profesion.php?op=editarProfesion', {

		id: id,
		nombre:nombre,
		sueldo:sueldo
	},
	 function(data, status) {

	 	$("#editModal").modal("hide");

	 	listarProfesiones();		
	});
}

function agregarUsuario(){

	var nombre=$("#add_nombre").val();
	var sueldo=$("#add_sueldo").val();

	$.post('../ajax/profesion.php?op=agregarProfesion', {
		nombre:nombre,
		sueldo:sueldo
	}, function(data, status) {

		$("#addModal").modal("hide");

		console.log(nombre);
		console.log(sueldo);

		listarProfesiones();

		limpiarAddModal();
		
	});
}

function eliminarProfesion(id){

var conf=confirm("seguro de eliminar?");
if(conf){
   $.post('../ajax/profesion.php?op=eliminarProfesion', {id:id},
    function(data, status) {
   	 listarProfesiones();
   });
}
}

function buscadorProfesion(){
  
  $("#buscador").focus();              //tendra el foco de atención
  $("#buscador").keyup(function(e) {   //el evento funcoinara al levantar la mano de la tecla

  	var valor=$("#buscador").val();

  	$.ajax({
  		url: '../ajax/profesion.php?op=buscadorProfesion',
  		type: 'POST',
  		dataType: 'html',
  		data: {valor:valor},
  		error:function(e){
  			console.log("error en la peticion ajax");
  		},
  		success:function(data,status){
           $("#read_content").html(data);
  		}
  	});
  	
  });

}

function limpiarAddModal(){

	$("#add_nombre").val("");
	$("#add_sueldo").val("");
}
