<?php require 'mysqli_connect.php'; 

if (empty($_SESSION['username'])) {
    
    header('location: userLogin.php');
    
}
?>

<!DOCTYPE html>
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
        
        <div class="content">
            
            <?php if (isset($_SESSION['success'])): ?>
            
            <div class="error success">
                
                <?php
                
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                
                ?>
                
            </div>
             <?php endif ?>
            <div class="btn">
                <p><a href="addCategory.php">Add book category</a></p>
            </div>
            <div class="btn">
                <p><a href="addSubCategory.php">Add book sub-category</a></p>
            </div>
            <div class="btn">
                <p><a href="addPublisher.php">Add publisher</a></p>
            </div>
            <div class="btn">
                <p><a href="addBooks.php">Add books</a></p>
            </div>
        </div>
    
</body>

</html>
