<!DOCTYPE html>
<html lang="es">
<head>
	<title>GEM</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">

	<style type="text/css">
		h2{
			color: white;
			margin: 10px;
		}
	</style>
</head>

<body>

    <section>

	<div id="estandarte"><img src="logo.jpeg" alt="logo GEM" width="150px"> <p>Gestión Estratégica en Movimiento </p></div>
	<br>
	
	
	<div id="contenedor">
		<h2>Inicio de sesión</h2>
		<br>
		<form action = "InicioSesion.php" method="POST">
			<label for="tcuenta">Iniciar sesión como: </label><br>

			<select name="tcuenta" id="opciones_usuario">
				<option value="">Seleccione tipo de perfil</option>	
				<option value="admin">Administrador</option>
				<option value="empleado">Empleado</option>
				<option value="cliente">Cliente</option>
			</select><br><br>

			<label for="t1">E-mail:</label><br>
			<input type="text" name="t1" placeholder="Ingrese E-mail: "><br><br>

			<label for="t2" width="50%">Contraseña</label><br>
			<input type="password" name="t2" placeholder="Ingrese Contraseña: "><br><br>

			<button type="submit" >Iniciar sesión</button>
			
			<!--<button type="button" onclick="redirigir()" >Ir</button> -->
		</form>

	</div>
	

	<div id="btnRgr">	
		<ul >
			<li><a href="Principal.php">Regresar</a></li>
			<li><a href="Registro.php">No tengo cuenta, Quiero registrarme</a></li>
		</ul>
	</div>
	<footer><div><p><i> Empresa de Gestión Estratégica en Movimiento 2023 @Copyright </i></p></div></footer>
    
    
    </section>

  <?php
// Archivo de conexión a la base de datos (por ejemplo, conexion.php)
	require('conexion.php');
	$host = "localhost";
	$BD = "provisional";
	$usuario = "lalo";
	$contra = "@f2dGeoX_GZSo9BY";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	session_start();
    $tf1 = $_POST['t1'];
    $tf2 = $_POST['t2'];
    $tipo_cuenta = $_POST['tcuenta'];

    if ($tipo_cuenta == "admin") {

	    try {
	        // Establecer conexión con la base de datos
	        /*$conn = new PDO("mysql:host=$host;dbname=$BD", $usuario, $contra);
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/

	        // Consulta para verificar las credenciales
	        $query = $conn->prepare("SELECT * FROM admin WHERE CorreoElectronico = :correo_f AND Contrasenia = :contra_f");

	        //Se enlaza la credenciales inicializadas en la consuta con las variables traidas desde el formulario
	        $query->bindParam(":correo_f", $tf1);
	        $query->bindParam(":contra_f", $tf2);
	        //Se ejecuta verificacion
	        $query->execute();

	        // Obtener el usuario
	        $user = $query->fetch(PDO::FETCH_ASSOC);

	        if ($user) {
	            // Iniciar sesión
	            $_SESSION['admin'] = $user['CorreoElectronico'];
	            $_SESSION['contra'] = $user['Contrasenia'];

	            // Redirigir al usuario a la página de inicio después del inicio de sesión exitoso
	            header("Location: InicioSesionAdmin.php");
	            exit();
	        } else {
	            echo "Nombre de usuario y/o contraseña incorrectos";
	        }
	    } catch (PDOException $e) {
	        echo "Error de conexión: " . $e->getMessage();
	    }
	}
	elseif ($tipo_cuenta=="empleado") {
		try {
	        // Establecer conexión con la base de datos
	        $conn = new PDO("mysql:host=$host;dbname=$BD", $usuario, $contra);
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	        // Consulta para verificar las credenciales
	        $query = $conn->prepare("SELECT * FROM empleados WHERE CorreoElectronico = :correo_f AND Contrasenia = :contra_f");

	        //Se enlaza la credenciales inicializadas en la consuta con las variables traidas desde el formulario
	        $query->bindParam(":correo_f", $tf1);
	        $query->bindParam(":contra_f", $tf2);
	        //Se ejecuta verificacion
	        $query->execute();

	        // Obtener el usuario
	        $user = $query->fetch(PDO::FETCH_ASSOC);

	        if ($user) {
	            // Iniciar sesión
	            $_SESSION['empleado'] = $user['CorreoElectronico'];
	            $_SESSION['contra'] = $user['Contrasenia'];

	            // Redirigir al usuario a la página de inicio después del inicio de sesión exitoso
	            header("Location: InicioSesionEmpleado.php");
	            exit();
	        } else {
	            echo "Nombre de usuario y/o contraseña incorrectos";
	        }
	    } catch (PDOException $e) {
	        echo "Error de conexión: " . $e->getMessage();
	    }
	}
	elseif ($tipo_cuenta=="cliente") {
		try {
	        // Establecer conexión con la base de datos
	        $conn = new PDO("mysql:host=$host;dbname=$BD", $usuario, $contra);
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	        // Consulta para verificar las credenciales
	        $query = $conn->prepare("SELECT * FROM clientes WHERE CorreoElectronico = :correo_f AND Contrasenia = :contra_f");

	        //Se enlaza la credenciales inicializadas en la consuta con las variables traidas desde el formulario
	        $query->bindParam(":correo_f", $tf1);
	        $query->bindParam(":contra_f", $tf2);
	        //Se ejecuta verificacion
	        $query->execute();

	        // Obtener el usuario
	        $user = $query->fetch(PDO::FETCH_ASSOC);

	        if ($user) {
	            // Iniciar sesión
	            $_SESSION['cliente'] = $user['CorreoElectronico'];
	            $_SESSION['contra'] = $user['Contrasenia'];

	            // Redirigir al usuario a la página de inicio después del inicio de sesión exitoso
	            header("Location: InicioSesionCliente.php");
	            exit();
	        } else {
	            echo "Nombre de usuario y/o contraseña incorrectos";
	        }
	    } catch (PDOException $e) {
	        echo "Error de conexión: " . $e->getMessage();
	    }
	}
	else{
			echo "<p>No se seleccionó tipo de cuenta</p>";
	}

	}//final de la solicitud de server

?>


</body>
</html>