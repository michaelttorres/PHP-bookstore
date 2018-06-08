<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php require 'mysqli_connect.php';

if (empty($_SESSION['username'])) {
    
    header('location: userLogin.php');
    
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
            
             <p><a href="adminDashboard.php" class="btn">Bookstore</a></p>
              <button class="dropbtn" onclick="myFunction()">Admin</button>
            <div class="dropdown-content" id="dropdown">
                <p><a href="adminDashboard.php" class="btn">Dashboard</a></p>
                <p><a href="viewUsers.php" class="btn">View Users</a></p>
                <p><a href="userMessages.php" class="btn">View Messages</a></p>
                <p><a href="index.php?logout='1'" style="color:red;" class="btn">Logout</a></p>
            </div>
            <button class="dropbtn" onclick="myFunction2()">User Side</button>
            <div class="dropdown-content" id="dropdown2">
                <p><a href="userIndex.php" class="btn">User Main</a></p>
            </div>
            
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
        
        if (isset($_POST['addpublisher'])) {
    
    $userId = ($_SESSION['username']);
    $publisherId = mysqli_real_escape_string($dbc,$_POST['publisherId']);
    $pubName = mysqli_real_escape_string($dbc,$_POST['pubName']);
    $pubAddress = mysqli_real_escape_string($dbc,$_POST['pubAddress']);
    $pubCity = mysqli_real_escape_string($dbc,$_POST['pubCity']);
    $pubState = mysqli_real_escape_string($dbc,$_POST['pubState']);
    $pubZip = mysqli_real_escape_string($dbc,$_POST['pubZip']);
    
        $sql = "INSERT INTO publisher ( publisherId, pubName, pubAddress, pubCity, pubState, pubZip, userId)"
                . "VALUES ('$publisherId','$pubName','$pubAddress', '$pubCity', '$pubState', '$pubZip','$userId')";
         mysqli_query($dbc, $sql);
}
        
        ?>
        
        <form method="POST" action="addPublisher.php">
            <div class="input-group">
                <label>Publisher Name</label>
                <input type="text" name="pubName" placeholder="Publisher Name">
            </div>
            <div class="input-group">
                <label>Publisher Address</label>
                <input type="text" name="pubAddress" placeholder="Publisher Address">
            </div>
            <div class="input-group">
                <label>Publisher City</label>
                <input type="text" name="pubCity" placeholder="Publisher City">
            </div>
            <div class="input-group">
                <label>Publisher State</label>
                <input type="text" name="pubState" placeholder="Publisher State">
            </div>
            <div class="input-group">
                <label>Publisher Zip</label>
                <input type="text" name="pubZip" placeholder="Publisher Zip">
            </div>
            <div class="input-group">
                <button type="submit" name="addpublisher" class="btn">Add Publisher</button>
            </div>

        </form>
       
    </body>
</html>
