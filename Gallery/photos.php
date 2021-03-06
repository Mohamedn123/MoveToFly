<?php
    require_once __DIR__.'/../Controller/GalleryController.php';
    require_once __DIR__.'/../Model/GalleryModel.php';
    $GalleryController = new GalleryController();
    $Galleries = $GalleryController->selectAll();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gallery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/jquery.scrollbar.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    <link rel="stylesheet" href="css/swiper.min.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  

  <div class="site-wrap">

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <header class="header-bar d-flex d-lg-flex align-items-center inner-page-header" data-aos="fade-down">
    <div class="site-logo">
      <a href="index.html">Move To Fly</a>
    </div>
    
    <div class="d-inline-block d-xl-block ml-md-0 ml-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span> <span style="position: relative;top: -4px; text-transform: uppercase;">Menu</span></a></div>

    <div class="main-menu d-none">
      <ul class="js-clone-nav">
          <li><a href="../index.php">Home</a></li>
          <li><a href="../Reviews.php">Reviews</a></li>
          <li class="active"><a href="photos.php">Gallery</a></li>
          <li><a href="../ContactUS.html">Contact</a></li>
          <li><a href="../Packages.php">Packages</a></li>

      </ul>
    </div>
  </header> 
  

  <main class="main-content">
    <div class="container-fluid photos">
      <div class="row align-items-stretch">
        <?php
            if ($Galleries != null){
                for($x=0;$x<sizeof($Galleries);$x++){
                    echo '<div class="col-6 col-md-6 col-lg-4" data-aos="fade-up">
                            <a href="../'.$Galleries[$x]->getImagePath().'" class="d-block photo-item" data-fancybox="gallery">
                              <img src="../'.$Galleries[$x]->getImagePath().'" alt="Image" class="img-fluid">
                              <div class="photo-text-more">
                                <span class="icon icon-search"></span>
                              </div>
                            </a>
                          </div>';
                }
            }
        ?>
        
      </div>

      <div class="row justify-content-center">
        <div class="col-md-12 text-center py-5">
          <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
        </div>
      </div>
    </div>
  </main>

</div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <!-- <script src="js/jquery.stellar.min.js"></script> -->
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/swiper.min.js"></script>
  <script src="js/jquery.scrollbar.js"></script>
  <script src="js/main.js"></script>

  
    
  </body>
</html>