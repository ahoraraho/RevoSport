<?php
session_start();
include('dbconexion.php');
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <title>RevoSport.com / Administrador</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- hacer referencia todos los archivos locales en las carpetas par ausar sus librerias -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link href="font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link href="font-awesome/css/all.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <div id="loginbox">
        <form id="loginform" method="POST" class="form-vertical" action="#">
            <div class="control-group normal_text"> <!-- para poder ver una imagen de tamaño normal -->
                <h3><img src="img/logo.png" alt="Logo" /></h3>
            </div>
            <div class="control-group"> <!-- Grupos de entrada segun a lo que se requiera -->
                <div class="controls">
                    <div class="main_input_box"> <!-- No admitimos múltiples controles de formulario en un solo grupo de entrada  -->
                        <!-- dd-on : complemento de boton; bg_ly : Utilidades de los mixins -->
                        <span class="add-on bg_lg"><i class="fas fa-user-circle"></i></span><input type="text" name="user" placeholder="Nombre de ususario" required />
                </div>
            </div>
            <div class="control-group"> <!-- Grupos de entrada segun a lo que se requiera -->
                <div class="controls">
                    <div class="main_input_box"><!-- No admitimos múltiples controles de formulario en un solo grupo de entrada  -->
                        <!-- dd-on : complemento de boton; bg_ly : Utilidades de los mixins -->    
                        <span class="add-on bg_ly"><i class="fas fa-lock"></i></span><input type="password" name="pass" placeholder="Contraseña" required />
                    </div>
                </div>
            </div>
            <div class="form-actions center">   <!-- formulario de tipo contenedor donde se encuentra el boton -->
                <!-- btn-block :  Tallas;  btn-info : Menús desplegables de un solo botón-->
                <button type="submit" class="btn btn-block btn-large btn-info" title="Log In" name="login" value="Admin Login">Ingresar como administrador</button>
            </div>
        </form>
        <?php
        //codigo para poder iniciar secion haciendo la consultaa a la db
        if (isset($_POST['login'])) {
            $username = mysqli_real_escape_string($con, $_POST['user']);
            $password = mysqli_real_escape_string($con, $_POST['pass']);

            $password = md5($password); //para encriptar la contraseña del administrador y luego compararla con la que se encuentra en la base de datos

            $query      = mysqli_query($con, "SELECT * FROM admin WHERE  password='$password' and username='$username'");
            $row        = mysqli_fetch_array($query);
            $num_row    = mysqli_num_rows($query);

            if ($num_row > 0) {
                $_SESSION['user_id'] = $row['user_id'];
                header('location:admin/index.php');
            } else {
                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                Nombre de usuario o contraseña incorrecta.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                </div>";    //un codigo de js donde nos sle la alerta si no se logra el ingreso
            }
        }
        ?>
        
        <!-- Estas clases ayudan a hacer flotar los elementos -->
        <div class="pull-left"> <!-- La clase .pull-left se usa para hacer flotar el elemento a la izquierda. --> 
            <a href="usuarios/index.php">
                <h6>Ingresar como usuario</h6>
            </a>
        </div>

        <div class="pull-right"> <!-- La clase .pull-left se usa para hacer flotar el elemento a la derecha. -->
            <a href="personal/index.php">  
                <h6>Ingresar como personal</h6>
            </a>
        </div>

    </div>

    <!-- ihacer referencia a los archivos js para la funcionalidad del bootstrap -->
    <script src="js/jquery.min.js"></script>
    <script src="js/matrix.login.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/matrix.js"></script>
</body>


</html>