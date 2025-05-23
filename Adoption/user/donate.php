<?php
session_start();
include("connect.php"); // Include the database connection file

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Portal - Donate</title>
    <link rel="stylesheet" href="donate.css">
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
        <section class="donation-form-section" id="donation">
            <h1>Make a Difference</h1>
            <p>Your donation helps us rescue, rehabilitate, and rehome pets in need. Thank you for your support!</p>
            <form class="donation-form" method="POST" action="donation_process.php">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="amount">Donation Amount</label>
                    <input type="number" id="amount" name="amount" placeholder="Enter amount (Peso)" required>
                </div>
                <div class="form-group">
                    <label for="message">Message (Optional)</label>
                    <textarea id="message" name="message" placeholder="Write a message..."></textarea>
                </div>
                <div class="form-group">
                    <label>Payment Method</label>
                    <div class="payment-options">
                        <input type="radio" id="card" name="paymentMethod" value="card" required>
                        <label for="card">Credit/Debit Card</label>
                        <input type="radio" id="ewallet" name="paymentMethod" value="ewallet" required>
                        <label for="ewallet">E-Wallet</label>
                    </div>
                </div>

                <!-- Card Details -->
                <div id="cardDetails" class="hidden">
                    <div class="form-group">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="expiryDate">Expiry Date</label>
                            <input type="text" id="expiryDate" placeholder="MM/YY" maxlength="5">
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" placeholder="123" maxlength="3">
                        </div>
                    </div>
                </div>

                <!-- E-Wallet Options -->
                <div id="ewalletOptions" class="hidden">
                    <div class="form-group">
                        <label for="wallet">Select E-Wallet</label>
                        <select id="wallet">
                            <option value="gcash">GCash</option>
                            <option value="paymaya">PayMaya</option>
                            <option value="coinsph">Coins.ph</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Mobile Number</label>
                        <input type="text" id="phoneNumber" placeholder="09XX-XXX-XXXX" maxlength="11">
                    </div>
                </div>
                <input type="submit" class="donate-btn" name="donation" value="Donate Now">
            </form>

            
            <!--  Success Popup -->
            <div class="overlay" id="overlay"></div>
            <div class="success-popup" id="successPopup">
                <div class="icon">
                    <i class="fas fa-paw"></i>
                </div>
                <h2>Thank You!</h2>
                <p>Your donation has been successfully processed. Your kindness makes a difference!</p>
                <button class="close-btn" id="closePopup">Close</button>
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
    <script src="donation.js"></script>
    <script src="script.js"></script>
    <script>
    window.onload = function () {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            document.getElementById("overlay").style.display = "block";
            document.getElementById("successPopup").style.display = "block";
        }
    };
</script>

</body>
</html>