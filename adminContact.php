<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php require 'mysqli_connect.php'; 

if (empty($_SESSION['username'])) {
    
    header('location: userRegister.php');
    
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Salutations</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
                <div class="topnav">
            
            <p><a href="userIndex.php" class="btn">Bookstore</a></p>
            <p><a href="books.php" class="btn">Books</a></p>
            <button class="dropbtn" onclick="myFunction()">User</button>
            <div class="dropdown-content" id="dropdown">
                <p><a href="userInfo.php" class="btn">Account Info</a></p>
                <p><a href="userCC.php" class="btn">Payment Info</a></p>
                <p><a href="adminContact.php" class="btn">Contact Admin</a></p>
                <p><a href="index.php?logout='1'" style="color:red;" class="btn">Logout</a></p>
            </div>
            <button class="dropbtn" onclick="myFunction2()">Admin Side</button>
            <div class="dropdown-content" id="dropdown2">
                <p><a href="adminDashboard.php" class="btn">Admin Dashboard</a></p>
            </div>
             <p><a href="cart.php" class="btn">Cart</a></p>
            <button type="submit" name="searchbooks" class="dropbtn">Search</button>
            <input type="text" name="search" placeholder="Search">         
            
                        <p class="welcome" style="float:right;">Welcome <b><?php echo $_SESSION['username'];?></b></p>

            
        </div>
        
                <script>
            
            function myFunction() {
                
                document.getElementById("dropdown").classList.toggle("show");
                
            }
            
            function myFunction2() {
                
                document.getElementById("dropdown2").classList.toggle("show");
                
            }
            
       </script>
        
        <?php
        
        if (isset($_POST['contact'])) {
    
            $userId = ($_SESSION['username']);
            $subject = mysqli_real_escape_string($dbc, $_POST['subject']);
            $message = mysqli_real_escape_string($dbc,$_POST['message']);
    
        $sql = "INSERT INTO usercontact (userId, subject, message) "
                . "VALUES ('$userId','$subject','$message')";
         mysqli_query($dbc, $sql);
}

        ?>        
        
        <form method="POST" action="adminContact.php">
                
            <div class="input-group">
                <label>Subject</label>
                <input type="text" name="subject" placeholder="Subject" required="">
            </div>
            <div class="input-group">
                <label>Message</label>
                <input type="text" name="message" placeholder="Message" required="">
            </div>
            <div class="input-group">
                <button type="submit" name="contact" class="btn">Submit</button>
            </div>

        </form>
        
    </body>
</html>
