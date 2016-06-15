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
                $('#nuevoCliente').tabs({
                });
                $('#altaNuevoCliente').button({
                });
            });
        </script>
    </head>

    <body>
    <center>
        <div id="nuevoCliente" style="border: 10px groove #333300;height:70%;width: 70%;margin-top: 5%">
            <img src="images/registroNuevoCliente.jpg"></br>
            <form method="POST" action="registroNuevoCliente.php" name="formularioNuevoCliente" id="formularioNuevoCliente" onsubmit="return comprobarContraseñasYControlarEnvioDeFormulario();">
                <fieldset>
                    <legend  id="nuevoCliente" style="font-family:fantasy;height: 55%;width: 55%" >.: Registro de nuevo Cliente :.</legend></br>
                    <table style="text-align: center">
                        <tr>
                            <td><label for="name" style="font-family: fantasy">Nombre:</label></td>
                            <td><input type="text" name="nombre" required="" title="Introduzca su nombre"></td>
                        </tr>
                        <tr>
                            <td><label for="apellido1" style="font-family: fantasy">Primer apellido:</label></td>
                            <td><input type="text" name="apellido1" value="" required="" title="Introduzca su primer apellido"></td>
                        </tr>
                        <tr>
                            <td><label for="apellido2" style="font-family: fantasy">Segundo apellido:</label></td>
                            <td><input type="text" name="apellido2" required="" title="Introduzca su segundo apellido"></td>
                        </tr>
                        <tr>
                            <td><label for="email" style="font-family: fantasy">Email:</label></td>
                            <td><input type="email" name="email" required="Introduzca su email"></td>
                        </tr>
                        <tr>
                            <td><label for="contraseña" style="font-family: fantasy">Contraseña:</label></td>
                            <td><input type="password" name="contraseña" required="" title="Introduzca una contraseña"></td>
                            <td style="font-family: fantasy">(Máximo 16 caracteres)</td>
                        </tr>
                        <tr>
                            <td><label for="repcontraseña" style="font-family: fantasy">Repetir Contraseña:</label></td>
                            <td><input type="password" name="repcontraseña" required="" title="Confirme su contraseña"><br></td>
                            <td style="font-family: fantasy">(Máximo 16 caracteres)</td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="3"><button id="altaNuevoCliente" onclick="comprobarContraseñas()">Darse de alta</button></th>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </center>
</body>
<script>
    /*
     * Función que me comprueba si las 2 contraseñas introducidas en el formulario coinciden
     * en caso de que no coincidan manda una alerta al usuario indicándole de que las contraseñas no son coincidentes y le pide que rellene el formulario correctamente
     */

    function comprobarContraseñasYControlarEnvioDeFormulario() {
        var miFormularioNuevoCliente = document.getElementById("formularioNuevoCliente");
        var contraseña = miFormularioNuevoCliente[5];
        var repContraseña = miFormularioNuevoCliente[6];
        if (contraseña.value == repContraseña.value) {
            miFormularioNuevoCliente.submit();
            return true;
        }
        else {
            alert("Las contraseñas introducidas no son iguales, por favor, rellene correctamente el formulario");
            return false;
        }
    }



</script>
</html>
