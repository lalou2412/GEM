<?php 
	$conexion = null;
	$host = "localhost";
	$BD = "provisional";
	$usuario = "lalo";
	$contra = "@f2dGeoX_GZSo9BY";
	try {
			$conn = new PDO ("mysql:host = $host; dbname=$BD",$usuario, $contra);	
			echo "<p>Se concreto la conexion con la BD: ".$BD ."</p>";
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $ex) {
		echo "No se concreto conexion con la BD:". $BD;	
		echo "Error de conexión: " . $ex->getMessage();
	}
	return $conexion;
 ?>