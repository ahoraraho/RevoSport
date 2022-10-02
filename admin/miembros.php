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
    <h1><a href="dashboard.html">Sistema de un gimnasio</a></h1>
  </div>
  
  <!--top-Header-menu-->
  <?php include 'includes/topheader.php' ?>

  <!--sidebar-menu-->
  <?php $page = "miembros";
  include 'includes/sidebar.php' ?>
  <!--sidebar-menu-->

  <div id="content">
    <div id="content-header"> <!--la ruta de acceso donde nos encontremos ahora mismo-->
      <div id="breadcrumb"> 
        <a href="index.php" title="Ir a inicio" class="tip-bottom"><i class="fas fa-home"></i> Inicio </a>
        <a href="#" class="tip-bottom">Gestionar miembros</a> 
        <a href="#" class="tip-bottom">Miembros registrados</a> 
      </div>
      <!-- text-center : para centrar el texto del subtitulo -->
      <h1 class="text-center">Lista de miembros registrados <i class="fas fa-group"></i></h1>
    </div>
    <div class="container-fluid"> <!-- contenedor anidado -->
      <hr>
      <div class="row-fluid"> <!-- barra de navegacion -->
        <div class="span12">

          <div class='widget-box'>  <!-- tamaño de caja -->
            <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span> <!-- tamaño del titutlo -->
              <h5>Tabla de miembros</h5>
            </div>
            <div class='widget-content nopadding'> <!-- tamaño del contenedor que no tiene padding (no tiene espacio) -->

              <?php

              //incluimos la coneccon de la db
              include "dbcon.php";
              //hacemos una cansulta a la tabla 
              $qry = "select * from miembros"; 
              $cnt = 1;
              $result = mysqli_query($conn, $qry);
              //nombres de los campos de la tabla miembros
              echo "<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre completo</th>
                  <th>Nombre de usuario</th>
                  <th>Genero</th>
                  <th>Numero de telefono</th>
                  <th>Ingreso</th>
                  <th>Direccion</th>
                  <th>Pago</th>
                  <th>Servicio elegido</th>
                  <th>Plan</th>
                </tr>
              </thead>";
              //obtiene una fila de resultados como una matriz asociativa, una matriz numérica o ambas
              while ($row = mysqli_fetch_array($result)) { 

                //entregamos los resultados obtenidos en la tabla y se implime
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


  <!--copy-->

  <div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Revo Sport </a> </div>
  </div>

  <style>
    #footer {
      color: white;
    }
  </style>


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
    // Esta función se llama desde los menús emergentes para transferir a
    // una página diferente. Ignorar si el valor devuelto es una cadena nula:
    function goPage(newURL) {

      // si la URL está vacía, omita los divisores del menú y restablezca la selección del menú a los valores predeterminados
      if (newURL != "") {

        // si la url es "-", es esta página -- restablecer el menú:
        if (newURL == "-") {
          resetMenu();
        }
        // si no, envía la página a la URL designada           
        else {
          document.location.href = newURL;
        }
      }
    }

    // restablece la selección del menú al ingresar a esta página:
    function resetMenu() {
      document.gomenu.selector.selectedIndex = 2;
    }
  </script>
</body>

</html>