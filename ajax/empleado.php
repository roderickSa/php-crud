<?php

require_once("../config/conexion.php");
require_once("../modelo/empleado.php");

$empleado=new Empleado();

$registros_por_pagina=2;  //para la paginacion

switch ($_GET["op"]) {
	case 'listar':
		
        $listado=$empleado->getEmpleados();

         $data='<table class="table table-bordered table-hover text-center">
                <tr>
				  <th>Nombres</th>
				  <th>Apellidos</th>
				  <th>Profesion</th>
				  <th>Sueldo</th>
				  <th>Acción</th>
                </tr>';

         if(count($listado>0)){

           foreach ($listado as $row) {
               
               $data.='<tr>
                         <td>'.$row["nombre"].'</td>
                         <td>'.$row["apellido"].'</td>
                         <td>'.$row["profesion"].'</td>
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

	case 'mostrarPaginacion':    //barra de paginacion
		
         $conteo=$empleado->conteoEmpleados();  //cuenta el numero de empleados en nuestra bd

         foreach ($conteo as $row) {            
         	$total=ceil($row["conteo"]/$registros_por_pagina); 
         }          //obtenemos el total de paginas q se van a mostrar 

         $data="";                     //inicializamos $data

         for($i=1;$i<=$total;$i++){

         	$data.='<li class="page-item"><a class="page-link text-muted">'. $i .'</a></li>';

         }

         echo $data;          

		break;

    case 'paginacion':         // listado al paginar con el evnto click


         if(isset($_GET["pagina"])){

	         $pagina=$_GET["pagina"];    // recibimos la pagina a la que se desea acceder

	         $desde=($pagina-1)*$registros_por_pagina;  //fórmula básica para la paginación
			
	         $listado=$empleado->paginacionEmpleados($desde,$registros_por_pagina);

	         $data='<table class="table table-bordered table-hover text-center">
	                <tr>
					  <th>Nombres</th>
					  <th>Apellidos</th>
					  <th>Profesion</th>
					  <th>Sueldo</th>
					  <th>Acción</th>
	                </tr>';

	         if(count($listado>0)){

	           foreach ($listado as $row) {
	               
	               $data.='<tr>
	                         <td>'.$row["nombre"].'</td>
	                         <td>'.$row["apellido"].'</td>
	                         <td>'.$row["profesion"].'</td>
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

          }

         echo $data;

		break;	
}

?>