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
    $matricula = $_POST['txtMatricula'];
    $nombre = $_POST['txtNombre']; 
    $apPaterno = $_POST['txtApPaterno']; 
    $apMaterno = $_POST['txtApMaterno'];
    $email = $_POST['txtEmail'];  
    $especialidad = $_POST['especialidad'];
    $cursoNombre = $_POST['cursoNombre'];
    $estado = $_POST['estado'];
    
    switch($opcion){        

        case 'add':
            //opción de agregar registro
            $strQry = "INSERT INTO alumnos (matricula, nombre, apPaterno, apMaterno, email, especialidad, cursoNombre, estado) VALUES ('$matricula','$nombre','$apPaterno', '$apMaterno', '$email', '$especialidad','$cursoNombre','$estado')";            
            $result = mysqli_query($link,$strQry) or die("** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='./addAlumnosProf.php'</script>
                 ";                        
            break;
        
        case 'upd':
            //opción de modificar registro
            $strQry = "UPDATE alumnos SET matricula = '$matricula', nombre = '$nombre', apPaterno = '$apPaterno' , apMaterno = '$apMaterno', email = '$email', especialidad = '$especialidad', cursoNombre = '$cursoNombre', estado = '$estado' WHERE id = $id";            
            $result = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='../inicio/menuProf.php'</script>
                 ";                        
            break;

        case 'del':
            //opción de eliminar registro        
            $strQry = 'DELETE FROM alumnos WHERE id = '.$id;                          
            $result = mysqli_query($link,$strQry) or 
            die('* Error al ejecutar el procedimiento almacenado: '.mysqli_error());
            header('Location:../inicio/menuProf.php');
            break;

    }
?>