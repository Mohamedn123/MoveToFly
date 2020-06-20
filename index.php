<?php
    include_once __DIR__.'/Controller/TripsController.php';
    include_once __DIR__.'/Model/TripsModel.php';
    $TripController = new TripsController();
    $Trips = $TripController->getAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Move To Fly</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TheEvent - v2.0.0
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
      /*--------------------------------------------------------------
# Cta
--------------------------------------------------------------*/
.cta {
  background: rgb(12,17,37);
  padding: 80px 0;
}

.cta h3 {
  color: #fff;
  font-size: 28px;
  font-weight: 700;
}

.cta p {
  color: #fff;
}

.cta .cta-btn {
  font-family: "Raleway", sans-serif;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 14px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 12px 30px;
  border-radius: 50px;
  transition: 0.5s;
  margin: 10px;
  color: #fff;
  background: rgb(229,61,79);
}

.cta .cta-btn:hover {
  background: #fff;
  color: rgb(229,61,79);
}

@media (max-width: 1024px) {
  .cta {
    background-attachment: scroll;
  }
}

@media (min-width: 769px) {
  .cta .cta-btn-container {
    display: flex;
    align-items: center;
    justify-content: flex-end;
  }
}

      .carousel-control-prev-icon,
.carousel-control-next-icon {
  height: 100px;
  width: 100px;
  outline: black;
  background-size: 100%, 100%;
  border-radius: 50%;
  background-image: none;
}

.carousel-control-next-icon:after
{
  content: '>';
  font-size: 3rem;
  color: red;
}

.carousel-control-prev-icon:after {
  content: '<';
  font-size: 3rem;
  color: red;

}
.card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}
.MyCard:hover{
    border-color: rgb(229,61,79);
}
  </style>
  <script>
      function About(){
          document.getElementById("about1").style.visibility = "visible";
      }
  </script>
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
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="Reviews.php">Reviews</a></li>
          <li><a href="/Gallery/photos.php">Gallery</a></li>
          <li><a href="ContactUS.html">Contact</a></li>
          <li class="buy-tickets"><a href="Packages.php">Trip Packages</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Intro Section ======= -->
  <section>
    <div id="carouselExampleSlidesOnly" class="carousel slide h-50" data-ride="carousel" data-pause="false"

 data-interval="2000">
  <div class="carousel-inner">

    <div class="carousel-item active">
        <img class="d-block w-100" src="assets/img/person.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="assets/img/mountain.jpg" alt="Third slide">
    </div>
  </div>
</div>
  </section><!-- End Intro Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="video">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h2>In Response to COVID-19</h2>
                    </div>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/rFtnTdzmHyQ" allowfullscreen></iframe>
                    </div>
              </div>
            </div>
        </div>
    </section>
    
    <section id="gallery" class="wow fadeInUp">

     
        <div class="container">
        <div class="section-header">
          <h2>Some Destinations</h2>
        </div>
      </div>
        
        <a href="Packages.php">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card bordered MyCard" style="width: 18rem;">
                            <img src="assets/img/Haridwar.jpg" class="card-img-top" alt="...">
                            <div class="card-body border-danger">
                              <h5 class="card-title">Haridwar and Rishikesh</h5>
                              <p class="card-text text-secondary">According to Hindu mythology, Haridwar marks the site where devas left their footprints. It is thus, counted among the most sacred cities in the country. Literally meaning 'Gateway to God', Haridwar is located on the banks of the Ganga River in the Indian state of Uttarakhand. Legends say that Prince Bhagirath, the great-grandson of King Sagar, did his penance here during Satya Yuga to save the souls of his ancestors, who were cursed to death by saint Kapil.</p>
                            </div>
                          </div>
                    </div>
                    <div class="col">
                        <div class="card bordered MyCard h-100" style="width: 18rem;">
                            <img src="assets/img/Jalori.jpg" class="card-img-top" alt="...">
                            <div class="card-body border-danger">
                              <h5 class="card-title">Haridwar and Rishikesh</h5>
                              <p class="card-text text-secondary">You are thinking about going on a very easy, yet breathtaking trek in the Himalayas.
Starting from Jalori pass near the Tirthan valley could be a very nice option, especially with Himalayan Ecotourism, as we are so good in taking you into the wild Himalayas with ease, comfort and safety.</p>
                            </div>
                          </div>
                        
                    </div>
                    <div class="col">
                         <div class="card bordered MyCard h-100" style="width: 18rem;">
                             <img src="assets/img/Shimla.jpg" class="card-img-top" alt="...">
                            <div class="card-body border-danger">
                              <h5 class="card-title">Shimla & Manali</h5>
                              <p class="card-text text-secondary">Mountains humble you and make you feel special about your being. Himachal in the north is dotted with alpine trees, and cutting through them are daunting trails that epitomise a mountain’s true charm. Infinite vistas and snow-capped peaks keep uplifting your soul when the body cedes to climb. Something similar is the story of trekking in Manali.</p>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            
            
        </a>

    </section><!-- End Gallery Section -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="row" data-aos="zoom-out">
          <div class="col-lg-9 text-center text-lg-left">
            <h3>Why To wait</h3>
            <p>Check out our the latest Packages and Request contact now</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="Packages.php">View Latest Packages</a>
          </div>
        </div>
          <div class="row" data-aos ="zoom-out">
              <div class="col-lg-9">
                  
              </div>
              <div class="col-lg-3 cta-btn-container text-center">
                  <a class="cta-btn align-middle" onclick="About()">Read About US</a>
              </div>
          </div>

      </div>
    </section><!-- End Cta Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
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

            <div class="col-lg-6 col-md-6 footer-info" id="about1" style="visibility : hidden;">
           <h4>About US</h4>
           <p>Move to Fly is a full pledged travel company transitioning from offline to online platform for their customers. Our reputation for excellence is earned everyday by providing the best services to our client. The journey started 4 years back with a group of friends and now it has moved towards becoming a high in demand trip planner company.<br>The Delhi based company, with a strong presence in inbound travel trade and corporate segment. The company with its professionally managed travel engine specializes mainly in organizing Adventure, Cultural, Religious, hill station & wildlife tours in India through a sprawling network. It offers 24 X 7 hours services that include travel planning, itinerary design, hotel bookings, ticket reservations and transport facilities. It also provides holiday packages, customized as per client’s need and budget.</p>

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