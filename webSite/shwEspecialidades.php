<?php
ini_set('display_errors',1); ini_set('display_startup_errors',1); error_reporting(-1);
$dbpass="PASSWORD";
#Discrimiacion de caracteres

#leer objetos html
$pass=$_POST['txtContrasena'];
$user=$_POST['txtUsuario'];


$host="localhost";
$dbuser="root";
$db="kardex";

session_start();

#conexion con la base de datos
$link=mysqli_connect($host,$dbuser,$dbpass,$db);
#marca error si no se puede conectar a la base de datos
if(mysqli_connect_error()){
	echo'<script>'.
	'alert("No se pudo conectar con la base de datos.");'.
	'</script>';
}

$qry="SELECT * FROM especialidad ORDER BY id";

$tablaBD=mysqli_query($link,$qry);

if (mysql_num_rows($tablaBD)>0) {
?>

<html>
<head>
	<title>MSB shEspecidalidades</title>
	<script type='text/javascript'>
		function enviar(){
			window.location.href = 'addEspecialidades.php';
		}
		function actualizar(id){
			document.getElementById('txtId').value =id;
			document.getElementById('txtOpc').value ='upd';
			window.location.href = 'updEspecialidades.php';
			
		}
	</script>
</head>

<body>

<table align='center' width='400' border='0'>
	<tr><td colspan='2' align='right'>
		<input type="hidden" id = "txtOpc" name="txtOpc" value=''>
		<input type="hidden" id = "txtId" name="txtId" value=''>
		
		<input type='button' id ='btnAgregar' name='btnAgregar' value='Agregar'
		onclick='enviar()'>
		//'javascript:window.location.href = \"addEspecialidades.php\"
	</td></tr>
	<table>
		<div id='divScroll' style='overflow: auto;
									align-content:center;
									margin-left: auto;
									margin-right: auto;
									overflow-x: hidden;'>
	<table align='center' border='1' width='400'>
		<thead style='position: fixed !important;'>
			<tr style='background-color: #BAB7B7'>
				<th width= '50' height='20'>Clave</th>
				<th height='20'>Nombre</th>
			</tr>
		</thead>
		<tbody style='overflow:auto;'>
		<tr><td colspan='2'>&nbsp</td></tr>";
<?php
		while ($registro = mysqli_fetch_array($tablaBD)) {
			$id = $registro['id'];
			$clave = $registro['calve'];
			$nombre = $registro['nombre'];
			echo "<tr 
					onMouseOver='javascript: this.bgColor=\" #FFFFFF\";'
					onMouseOver='javascript: this.bgColor=\" #FFFFFF\";'
					onclick=\"actualizar($id)\";>
					<td> width = '50'>$clave</td>
					<td>$nombre</td>
					</tr>";
		}echo "</tbody></table></div>";
}


else{
echo "<table border = '0' align='center' bordercolor='#FF3333'>
<tr><td></td></tr>
<tr align = 'center'>
<td align='center'><font color='#FF3333'> No existen registros en la tabla de Especialidades
</tr>
</table>
</div>
</body>
</html>";
}
mysqli_free_result()$link,$tablaBD);
mysqli_close($link);
	?>foo