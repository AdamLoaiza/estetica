<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de servicios</title>
	<link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<div class="container">
	<div class="row">
		<ul class="nav nav-pills">
		  <li class="nav-item">
		    <a class="nav-link" href="estetica.html">Registrar Servicio</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="mostrarServicios.php">Mostrar Servicios</a>
		  </li>
		</ul>
	</div>
	<div class="row">
		<?php 
			$servidor = "localhost";
			$username = "root";
			$pass = ""; //todos los que tienen xampp este es el user y pass default
			$db = "estetica";
			$conexion = new mysqli($servidor, $username, $pass, $db);

			// Check connection
			if ($conexion->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$consulta = "SELECT * FROM citas";
			$datos = $conexion->query($consulta);

			if($datos->num_rows > 0){
				echo "<table class='table table-hover'>";
				echo "<thead>";
				echo "<tr>";
				echo "<th>id</th>";
				echo "<th>Nombre del servicio</th>";
				echo "<th>Horas</th>";
				echo "<th>fecha</th>";
				echo "<th>Tipo de pago</th>";
				echo "</tr>";
				echo "</thead><tbody>";
				while($row = $datos->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row["id"]."</td>";
					echo "<td>".$row["nombre"]."</td>";
					echo "<td>".$row["horas"]." hrs</td>";
					echo "<td>".$row["fecha"]."</td>";
					if($row["pago"]==1){
						echo "<td>Efectivo</td>";
					} else {
						echo "<td>Tarjeta</td>";
					}
					echo "</tr>";

				}
				echo "<tbody></table>";
			} else {
				echo "<h3> No existen registros de citas</h3>";
			}

		?>
	</div>
</div>
	
</body>
</html>