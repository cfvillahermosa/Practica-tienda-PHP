<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include("conexion.php");
$usuario = $_SESSION['miUsuarioSesion']['usuario'];
$id_producto =$_POST['idProducto'];
$query = mysqli_query($conexion, "SELECT * FROM productos where id_producto=$id_producto ");
while ($filas = mysqli_fetch_array($query)) {
    $id_producto = $filas['id_producto'];
    $nombre = $filas['nombre'];
    $descripcion = $filas['descripcion'];
    $stock = $filas['stock'];
    $precio = $filas['precio'];
    $imagen = $filas['imagen'];
    $miProducto = array('id_producto' => $id_producto,
                        'stock' => $stock,
                        'precio' => $precio,
                        'imagen' => $imagen);
    $_SESSION['miProducto'] = $miProducto;
}
 
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
                $('#cabecera,#productoComprado').tabs({
                });
                $('#atras,#añadir,#inicio').button({
                });
            });
        </script>
    </head>
    <body>
    <center>
        <div id="cabcera" style="width: 90%;border: 10px groove #333300">
            <table style="vertical-align: middle; text-align: center;font-family: fantasy;font-size: large;">
                <tr>
                    <th><button id='inicio'><a href='index.php'>Inicio</a></button</th>
                    <th ><pre style="font-family: fantasy;font-size: x-large">      Usuario:  <?php echo $usuario ?>   </pre> </th>
                <td><button id="atras" style="height: auto;width: auto"><a href="productos.php">Volver atrás</a></button></td>
                </tr>
            </table>
        </div>
        <pre>
            


        </pre>
        <div id='productoComprado' style="height: 80%;width: 60%">
            <form action='miCarro.php' method="POST">
                <table>
                    <tr>
                        <td><img src="<?php echo $imagen ?>" style="margin: 5%"></td>
                    </tr>
                    <tr>
                        <td><input type="number" name='cantidadComprada' value='0' style="text-align: center"></td>
                    </tr>
                    <tr>
                        <th><button id='añadir'>Añadir al carro</button></th>
                    </tr>
                </table>

            </form>
        </div>
    </center>
</body>
</html>
