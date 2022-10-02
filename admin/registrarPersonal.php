<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
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
  <h1><a href="dashboard.html">RevoSport.com</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<?php include 'includes/topheader.php'?>


<!--sidebar-menu-->
<?php $page='staff-management'; include 'includes/sidebar.php'?>
<!--sidebar-menu-->

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Ir a inicio" class="tip-bottom"><i class="fas fa-home"></i> Inicio </a> <a href="#" class="current">Gestionar personal</a>  <a href="anadirPersonal.php" class="current">Agregar personal</a> </div>
    <h1 class="text-center">Formulario para registrar personal del GYM<i class="fas fa-briefcase"></i></h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fas fa-briefcase"></i> </span>
            <h5>Detalles de personal</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" action="anadirPersonal" class="form-horizontal" method="POST">
              <div id="form-wizard-1" class="step">

              <div class="control-group">
                  <label class="control-label">Ingresar nombre completo</label>
                  <div class="controls">
                    <input id="fullname" type="text" name="fullname" required/>
                  </div>
                </div>

            

                <div class="control-group">
                  <label class="control-label">Ingresar nombre de usuario</label>
                  <div class="controls">
                    <input id="usuario" type="text" name="username" />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Contraseña</label>
                  <div class="controls">
                    <input id="password" type="password" name="password" />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Confirmar contraseña</label>
                  <div class="controls">
                    <input id="password2" type="password" name="password2" />
                  </div>
                </div>
              </div>

              <div id="form-wizard-2" class="step">
                <div class="control-group">
                  <label class="control-label">Email</label>
                  <div class="controls">
                    <input id="email" type="text" name="email" required/>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Direccion</label>
                  <div class="controls">
                    <input id="address" type="text" name="address" required/>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Designacion</label>
                  <div class="controls">
                  <select name="designation" id="designation">
                    <option value="Cajero">Cajero</option>
                    <option value="Entrenador">Entrenador</option>
                    <option value="Asistente de GYM">Asistente de GYM</option>
                    <option value="Personal de frente">Personal de frente</option>
                    <option value="Gerente">Gerente</option>
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Gender</label>
                  <div class="controls">
                    <select name="gender" id="gender">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Numero de contacto</label>
                  <div class="controls">
                    <input id="contact" type="number" name="contact" required/>
                  </div>
                </div>

              </div>

              <div class="form-actions">
                <input id="back" class="btn btn-primary" type="reset" value="Atras" />
                <input id="next" class="btn btn-primary" type="submit" value="Siguiente" />
                <div id="estado"></div>
              </div>
              <div id="submitted"></div>
            </form>
          </div>
        </div><!--end of widget box-->
      </div><!--end of span 12 -->
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
<div id="footer" class="span12"> <?php echo date("Y");?> &copy; Revo Sport </a> </div>
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
