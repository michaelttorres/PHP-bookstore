<?php require ('mysqli_connect.php');
if (isset($_SESSION["username"])):?>

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
       
           <p></p>
            <?php endif?>
    
</body>

</html>