<!DOCTYPE html>
<?php require 'mysqli_connect.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Salutations</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
        <div class="topnav">
            
            <p><a href="index.php" class="btn">Bookstore</a></p>
            <p><a href="books.php" class="btn">Books</a></p>
            <button class="dropbtn" onclick="myFunction()">User</button>
            <div class="dropdown-content" id="dropdown">
                <p><a href="userRegister.php" class="btn">User Register</a></p>
                <p><a href="userLogin.php" class="btn">User Sign in</a></p>
            </div>
            <button type="submit" name="searchbooks" class="dropbtn">Search</button>
            <input type="text" name="search" placeholder="Search">            
            
        </div>
        
        
        <script>
            
            function myFunction() {
                
                document.getElementById("dropdown").classList.toggle("show");
                
            }
            
       </script>
    
        
        <?php
        
        
        if (isset($_POST['userlogin'])) {
  $username = mysqli_real_escape_string($dbc, $_POST['username']);
  $password = mysqli_real_escape_string($dbc, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($dbc, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: userIndex.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
        
        ?>
        
        <div class="header">
            
            Login
            
        </div>
        
        <form method="POST" action="userLogin.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" maxlength="50" placeholder="Username" required="">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" maxlength="30" placeholder="Password" required="">
            </div>
            <div class="input-group">
                <button type="submit" name="userlogin" class="btn">Login in</button>
            </div>
            <p>
                
                Not yet a member? <a href="userRegister.php">Sign up</a>
                
            </p>
        </form>
        
    </body>
</html>
