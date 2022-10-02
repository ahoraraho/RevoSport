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
  <link rel="stylesheet" href="../css/uniform.css" />
  <link rel="stylesheet" href="../css/select2.css" />
  <link rel="stylesheet" href="../css/matrix-style.css" />
  <link rel="stylesheet" href="../css/matrix-media.css" />
  <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
  <link href="../font-awesome/css/all.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

  <!--Header-part-->
  <div id="header">
    <h1><a href="dashboard.html">RevoSport.com</a></h1>
  </div>
  <!--close-Header-part-->


  <!--top-Header-menu-->
  <?php include 'includes/topheader.php' ?>
  <!--close-top-Header-menu-->

  <!--sidebar-menu-->
  <?php $page = 'staff-management';
  include 'includes/sidebar.php' ?>
  <!--sidebar-menu-->

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Ir a inicio" class="tip-bottom"><i class="fas fa-home"></i> Inicio</a> <a href="#" class="current">Gestionar personal</a> </div>
      <h1 class="text-center">Lista de personal<i class="fas fa-briefcase"></i></h1>
    </div>
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <a href="registrarPersonal.php"><button class="btn btn-primary">AGREGAR PERSONAL</button></a>
          <div class='widget-box'>
            <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
              <h5>TABLA DE PERSONAL</h5>
            </div>
            <div class='widget-content nopadding'>

              <?php

              include "dbcon.php";
              $qry = "select * from personal";
              $cnt = 1;
              $result = mysqli_query($conn, $qry);


              echo "<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre completo</th>
                  <th>Nombre de Usuario</th>
                  <th>Genero</th>
                  <th>Designacion</th>
                  <th>Email</th>
                  <th>Direccion</th>
                  <th>Contacto</th>
                  <th>Acccion</th>
                </tr>
              </thead>";

              while ($row = mysqli_fetch_array($result)) {

                echo "<tbody> 
                <tr class=''>
                <td><div class='text-center'>" . $cnt . "</div></td>
                <td><div class='text-center'>" . $row['nombreCompleto'] . "</div></td>
                <td><div class='text-center'>@" . $row['usuario'] . "</div></td>
                <td><div class='text-center'>" . $row['genero'] . "</div></td>
                <td><div class='text-center'>" . $row['designacion'] . "</div></td>
                <td><div class='text-center'>" . $row['email'] . "</div></td>
                <td><div class='text-center'>" . $row['direccion'] . "</div></td>
                <td><div class='text-center'>" . $row['contacto'] . "</div></td>
                <td><div class='text-center'><a href='editarPersonalForm.php?id=" . $row['user_id'] . "'><i class='fas fa-edit' style='color:#28b779'></i> Editar |</a> <a href='actions/eliminarPersonal.php?id=" . $row['user_id'] . "' style='color:#F66;'><i class='fas fa-trash'></i> Eliminar </a></div></td>
                </tr>
                
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
  <script src="../js/jquery.uniform.js"></script>
  <script src="../js/select2.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/matrix.js"></script>
  <script src="../js/matrix.tables.js"></script>
</body>

</html>