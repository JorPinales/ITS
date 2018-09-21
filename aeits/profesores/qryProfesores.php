<?php    

    //verificar usuario válido
   session_start();
    if(empty($_SESSION['nombreUsuario'])){
            echo "Debe autentificarse";
            exit();
    }
    
    //agregar codigo común
    include '../bd/conexion.php';

    //recuperar datos de interfaz html
    $opcion = $_POST['txtOpc'];
    $id     = $_POST['txtId'];
    $clave = $_POST['txtClave'];
    $nombre = $_POST['txtNombre']; 
    $apPaterno = $_POST['txtApPaterno']; 
    $apMaterno = $_POST['txtApMaterno'];
    $claveCurso = $_POST['txtClaveCurso'];  
    $cursoNombre = $_POST['cursoNombre'];
    
    switch($opcion){        

        case 'add':
            //opción de agregar registro
            $strQry = "INSERT INTO instructor (claveEmpleado, nombre, apPaterno, apMaterno, cursoImpartido, cursoNombre) VALUES ('$clave','$nombre','$apPaterno', '$apMaterno', '$claveCurso', '$cursoNombre')";            
            $result = mysqli_query($link,$strQry) or die("** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='./addProfesores.php'</script>
                 ";                        
            break;
        
        case 'upd':
            //opción de modificar registro
            $strQry = "UPDATE instructor SET claveEmpleado = '$clave', nombre = '$nombre', apPaterno = '$apPaterno' , apMaterno = '$apMaterno', cursoImpartido='$claveCurso', cursoNombre = '$cursoNombre' WHERE id = $id";            
            $result = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='../inicio/menuAdmin.php'</script>
                 ";                        
            break;

        case 'del':
            //opción de eliminar registro        
            $strQry = 'DELETE FROM instructor WHERE id = '.$id;                          
            $result = mysqli_query($link,$strQry) or 
            die('* Error al ejecutar el procedimiento almacenado: '.mysqli_error());
            header('Location:../inicio/menuAdmin.php');
            break;

    }
?>