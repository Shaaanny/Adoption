<?php  
session_start();
include("connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Application Form</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="container" id="adoptionform">
        <h1>Pet Adoption Application Form</h1>
        <form id="applicationForm" method="POST" action="adoption.php">.
            <!-- Personal Information Section -->
            <div class="form-section personal-info">
                <h2>1. Personal Information</h2>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your Full Name"required maxlength="50" pattern="^[^\d]+$">
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" placeholder="Enter your Age" required maxlength="2" pattern="^\d{2}$">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder="Enter your Address" required maxlength="100" style="text-transform: uppercase;">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="09XX-XXX-XXXX"required maxlength="11" pattern="^\d{11}$">
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" placeholder="Enter your Email Address" name="email" required>
                </div>

            <!-- Living Circumstances Section -->
            <div class="form-section living-circumstances">
                <h2>2. Living Circumstances</h2>
                <div class="form-group">
                    <label>What type of place do you live in?</label>
                    <div class="checkbox-group">
                        <input type="radio" id="house" name="place" value="HOUSE" required>
                        <label for="house">HOUSE</label>
                        <input type="radio" id="condo" name="place" value="CONDO">
                        <label for="condo">CONDO</label>
                          <input type="radio" id="apartment" name="place" value="APARTMENT">
                        <label for="apartment">APARTMENT</label>
                </div>

                <div class="form-group">
                    <label>Do we have permission to visit your home?</label>
                    <div class="checkbox-group">
                        <input type="radio" id="visitYes" name="visit" value="YES" required>
                        <label for="visitYes">YES</label>
                        <input type="radio" id="visitNo" name="visit" value="NO">
                        <label for="visitNo">NO</label>
                    </div>
                </div>


            <div class="form-actions">
                <button type="submit" class="submit-btn" name="applicationForm">Submit Application</button>
                <button type="button" class="back-btn" onclick="window.location.href='homepage.php';">Back to Homepage</button>
            </div>

        </form>
    </div>
    <!--<script src="form.js"></script>-->
</body>
</html> 