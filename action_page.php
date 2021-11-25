<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Remis Ya - Datos de usuario nuevo</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
       
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
      
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <body>
        <p> <a href="/index.html">Volver a Remis Ya</a> </p>

        <div id="mensaje"></div>

        <?php

        $nombre = $_POST ["nombre"];
        $apellido = $_POST ["apellido"];
        $telefono = $_POST ["telefono"];
        $dni = $_POST ["dni"];
        $date = $_POST ["fecha_de_nacimiento"];
        $barrio = $_POST ["barrio"];
        $direccion = $_POST ["direccion"];

        print " <p>Su nombre es <strong>$nombre</strong>.</p> \n ";
        print " \n";
        print " <p>Su apellido es <strong>$apellido</strong>.</p> \n ";
        print " \n";
        print " <p>Su telefono es <strong>$telefono</strong>.</p> \n ";
        print " \n";
        print " <p>Su dni, su usuario y su nueva contraseña es <strong>$dni</strong>.</p> \n ";
        print " \n";
        print " <p>Su fecha de nacimiento es <strong>$date</strong>.</p> \n ";
        print " \n";
        print " <p>El barrio donde usted reside es <strong>$barrio</strong>.</p> \n ";
        print " \n";
        print " <p>Su domicilio es <strong>$direccion</strong>.</p> \n ";
        print " \n";


        include ["/datosDB.php"];
        $con = new mysqli ($host, $usuario, $clave, $basededatos) or die ("No se ha podido conectar al servidor de Base de Datos");
        if (!$con)
        {
            die ("Conexión fallida: " . mysqli_connect_error());
        }

        $db = mysqli_select_db ($conn, $basededatos) or die ("No se pudo conectar a la base de datos");
        $consulta = "INSERT INTO infousuario (nombre, apellido, telefono, dni, fecha de nacimiento, barrio, direccion) VALUES ($nombre, $apellido, $telefono, $dni, $date, $barrio, $direccion )";

        if (mysqli_query ($con, $consulta))
        {
            echo "<p>Registro agregado.</p>";
        }else
        {
            echo "<p>No se agrego nuevo registro</p>";
            echo "Error: " . $consulta . "<br>" . mysqli_error ($con);
        }
        mysqli_close ($con);

        ?>

        
    </body>