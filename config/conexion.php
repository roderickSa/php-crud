<?php


class Conexion{

private $con;

public function getConnection(){

	try{

        $pdo=new PDO(
                'mysql:host=localhost;dbname=curso_php7;charset=utf8',
                'root',
                ''
                   );

          return $pdo;

      }catch(Exception $e){

      	print "Error al conetar".$e->getMessage();

      }
}


}

?>