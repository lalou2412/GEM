<?php  
	session_start();
	if (isset($_SESSION['admin'])) {
		// code...
	
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>GEM</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<meta charset="utf-8">
		<style type="text/css">
			p{
				color: white;
				font: 30px;
			}
			.texto-blanco{
				color: white;
			}
		</style>

	</head>
	<body>
		
	    <section>
	        
		<div><?php  echo "<h2>Bienvenido: ".$_SESSION['admin']."</h2>"; 
				?></div>

		<div id="menuAdmin">
			<ul>
				<li><a href="InicioSesionAdmin.php">Inicio</a></li>s
				<li><a href="">Pedidos</a></li>
				<li><a href="RegistroAdmin-Admin.php">Administradores</a></li>
				<li><a href="RegistroEmpleado-Admin.php">Empleados</a></li>
				<li><a href="">Clientes</a></li>
				<div id="menuAdmin2"><li><a href="salir.php">Cerrar Sesión</a></li></div>
				<div id="foto"><img src="sin_fotografia.png" height="50px"></div>
			</ul>
		</div>

		<div id="contenedor">
			<p>Buenos dias Ingenier@</p>
			<!--<div id="menuSeleccion">-->

				<ul class="button-list">
					<li><a class="button" href="crear.php">Crear</a> </li>
					<li><a class="button" href="editar.php">Editar</a> </li>
					<li><a class="button" href="eliminar.php">Eliminar</a> </li>
				</ul>
			<!--</div>-->



			<?php
				$color = "white";//color del texto
				// Ruta al directorio de documentos
				$directorio = 'C:/xampp/htdocs/carpetaje'; // Ruta absoluta en Windows

				$archivos = scandir($directorio);
				foreach ($archivos as $archivo) {
				    echo "<span style='color: $color;'>-->" . $archivo . "</span><br>";
				}
			?>

			<br>
			<br>
			<br>
			<?php
				$color = "white";//color del texto
				//----Conexion con base de datos
				//contraseña ---> @f2dGeoX_GZSo9BY
				//lalo
				$host = "localhost";
				$BD = "provisional";
				$usuario = "lalo";
				$contra = "@f2dGeoX_GZSo9BY";
				$tabla = "admin";
					// Consulta SQL para seleccionar todos los datos de una tabla (reemplaza 'nombre_de_tabla' con el nombre de tu tabla)
					$sql = "SELECT * FROM $tabla";
					$conn = new PDO ("mysql:host = $host; dbname=$BD",$usuario, $contra);
					$result = $conn->query($sql);
				try {
					
					echo "<span style='color: $color;'>" . "Estamos en linea, uso de la base de datos: $BD" . "</span><br>";
					//echo "Estamos en linea, uso de la base de datos: $BD";
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					// Verificar si la consulta devolvió resultados
					$num_rows = $result->rowCount();
						if ($num_rows > 0) {
						    //echo "<table border='1'>";
						    //echo "<tr><th>ID</th><th>Nombre</th><th>Edad</th></tr>";
						    // Iterar a través de los resultados y mostrarlos en una tabla

						    while ($row = $result->fetch()) {

						        echo "Correo Electronico: " . $row['CorreoElectronico'] . ", Contraseña: " . $row['Contrasenia'] . ", Tipo de cuenta: " . $row['TipoCuenta'] . ",Nombre: " . $row['Nombre'] ."<br>";

	       					    }
						    //echo "</table>";
						} else {
						    echo "No se encontraron resultados";
						}


					
				} catch (PDOException $exp) {
					echo ("No se logro la conexion con la base de datos: $BD, error: $exp");
				}
				return $conn;

			?>
			


		</div>

		
	<footer><div><p><i> Empresa de Gestión Estratégica en Movimiento 2023 @Copyright </i></p></div></footer>
	    </section>
	    <script src="script.js"></script>



	</body>
	</html>


	<?php 
		}else{
			header("location: InicioSesion.php");
		}


	 ?>