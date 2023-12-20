<?php  
	session_start();
	if (isset($_SESSION['admin'])) {
		// code...
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro de administrador, desde un perfil de administrador</title>
</head>
<body>

	<form action="RegistroEmpleado-Admin.php" method="POST">
		<label for="nombre">Nombre Completo:</label><br>
	    <input type="text" name="nombre" placeholder="Ingrese Nombre" required><br><br>

	    <label for="correo">E-mail:</label><br>
	    <input type="email" name="correo" placeholder="Ingrese E-mail" required><br><br>

	    <label for="contra">Contraseña:</label><br>
	    <input type="password" name="contra" placeholder="Ingresar una contraseña" required><br><br>

	    <label for="contraCf">Confirma Contraseña:</label><br>
	    <input type="password" name="contraCf" placeholder="Confirmar contraseña" required><br><br>

	    <input type="submit" name="enviar">
	</form>

	<?php  
		require('conexion.php');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// code...
			// Variables extraídas del formulario
            $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
            $contra_f = isset($_POST['contra']) ? $_POST['contra'] : '';
            $contra_confirmacion = isset($_POST['contraCf']) ? $_POST['contraCf'] : '';
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $tipocuenta = "administrador";
		
				try {
		            	
						//se solicita la conexion a través del archivo conexion.php
		                require('conexion.php');

		                if ($contra_f != $contra_confirmacion) {
		                    echo "Las contraseñas no coinciden. Intenta de nuevo.";
		                    echo "contraseña:".$contra;
		                    echo "Confirmacion:".$contra_confirmacion;
		                    exit();
		                } else {
		                    $sql = "INSERT INTO empleados (CorreoElectronico, Contrasenia, TipoCuenta, Nombre) VALUES (:Correo_I, :Contra_I, :Tipo_cuenta_I, :Nombre_I)";
		                    
		                    $stmt = $conn->prepare($sql);
		                    $stmt->bindParam(':Correo_I', $correo);
		                    $stmt->bindParam(':Contra_I', $contra_f);
		                    $stmt->bindParam(':Tipo_cuenta_I', $tipocuenta);
		                    $stmt->bindParam(':Nombre_I', $nombre);
		                    $stmt->execute();
		                    echo "Registro exitoso";
		                }

		            } catch (Exception $ex) {
		                echo "No se pudo completar el guardado";
		                echo "Error de conexión: " . $ex->getMessage();
		            }

		            $conn = null;
		}
	?>

</body>
</html>

<?php 
		}else{
			header("location: InicioSesion.php");
		}


	 ?>
