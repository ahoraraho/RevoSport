<?php
session_start();
//la función isset para verificar el nombre de usuario ya está registrado y almacenado en la sesión
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
}
include "dbcon.php";
$qry = "SELECT servicios, count(*) as number FROM miembros GROUP BY servicios";
$result = mysqli_query($con, $qry);
$qry = "SELECT genero, count(*) as enumber FROM miembros GROUP BY genero";
$result3 = mysqli_query($con, $qry);
$qry = "SELECT designacion, count(*) as snumber FROM personal GROUP BY designacion";
$result5 = mysqli_query($con, $qry);
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <title>RevoSport.com / inicio</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="../css/fullcalendar.css" />
  <link rel="stylesheet" href="../css/matrix-style.css" />
  <link rel="stylesheet" href="../css/matrix-media.css" />
  <link href="../font-awesome/css/all.css" rel="stylesheet" />
  <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/jquery.gritter.css" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Services', 'Number'],
        <?php
        while ($row = mysqli_fetch_array($result)) {
          echo "['" . $row["servicios"] . "', " . $row["number"] . "],";
        }
        ?>
      ]);
      var options = {
        //is3D:true,  
        pieHole: 0.4,

      };
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
  </script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
      var data = new google.visualization.arrayToDataTable([
        ['Services', 'Total Numbers'],


        <?php
        $query = "SELECT servicios, count(*) as number FROM miembros GROUP BY servicios";
        $res = mysqli_query($con, $query);
        while ($data = mysqli_fetch_array($res)) {
          $servicios = $data['servicios'];
          $number = $data['number'];
        ?>['<?php echo $servicios; ?>', <?php echo $number; ?>],
        <?php
        }
        ?>


      ]);

      var options = {
        // title: 'Chess opening moves',
        width: 710,
        legend: {
          position: 'none'
        },
        // chart: { title: 'Chess opening moves',
        //          subtitle: 'popularity by percentage' },
        bars: 'vertical', // Required for Material Bar Charts.
        axes: {
          x: {
            0: {
              side: 'top',
              label: 'Total'
            } // Top x-axis.
          }
        },
        bar: {
          groupWidth: "100%"
        }
      };

      var chart = new google.charts.Bar(document.getElementById('top_x_div'));
      chart.draw(data, options);
    };
  </script>

  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
      var data = new google.visualization.arrayToDataTable([
        ['Terms', 'Total Amount', ],

        <?php
        $query1 = "SELECT genero, SUM(cantidad) as numberone FROM miembros; ";

        $rezz = mysqli_query($con, $query1);
        while ($data = mysqli_fetch_array($rezz)) {
          $servicios = 'Earnings';
          $numberone = $data['numberone'];
          // $numbertwo=$data['numbertwo'];
        ?>['<?php echo $servicios; ?>', <?php echo $numberone; ?>, ],
        <?php
        }
        ?>

        <?php
        $query10 = "SELECT quantity, SUM(amount) as numbert FROM equipos";
        $res1000 = mysqli_query($con, $query10);
        while ($data = mysqli_fetch_array($res1000)) {
          $expenses = 'Expenses';
          $numbert = $data['numbert'];

        ?>['<?php echo $expenses; ?>', <?php echo $numbert; ?>, ],
        <?php
        }
        ?>


      ]);

      var options = {

        width: "1050",
        legend: {
          position: 'none'
        },

        bars: 'horizontal', // Required for Material Bar Charts.
        axes: {
          x: {
            0: {
              side: 'top',
              label: 'Total'
            } // Top x-axis.
          }
        },
        bar: {
          groupWidth: "100%"
        }
      };

      var chart = new google.charts.Bar(document.getElementById('top_y_div'));
      chart.draw(data, options);
    };
  </script>

  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Gender', 'Number'],
        <?php
        while ($row = mysqli_fetch_array($result3)) {
          echo "['" . $row["genero"] . "', " . $row["enumber"] . "],";
        }
        ?>
      ]);

      var options = {

        pieHole: 0.4,
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
      chart.draw(data, options);
    }
  </script>

  <script>
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Designation', 'Number'],
        <?php
        while ($row = mysqli_fetch_array($result5)) {
          echo "['" . $row["designation"] . "', " . $row["snumber"] . "],";
        }
        ?>
      ]);

      var options = {

        pieHole: 0.4,
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchart2022'));
      chart.draw(data, options);
    }
  </script>
</head>

<body>


  <div id="header">
    <h1><a href="dashboard.html">administrador de Perfect Gym</a></h1>
  </div>




  <?php include 'includes/topheader.php' ?>




  <?php $page = 'dashboard';
  include 'includes/sidebar.php' ?>



  <div id="content">

    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="estas justo aqui" class="tip-bottom"><i class="fa fa-home"></i> Inicio</a></div>
    </div>

    <div class="container-fluid">
      <div class="quick-actions_homepage">
        <ul class="quick-actions">
          <li class="bg_ls span"> <a href="index.php" style="font-size: 16px;"> <i class="fas fa-user-check"></i> <span class="label label-important"><?php include 'actions/dashboard-activecount.php' ?></span> MIEMBROS ACTIVOS </a> </li>
          <li class="bg_lo span3"> <a href="miembros.php" style="font-size: 16px;"> <i class="fas fa-users"></i></i><span class="label label-important"><?php include 'dashboard-usercount.php' ?></span> MIEMBROS REGISTRADOS</a> </li>
          <li class="bg_lg span3"> <a href="payment.php" style="font-size: 16px;"> <i class="fa fa-dollar-sign"></i> GANANCIAS TOTALES: $<?php include 'income-count.php' ?></a> </li>

        </ul>
      </div>



      <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title bg_lg"><span class="icon"><i class="fas fa-file"></i></span>
            <h5>SERVICIO DE REPORTES</h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              <div class="span8">

                <div id="top_x_div" style="width: 700px; height: 290px;"></div>
              </div>
              <div class="span4">
                <ul class="site-stats">
                  <li class="bg_lh"><i class="fas fa-users"></i> <strong><?php include 'dashboard-usercount.php'; ?></strong> <small>MIEMBROS TOTALES</small></li>
                  <li class="bg_lg"><i class="fas fa-user-clock"></i> <strong><?php include 'actions/dashboard-staff-count.php'; ?></strong> <small>USUARIOS DE PERSONAL</small></li>
                  <li class="bg_ls"><i class="fas fa-dumbbell"></i> <strong><?php include 'actions/count-equipments.php'; ?></strong> <small>EQUIPO DISPONIBLE</small></li>
                  <li class="bg_ly"><i class="fas fa-file-invoice-dollar"></i> <strong>$<?php include 'actions/total-exp.php'; ?></strong> <small>GASTOS TOTALES</small></li>
                  <li class="bg_lr"><i class="fas fa-user-ninja"></i> <strong><?php include 'actions/count-trainers.php'; ?></strong> <small>INTRENADORES DE GYM</small></li>
                  <li class="bg_lb"><i class="fas fa-calendar-check"></i> <strong><?php include 'actions/count-attendance.php'; ?></strong> <small>MIEMBROS PRESENTES</small></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row-fluid">
        <div class="span6">
          <div class="widget-box">
            <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="fas fa-chevron-down"></i></span>
              <h5>MIEMBROS REGISTRADOS POR GENERO:</h5>
            </div>
            <div class="widget-content nopadding collapse in" id="collapseG2">
              <ul class="recent-posts">

                <div id="donutchart" style="width: 600px; height: 300px;"></div>

              </ul>
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

          #piechart {
            width: 800px;
            height: 280px;
            margin-left: auto;
            margin-right: auto;
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
        <!-- <script src="../js/matrix.interface.js"></script>  -->
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