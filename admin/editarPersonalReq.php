<?php
session_start();

if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>

<?php 
        
            if(isset($_POST['fullname'])){
            $fullname = $_POST["fullname"];    
            $username = $_POST["username"];
            $gender = $_POST["gender"];
            $contact = $_POST["contact"];
            $address = $_POST["address"];
            $designation = $_POST["designation"];
            $id = $_POST["id"];
            // 
            include 'dbcon.php';
            //code after connection is successfull
            //update query
            $qry = "update personal set nombreCompleto='$fullname', usuario='$username', genero='$gender', contacto='$contact',  direccion='$address', designacion='$designation' where user_id='$id'";
            $result = mysqli_query($con,$qry); //query executes

            if(!$result){
                echo"ERROR!!";
            }else {

                header('Location:personal.php');

            }

            }else{
                echo"<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
            }
?>