<?php 
     // incluimos la conexion
     include 'conexion.php';
 
 
 $query="SELECT * FROM agenda;";
 
 $result=mysqli_query($conn, $query);
 $rows=mysqli_num_rows($result);
 
     $arraypersona = array();
 while ($tablas=mysqli_fetch_array($result)) {
 
            $arraypersona[]=$tablas;
  }
  echo json_encode($arraypersona);
 ?>
