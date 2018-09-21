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
    
    $strQry = "SELECT * FROM instructor WHERE $clave LIKE '$txtLike%' ORDER BY id";
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
                    <th width='165' height='10'>Clv</th>
                    <th width='166' >Nombre</th>
                    <th width='167' >Ap.Paterno</th>
                    <th width='167' >Ap.Materno</th>
                    <th width='167' >Clave Curso</th>
                    <th width='167' >Curso</th>
                </tr>
            </thead> 
        <tbody style='overflow:auto;'>
        <tr><td colspan='2'>&nbsp</td></tr>                    
        ";
        //desplegar los registros de la tabla especialidades de la bd
        while ($registro = mysqli_fetch_array($tablaBD)) {
               $id      = $registro['id'];
                $clave   = $registro['claveEmpleado'];
                $nombre  = $registro['nombre']; 
                $apPaterno = $registro['apPaterno'];
                $apMaterno = $registro['apMaterno'];
                $cursoImpartido = $registro['cursoImpartido'];
                $cursoNombre = $registro['cursoNombre'];
                echo "<tr
                        onMouseOver='javascript: this.bgColor=\"#BCF5A9\";' 
                        onMouseOut='javascript: this.bgColor=\"#FFFFFF\";'
                        onClick=\"actualizarProfesores('$id','$clave', '$nombre', '$apPaterno', '$apMaterno','$cursoImpartido','$cursoNombre')\";>
                        <td width='150'>$clave</td>
                        <td width='150'>$nombre</td>
                        <td width='150'>$apPaterno</td>
                        <td width='150'>$apMaterno</td>  
                        <td width='150'>$cursoImpartido</td> 
                        <td width='150'>$cursoNombre</td>                                           
                      </tr>";
        }          
        echo "</tbody></table></div></div>";
?>