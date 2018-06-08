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
        
        if (isset($_POST['usercc'])) {
    
            $userId = ($_SESSION['username']);
            $ccType = mysqli_real_escape_string($dbc, $_POST['ccType']);
            $ccFirstName = mysqli_real_escape_string($dbc,$_POST['ccFirstName']);
            $ccLastName = mysqli_real_escape_string($dbc,$_POST['ccLastName']);
            $ccNumber = mysqli_real_escape_string($dbc,$_POST['ccNumber']);
            $ccSec = mysqli_real_escape_string($dbc,$_POST['ccSec']);
            $ccExpDate = mysqli_real_escape_string($dbc,$_POST['ccExpDate']);
    
        $sql = "INSERT INTO customercc (userId, ccType, ccFirstName, ccLastName, ccNumber, ccSec, ccExpDate, ccId) "
                . "VALUES ('$userId',$ccType', '$ccFirstName', '$ccLastName', '$ccNumber', '$ccSec', '$ccExpDate')";
         mysqli_query($dbc, $sql);
}

        ?>        
        
        <form method="POST" action="userCC.php">
                
            <div class="input-group">
                <label>Type</label>
                <input type="text" name="ccType" maxlength="35" placeholder="Card Type">
            </div>
            <div class="input-group">
                <label>First Name</label>
                <input type="text" name="ccFirstName" maxlength="35" placeholder="First Name">
            </div>
            <div class="input-group">
                <label>Last Name</label>
                <input type="text" name="ccLastName" maxlength="50" placeholder="Last Name">
            </div>
            <div class="input-group">
                <label>Card Number</label>
                <input type="number" name="ccNumber" maxlength="50" placeholder="Number">
            </div>
            <div class="input-group">
                <label>Security Number</label>
                <input type="number" name="ccSec" maxlength="30" placeholder="Security Number">
            </div>
            <div class="input-group">
                <label>Expiration Date</label>
                <input type="date" name="ccExpDate" maxlength="30" placeholder="Expiration Date">
            </div>
            <div class="input-group">
                <button type="submit" name="usercc" class="btn">Add Credit Card</button>
            </div>

        </form>
        
    </body>
</html>
