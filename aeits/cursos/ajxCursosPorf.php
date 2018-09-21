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
    
    $strQry = "SELECT * FROM cursos WHERE $clave LIKE '$txtLike%' ORDER BY id";
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
                    <th width='136' height='10'>Clave</th>
                    <th width ='237'>Nombre</th>
                    <th width ='156'>Instructor</th>
                    <th width ='156'>Hora</th>
                    <th width ='157'>Dias</th>
                    <th width ='157'>Lugar</th>
                </tr>
            </thead> 
        <tbody style='overflow:auto;'>
        <tr><td colspan='2'>&nbsp</td></tr>                    
        ";
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
                      </tr>";
        }          
        echo "</tbody></table></div></div>";
?>