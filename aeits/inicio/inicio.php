<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
            

    <title>Actividades Complementarias</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/one-page-wonder.min.css" rel="stylesheet">

    <script type="text/javascript" src="../js/funciones.js"></script>

<style type="text/css">
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
img.avatar {
    width: 40%;
    border-radius: 50%;
}

.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
/* Close button on hover */
.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}
</style>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Instituto Tecnologico de Saltillo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#myModal" href="#">Log In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<div class="modal fade" id="myModal" role="dialog">
   <span onclick="document.getElementById('myModal').style.display='none'" class="close" title="Close Modal">&times;</span>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form class="modal-content" action="./autentica.php" method="post">>
    
    <div class="imgcontainer">
      <img src="../img/avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Nombre de Usuario</b></label>
      <input id="user" name="user" type="text" placeholder="Usuario" name="uname" required>

      <label for="psw"><b>Contrasena</b></label>
      <input id="pass" name="pass" type="password" placeholder="Contrasena" name="psw" required>

      <button type="submit" name="enviar">Login</button>
    </div>    
    </div>
  </div>

    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">

          <h2 class="masthead-subheading mb-0">Actividades</h2>
          <h2 class="masthead-subheading mb-0">Complementarias</h2>
          <a href="#ancla" class="btn btn-primary btn-xl rounded-pill mt-5" onclick='tabla()'>Ver Actividades</a>
        </div>
      </div>
    </header>



    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="../img/img1.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Deporte y Cultura</h2>
              <p>Durante tu formación profesional en el tecnológico deberás enlistarte en dos actividades extraescolares una deportiva y otra cultural, cada una con un valor curricular de 2 créditos, siendo de carácter obligatorio para todo alumno.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

<hr class="divider">
    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="../img/img2.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <h2 class="display-4">Obligaciones</h2>
              <p>La actividad de la que decidas formar parte estará sujeta a evaluación y asistencia, tendrá duración de un semestre escolar y se calificara con un estatus de acreditado o no acreditado. No acreditar la actividad sera motivo de recursar la actividad en el semestre próximo. No realizar las actividades complementarias en tiempo y forma podrá condicionar procesos académicos y/o administrativos posteriores.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

<hr class="divider">
    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="../img/img3.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Planifica</h2>
              <p>El Instituto Tecnológico de Saltillo cuenta con una gran variedad de actividades extraescolares para ofrecer. Elige de acuerdo a tus gustos e intereses pero toma en cuenta tu horario académico, elije acorde a tus horas libres.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      
      <div class="container"> 

      
        <div id="tablaCursos"></div> 

<a name="ancla"></a>
      </div>
    </section>


    <!-- Footer -->

    <footer class="py-5 bg-black">
      <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; Jorge Pinales, Daniela Rangel</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../jquery/jquery.js"></script>
    <script src="../jquery/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
  </body>

</html>