<?php
   if (isset($_GET['ID'])){
        require_once __DIR__.'/Model/TripsModel.php';
    require_once __DIR__.'/Controller/TripsController.php';
    $TripsController = new TripsController();
    $Trip = $TripsController->SelectByID($_GET['ID']);
   }
   else{
       header("Location:Packages.php");
       exit();
   }
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
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <style>
      .liitems li{
          width: 100%;
      }
      table{
          width: 100%;
      }
  </style>
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
          <li><a href="Reviews.php">Reviews</a></li>
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
            <h1 class="mb-4 pb-0"><?php echo $Trip->getName() ?></h1>
        </div>
    </section><!-- End Intro Section -->
 
    <main id="main" class="mt-5">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <img class="w-100 h-70" src="<?php echo $Trip->getImagePath() ?>">
              </div>
              <div class="col-8">
                  <?php
                  echo $Trip->getTripPath();
                  ?>
              </div>
              <div class="col-4">
                  <div class="card bordered mt-5 sticky-top w-100" style="top: 5em;">
                      <strong class="">Trip Date Start: <?php echo $Trip->getStartDate() ?></strong>
                      <strong class="">Trip Date End: <?php echo $Trip->getEndDate() ?></strong>
                      <strong class=""><?php echo $Trip->getDays() ?> Days and <?php echo $Trip->getNights() ?> Nights</strong>
                      <strong class="text-danger">Starting From: <?php echo $Trip->getPrice() ?></strong>
                      <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#exampleModal">Request Contact</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Request Contact</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form action="Controller/TripContactController.php" method="POST">
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" required/>
                                        <div class="validate"></div>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <input type="number" name="phone" class="form-control" id="name" placeholder="Your Phone" data-rule="minlen:4" required />
                                        <div class="validate"></div>
                                      </div>
                                    </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="minlen:4" required/>
                                            <div class="validate"></div>
                                        </div>
                                      </div>
                                        <input type="hidden" name="tripID" value="<?php echo $Trip->getID() ?>">
                                      <div class="text-center"><button name="insert" class="btn rounded btn-danger">Request Contact</button></div>
                                  </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
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