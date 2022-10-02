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

  <!--Header-part-->
  <div id="header">
    <h1><a href="dashboard.html">administrador de Perfect Gym</a></h1>
  </div>

  <?php include 'includes/topheader.php' ?>
  <?php $page = 'members-update';
  include 'includes/sidebar.php' ?>


  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Ir a inicio" class="tip-bottom"><i class="fas fa-home"></i> Inicio </a><a href="#" class="tip-bottom">Gestionar miembros</a> <a href="#" class="current">Editar miembro</a> </div>
      <h1 class="text-center"> Editar miembros <i class="fas fa-group"></i></h1>
    </div>
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">

          <div class='widget-box'>
            <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
              <h5>TABLA DE MIEMBROS</h5>
            </div>
            <div class='widget-content nopadding'>

              <?php

              include "dbcon.php";
              $qry = "select * from miembros";
              $cnt = 1;
              $result = mysqli_query($conn, $qry);


              echo "<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Nombre de usuario</th>
                  <th>Genero</th>
                  <th>Contacto</th>
                  <th>Fecha de registro</th>
                  <th>Direccion</th>
                  <th>Monto</th>
                  <th>Servicio elegido</th>
                  <th>Plan</th>
                  <th>Accion</th>
                </tr>
              </thead>";
              // 
              while ($row = mysqli_fetch_array($result)) {

                echo "<tbody> 
                <td><div class='text-center'>" . $cnt . "</div></td>
                <td><div class='text-center'>" . $row['nombrecompleto'] . "</div></td>
                <td><div class='text-center'>@" . $row['nombreusuario'] . "</div></td>
                <td><div class='text-center'>" . $row['genero'] . "</div></td>
                <td><div class='text-center'>" . $row['contacto'] . "</div></td>
                <td><div class='text-center'>" . $row['ingreso'] . "</div></td>
                <td><div class='text-center'>" . $row['direccion'] . "</div></td>
                <td><div class='text-center'>$" . $row['cantidad'] . "</div></td>
                <td><div class='text-center'>" . $row['servicios'] . "</div></td>
                <td><div class='text-center'>" . $row['plan'] . " Mes/es</div></td>
                <td><div class='text-center'><a href='editarMiembroform.php?id=" . $row['user_id'] . "'><i class='fas fa-edit'></i> Editar</a></div></td>
                
              </tbody>";
                $cnt++;
              }
              ?>

              </table>
            </div>
          </div>



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
        } else {
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