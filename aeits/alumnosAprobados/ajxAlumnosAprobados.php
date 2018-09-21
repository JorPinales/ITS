<?php
	
	//verificar usuario válido
    session_start();
    if(empty($_SESSION['nombreUsuario'])){
            echo "Debe autentificarse";
            exit();
    }
    //agregar codigo común
   
    include '../bd/conexion.php';
    //recuperar los datos de la interfaz html
    $clave 		= $_GET['varAtributo'];
    $txtLike 	= $_GET['varTxtLike'];

    //query sql con criterio de busqueda, obtiene todos los registros ordenados por nombre
//	$strQry = "SELECT * FROM instructor ORDER BY nombre";
    
    $strQry = "SELECT * FROM alumnosAprobados WHERE $clave LIKE '$txtLike%' ORDER BY id";
    //variable sesion para ser usada en los reportes
   
   	$_SESSION['strQry'] = $strQry;    

    $tablaBD	 = mysqli_query($link,$strQry) or die("Error al ejecutar: ".mysqli_error());                    

    echo "
    <div id='divScroll'  style='overflow:auto; 
                         align-content:center; 
                         margin-left:auto; 
                         margin-right:auto;
                         overflow-x: hidden;'>
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
                </tr>            </thead> 
        <tbody style='overflow:auto;'>
        <tr><td colspan='2'>&nbsp</td></tr>                    
        ";
        //desplegar los registros de la tabla especialidades de la bd
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
                        >
                        <td width='100'>$matricula</td>
                        <td width='100'>$nombre</td>
                        <td width='100'>$apPaterno</td>
                        <td width='100'>$apMaterno</td>  
                        <td width='100'>$email</td> 
                        <td width='100'>$especialidad</td>  
                        <td width='100'>$cursoNombre</td> 
                        <td width='100'>$estado</td>                                          
                      </tr>";
        }          
        echo "</tbody></table></div></div>";
?>