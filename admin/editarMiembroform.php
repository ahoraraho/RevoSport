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



  <!--top-Header-menu-->
  <?php include 'includes/topheader.php' ?>


  <!--sidebar-menu-->
  <?php $page = 'members-update';
  include 'includes/sidebar.php' ?>
  <!--sidebar-menu-->

  <?php
  include 'dbcon.php';
  $id = $_GET['id'];
  $qry = "select * from miembros where user_id='$id'";
  $result = mysqli_query($conn, $qry);
  while ($row = mysqli_fetch_array($result)) {
  ?>

    <div id="content">
      <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Inicio</a>
          <a href="#" class="current">Gestionar miembros</a>
          <a href="#" class="tip-bottom">Editar miembro</a>
          <a href="#" class="current">Actualizar miembro</a>
        </div>
        <h1>Actualizar los datos del miembro</h1>
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

                <form action="editarMiembroReq.php" method="POST" class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">Nombre completo :</label>
                    <div class="controls">
                      <input type="text" class="span11" name="nombrecompleto" value='<?php echo $row['nombrecompleto']; ?>' />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Nombre de usuario :</label>
                    <div class="controls">
                      <input type="text" class="span11" name="nombreusuario" value='<?php echo $row['nombreusuario']; ?>' />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Contraseña :</label>
                    <div class="controls">
                      <input type="password" class="span11" name="password" disabled="" placeholder="**********" />
                      <span class="help-block">Nota: Solo los miembros pueden cambiar su contraseña a menos que se trate de una emergencia..</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Genero :</label>
                    <div class="controls">
                      <select name="genero" required="required" id="select">
                        <option value="Hombre" selected="selected">Hombre</option>
                        <option value="Female">Mujer</option>
                        <option value="Otro">Otro</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Registro:</label>
                    <div class="controls">
                      <input type="date" name="ingreso" class="span11" value='<?php echo $row['ingreso']; ?>' />
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
                    <label for="normal" class="control-label">Numero</label>
                    <div class="controls">
                      <input type="number" id="mask-phone" name="contacto" value='<?php echo $row['contacto']; ?>' class="span8 mask text">
                      <span class="help-block blue span8">(999) 999-9999</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Direccion :</label>
                    <div class="controls">
                      <input type="text" class="span11" name="direccion" value='<?php echo $row['direccion']; ?>' />
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
                      <label class="control-label">Monto total</label>
                      <div class="controls">
                        <div class="input-append">
                          <span class="add-on">$</span>
                          <input type="number" value='<?php echo $row['cantidad']; ?>' name="cantidad" class="span11">
                        </div>
                      </div>
                    </div>



                    <div class="form-actions text-center">

                      <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                      <button type="submit" class="btn btn-success">Guardar cambios</button>
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


        </div>
      </div>


      <div class="row-fluid">
        <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Desarrollado por Pedro P Diaz </a> </div>
      </div>

      <style>
        #footer {
          color: white;
        }
      </style>

      <!--final-parte-del-pie--->

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