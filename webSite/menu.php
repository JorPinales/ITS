<?php 
	session_start();
	if (empty($_SESSION['user'])) {
		echo "Debe autentificarse";
		exit();
	}
	$cat = $_SESSION['cat'];
?>
<html>
<head>
	<title>	</title>
</head>
	<frameset rows="25%,*">
		<frame frame src="baner.jpg">
			<frameset cols="20%,*%">
						<?php
						echo "$cat";
							switch ($cat) {
								case '1':
									echo'<frame frame src="menuAdmin.html">';
									break;
								case '2':
									echo'<frame frame src="menuProfe.html">';
									break;
								case '3':
									echo'<frame frame src="menuAlumno.html">';
									break;
							}
						?>
						<frame src="nada.html"> </frame>
					
			</frameset>
	</frameset>
</html>
