<?php


require_once("../config/conexion.php");
require_once("../modelo/empleado.php");

$empleado=new Empleado();

$resultado=$empleado->paginacionEmpleados(0,2);

foreach ($resultado as $row) {
	echo $row["id"]." ".$row["nombre"]." ".$row["profesion"]."<br/>";
}

?>