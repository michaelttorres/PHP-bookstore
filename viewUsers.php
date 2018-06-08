<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        
        $var = $dbc->query('SELECT id, firstname, lastname, username, email FROM users ORDER BY id DESC');
            while ($row = $var->fetch_assoc()) {
           
                echo '<table> <tr><th> First Name: ' . $row['firstname'] . '</tr></th>';
                echo '<tr><th> Last Name: ' . $row['lastname'] . '</tr></th>';
                echo '<tr> <th> User Id: ' . $row['id'] . '</tr>';
                echo '<tr><th> Username: ' . $row['username'] . '</tr></th>';
                echo '<tr><th> Email: ' . $row['email'] . '</th> </tr> </table>';
            }
        
        ?>
    </body>
</html>
