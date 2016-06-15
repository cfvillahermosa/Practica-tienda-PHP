<!DOCTYPE html>
<?php
//recogemos los datos necesarios para el login
        $usuario = $_POST['email'];
        $contraseña = $_POST['password'];
//iniciamos la sesion
session_start();
?>

<html style="background-color: #619226">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css">
        <script src="js/jquery-1.9.1.js"></script>
        <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#error,#bienvenido').tabs({
                });
                $('#volverInicio,#productos,#miCarrito').button({
                });
            });
        </script>
    </head>
    <body>
        <?php
//hacemos un include a conexion.php para poder realizar la conexion a nuestra base de datos "tienda"
        include('conexion.php');
//realizamos una query para seleccionar todos los clientes de nuestra base de datos
        $query = mysqli_query($conexion, "SELECT * FROM clientes") or die("no se pudo realizar la consulta especificada");
//declaramos una variable bandera para finalizar la busqueda una vez que se haya encontrado al usuario
        $encontrado = "false";
        $error = false;
//buscamos dentro de nuestros clientes el cliente logeado para ver si existe
        while ($filas = mysqli_fetch_array($query) and $encontrado = "false") {
            $nombre = $filas['nombre'];
            $pass = $filas['password'];
            $user = $filas['email'];
            $ape1 = $filas['apellido1'];
            $ape2 = $filas['apellido2'];
            //su existe le mostramos un mensaje de bienvenida
                if ($usuario == $user and $contraseña == $pass) {
                    echo "<center>"
                    . "<div id='bienvenido' style='border: 10px groove #333300;height: 60%; width: 60%'>"
                            . "<img src='images/bienvenido.png' style='height: 50%; width:50%'>"
                            . "<h2>!! Bienvenido ¡¡ </h2> <h1><i> $nombre $ape1 $ape2 </i></h1> <h2>vaya a la tienda (entrar en la tienda) para consultar nuestros productos</h2>"
                            . "<table>"
                            . "<tr>"
                            . "<td><button id='productos'><a href='productos.php'>Entrar en la Tienda</a></button></td>"
                            . "</tr>"
                            . "</table>"
                            . "</div>"
                            . "</center>";
                    $miSesion = array('nombre' => $nombre,
                        'usuario' => $user,
                        'contraseña' => $pass);
                    $_SESSION['miUsuarioSesion'] = $miSesion;
                    $encontrado = "true"; 
                    exit;
                } else
                    $error = true;
            
        }
        //si no existe le mostramos un mensaje de error
        if ($error == true) {
            echo "<center>"
            . "<div id='error' style='border: 10px groove #333300;height:60% auto;width: 60%'>"
            . "<img src='images/error.png' style='height:50%;width:50%'>"
            . "<h1 >Lo sentimos pero el usuario introducido o la contraseña o ambas son incorrectos, por favor vuelva a introducir sus datos correctamente</h1>"
            . "<button id='volverInicio'><a href='index.php'>Inicio</a></button>"
            . "</div>"
            . "</center>";
        }   
        ?>
    </body>
</html>
