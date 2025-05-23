<?php

session_start();
include("connect.php"); // Include the database connection file

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo-container">
            <img src="Pictures/logo.png" alt="Paw Portal" class="logo">
        </div>
        <ul class="nav-links">
            <li><a href="homepage.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="donate.php" class="active"><i class="fas fa-donate"></i> Donate</a></li>
            <li><a href="adopt.php" class="adopt-link"><i class="fas fa-paw"></i> Adopt</a></li>
            <li class="user-dropdown">
                <a href="#" class="user-icon" id="userDropdownBtn">
                    <i class="fas fa-user"></i> 
                    <?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; } else { echo "Account"; } ?>
                    <i class="fas fa-caret-down"></i>
                </a>
                <div id="userDropdownMenu" class="dropdown-menu">
                    <a href="logout.php" id="logoutOption"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>

    
    <section class="hero">
        <h1>Every Pet Deserves a Loving Home.<br>
            <span class="highlight">Adopt</span> a Pet Today
        </h1>
        <p>Browse our available animals and learn more about the adoption process. Together, we can 
            <strong>rescue, rehabilitate, and rehome pets in need.<br></strong>
             Thank you for supporting our mission to bring joy to families through pet adoption.</p>
        
        <hr></hr>
        
        <button class="adopt-btn"><a  href="adopt.php"><i class="fas fa-paw"></i> ADOPT </a></button>
    </section>

    <section class="testimonial-slider">
        <h2>What Our Adopters Say</h2>
        <div class="slider">
            <div class="slide active">
                <p>"Adopting from Paw Portal was the best decision we ever made. Our new furry friend has brought so much joy to our family!"</p>
                <span>- Emily R.</span>
            </div>
            <div class="slide">
                <p>"The adoption process was smooth and the staff was incredibly helpful. We love our new pet!"</p>
                <span>- Michael T.</span>
            </div>
            <div class="slide">
                <p>"Thank you Paw Portal for helping us find our perfect companion. We couldn't be happier!"</p>
                <span>- Sarah L.</span>
            </div>
        </div>
        <div class="slider-controls">
            <button class="prev-btn"><i class="fas fa-chevron-left"></i></button>
            <button class="next-btn"><i class="fas fa-chevron-right"></i></button>
        </div>
    </section>

    <section class="featured-pets">
        <h2>Meet Our Featured Pets</h2>
        <p>Discover some of our most adorable and loving pets waiting for their forever homes.</p>
        <div class="pet-cards">
            <div class="pet-card">
                <img src="Pictures/golden.jpg" alt="Bella the Dog">
                <h3>Bella</h3>
                <p><strong>Breed:</strong> Golden Retriever</p>
                <p><strong>Age:</strong> 3 years</p>
                <p><strong>Personality:</strong> Friendly and playful</p>
                <p><strong>Adoption Fee:</strong> ₱530</p>
                <a href="form.html" class="adopt-btn"><i class="fas fa-paw"></i> Adopt Bella</a>
            </div>
            <div class="pet-card">
                <img src="Pictures/Persian.jpg" alt="Max the Cat">
                <h3>Max</h3>
                <p><strong>Breed:</strong> Persian</p>
                <p><strong>Age:</strong> 2 years</p>
                <p><strong>Personality: </strong> Affectionate and calm</p>
                <p><strong>Adoption Fee:</strong> ₱430</p>
                <a href="form.html" class="adopt-btn"><i class="fas fa-paw"></i> Adopt Max</a>
            </div>
            <div class="pet-card">
                <img src="Pictures/Himalayan.jpg" alt="Luna the Rabbit">
                <h3>Luna</h3>
                <p><strong>Breed:</strong> Himalayan</p>
                <p><strong>Age:</strong> 1 year</p>
                <p><strong>Personality:</strong> Curious and gentle</p>
                <p><strong>Adoption Fee:</strong> ₱470</p>
                <a href="form.html" class="adopt-btn"><i class="fas fa-paw"></i> Adopt Luna </a>
            </div>
        </div>
    </section>


    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section about">
                <h3>About Paw Portal</h3>
                <p>Paw Portal is dedicated to connecting loving families with pets in need. Together, we can make a difference in the lives of animals and their future owners.</p>
            </div>
            <div class="footer-section links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="adopt.php">Adopt</a></li>
                    <li><a href="donate.php">Donate</a></li>
                </ul>
            </div>
            <div class="footer-section contact">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> 123 Pet Lane, Animal City, PA 12345</p>
                <p><i class="fas fa-phone"></i> +63 (123) 123-4567</p>
                <p><i class="fas fa-envelope"></i> support@pawportal.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Paw Portal. All Rights Reserved.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>


    <script src="dropdown.js"></script>
    <script src="script.js"></script>
</body>
</html>