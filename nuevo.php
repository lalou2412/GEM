<?php

			$directorio = 'C:/xampp/htdocs/carpetaje'; // Ruta absoluta en Windows
$archivos = scandir($directorio);
foreach ($archivos as $archivo) {
    echo $archivo . "<br>";
}

		?>