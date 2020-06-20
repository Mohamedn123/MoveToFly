<?php 
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
if ($_SESSION['ID'] == null){
    header("Location:../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Creative - Bootstrap Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">Move To <span class="lite">Fly</span></a>
      <!--logo end-->
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            
                <span class="username"><?php echo $_SESSION['Name']; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              
              <li>
                  <a href="../Controller/UserController.php?logout"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--main content start-->
    <section id="main-content">
        <div class="container">
            <section class="wrapper">
                 <div class="row">
                <div class="col-lg-12">
                      <section class="panel">
          <header class="panel-heading">
             Package Details
          </header>
          <div class="panel-body">
              <form class="form-horizontal " method="post" action="../Controller/TripsController.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Trip Name: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" required placeholder="Name...">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Trip Description: </label>
                    <div class="col-sm-10">
                        <textarea id="summernote" name="editordata" required></textarea>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Start Date: </label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="startDate" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">End Date: </label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="endDate" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Number Of Days: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="days" required placeholder="Days...">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Number Of Nights: </label>
                    <div class="col-sm-10">
                       <input type="number" class="form-control" name="nights" required placeholder="Nights...">

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Price: </label>
                    <div class="col-sm-10">
                       <input type="number" class="form-control" name="price" required placeholder="Price...">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Cover Image: </label>
                    <div class="col-sm-10">
                       <input type="file" class="form-control" name="image" required >
                    </div>
                  </div>
                    <button type="submit" name="insert" class="btn btn-primary">Create Trip</button>
                </form>
          </div>
            

      </section>
                </div>
            </div>
            </section>
        </div>
      <div class="text-right">
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
   <script src="js/jquery.scrollTo.min.js"></script>
  <!-- charts scripts -->
  <!-- jQuery full calendar -->
    <!-- Full Google Calendar - Calendar -->
    <!--script for this page only-->
    <!-- custom select -->

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/xcharts.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
          });
      //knob
    

      //carousel
      

      //custom select box

     

     
    </script>

</body>

</html>
