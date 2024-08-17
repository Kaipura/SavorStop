<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: index2.php");
    exit();
}

// Database connection
$con = mysqli_connect("localhost", "root", "", "test") or die(mysqli_error($con));

// Fetch user information (optional)
$username = $_SESSION['username'];
$stmt = $con->prepare("SELECT * FROM account WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Close connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SavorStop</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="main.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark text-bg-dark">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img class="logo" src="img/Gallery/logo.jpg" alt="logo" height="100px">
              </a>            
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Index.php">Home</a>
                  </li>
                  <li class="nav-item"> 
                    <a class="nav-link" href="Shop.html">SHOP</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="About.html">ABOUT</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
    <main>
        <section class="Decoration">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="img/Gallery/Jollibee.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/Gallery/Mcdo.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/Gallery/Chowking.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>
        </section>
        <section class="Product container my-5">
            <h1 class="text-center mb-4">NEW COLLECTION</h1>
            <div class="row">
              <div class="col-md-4 d-flex justify-content-center mb-4">
                <img src="img/Product/Jollibee/Foods/Jcsf.jpg" class="product-img" alt="Food 1">
              </div>
              <div class="col-md-4 d-flex justify-content-center mb-4">
                <img src="img/Product/McDonalds/Food/CS.jpg" class="product-img" alt="Food 2">
              </div>
              <div class="col-md-4 d-flex justify-content-center mb-4">
                <img src="img/Product/MangInasal/foods/MICIR.png" class="product-img" alt="Food 3">
              </div>
            </div>
            <div class="text-center">
              <a href="Shop.html">
                <button class="btn btn-dark">See More</button>
            </a>
            
            </div>
          </section>
          <section class="About container my-5">
            <div class="row">
                <!-- First Row: Column 1 (Image) and Column 2 (Text) -->
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="img/Gallery/Gallery1.jpg" class="img-fluid about-img" alt="SavorStop Overview">
                </div>
                
                <div class="col-md-6">
                    <h2>About SavorStop</h2>
                    <p>
                        Welcome to SavorStop – your ultimate fast food delivery 
                        partner! We are passionate about bringing you the best 
                        in fast food right to your doorstep, combining convenience, 
                        quality, and speed into one seamless experience.
                    </p>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <h2>Who We Are:</h2>
                    <p>
                        At SavorStop, we understand that sometimes you need 
                        delicious, high-quality fast food without the hassle. 
                        Our service is designed to cater to your cravings with 
                        minimal effort. Whether you’re looking for a quick 
                        snack, a hearty meal, or a family feast, we’ve got you 
                        covered. Our goal is to make your food delivery 
                        experience as enjoyable and stress-free as possible.
                    </p>
                </div>
                
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="img/Gallery/Gallery2.jpg" class="img-fluid about-img" alt="SavorStop Experience">
                </div>
            </div>
            
        </section>
        <section class="add-info container my-5">
            <h2 class="text-center mb-4">Why Choose Us?</h2>
            <ul>
                <li>
                    <h3>Quick and Reliable Delivery</h3>
                    <p>We pride ourselves on getting your food to you as quickly as possible. Our efficient delivery system ensures your meals arrive hot and fresh, just the way you like them.</p>
                </li>
                <li>
                    <h3>Top-Notch Quality</h3>
                    <p>We partner with renowned local restaurants and food vendors to offer you a diverse menu of mouth-watering fast food. From juicy burgers and crispy fries to savory sides and sweet treats, you’ll always find something to satisfy your cravings.</p>
                </li>
                <li>
                    <h3>Easy Ordering</h3>
                    <p>Our user-friendly app and website make ordering a breeze. Browse our menu, customize your order, and track your delivery in real time – all from the comfort of your home.</p>
                </li>
                <li>
                    <h3>Customer Satisfaction</h3>
                    <p>We are committed to providing exceptional service and ensuring that every meal is a delightful experience. Our friendly customer support team is always ready to assist with any questions or concerns.</p>
                </li>
            </ul>
        </section>
    </main>

    <footer>
        <h1>Countries with SavorStop</h1>
        <div class="Countries">
            <p><a href="Index.php">Philippine</a></p>
            <p><a href="Index.php">Singapore</a></p>
            <p><a href="Index.php">Thailand</a></p>
            <p><a href="Index.php">Vietnam</a></p>
            <p><a href="Index.php">Indonesia</a></p>
        </div> 
        <div class="detail">
            <h1>© SavorStop 2024</h1>
            <div class="rule">
                <p><a href="about.html">About Us</a></p>
                <p><a href="about.html">Contact</a></p>
                <p><a href="#">Terms of Services</a></p>
                <p><a href="#">Privacy Policy</a></p>
            </div>
        </div> 
    </footer>
</body>
</html>
