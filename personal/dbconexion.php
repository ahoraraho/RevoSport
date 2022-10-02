<?php
$con = mysqli_connect("localhost","root","","gymnsb");

// revisión de la conexión
if (mysqli_connect_errno())
  {
  echo "Coneccion fallida a MySQL " . mysqli_connect_error();
  }
?>
