<?php

require_once("../modelo/profesion.php");

$profesion=new Profesion();

$valores=$profesion->getProfesiones();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Prueba php</title>
    
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script type="text/javascript" src="../js/profesion.js"></script>
	
</head>
<body>

	<?php require_once("componentes/navbar.html");?>

        <div class="container">
			<div class="row mt-4">
		 		<div class="col-md-6">
		 			<div class="container" id="read_content"><!--llama a la funcion listar-->
		 			</div>
						
				</div>
				
				<div class="col-md-6 mb-4">
					<div class="container">
						<img src="../../ImsgenesSpringBootComidasPeruanas/imagenes/helados.jpg" 
						id="imgHelado">
				    </div>	
				</div>
							
			</div>
	    </div>

<?php require_once("componentes/editarUsuario.html");?>
<?php require_once("componentes/agregarUsuario.html");?>
	
</body>
</html>


