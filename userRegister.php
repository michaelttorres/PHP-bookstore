<!DOCTYPE html>
<?php require 'mysqli_connect.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Salutations</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
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
    
        
        <div class="header">
            
            Register
            
        </div>
        
        <?php if (isset($_POST['register'])) {
    
            $firstName = mysqli_real_escape_string($dbc, $_POST['firstname']);
            $lastName = mysqli_real_escape_string($dbc,$_POST['lastname']);
            $username = mysqli_real_escape_string($dbc,$_POST['username']);
            $email = mysqli_real_escape_string($dbc,$_POST['email']);
            $password_1 = mysqli_real_escape_string($dbc,$_POST['password_1']);
            $password_2 = mysqli_real_escape_string($dbc, $_POST['password_2']);
    
    
    if(empty($firstName)) {
        
        array_push($errors, "First Name is required");
        
    }
    if(empty($lastName)) {
        
        array_push($errors, "Last Name is required");
        
    }
    if(empty($username)) {
        
        array_push($errors, "Username is required");
        
    }
    if(empty($email)) {
        
        array_push($errors, "Email is required");
        
    }
    if(empty($password_1)) {
        
        array_push($errors, "Password is required");
    
    }
        
        if(empty($password_2)) {
        
        array_push($errors, "Passwords do not match");
        
    }
    
    $password = $_POST['password'];
            if ((isset($_POST["username"]) && (isset($_POST["password"])))) {
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number = preg_match('@[0-9]@', $password);
                if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                    echo '<p id="signupMess">Password must be alphanumeric and be a minimum of 8 characters long</p>';
                } else {
                    $username = $_POST['username'];
                    $sql = "SELECT * FROM users WHERE username= '$username' LIMIT 1";
                    $res = mysqli_query($dbc, $sql);
                    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
                    $count = mysqli_num_rows($res);
                    if ($count == 0) {
                        if ((is_string($username) == true)) {
                            $q = mysqli_query($dbc, "INSERT INTO users(username,password) VALUES ('$username','$password')");
                            ob_start();
                            header("Location:userIndex.php");
                        }
                    } else {
                        echo 'Username taken!';
                    }
                }
            }
    
    if (count($errors) == 0) {
        
        $password = md5($password_1);
        $sql = "INSERT INTO users (firstname, lastname, username, email, password)"
                . "VALUES ('$firstName','$lastName','$username', '$email', '$password')";
         mysqli_query($dbc, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You're now logged in";
        header('location: index.php');
        
    
}

}
?>
        
        <form method="POST" action="userRegister.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>First Name</label>
                <input type="text" name="firstname" maxlength="35" placeholder="First Name" required="">
            </div>
            <div class="input-group">
                <label>Last Name</label>
                <input type="text" name="lastname" maxlength="35" placeholder="Last Name" required="">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email" maxlength="50" placeholder="Email" required="">
            </div>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" maxlength="50" placeholder="Username" required="">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1" maxlength="30" placeholder="Password" required="">
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_2" maxlength="30" placeholder="Password" required="">
            </div>
            <div class="input-group">
                <button type="submit" name="register" class="btn">Sign up</button>
            </div>
            <p>
                
                Already a member? <a href="userLogin.php">Sign In</a>
                
            </p>
        </form>
        
    </body>
</html>
