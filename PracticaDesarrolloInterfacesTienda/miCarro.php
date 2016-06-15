<!DOCTYPE html>
<?php
session_start();
include("conexion.php");
$usuario = $_SESSION['miUsuarioSesion']['usuario'];
$id_producto = $_SESSION['miProducto']['id_producto'];
$cantidad = $_POST['cantidadComprada'];
$imagen_pedido = $_SESSION['miProducto']['imagen'];
//comprobamos si la cantidad pedida por el usuario no supera a la de nuestro stock
$query = mysqli_query($conexion, "SELECT stock FROM productos WHERE id_producto = $id_producto");
$stockSuperado = false;
while ($fila = mysqli_fetch_array($query)) {
    $stock = $fila['stock'];
}
$stock = $stock - $cantidad;
if ($stock >= 0) {
    $query = mysqli_query($conexion, "UPDATE productos SET stock = $stock WHERE id_producto = $id_producto");
} else {
    $stockSuperado = true;
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
                $('#cabecera,#producto').tabs({
                });
                $('#inicio,#atras').button({
                });
            });
        </script>
    </head>
    <body>
    <center>
        <div id="cabcera" style="width: auto;border: 10px groove #333300;margin: 5%">
            <table style="vertical-align: middle; text-align: center;font-family: fantasy;font-size: large;">
                <tr>
                    <th><button id='inicio'><a href='index.php'>Inicio</a></button</th>
                    <th ><pre style="font-family: fantasy;font-size: x-large">      Usuario:  <?php echo $usuario ?>   </pre> </th>
                <td><pre>   </pre></td>
                <td><button id="atras" style="height: auto;width: auto"><a href="productos.php">Volver atrás</a></button></td>
                </tr>
            </table>
        </div>
    </center>
        <?php
        if ($stockSuperado == true) {
            echo "<center>"
            . "<br><br><div id='error' style='border: 10px groove #333300;height:40% auto;width: 40%;font-family: fantasy'>"
            . "<img src='images/error.png' style='height: 55%;width:55%'>"
            . "<h1 >Lo sentimos pero la cantidad pedida supera nuestro stock</h1>"
            . "</div>"
            . "</center>";
        } 
        else {
            $query = mysqli_query($conexion, "INSERT INTO pedidos (id_pedido,usuario,fecha,id_producto_pedido,imagen_pedido,cantidad) 
        VALUES ('','$usuario','','$id_producto','$imagen_pedido','$cantidad')");
            $query2 = mysqli_query($conexion, "SELECT * FROM pedidos WHERE usuario = '$usuario'");
            echo                 '<center><h1 style="font-family: fantasy">Mi carro</h1><img src="images/carrito.png" style="width: 100px;height: 100px"></center>';
            while($filas = mysqli_fetch_array($query2)){
                $fecha = $filas['fecha'];
                $imagen_pedido = $filas['imagen_pedido'];
                $cantidad = $filas['cantidad'];
                ?>
    <center>
        <div id='producto' style="width: 40%">
            <h5>Fecha : <?php echo $fecha?></h5>
            <h5>Cantidad : <?php echo $cantidad?></h5>
            <img src='<?php echo $imagen_pedido?>'>
               
        </div>
    </center>
        <?php
            }
        }
        ?>
    </body>
</html>
