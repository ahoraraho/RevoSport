<?php
session_start();

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
  <link rel="stylesheet" href="../css/fullcalendar.css" />
  <link rel="stylesheet" href="../css/matrix-style.css" />
  <link rel="stylesheet" href="../css/matrix-media.css" />
  <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
  <link href="../font-awesome/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/jquery.gritter.css" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

  <!--Header-->
  <div id="header">
    <h1><a href="dashboard.html">Administrador del sistema de gimnasio</a></h1>
  </div>



  <!--top-Header-menu-->
  <?php include 'includes/topheader.php' ?>

  <!--sidebar-menu-->
  <?php $page = 'members-entry';
  include 'includes/sidebar.php' ?>
  <!--sidebar-menu-->

  <div id="content"> <!--contenedor-->
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.html" title="Ir a inicio" class="tip-bottom"><i class="fas fa-home"></i> Inicio </a> <a href="#" class="tip-bottom">Gestionar miembros</a> <a href="#" class="current">Registrar miembros</a> </div>
      <h1>FORMULARIO PARA AGREGAR MIEMBROS</h1>
    </div>
    <form role="form" action="index.php" method="POST">
      <?php

      if (isset($_POST['nombrecompleto'])) {
        $nombrecompleto = $_POST["nombrecompleto"];
        $nombreusuario = $_POST["nombreusuario"];
        $contracena = $_POST["contracena"];
        $ingreso = $_POST["ingreso"];
        $genero = $_POST["genero"];
        $servicios = $_POST["servicios"];
        $cantidad = $_POST["cantidad"];
        $anio = date('Y');
        $fechapago = date("Y-m-d");
        $plan = $_POST["plan"];
        $direccion = $_POST["direccion"];
        $contacto = $_POST["contacto"];

        $contracena = md5($contracena);

        $totalamount = $cantidad * $plan;
        // 
        include 'dbcon.php';
        //code after connection is successfull
        $qry = "INSERT INTO miembros(nombrecompleto,nombreusuario,contracena,ingreso,genero,servicios,cantidad,anio,fechapago,plan,direccion,contacto) 
        values ('$nombrecompleto','$nombreusuario','$contracena','$ingreso','$genero','$servicios','$totalamount','$anio','$fechapago','$plan','$direccion','$contacto')";
        $result = mysqli_query($conn, $qry); //query executes

        if (!$result) {
          echo "<div class='container-fluid'>";
          echo "<div class='row-fluid'>";
          echo "<div class='span12'>";
          echo "<div class='widget-box'>";
          echo "<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
          echo "<h5>Error Mensague</h5>";
          echo "</div>";
          echo "<div class='widget-content'>";
          echo "<div class='error_ex'>";
          echo "<h1 style='color:maroon;'>Error 404</h1>";
          echo "<h3>Ocurrio un error</h3>";
          echo "<p>Por favor intentelo de nuevo</p>";
          echo "<a class='btn btn-warning btn-big'  href='editarMiembro.php'>Volver</a> </div>";
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
          echo "<h5>Mensaje</h5>";
          echo "</div>";
          echo "<div class='widget-content'>";
          echo "<div class='error_ex'>";
          echo "<h1>Éxito</h1>";
          echo "<h3>¡Se han agregado los detalles del miembro!</h3>";
          echo "<p>Se agregan los datos solicitados. Por favor, haga clic en el botón para volver.</p>";
          echo "<a class='btn btn-inverse btn-big'  href='miembros.php'>Volver</a> </div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "<h3>NO ESTÁ AUTORIZADO A REDIRIGIR ESTA PÁGINA. Volver a<a href='index.php'> INICIO </a></h3>";
      }
      ?>

    </form>
  </div> 
  </div>
  </div>
  </div>

  

  <div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Revo Sport </a> </div>
  </div>

  <style>
    #footer {
      color: white;
    }
  </style>

  <!--end-Footer-part-->

  <script src="../js/excanvas.min.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.ui.custom.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.flot.min.js"></script>
  <script src="../js/jquery.flot.resize.min.js"></script>
  <script src="../js/jquery.peity.min.js"></script>
  <script src="../js/fullcalendar.min.js"></script>
  <script src="../js/matrix.js"></script>
  <script src="../js/matrix.dashboard.js"></script>
  <script src="../js/jquery.gritter.min.js"></script>
  <script src="../js/matrix.interface.js"></script>
  <script src="../js/matrix.chat.js"></script>
  <script src="../js/jquery.validate.js"></script>
  <script src="../js/matrix.form_validation.js"></script>
  <script src="../js/jquery.wizard.js"></script>
  <script src="../js/jquery.uniform.js"></script>
  <script src="../js/select2.min.js"></script>
  <script src="../js/matrix.popover.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/matrix.tables.js"></script>

  <script type="text/javascript">
  
    function goPage(newURL) {

      if (newURL != "") {

        if (newURL == "-") {
          resetMenu();
        }
        else {
          document.location.href = newURL;
        }
      }
    }

    function resetMenu() {
      document.gomenu.selector.selectedIndex = 2;
    }
  </script>
</body>

</html>