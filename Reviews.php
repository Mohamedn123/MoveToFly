<?php
include_once 'Controller/ReviewsController.php';
include_once 'Model/ReviewsModel.php';
$ReviewsController = new ReviewsController();
$Reviews = $ReviewsController->getApproved();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Move To Fly</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <!-- ======= Header ======= -->
 <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
         <h1><a href="index.php">Move To<span>Fly</span></a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">Home</a></li>
          <li class="menu-active"><a href="Reviews.php">Reviews</a></li>
          <li><a href="/Gallery/photos.php">Gallery</a></li>
          <li><a href="ContactUS.html">Contact</a></li>
          <li class="buy-tickets"><a href="Packages.php">Trip Packages</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- End Header -->
    <!-- ======= Intro Section ======= -->
    <section id="intro" style="height: 50vh; background-image: url('assets/img/camp.jpg'); background-position: center bottom; background-size: cover;">
        <div class="intro-container wow fadeIn">
          <h1 class="mb-4 pb-0">Some of our<br><span>Reviews</h1>
        </div>
    </section><!-- End Intro Section -->
 
    <main id="main" class="mt-5">
      <div class="container">
          <div class="row">
              <a href="AddReview.php"><button class="btn btn-danger mb-5">Submit a new Review</button></a>
          </div>
          <?php
            if($Reviews != null){
                for ($x=0;$x<sizeof($Reviews);$x++){
                    echo '<div class="row">
                        <div class="col-md-3 mt-4">
                            <p class="mb-3 text-danger"><strong>'.$Reviews[$x]->getName().'</strong></p>'
                            . '<div class="text-warning">';
                            for ($z=0;$z<$Reviews[$x]->getRating();$z++){
                                echo '<i class="fa fa-star"></i>';
                            } 
                            
                            echo '</div><p>'.$Reviews[$x]->getPlace().'<br><strong>'.$Reviews[$x]->getDate().'</strong></p>
                        </div>
                        <div class="col-md-9">
                           <div class="bs-callout bs-callout-danger">
                              <h4>'.$Reviews[$x]->getTitle().'</h4>
                                  '.$Reviews[$x]->getBody().'
                           </div>
                        </div>

                    </div>
                     <hr>';
                }
            }
            else{
                echo "<div class='row'>"
                        . "<h4><i>Nothing to show Check back Later</i></h4>"
                        . "</div>";
            }
          ?>
      </div>
   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h1><a href="index.php">Move To<span>Fly</span></a></h1>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="index.php">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="Reviews.php">Reviews</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="Gallery/photos.php">Gallery</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="ContactUS.html">Contact</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="Packages.php">Trip Packages</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
                Mahaveer Enclave, Plot No -A-3,<br> New Delhi, India<br>
              
              <strong>Phone:</strong> +91-9599216447<br>
              <strong>Email:</strong> customercare@movetofly.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/wow/wow.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/superfish/superfish.min.js"></script>
  <script src="assets/vendor/hoverIntent/hoverIntent.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>