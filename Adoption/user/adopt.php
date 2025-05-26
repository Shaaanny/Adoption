<?php

session_start();
include("connect.php"); // Include the database connection file

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Portal - Adopt</title>
    <link rel="stylesheet" href="adopt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
                <li><a href="donate.php" class="active"><i class="fas fa-donate"></i>Donate</a></li>
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

    <main>
        <section class="adoption-list">
            <h1>Meet Our Lovely Pets</h1>
            <div class="pet-grid">
                <!-- Pet Card 1 -->
                <div class="pet-card">
                    <img src="Pictures/bulldog.jpg" alt="Pet 1">
                    <div class="pet-info">
                        <h2>Lit</h2>
                        <p><strong>Breed:</strong> Bulldog</p>
                        <p><strong>Age:</strong> 2 years</p>
                        <a href="form.php" class="adopt-btn"><i class="fas fa-paw"></i> Adopt</a>
                    </div>
                </div>
                <!-- Pet Card 2 -->
                <div class="pet-card">
                    <img src="Pictures/Britist_Shorthair.jpg" alt="Pet 2">
                    <div class="pet-info">
                        <h2>Bleu</h2>
                        <p><strong>Breed:</strong> British Shorthair</p>
                        <p><strong>Age:</strong> 3 years</p>
                        
                        <a href="form.php" class="adopt-btn"><i class="fas fa-paw"></i> Adopt</a>
                    </div>
                </div>
                <!-- Pet Card 3 -->
                <div class="pet-card">
                    <img src="Pictures/german.jpg" alt="Pet 3">
                    <div class="pet-info">
                        <h2>Black</h2>
                        <p><strong>Breed:</strong> German Shepherd</p>
                        <p><strong>Age:</strong> 1 year</p>
                        
                        <a href="form.php" class="adopt-btn"><i class="fas fa-paw"></i> Adopt</a>
                    </div>
                </div>
                <!-- Pet Card 4 -->
                <div class="pet-card">
                    <img src="Pictures/Husky.jpg" alt="Pet 4">
                    <div class="pet-info">
                        <h2>Luna</h2>
                        <p><strong>Breed:</strong> Husky</p>
                        <p><strong>Age:</strong> 1 year</p>
                        
                        <a href="form.php" class="adopt-btn"><i class="fas fa-paw"></i> Adopt</a>
                    </div>
                </div>
                <!-- Pet Card 5 -->
                <div class="pet-card">
                    <img src="Pictures/Siamese.jpg" alt="Pet 5">
                    <div class="pet-info">
                        <h2>Rocky</h2>
                        <p><strong>Breed:</strong> Siamese</p>
                        <p><strong>Age:</strong> 1 year</p>
                        
                        <a href="form.php" class="adopt-btn"><i class="fas fa-paw"></i> Adopt</a>
                    </div>
                </div>
                <!-- Pet Card 6 -->
                <div class="pet-card">
                    <img src="Pictures/bunnyrabbit.png" alt="Pet 6">
                    <div class="pet-info">
                        <h2>Destroyer</h2>
                        <p><strong>Breed:</strong> Bunny Rabbit</p>
                        <p><strong>Age:</strong> 1 year</p>
                        
                        <a href="form.php" class="adopt-btn"><i class="fas fa-paw"></i> Adopt</a>
                    </div>
                </div>
                <!-- Pet Card 7 -->
                <div class="pet-card">
                    <img src="Pictures/sokoke.png" alt="Pet 7">
                    <div class="pet-info">
                        <h2>Nova</h2>
                        <p><strong>Breed:</strong> Sokoke</p>
                        <p><strong>Age:</strong> 2 years</p>
                        
                        <a href="form.php" class="adopt-btn"><i class="fas fa-paw"></i> Adopt</a>
                    </div>
                </div>
                <!-- Add more pet cards as needed -->
            </div>
        </section>
    </main>

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
                <p><i class="fas fa-map-marker-alt"></i> Block 39 Lot 19, Grand Villas, Marilao, Bulaca</p>
                <p><i class="fas fa-phone"></i> +63 (915) 133-4602</p>
                <p><i class="fas fa-envelope"></i> support@pawportal.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 202 Paw Portal. All Rights Reserved.</p>
            <!--<div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>-->
        </div>
    </footer>

    <script src="dropdown.js"></script>
</body>
</html>