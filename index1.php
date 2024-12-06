<?php
    session_start();
    if(!isset($_SESSION["user"])){
      header("location: login.php");
      exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="icon" type="image/x-icon" href="images/fav1.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Storage Unit Platform</title>
</head>
<body>

    <header>
        <nav>
            <div class="logo"> <img class="img" src="images/fav1.ico" alt="">Storage Platform</div>
            <ul>
              <li><a href="login.php" target="_blank">Login</a></li>
                <li><a href="registration.php" target="_blank">Register</a></li>
                <li><a href="#admin">Payment</a></li>
                  <li><a href="logout.php" target="_blank">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Find Your Perfect Storage Unit</h1>
            <p>Secure, Affordable, Convenient</p>
            <a href= "explore_units.html" class="cta-button" target="_blank">Explore Units</a>
        </div>
    </section>

    <section class="features" id="features">
      <div class="container">
       <!-- Image Slideshow -->
       <div id="slideshow">
           <img src="images\images.jpeg" alt="Image 1" width="300px" height="300px">
           <img src="images\img1.jpeg" alt="Image 2" width="300px" height="300px">
           <img src="images\img2.jpeg" alt="Image 3" width="300px" height="300px">
           <img src="images\img3.jpeg" alt="Image 3" width="300px" height="300px">
           <img src="images\img4.jpeg" alt="Image 3" width="300px" height="300px" >
           <img src="images\img5.jpeg" alt="Image 3"  width="300px" height="300px">
           <!-- Add more images as needed -->
       </div>
        <div class="text">
            <div class="feature">
                <h2>Various Sizes</h2>
                <p>Choose from a range of storage unit sizes to fit your needs.</p>
            </div>

            <div class="feature">
                <h2>Secure Facilities</h2>
                <p>Our facilities are equipped with top-notch security measures.</p>
            </div>

            <div class="feature">
                <h2>Flexible Pricing</h2>
                <p>Enjoy flexible pricing plans that suit your budget and requirements.</p>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <h2>Ready to Get Started?</h2>
            <p>Find the perfect storage unit for you today.</p>

        </div>
    </section>

    <footer>
        <p>&copy; 2024 Storage Unit Platform</p>
    </footer>

    <script >
    let currentSlide = 0;
       const slides = document.getElementById("slideshow").getElementsByTagName("img");

       function showSlide(index) {
           for (let i = 0; i < slides.length; i++) {
               slides[i].style.display = "none";
           }

           currentSlide = (index + slides.length) % slides.length;
           slides[currentSlide].style.display = "block";

           setTimeout(() => {
               showSlide(currentSlide + 1);
           }, 2000); // Change the time interval between slides (in milliseconds)
       }

       // Start the slideshow
       window.onload = function() {
            showSlide(currentSlide);
        };
    </script>
</body>
</html>
