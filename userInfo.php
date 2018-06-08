<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php require 'mysqli_connect.php'; 

if (empty($_SESSION['username'])) {
    
    header('location: userInfo.php');
    
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
        
        
if (isset($_POST['account'])) {
    
    $userId = ($_SESSION['username']);
    $address = mysqli_real_escape_string($dbc, $_POST['address']);
    $city = mysqli_real_escape_string($dbc,$_POST['city']);
    $state = mysqli_real_escape_string($dbc,$_POST['state']);
    $zip = mysqli_real_escape_string($dbc,$_POST['zip']);
    $phone = mysqli_real_escape_string($dbc,$_POST['phone']);
    $shipAddress = mysqli_real_escape_string($dbc, $_POST['shipaddress']);
    $shipCity = mysqli_real_escape_string($dbc,$_POST['shipcity']);
    $shipState = mysqli_real_escape_string($dbc,$_POST['shipstate']);
    $shipZip = mysqli_real_escape_string($dbc,$_POST['shipzip']);
    $shipCountry = mysqli_real_escape_string($dbc, $_POST['shipcountry']);
    
        $sql = "INSERT INTO usersinfo (userId, address, city, state, zip, phone, shipaddress,"
                . " shipcity, shipstate, shipzip, shipcountry)"
                . "VALUES ('$userId','$address','$city','$state', '$zip', '$phone', '$shipAddress',"
                . " '$shipCity', '$shipState', '$shipZip', '$shipCountry')";
         mysqli_query($dbc, $sql);
          
}
        
        ?>
        
        <div class="header">
            
            Account Info
            
        </div>
        
        <form method="POST" action="accountinfo.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Address</label>
                <input type="text" name="address" maxlength="35" placeholder="Address" required="">
            </div>
            <div class="input-group">
                <label>City</label>
                <input type="text" name="city" maxlength="35" placeholder="City" required="">
            </div>
            <div class="input-group">
                <label>State</label>
                <input type="text" name="state" maxlength="50" placeholder="State" required="">
            </div>
            <div class="input-group">
                <label>Zip</label>
                <input type="text" name="zip" maxlength="50" placeholder="Zip" required="">
            </div>
            <div class="input-group">
                <label>Phone Number</label>
                <input type="text" name="phone" maxlength="30" placeholder="Phone Number" required="">
            </div>
            <div class="input-group">
                <label>Shipping Address</label>
                <input type="text" name="shipaddress" maxlength="30" placeholder="Shipping Address" required="">
            </div>
            <div class="input-group">
                <label>Shipping City</label>
                <input type="text" name="shipcity" maxlength="50" placeholder="Shipping City" required="">
            </div>
            <div class="input-group">
                <label>Shipping State</label>
                <input type="text" name="shipstate" maxlength="30" placeholder="Shipping State" required="">
            </div>
            <div class="input-group">
                <label>Shipping Zip</label>
                <input type="text" name="shipzip" maxlength="30" placeholder="Shipping Zip" required="">
            </div>
            <div class="input-group">
                <label>Shipping Country</label>
                <input type="texts" name="shipcountry" maxlength="30" placeholder="Shipping Country" required="">
            </div>
            <div class="input-group">
                <button type="submit" name="account" class="btn">Update</button>
            </div>

        </form>
</html>
