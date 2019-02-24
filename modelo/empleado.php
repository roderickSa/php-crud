<?php

require_once("../config/conexion.php");

class Empleado extends Conexion{

  public function getEmpleados(){

  	$conectar=parent::getConnection();
  	$sql="select e.id,e.nombre,e.apellido,p.nombre as profesion,p.sueldo 
  	from empleado e inner join profesion p where e.profesion_id=p.id";

  	$sql=$conectar->prepare($sql);
  	$sql->execute();

  	return $resultado=$sql->fetchAll();
  }

  public function conteoEmpleados(){

  	$conectar=parent::getConnection();
  	$sql="select count(id) as conteo from empleado";

  	$sql=$conectar->prepare($sql);
  	$sql->execute();

  	return $resultado=$sql->fetchAll();
  }

  public function paginacionEmpleados($desde,$filasPagina){

    $conectar=parent::getConnection();
	$sql="select e.id,e.nombre,e.apellido,p.nombre as profesion,p.sueldo from empleado e inner join profesion p where e.profesion_id=p.id limit {$desde},{$filasPagina} ";

	$sql=$conectar->prepare($sql);
  	//$sql->bindValue(1,$desde);
  	//$sql->bindValue(2,$filasPgina);

  	$sql->execute();

  	return $resultado=$sql->fetchAll();  	
  }

}

?>  