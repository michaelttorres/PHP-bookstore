<?php require ('mysqli_connect.php'); ?>

<!DOCTYPE html>
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
    
</body>

</html>