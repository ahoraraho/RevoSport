<?php
session_start();
//the isset function to check nombreusuario is already loged in and stored on the session
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
  <!--close-Header-part-->


  <!--top-Header-menu-->
  <?php include 'includes/topheader.php' ?>
  <!--close-top-Header-menu-->
  <!--start-top-serch-->
  <!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
  <!--close-top-serch-->

  <!--sidebar-menu-->
  <?php $page = 'staff-management';
  include 'includes/sidebar.php' ?>
  <!--sidebar-menu-->

  <?php
  include 'dbcon.php';
  $id = $_GET['id'];
  $qry = "select * from personal where user_id='$id'";
  $result = mysqli_query($conn, $qry);
  while ($row = mysqli_fetch_array($result)) {
  ?>

    <div id="content">
      <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Ir a inico" class="tip-bottom"><i class="fas fa-home"></i> Inicio</a> <a href="personal.php" class="tip-bottom">Gestionar personal</a> <a href="#" class="current">Editar personal</a> </div>
        <h1 class="text-center">ACTUALIZAR DETALLES DE PERSONAL<i class="fas fa-briefcase"></i></h1>
      </div>
      <div class="container-fluid">
        <hr>
        <div class="row-fluid">
          <div class="span6">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
                <h5>DETALLES DE PERSONAL</h5>
              </div>
              <div class="widget-content nopadding">

                <form action="editarPersonalReq.php" method="POST" class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">NOMBRE COMPLETO :</label>
                    <div class="controls">
                      <input type="text" class="span11" name="fullname" value='<?php echo $row['nombreCompleto']; ?>' />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">NOMBRE DE USUARIO :</label>
                    <div class="controls">
                      <input type="text" class="span11" name="username" value='<?php echo $row['usuario']; ?>' />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">CONTRASEÑA :</label>
                    <div class="controls">
                      <input type="password" class="span11" name="password" disabled="" placeholder="**********" />
                      <span class="help-block">Nota: Solo los miembros pueden cambiar su contraseña a menos que se trate de una emergencia..</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">GENERO :</label>
                    <div class="controls">
                      <input type="text" class="span11" name="gender" value='<?php echo $row['genero']; ?>' />
                    </div>
                  </div>



              </div>


              <div class="widget-content nopadding">
                <div class="form-horizontal">

                </div>
                <div class="widget-content nopadding">

                </div>


              </div>
            </div>

          </div>

          <div class="span6">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
                <h5>DETALLES DE PERSONAL</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="form-horizontal">
                  <div class="control-group">
                    <label for="normal" class="control-label">CONTACTO</label>
                    <div class="controls">
                      <input type="number" id="mask-phone" name="contact" value='<?php echo $row['contacto']; ?>' class="span8 mask text">
                      <span class="help-block blue span8">(999) 999-9999</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">DIRECCION :</label>
                    <div class="controls">
                      <input type="text" class="span11" name="address" value='<?php echo $row['direccion']; ?>' />
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">DESIGNACION</label>
                    <div class="controls">
                      <select name="designation" id="designation">
                        <option value="cajero">cajero</option>
                        <option value="entrenador">entrenador</option>
                        <option value="asistente de GYM">asistente de GYM</option>
                        <option value="personal de frente">personal de frente</option>
                        <option value="gerente">gerente</option>
                      </select>
                    </div>
                  </div>


                </div>



                <div class="form-actions text-center">
                  <!-- user's ID is hidden here -->
                  <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                  <button type="submit" class="btn btn-success">ACTUALIZAR DETALLES DE PERSONAL</button>
                </div>

                </form>

              </div>
            <?php
          }
            ?>


            </div>

          </div>
        </div>


      </div>

      <div class="row-fluid">

      </div>
    </div>


    <!--end-main-container-part-->

    <!--Footer-part-->

    <div class="row-fluid">
      <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; desarrollado por Pedro P Diaz</a> </div>
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
      // This function is called from the pop-up menus to transfer to
      // a different page. Ignore if the value returned is a null string:
      function goPage(newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-") {
            resetMenu();
          }
          // else, send page to designated URL            
          else {
            document.location.href = newURL;
          }
        }
      }

      // resets the menu selection upon entry to this page:
      function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
      }
    </script>
</body>

</html>