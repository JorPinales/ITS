<?php

    //verificar usuario válido
    session_start();
     

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
            <title></title>
            <script src="../jquery/jquery.js"></script>
           	<script src="../dataTables/DataTables/DataTables-1.10.16/js/jquery.dataTables.js"></script>
           	<link rel="stylesheet" type="text/css" href="../dataTables/DataTables/DataTables-1.10.16/css/jquery.dataTables.css">
           	
        </head>
        <body>
        <table id="tabla">            
            <thead> 
                <tr>
                    <th width='50' height='20'>Clave</th>
                    <th height='30'>Nombre</th>
                    <th height='30'>Instructor</th>
                    <th height='30'>Hora</th>
                    <th height='30'>Dias</th>
                    <th height='30'>Lugar</th>
                </tr>
            </thead>  

            <tbody>                   

            <?php
            while ($registro = mysqli_fetch_array($tablaBD)) {
                $id      = $registro['id'];
                $clave   = $registro['clave'];
                $nombre  = $registro['nombre']; 
                $instructor  = $registro['instructor']; 
                $hora  = $registro['hora'];
                $dias  = $registro['dias']; 
                $lugar  = $registro['lugar']; 
                echo "<tr>
                        <td width='50'>$clave</td>
                        <td>$nombre</td>
                    <th height='20'>$instructor</th>
                    <th height='20'>$hora</th>
                    <th height='20'>$dias</th>
                    <th height='20'>$lugar</th>
                      </tr>";          
            }              
            echo " 
            
            </tbody>
                  </table>

            <script>
                    $(document).ready( function () {
                    $('#tabla').DataTable();
                    } );
            </script>
                  </div>
                  </div>";
        }
        
        else {
            //notificar que no existen registros en la tabla de especialidades
            echo " 
            <table border='0' align='center' bordercolor='#FF3333'>
            <tr><td></td></tr>
            <tr align='center'>
                    <td align='center'><font color='#FF3333'>No hay registros</font></td>
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

