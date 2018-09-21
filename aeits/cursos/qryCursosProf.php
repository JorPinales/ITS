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
    $clave  = $_POST['txtClave'];
    $nombre = $_POST['txtNombre']; 
    $instructor = $_POST['txtInstructor'];
    $hora = $_POST['txtHora']; 
    $dias = $_POST['txtDias']; 
    $lugar = $_POST['txtLugar']; 


    switch($opcion){        

        case 'add':
            //opción de agregar registro
            $strQry = "INSERT INTO cursos (clave, nombre, instructor, hora, dias, lugar) VALUES ('$clave','$nombre', '$instructor', '$hora','$dias','$lugar')";            
            $result = mysqli_query($link,$strQry) or die("** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='./addCursos.php'</script>
                 ";                        
            break;
        
        case 'upd':
            //opción de modificar registro
            $strQry = "UPDATE cursos SET clave = '$clave', nombre = '$nombre', instructor = '$instructor', hora = '$hora', dias = '$dias', lugar = '$lugar'  WHERE id = $id";            
            $result = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='../inicio/menuAdmin.php'</script>
                 ";                        
            break;

        case 'del':
            //opción de eliminar registro        
            $strQry = 'DELETE FROM cursos WHERE id = '.$id;                          
            $result = mysqli_query($link,$strQry) or 
            die('*** Error al ejecutar el procedimiento almacenado: '.mysqli_error());
            header('Location:../inicio/menuAdmin.php');
            break;

    }
?>