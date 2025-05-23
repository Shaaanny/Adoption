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
          </div>

          
         <input type="submit" class="btn" value="Log In" name="signIn">
        </form>
       
      <script src="login.js"></script>
</body>
</html>