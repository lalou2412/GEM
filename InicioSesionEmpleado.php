<?php 
	session_start();
	if (isset($_SESSION['empleado'])) {
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
	</style>
</head>
<body>
	<div class="contenedor_loader">
        <div class="loader">
            <div></div>
            <div></div>
        </div></div>
    <section>
        
	<div><p>Bienvenido Empleado</p></div>

	<div id="menuAdmin">
		<ul>
			<li><a href="InicioSesionEmpleado.php">inicio</a></li>
			<li><a href="">Horario</a></li>
			<li><a href="">pedidos</a></li>
			<li><a href="">Clientes</a></li>
			<div id="menuAdmin2"><li><a href="salir.php">Cerrar Sesión</a></li></div>
			<div id="foto"><img src="sin_fotografia.png" height="50px"></div>
		</ul>
	</div>

	<div id="contenedor">
		<p>Buenos dias Emplead@</p>
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