<?php

session_start();
//Comprobar si la variable de sesión secion_del_miembro está presente o no
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    header("location: index.php");
    exit();
}
$session_id=$_SESSION['user_id'];

?>