<?php
session_start();
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
  <h1><a href="dashboard.html">Sistema de gimnacio</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php include 'includes/topheader.php'?>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->

<!--sidebar-menu-->
<?php $page='update-equip'; include 'includes/sidebar.php'?>
<!--sidebar-menu-->
    <?php
        include 'dbcon.php';
        $id=$_GET['id'];
        $qry= "select * from equipos where id='$id'";
        $result=mysqli_query($conn,$qry);
        while($row=mysqli_fetch_array($result)){
    ?> 

<div id="content">
<div id="content-header">
<div id="breadcrumb"> <a href="index.php" title="Ir a inicio" class="tip-bottom"><i class="fas fa-home"></i> Inicio </a> <a href="#" class="current"> Gestionar equipos</a> <a href="#" class="current">Editar equipos </a><a href="#" class="current">Actualizar equipo </a> </div>
  <h1>FORMULARIO DE EQUIPOS</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>DETALLES DEL EQUIPO</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="editar-equipos-req.php" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">NOMBRE DE EQUIPO :</label>
              <div class="controls">
                <input type="text" class="span11" name="name" value='<?php echo $row['name']; ?>' required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">DESCRIPCION :</label>
              <div class="controls">
                <input type="text" class="span11" name="description" value='<?php echo $row['description']; ?>' required />
              </div>
            </div>
           
            
            <div class="control-group">
              <label class="control-label">FECHA DE COMPRA :</label>
              <div class="controls">
                <input type="date" name="date" value='<?php echo $row['date']; ?>' class="span11" />
                <span class="help-block">Por favor, mencionar fecha de compra</span> </div>
            </div>

             <div class="control-group">
              <label class="control-label">CALIDAD :</label>
              <div class="controls">
                <input type="number" class="span4" name="quantity" value='<?php echo $row['quantity']; ?>'  required />
              </div>
            </div>
            
          
        </div>
     
        
        <div class="widget-content nopadding">
          <div class="form-horizontal">
          
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            
            
          </div>

          </div>



        </div>
      </div>
	  
	
    </div>

    
    
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>OTROS DETALLES</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">NUMERO DE CONTACTO</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="contact" minlength="10" maxlength="10" value='<?php echo $row['contact']; ?>' class="span8 mask text" required>
                <span class="help-block blue span8">(999) 999-9999</span> 
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">VENDEDOR :</label>
              <div class="controls">
                <input type="text" class="span11" name="vendor" value='<?php echo $row['vendor']; ?>' required />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">DIRECCION :</label>
              <div class="controls">
                <input type="text" class="span11" name="address" value='<?php echo $row['address']; ?>' required />
              </div>
            </div>
          </div>

              <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>PRECIOS</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            
            
    

            <div class="control-group">
              <label class="control-label">COSTO TOTAL: </label>
              <div class="controls">
                <div class="input-append">
                  <span class="add-on">$</span> 
                  <input type="number" placeholder="120000" name="amount" value='<?php echo $row['amount']; ?>' class="span11" required>
                  </div>
              </div>
            </div>
            
          
            
            <div class="form-actions text-center">
                <!-- user's ID is hidden here -->
             <input type="hidden" name="id" value="<?php echo $row['id'];?>">
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
  
  
</div></div>



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
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
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
