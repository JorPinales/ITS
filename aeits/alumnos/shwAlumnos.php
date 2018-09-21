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
    $strQry = "SELECT * FROM alumnos ORDER BY nombre";

    //variable sesion para ser usada en los reportes, son los registros a imprimir
    $_SESSION['strQry'] = $strQry;

    //ejecutar el query
    $tablaBD = mysqli_query($link, $strQry);
     
    //si existen registros crear tabla
    if (mysqli_num_rows($tablaBD)>0){       
        ?>

        <html>

        <head>       
            <title></title> 
            <!-- funciones javascript  --> 
            <script type="text/javascript" src="../js/funciones.js"></script>
        </head>

        <body>

        <!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
        <form id='frmUpdAlumnos' action='../alumnos/updAlumnos.php' method='POST'>        

        <!--tabla html que contenedora de botones buscar, imprimir y agregar -->
        <table align='center' width='600' border='0'>
            <tr><td colspan='2' align='center'>

                <!-- obtener los datos seleccionados por el usuario al hacer click
                     en la tabla que muestra los registros, 
                     truco para evitar visitar al servidor de bd -->
                <input type='hidden' id='txtOpc' name='txtOpc' value=''>
                <input type='hidden' id='txtId' name='txtId' value=''>
                <input type='hidden' id='txtMatricula' name='txtMatricula' value=''>
                <input type='hidden' id='txtNombre' name='txtNombre' value=''>
                <input type='hidden' id='txtApPaterno' name='txtApPaterno' value=''>
                <input type='hidden' id='txtApMaterno' name='txtApMaterno' value=''>
                <input type='hidden' id='txtEmail' name='txtEmail' value=''>
                <input type='hidden' id='txtEspecialidad' name='txtEspecialidad' value=''>
                <input type='hidden' id='txtCursoNombre' name='txtCursoNombre' value=''>
                <input type='hidden' id='txtEstado' name='txtEstado' value=''>


                <!-- ventana desplegable con los atributos de la tabla para hacer busquedas -->
                <select id='selBuscar' name='selBuscar' onClick="javascript: document.getElementById('txtBuscar').focus();">
                    <option id='optBuscar' value='0'>Atributo</option>
                    <option id='optBuscar' value='matricula'>Matricula</option>
                    <option id='optBuscar' value='nombre'>Nombre</option>
                    <option id='optBuscar' value='apPaterno'>Apellido Paterno</option>
                    <option id='optBuscar' value='especialidad'>Especialidad</option>
                    <option id='optBuscar' value='cursoNombre'>Nombre Curso</option>
                </select>

                <!-- caja de texto, contiene dato del criterio de busqueda -->
                <input type='text' id='txtBuscar' name='txtBuscar' value=''
                style='width:150px;'>

                <!-- botón de buscar -->
                <input type='button' id='btnBuscar' name='btnBuscar' value='Buscar' 
                onclick='buscarAlumno()'>

                <!-- botón de imprimir -->
                <input type='button' id='btnPrint' name='btnPrint' value='Imprimir' 
                onclick='imprimirAlumnos()'>

                <!-- botón de agregar -->
                <input type='button' id='btnAgregar' name='btnAgregar' value='Agregar' 
                onclick='agregarAlumnos()'> 

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
                    <th width='111' height='10'>Matricula</th>
                    <th width='112' >Nombre</th>
                    <th width='112' >Ap.Paterno</th>
                    <th width='112' >Ap.Materno</th>
                    <th width='214' >Email</th>
                    <th width='112' >Especialidad</th>
                    <th width='113' >Curso</th>
                    <th width='113' >Estado</th>
                </tr>
            </thead>  

            <!-- cuerpo de la tabla html que contiene los renglones con cada registro de 
                 la tabla de base de datos profesores -->
            <tbody style='overflow:auto;'>
            <tr><td colspan='2'>&nbsp</td></tr>                    

            <?php
            //desplegar los registros de la tabla profesores de la bd
            while ($registro = mysqli_fetch_array($tablaBD)) {
                $id      = $registro['id'];
                $matricula   = $registro['matricula'];
                $nombre  = $registro['nombre']; 
                $apPaterno = $registro['apPaterno'];
                $apMaterno = $registro['apMaterno'];
                $email = $registro['email'];
                $especialidad = $registro['especialidad'];
                $cursoNombre = $registro['cursoNombre'];
                $estado = $registro['estado'];
                echo "<tr
                        onMouseOver='javascript: this.bgColor=\"#BCF5A9\";' 
                        onMouseOut='javascript: this.bgColor=\"#FFFFFF\";'
                        onClick=\"actualizarAlumnos('$id','$matricula', '$nombre', '$apPaterno', '$apMaterno','$email','$especialidad','$cursoNombre','$estado')\";>
                        <td width='100'>$matricula</td>
                        <td width='100'>$nombre</td>
                        <td width='100'>$apPaterno</td>
                        <td width='100'>$apMaterno</td>  
                        <td width='100'>$email</td> 
                        <td width='100'>$especialidad</td>  
                        <td width='100'>$cursoNombre</td> 
                        <td width='100'>$estado</td>                                          
                      </tr>"; //aqui es donde selecciona el registro para modificarlo o eliminarlo           
            }                
            echo "</tbody>
                  </table>
                  </div>
                  </div>";
        }
        
        else {
            //notificar que no existen registros en la tabla de profesores
            echo " 
            <table border='0' align='center' bordercolor='#FF3333'>
            <tr><td></td></tr>
            <tr align='center'>
                    <td align='center'><font color='#FF3333'>No existen registros en la tabla de Profesores!</font></td>
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

