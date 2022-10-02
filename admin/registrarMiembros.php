<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>GRevoSport.com</title>
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
    <h1><a href="dashboard.html">Administrador del sistema de gimnasio</a></h1>
  </div>


  <!--top-Header-menu-->
  <?php include 'includes/topheader.php' ?>

  <!--sidebar-menu-->
  <?php $page = 'members-entry';
  include 'includes/sidebar.php' ?>
  <!--sidebar-menu-->
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Ir a inicio" class="tip-bottom"><i class="fas fa-home"></i> Inicio</a> <a href="#" class="tip-bottom">Gestionar miembros</a> <a href="#" class="current">Registrar miembro</a> </div>
      <h1 class="text-center">Formulario de inscripción de miembros</h1>
    </div>
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span6">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
              <h5>Informacion personal</h5>
            </div>
            <div class="widget-content nopadding">
              <form action="anadirMiembro.php" method="POST" class="form-horizontal">
                <div class="control-group">
                  <label class="control-label">Nombre completo :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="nombrecompleto" placeholder="Nombre completo" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Nombre de usuario :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="nombreusuario" placeholder="Nombre de usuario" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contraseña :</label>
                  <div class="controls">
                    <input type="password" class="span11" name="contracena" placeholder="**********" />
                    <span class="help-block">Nota: La información proporcionada creará una cuenta para este miembro en particular</span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Genero :</label>
                  <div class="controls">
                    <select name="genero" required="required" id="select">
                      <option value="Hombre" selected="selected">Hombre</option>
                      <option value="Mujer">Mujer</option>
                      <option value="Otros">Otros</option>
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Ingreso :</label>
                  <div class="controls">
                    <input type="date" name="ingreso" class="span11" />
                    <span class="help-block">Fecha de registro</span>
                  </div>
                </div>


            </div>
            <div class="widget-content nopadding">
              <div class="form-horizontal">

              </div>
              <div class="widget-content nopadding">
                <div class="form-horizontal">
                  <div class="control-group">
                    <label for="normal" class="control-label">Plan: </label>
                    <div class="controls">
                      <select name="plan" required="required" id="select">
                        <option value="1" selected="selected">1 mes</option>
                        <option value="3">3 meses</option>
                        <option value="6">6 meses</option>
                        <option value="12">1 año</option>

                      </select>
                    </div>

                  </div>
                  <div class="control-group">


                  </div>
                </div>

              </div>



            </div>
          </div>
        </div>



        <div class="span6">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
              <h5>Detalles de contacto</h5>
            </div>
            <div class="widget-content nopadding">
              <div class="form-horizontal">
                <div class="control-group">
                  <label for="normal" class="control-label">Numero de contacto</label>
                  <div class="controls">
                    <input type="number" id="mask-phone" name="contacto" placeholder="9876543210" class="span8 mask text">
                    <span class="help-block blue span8">(999) 999-9999</span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Direccion :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="direccion" placeholder="Direccion" />
                  </div>
                </div>
              </div>

              <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
                <h5>Detalles del servicio</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="form-horizontal">


                  <div class="control-group">
                    <label class="control-label">Servicios</label>
                    <div class="controls">
                      <label>
                        <input type="radio" value="Fitness" name="servicios" />
                        Fitness <small>- $55 por mes</small></label>
                      <label>
                        <input type="radio" value="Sauna" name="servicios" />
                        Sauna <small>- $35 por mes</small></label>
                      <label>
                        <input type="radio" value="Cardio" name="servicios" />
                        Cardio <small>- $40 por mes</small></label>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Cantidad total</label>
                    <div class="controls">
                      <div class="input-append">
                        <span class="add-on">$</span>
                        <input type="number" placeholder="50" name="cantidad" class="span11">
                      </div>
                    </div>
                  </div>
                  <div class="form-actions text-center">
                    <button type="submit" class="btn btn-success">Enviar detalles del miembro</button>
                  </div>
                  </form>

                </div>



              </div>

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