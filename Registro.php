<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">1
    <title>GEM</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
    <section>
        <div id="estandarte">
            <img src="logo.jpeg" alt="logo GEM" width="150px">
            <p>Gestión Estratégica en Movimiento </p>
        </div>
        <br>

        <div id="contenedor">
            <h2>Registro<br>(solo cliente)</h2>
            <form action="Registro.php" method="POST">
                <label for="nombre">Nombre Completo:</label><br>
                <input type="text" name="nombre" placeholder="Ingrese Nombre" required><br><br>

                <label for="tel">Teléfono:</label><br>
                <input type="text" name="tel" placeholder="Ingrese Teléfono" required><br><br>

                <label for="correo">E-mail:</label><br>
                <input type="email" name="correo" placeholder="Ingrese E-mail" required><br><br>

                <label for="contra">Contraseña:</label><br>
                <input type="password" name="contra" placeholder="Ingresar una contraseña" required><br><br>

                <label for="contraCf">Confirma Contraseña:</label><br>
                <input type="password" name="contraCf" placeholder="Confirmar contraseña" required><br><br>

                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="btnRgr">    
            <ul>
                <li><a href="Principal.php">Regresar</a></li>
            </ul>
        </div>
    
        <footer>
            <div>
                <p><i>Empresa de Gestión Estratégica en Movimiento 2023 @Copyright</i></p>
            </div>
        </footer>
    </section>

    <?php
        require('conexion.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Variables extraídas del formulario
            $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
            $contra_f = isset($_POST['contra']) ? $_POST['contra'] : '';
            $contra_confirmacion = isset($_POST['contraCf']) ? $_POST['contraCf'] : '';
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $telefono = isset($_POST['tel']) ? $_POST['tel'] : '';
            $tipocuenta = "cliente";

            try {
            	

                require('conexion.php');

                if ($contra_f != $contra_confirmacion) {
                    echo "Las contraseñas no coinciden. Intenta de nuevo.";
                    echo "contraseña:".$contra;
                    echo "Confirmacion:".$contra_confirmacion;
                    exit();
                } else {
                    $sql = "INSERT INTO clientes (CorreoElectronico, Contrasenia, TipoCuenta, Nombre, Telefono) VALUES (:Correo_I, :Contra_I, :Tipo_cuenta_I, :Nombre_I, :Telefono_I)";
                    
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':Correo_I', $correo);
                    $stmt->bindParam(':Contra_I', $contra_f);
                    $stmt->bindParam(':Tipo_cuenta_I', $tipocuenta);
                    $stmt->bindParam(':Nombre_I', $nombre);
                    $stmt->bindParam(':Telefono_I', $telefono);
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