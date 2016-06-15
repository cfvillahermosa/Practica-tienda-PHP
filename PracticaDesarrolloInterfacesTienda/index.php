<!DOCTYPE html>

<html style="background-color: #619226">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css">
        <script src="js/jquery-1.9.1.js"></script>
        <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#alta,#login').tabs({
                });
                $('#logear,#nuevoCliente').button({
                });
            });
        </script>
    </head>
    <body>
    <center>
        <div id="introduccion" style="border: 10px groove #d0d0d0; height: auto;width: auto">
            <h2 style="font-family: fantasy">Mi tienda en PHP</h2>
            <img src="images/tienda.png">
        </div>
        <br>
        <div id="alta" style="border: 10px groove #333300; height: 90%;width: 90%">
            <img src="images/nuevocliente.jpg">
            <form action="nuevoCliente.php">
                <fieldset>
                    <legend id="alta" style="font-family: fantasy">.: Darse de alta como nuevo cliente :.</legend><br>
                    <button id="nuevoCliente">Nuevo Cliente</button>
                </fieldset>
            </form>
        </div><br>
        <div id="login" style="border: 10px groove #333300;height: 90%;width: 90%">
            <img src="images/login.jpg">
            <form action="login.php" method="post">
                <fieldset>
                    <legend id="login" style="font-family: fantasy">.: Login :. </legend><br>
                    <table style="text-align: center">
                        <tr>
                            <td> <label for="usuario" style="font-family: fantasy">Usuario ( email )</label></td>
                            <td><input type="email" name="email" required="" title="Introduczca su nombre de usuario (email)"></td>
                        </tr>
                        <tr>
                            <td><label for="contraseña" style="font-family: fantasy">Contraseña</label></td>
                            <td><input type="password" name="password" required="" title="Introduzca su contraseña"></td>

                        </tr>
                        <tr>
                            <th colspan="2" style="alignment-adjust: central"><button id="logear">Logearse</button></th>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </center>

</body>
</html>
