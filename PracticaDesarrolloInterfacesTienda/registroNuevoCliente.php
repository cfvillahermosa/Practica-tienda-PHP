<!DOCTYPE html>

<html style="background-color: #619226">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css">
        <script src="js/jquery-1.9.1.js"></script>
        <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
                <script type="text/javascript">
            $(document).ready(function() {
                $('#error,#enhorabuena').tabs({
                });
                $('#imprimir,#volverInicio').button({
                });
            });
        </script>
    </head>
    <body>
        <?php
        //incluimos nuestro archivo conexion.php en el que se realiza la conexion a nuestra base de datos tienda
        include('conexion.php');
        //variables definidas para recoger los datos introducidos por el usuario en el formulario
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        include('conexion.php');
        /*
         * Realizamos una query para comprobar si el email introducido ya existe, si existe lanzamos un mensaje de error al usuario, si no existe damos de alta
         * un nuevo cliente y lo insertamos en nuestra base de datos
         */
        $queryComprobacionUsuario = mysqli_query($conexion, "SELECT email FROM clientes WHERE email='$email'");
        if (mysqli_num_rows($queryComprobacionUsuario) == 1) {
            echo "<center>"
            . "<div id='error' style='border: 10px groove #333300;height:60% auto;width: 60%'>"
                    . "<img src='images/error.png' style='height: 55%;width:55%'>"
                    . "<h1 >Lo sentimos pero el usuario introducido ya existe</h1>"
                    . "</div>"
                    . "</center>";
        } 
        else {
            $queryInsercionCliente = mysqli_query($conexion, "INSERT INTO clientes (nombre,apellido1,apellido2,email,password) 
        VALUES ('$nombre','$apellido1','$apellido2','$email','$contraseña')") or die("No se pudo ejecutar la consulta seleccionada");
            mysqli_close($conexion);
            echo "<center>"
            . "<div id='enhorabuena' style='border: 10px groove #333300;height: 60%; width: 60%'>"
                    . "<img src='images/enhorabuena.png' style='height: 55%; width: 55%'></br>"
                    . "<h1>Usted se ha registrado como nuevo cliente</h1><br>"
                    . "<h2>Sus datos son los siguientes, por favor, anote los datos o imprímalos para recordarlos</h2>"
                    . "<table style='text-align: center';font-family: 'fantasy'>"
                    . "<tr>"
                    . "<td>Nombre ---> </td>"
                    . "<td>$nombre</td>"
                    . "</tr>"
                    . "<tr>"
                    . "<td>Primer apellido ---> </td>"
                    . "<td>$apellido1</td>"
                    . "</tr>"
                    . "<tr>"
                    . "<td>Segundo Apellido ---> </td>"
                    . "<td>$apellido2</td>"
                    . "</tr>"
                    . "<tr>"
                    . "<td>Email ---> </td>"
                    . "<td>$email</td>"
                    . "</tr>"
                    . "<tr>"
                    . "<td>Contraseña ---> </td>"
                    . "<td>$contraseña</td>"
                    . "</tr>"
                    . "<tr><td></br></td></tr>"
                    . "<tr>"
                    . "<td><button id='imprimir' onclick=imprimir();>Imprimir</button></td>"
                    . "<td><button id='volverInicio'><a href='index.php'>Inicio</a></button></td>"
                    . "</tr>"
                    . "</table><br>"
                    . "</div>"
                    . "</center>";
        }
        ?>
    </body>
    <script>
        function imprimir(){
            window.print();
        }
    </script>
</html>
