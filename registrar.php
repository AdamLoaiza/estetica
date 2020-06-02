<?php 
//Guardar los datos del formulario en mi base de datos

	$servidor = "localhost";
	$username = "root";
	$pass = ""; //todos los que tienen xampp este es el user y pass default
	$db = "estetica";

	$conexion = new mysqli($servidor, $username, $pass, $db);

	// Check connection
	if ($conexion->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}


	$servicio = $_POST["servicio"];
	$horas = $_POST["horas"];
	$fecha = $_POST["fecha"];
	$pago = $_POST["pago"];

	$consulta = "INSERT INTO citas (nombre, horas, fecha, pago) VALUES ('$servicio', $horas, '$fecha', $pago)";

	if($conexion->query($consulta) === TRUE){
		echo "<h3> El registro se inserto correctamente </h3>";
	} else {
		echo "<h2 style='color:red;'> El registro No se insertó</h2>";
	}

	echo "<a href='estetica.html'>Regresar</a>";
 ?>


 