<?php
    
    //verificar usuario válido
    session_start();
    if(empty($_SESSION['nombreUsuario'])){
        echo "Debe autentificarse";
        exit();
    }

    //agregar codigo común
    include '../bd/conexion.php';        
?>

<html>
<head>
    <title>Agrega Cursos</title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script>    
</head>

<!-- establece foco a la caja de entrada de la clave -->
<body onLoad="javascript: document.getElementById('txtClave').focus()">

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmAddCursos' action='./qryCursos.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' border="1">
        <tr height='50'><td colspan='2' align='center'>
            <b>Agregando Cursos</b>
            <input type='hidden' id='txtOpc' name='txtOpc' value='add'>
            </td>
        </tr>                    
        <tr>
            <td>Clave</td>
            <td><input type='text' id='txtClave' name='txtClave' maxlength="9"></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type='text' id='txtNombre' name='txtNombre' maxlength="50"></td>
        </tr>
        <tr>
            <td>Instructor</td>
            <td><input type='text' id='txtInstructor' name='txtInstructor' maxlength="50"></td>
        </tr>
        <tr>
            <td>Horas</td>
            <td><input type='text' id='txtHora' name='txtHora' maxlength="50"></td>
        </tr>
        <tr>
            <td>Dias</td>
            <td><input type='text' id='txtDias' name='txtDias' maxlength="50"></td>
        </tr>
        <tr>
            <td>Lugar</td>
            <td><input type='text' id='txtLugar' name='txtLugar' maxlength="50"></td>
        </tr>
    </table>

    <!--tabla html que contenedora de botones grabar y regresar -->
    <table align="center">
    <tr height="50px">
        <td align='center'>
            <input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='grabarCursos()'>
        </td>
        <td colspan='2' align='center'>
            <input type='button' id='btnRegresar' name='btnRegresa' value='Regresar' style='width: 100px' onClick='regresarShwCursos()'>            
        </td>
    </tr>
    </table>
</form>
</body>
</html>

