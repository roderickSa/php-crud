<?php

require_once("../config/conexion.php");
require_once("../modelo/profesion.php");

$profesion=new Profesion();


switch ($_GET["op"]) {

	case 'profesionPorId':

	  if(isset($_POST["id"])){

	  	$id=$_POST["id"];
		
         $usuario=$profesion->profesionPorId($id);

	         if(count($usuario>0)){

	           foreach ($usuario as $row) {
	               	
	               $salida["id"]=$row["id"];
	               $salida["nombre"]=$row["nombre"];
	               $salida["sueldo"]=$row["sueldo"];

	           }

                echo json_encode($salida);

	         }

          }

		break;

	case 'listarProfesiones':
		
         $listado=$profesion->getProfesiones();

         $data='<table class="table table-bordered table-hover text-center">
                <tr>
				  <th>Nombre</th>
				  <th>Sueldo</th>
				  <th>Acción</th>
                </tr>';

         if(count($listado>0)){

           foreach ($listado as $row) {
               
               $data.='<tr>
                         <td>'.$row["nombre"].'</td>
                         <td>S/. '.$row["sueldo"].'</td>
                         <td>
                           <button onclick="llamarUsuario('.$row["id"].')"
                            class="btn btn-warning pull-left" data-toggle="modal" data-target="#editModal"
                            >Editar</button>
                            <button 
                            class="btn btn-danger pull-right"
                             onclick="eliminarProfesion('.$row["id"].')"
                            >Eliminar</button>
                         </td>
                      </tr>';
           }
           $data.="</table>";

         }

         echo $data;

		break;	

	case 'editarProfesion':
		
        if(isset($_POST["id"])){

        	$id=$_POST["id"];
            $nombre=$_POST["nombre"];
            $sueldo=$_POST["sueldo"];

           $profesion->editarProfesion($id,$nombre,$sueldo);           
        }

		break;	

	case 'agregarProfesion':
		
         if(isset($_POST["nombre"]) and isset($_POST["sueldo"])){

            $nombre=$_POST["nombre"];
            $sueldo=$_POST["sueldo"];

             $profesion->agregarProfesion($nombre,$sueldo); 
         }

		break;	

	case 'eliminarProfesion':
		
         if(isset($_POST["id"])){

            $id=$_POST["id"];

             $profesion->eliminarProfesion($id); 
         }

		break;

	case 'buscadorProfesion':

	if(isset($_POST["valor"])){

		$valor=$_POST["valor"];

		//echo $valor;
		
         $listado=$profesion->buscadorProfesion($valor);

         //echo sizeof($listado);

         $data='<table class="table table-bordered table-hover text-center">
                <tr>
				  <th>Nombre</th>
				  <th>Sueldo</th>
				  <th>Acción</th>
                </tr>';

           foreach ($listado as $row) {
               
               $data.='<tr>
                         <td>'.$row["nombre"].'</td>
                         <td>S/. '.$row["sueldo"].'</td>
                         <td>
                           <button onclick="llamarUsuario('.$row["id"].')"
                            class="btn btn-warning pull-left" data-toggle="modal" data-target="#editModal"
                            >Editar</button>
                            <button 
                            class="btn btn-danger pull-right"
                             onclick="eliminarProfesion('.$row["id"].')"
                            >Eliminar</button>
                         </td>
                      </tr>';
           }
           $data.="</table>";

           if(sizeof($listado)==0){
               $data="<p>No se encontraron coincidencias para ".$valor." </p>";
           }

         echo $data;
	}

		break;				

}

?>