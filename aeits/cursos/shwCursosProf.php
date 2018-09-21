<?php

    //verificar usuario válido
    session_start();
    if(empty($_SESSION['nombreUsuario'])){
            echo "Debe autentificarse";
            exit();
    }
    

    //agregar codigo común
    include '../bd/conexion.php';


    //obtener colección de registros temporales

    //query sql sin criterio de busqueda, obtiene todos los registros ordenados por nombre
    $strQry = "SELECT * FROM cursos ORDER BY nombre";

    //variable sesion para ser usada en los reportes, son los registros a imprimir
    $_SESSION['strQry'] = $strQry;

    //ejecutar el query
    $tablaBD = mysqli_query($link, $strQry);
     
    //si existen registros crear tabla
    if (mysqli_num_rows($tablaBD)>0){        
        ?>

        <html>

        <head>       
            <title>claseDAWEB shwCursos</title> 
            <!-- funciones javascript  --> 
            <script type="text/javascript" src="../js/funciones.js"></script>
        </head>

        <body>

        <!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
        <form id='frmUpdCursos' action='../cursos/updCursos.php' method='POST'>        

        <!--tabla html que contenedora de botones buscar, imprimir y agregar -->
        <table align='center' width='600' border='0'>
            <tr><td colspan='1' align='center'>

                <!-- obtener los datos seleccionados por el usuario al hacer click
                     en la tabla que muestra los registros, 
                     truco para evitar visitar al servidor de bd -->
                <input type='hidden' id='txtOpc' name='txtOpc' value=''>
                <input type='hidden' id='txtId' name='txtId' value=''>
                <input type='hidden' id='txtClave' name='txtClave' value=''>
                <input type='hidden' id='txtNombre' name='txtNombre' value=''>
                <input type='hidden' id='txtInstructor' name='txtInstructor' value=''>
                <input type='hidden' id='txtHora' name='txtHora' value=''>
                <input type='hidden' id='txtDias' name='txtDias' value=''>
                <input type='hidden' id='txtLugar' name='txtLugar' value=''>

                <!-- ventana desplegable con los atributos de la tabla para hacer busquedas -->
                <select id='selBuscar' name='selBuscar' onClick="javascript: document.getElementById('txtBuscar').focus();">
                    <option id='optBuscar' value='clave'>Clave</option>
                    <option id='optBuscar' value='nombre'>Nombre</option>
                    <option id='optBuscar' value='instructor'>Instructor</option>
                    <option id='optBuscar' value='horaa'>Horario</option>
                    <option id='optBuscar' value='dias'>Dias</option>
                    <option id='optBuscar' value='lugar'>Lugar</option>
                </select>

                <!-- caja de texto, contiene dato del criterio de busqueda -->
                <input type='text' id='txtBuscar' name='txtBuscar' value=''
                style='width:150px;'>

                <!-- botón de buscar -->
                <input type='button' id='btnBuscar' name='btnBuscar' value='Buscar' 
                onclick='buscarCursos()'>

                <!-- botón de imprimir -->
                <input type='button' id='btnPrint' name='btnPrint' value='Imprimir' 
                onclick='imprimirCursos()'>

            </td></tr>
        </table>

        <!-- región para alojar la tabla contenedora de registros -->        
        <div id='divTabla' style='align-content:center;margin-left:auto; margin-right:auto;'>

        <!-- region con barra desplazamiento para visualizar los renglones de la tabla -->
        <div id='divScroll'  style='overflow:auto; align-content:center; margin-left:auto; 
                             margin-right:auto; overflow-x: hidden;'>

        <!-- tabla para los titulos de las columnas -->                             
        <table align='center' border='1' width='1000'>            
            <thead style='position: fixed !important;'> 
                <tr style='background-color: #BAB7B7'>
                    <th width='136' height='10'>Clave</th>
                    <th width ='237'>Nombre</th>
                    <th width ='156'>Instructor</th>
                    <th width ='156'>Hora</th>
                    <th width ='157'>Dias</th>
                    <th width ='157'>Lugar</th>
                </tr>
            </thead>  

            <!-- cuerpo de la tabla html que contiene los renglones con cada registro de 
                 la tabla de base de datos especialidades -->
            <tbody style='overflow:auto;'>
            <tr><td colspan='2'>&nbsp</td></tr>                    

            <?php
            //desplegar los registros de la tabla especialidades de la bd
            while ($registro = mysqli_fetch_array($tablaBD)) {
                $id      = $registro['id'];
                $clave   = $registro['clave'];
                $nombre  = $registro['nombre'];
                $instructor = $registro['instructor']; 
                $hora = $registro['hora']; 
                $dias = $registro['dias']; 
                $lugar = $registro['lugar']; 
                echo "<tr
                        onMouseOver='javascript: this.bgColor=\"#BCF5A9\";' 
                        onMouseOut='javascript: this.bgColor=\"#FFFFFF\";'>
                        <th width='48' height='10'>$clave</th>
                  		<th width ='100'>$nombre</th>
                    	<th width ='100'>$instructor</th>
                    	<th width ='100'>$hora</th>
                    	<th width ='100'>$dias</th>
                    	<th width ='100'>$lugar</th>
                      </tr>"; //aqui es donde selecciona el registro para modificarlo o eliminarlo           
            }                
            echo "</tbody>
                  </table>
                  </div>
                  </div>";
        }
        
        else {
            //notificar que no existen registros en la tabla de especialidades
            echo " 
            <table border='0' align='center' bordercolor='#FF3333'>
            <tr><td></td></tr>
            <tr align='center'>
                    <td align='center'><font color='#FF3333'>No existen registros en la tabla de Cursos!</font></td>
                    </tr>
            </table> 
            </div>
            </body>
        ";
        }                
    //cerrar la conexion a la bd
    mysqli_free_result($link, $tablaBD); // libera los registros de la tabla
    mysqli_close($link);    
?>

