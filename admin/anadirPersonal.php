<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>RevoSport.com</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="../css/matrix-style.css" />
  <link rel="stylesheet" href="../css/matrix-media.css" />
  <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
  <link href="../font-awesome/css/all.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

  <!--Header-part-->
  <div id="header">
    <h1><a href="dashboard.html">administrador de Perfect Gym</a></h1>
  </div>
  <!--close-Header-part-->

  <!--top-Header-menu-->
  <?php include 'includes/topheader.php' ?>


  <!--sidebar-menu-->
  <?php $page = 'staff-management';
  include 'includes/sidebar.php' ?>
  <!--sidebar-menu-->
  <div id="content">
    <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Ir a inicio" class="tip-bottom"><i class="fas fa-home"></i> Inicio </a> <a href="#" class="current">Gestionar personal</a>  <a href="registrarPersonal.php" class="current">Registro de personal</a> </div>
      <h1 class="text-center">Registro del nuevo personal<i class="fas fa-users"></i></h1>
    </div>

    <form role="form" action="index.php" method="POST">
      <?php

      if (isset($_POST['fullname'])) {
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $designation = $_POST["designation"];
        $gender = $_POST["gender"];
        $contact = $_POST["contact"];

        $password = md5($password);

        include 'dbcon.php';
        
        $qry = "insert into personal(nombreCompleto,usuario,contraseña,email,direccion,designacion,genero,contacto) values ('$fullname','$username','$password','$email','$address','$designation','$gender','$contact')";
        $result = mysqli_query($conn, $qry); 

        if (!$result) {
          echo "<div class='container-fluid'>";
          echo "<div class='row-fluid'>";
          echo "<div class='span12'>";
          echo "<div class='widget-box'>";
          echo "<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
          echo "<h5>Mensaje de error</h5>";
          echo "</div>";
          echo "<div class='widget-content'>";
          echo "<div class='error_ex'>";
          echo "<h1 style='color:maroon;'>Error 404</h1>";
          echo "<h3>Ocurrió un error al enviar sus datos</h3>";
          echo "<p>Por favor intentelo de nuevo</p>";
          echo "<a class='btn btn-warning btn-big'  href='personal.php'>Volver</a> </div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        } else {

          echo "<div class='container-fluid'>";
          echo "<div class='row-fluid'>";
          echo "<div class='span12'>";
          echo "<div class='widget-box'>";
          echo "<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
          echo "<h5>Mensage</h5>";
          echo "</div>";
          echo "<div class='widget-content'>";
          echo "<div class='error_ex'>";
          echo "<h1>Éxito</h1>";
          echo "<h3>¡Se han agregado los detalles del personal!</h3>";
          echo "<p>Los detalles del personal solicitado se agregan a la base de datos. Por favor, haga clic en el botón para volver.</p>";
          echo "<a class='btn btn-inverse btn-big'  href='personal.php'>Volver</a> </div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
        // 
      } else {
        echo "<h3>NO ESTÁ AUTORIZADO A REDIRIGIR ESTA PÁGINA. Volver a <a href='index.php'> Inicio </a></h3>";
      }
      ?>
    </form>
  </div>
  </div>
  </div>

  </div>
  <!--Footer-part-->
  <div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Revo Sport </a> </div>
  </div>

  <style>
    #footer {
      color: white;
    }
  </style>
  <!--end-Footer-part-->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.ui.custom.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.validate.js"></script>
  <script src="../js/jquery.wizard.js"></script>
  <script src="../js/matrix.js"></script>
  <script src="../js/matrix.wizard.js"></script>
</body>

</html>