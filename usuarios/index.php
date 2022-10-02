<?php
session_start();
include('dbconexion.php');
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <title>RevoSport.com / usuario</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <div id="loginbox">
        <form id="loginform" class="form-vertical" method="POST" action="#">
            <div class="control-group normal_text">
                <h2><img src="../img/logo.png" alt="Logo" /></h2>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="user" placeholder="Nombre de usuario" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pass" placeholder="Contraseña" />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Registrarse</a></span>
                <span class="pull-right"><button type="submit" name="login" class="btn btn-success" />Ingresar como usuario</button></span>
            </div>
            <div class="g">
                <a href="../index.php">
                    <h6>Atras</h6>
                </a>
            </div>

            <?php
            if (isset($_POST['login'])) {
                $nombrecompleto = mysqli_real_escape_string($con, $_POST['user']);
                $contracena = mysqli_real_escape_string($con, $_POST['pass']);

                $contracena = md5($contracena);

                $query         = mysqli_query($con, "SELECT * FROM miembros WHERE  contracena='$contracena' and nombrecompleto='$nombrecompleto' and estado='Active'");
                $row        = mysqli_fetch_array($query);
                $num_row     = mysqli_num_rows($query);

                if ($num_row > 0) {
                    $_SESSION['user_id'] = $row['user_id'];
                    header('location:paginas/index.php');
                } else {
                    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                Nombre de usuario o contraseña incorrecta; o licencia expirada 
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                </div>";
                }
            }
            ?>
        </form>
        <form id="recoverform" action="../usuarios/paginas/register-cust.php" method="POST" class="form-vertical">
            <p class="normal_text">Ingrese sus datos a continuación y le enviaremos sus datos para continuar con el proceso de activación.</p>


            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-pencil"></i></span><input type="text" name="nombrecompleto" placeholder="Nombre completo" />
                </div>
            </div>

            <br>

            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-leaf"></i></span><input type="text" name="nombreusuario" placeholder="@nombreusuario" />
                </div>
            </div>

            <br>

            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-asterisk"></i></span><input type="password" name="contracena" placeholder="Contraseña" />
                </div>
            </div>

            <br>

            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-leaf"></i></span><input type="number" name="contacto" placeholder="999999999" />
                </div>
            </div>

            <br>

            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-asterisk"></i></span><input type="text" name="direccion" placeholder="Direccion" />
                </div>
            </div>

            <br>

            <div class="controls">
                <div class="main_input_box">
                    <select name="genero" required="required" id="select">
                        <option value="Hombre" selected="selected">Hombre</option>
                        <option value="Mujer">Mujer</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
            </div>

            <br>

            <div class="controls">
                <div class="main_input_box">
                    <select name="plan" required="required" id="select">
                        <option selected="true" disabled="disabled">Selccione el plan</option>
                        <option value="1">1 mes</option>
                        <option value="3">3 meses</option>
                        <option value="6">6 meses</option>
                        <option value="12">1 año</option>
                    </select>
                </div>
            </div>

            <br>

            <div class="controls">
                <div class="main_input_box">
                    <select name="servicios" required="required" id="select">
                        <option selected="true" disabled="disabled">Seleccione el servicio</option>
                        <option value="Fitness">Fitness</option>
                        <option value="Sauna">Sauna</option>
                        <option value="Cardio">Cardio</option>
                    </select>
                </div>
            </div>



            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Atras</a></span>
                <span class="pull-right"><button class="btn btn-info" type="SUBMIT">Enviar registro</button></span>
            </div>

        </form>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/matrix.login.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/matrix.js"></script>
</body>

</html>