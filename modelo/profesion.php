<?php

require_once("../config/conexion.php");

class Profesion extends Conexion{

  public function getProfesiones(){

  	$conectar=parent::getConnection();
  	$sql="select * from profesion";

  	$sql=$conectar->prepare($sql);
  	$sql->execute();

  	return $resultado=$sql->fetchAll();
  }

  public function profesionPorId($id){

  	$conectar=parent::getConnection();
  	$sql="select * from profesion where id=?";

  	$sql=$conectar->prepare($sql);
  	$sql->bindValue(1,$id);

  	$sql->execute();

  	return $resultado=$sql->fetchAll();
  }

  public function editarProfesion($id,$nombre,$sueldo){

    $conectar=parent::getConnection();
    $sql="update profesion set nombre=?,sueldo=? where id=?";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$nombre);
    $sql->bindValue(2,$sueldo);
    $sql->bindValue(3,$id);
    $sql->execute();

  }

  public function agregarProfesion($nombre,$sueldo){

    $conectar=parent::getConnection();
    $sql="insert into profesion(nombre,sueldo) values(?,?)";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$nombre);
    $sql->bindValue(2,$sueldo);
    $sql->execute();

  }

  public function eliminarProfesion($id){

    $conectar=parent::getConnection();
    $sql="delete from profesion where id=?";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id);
    $sql->execute();

  }

  public function buscadorProfesion($valor){

    $conectar=parent::getConnection();
    $sql="select * from profesion where nombre COLLATE UTF8_GENERAL_CI like '%".$valor."%' ";    

    $sql=$conectar->prepare($sql);
    //$sql->bindValue(1,$valor);
    $sql->execute();

    return $resultado=$sql->fetchAll();
  }
   
}


?>