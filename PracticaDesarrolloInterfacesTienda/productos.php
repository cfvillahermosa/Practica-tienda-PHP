<!DOCTYPE html>
<?php
session_start();
include("conexion.php");
//Realizamos una consulta de todos nuestros productos ordenados por el nombre
$query = mysqli_query($conexion, "SELECT * FROM productos ORDER BY nombre ");
//Almacenamos en una variable (numeroRegistros) la cantidad de registros (productos) resultantes de la consulta anterior
$numeroRegistros = mysqli_num_rows($query);
/* si la variable $numeroRegistros vale 0 quiere decir que no tenemos ningún producto disponible en tienda por lo que mostramos
 * un mensaje de error al usuario indicándole que no disponemos de ningún producto en tienda
 */
if ($numeroRegistros == 0)
    echo "ERROR: No hay ningún producto disponible en tienda";
//$productosPorPagina almacenará el número de productos que se van a mostrar en cada página
$productosPorPagina = 4;
/* $cantidadPaginas almacena el número de registros divividos por los productos que 
 * queremos en cada página, en este caso queremos 4 productos por página por lo que tenemos
 * $cantidadPaginas =12/3 = 4
 */
$cantidadPaginas = $numeroRegistros / $productosPorPagina;
@$numeroPagina = $_GET['numeroPagina'];
/* $inicio es el comienzo de los registros a mostrar, si no es numérico quiere decir 
 * que es null y por lo tanto empezamos a listar los productos desde el registro 0
 */
if (is_numeric($numeroPagina))
    $inicio = ($numeroPagina - 1) * $productosPorPagina;
else
    $inicio = 0;
$query = mysqli_query($conexion, "SELECT * FROM productos ORDER BY nombre LIMIT $inicio,$productosPorPagina");
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
                $('#producto,#contenedor,#legend').tabs({
                });
                $('#pagina1,#pagina2,#pagina3,#comprar').button({
                });
            });
        </script>
    </head>
    <body>
    <center>
        
        <div id="contenedor" style="width: 50%;font-family: fantasy;font-size: x-large">
            <?php
            while ($filas = mysqli_fetch_array($query)) {
                $id_producto = $filas['id_producto'];
                $nombre = $filas['nombre'];
                $descripcion = $filas['descripcion'];
                $stock = $filas['stock'];
                $precio = $filas['precio'];
                $imagen = $filas['imagen'];
                ?>

                <div id="producto" style="border: 10px groove #333300;font-family: fantasy">
                    <h5><?php echo $nombre ?></h5>
                    <img src="<?php echo $imagen ?>">
                    <p><?php echo $precio ?> €</p>
                    <legend id="legend"><p><?php echo $descripcion ?></p></legend>
                    <br>
                    <form action="comprar.php" method="POST">
                        <input hidden="" name='idProducto' value="<?php echo $id_producto?>">
                        <button id='comprar'>Comprar</button>
                    </form>
                </div>
                <?php
            }
            for ($i = 1; $i <= $cantidadPaginas; $i++) {
                //if $i coincide con el número de página en el que estamos lo desactivamos para no volverlo a clickar ya que ya estamos en dicha página
                if ($i == $numeroPagina)
                    echo $i ."  ";
                else
                    echo "<button id='pagina$i' style='width=50px;height=50px'><a href='productos.php?numeroPagina=$i'>$i</a></button>";
            }
            ?>

        </div>
    </center>
<?php
    
?>
</body>

</html>
