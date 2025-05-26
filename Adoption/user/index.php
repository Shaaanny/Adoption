<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container" id="signIn">
      
        <h1 class="form-title">Log In</h1>
        <form action="register.php" method="post">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="username" name="username" id="username" placeholder="Username"  required>
              <label for="username">Username</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="signInPassword" placeholder="Password"  required>
              <label for="password">Password</label>
              <i class="fas fa-eye" id="toggleSignInPassword"></i>
          </div>
          

         <input type="submit" class="btn" value="Log In" name="signIn">
        </form>
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton">Sign Up</button>
        </div>
        </div>

        <div class="container" id="signup" style="display:none;">
        <form method="post" action="register.php">
          <h1 class="form-title">Register</h1>
            <div class="input-group">
               <i class="fas fa-user"></i>
               <input type="text" name="username" id="username" placeholder="Username" required>
               <label for="username">Username</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                <i class="fas fa-eye" id="togglePassword"></i>
            </div>
           <div class="checkbox-group">
            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">
              I agree to the 
              <a href="terms.html" target="_blank">Terms and Conditions</a> and 
              acknowledge the <a href="privacy.html" target="_blank">Data Privacy Policy</a>.
            </label>
          </div>

          <input type="submit" class="btn" value="Sign Up" name="signUp">

          </form>
          
          <div class="links">
            <p>Already Have Account ?</p>
            <button id="signInButton">Sign In</button>
          </div>
        </div>
      <script src="login.js"></script>
</body>
</html>