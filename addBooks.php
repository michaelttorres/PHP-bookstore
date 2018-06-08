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
        
        if (isset($_POST['addbook'])) {
    
            $userId = ($_SESSION['username']);
            $isbn = ($_POST['isbn']);
            $title = mysqli_real_escape_string($dbc,$_POST['title']);
            $author = mysqli_real_escape_string($dbc,$_POST['author']);
            $price = ($_POST['price']);
            $bookId = ($_POST['bookId']);
            $publisher = ($_POST['publisherId']);
            $category = ($_POST['categoryId']);
            $subCategory = ($_POST['subCategoryId']);
    
        $sql = "INSERT INTO books (userId, isbn, title, author, price, qtyInstock, publisherId, categoryId, subCategoryId, bookId)"
                . "VALUES ('$userId',$isbn','$author','$price', '$publisher', '$category', '$subCategory', '$bookId')";
         mysqli_query($dbc, $sql);
          
}

    if (isset($_POST['addbook'])) {
        
        $image = $_FILES['file'];
        
        $imageName = $_FILES['file'] ['name'];
        $imageTmpName = $_FILES['file'] ['tmp_name'];
        $imageSize = $_FILES['file'] ['size'];
        $imageError = $_FILES['file']['error'];
        $imageType = $_FILES['file']['type'];
        
        $imageExt = explode('.', $image);
        $imageActualExt = strtolower(end($imageExt));
        
        $allow = array('jpg', 'jpeg','png','pdf');
        
        if (in_array($imageActualExt, $allow)) {
            
            if($imageError === 0) {
                
                if($imageSize < 1000000) {
                    
                    $imageNameNew = uniqid('', TRUE).".".$imageActualExt;
                    $imageDestination = '/images'.$imageNameNew;
                    move_uploaded_file($imageTmpName, $imageDestination);
                    
                    $sql = "INSERT INTO books (image, imageType)"
                . "VALUES ('$image','$imageType')";
                        mysqli_query($dbc, $sql);
                    
                }else {
                    
                    echo "Your image is too big!";
                    
                }
                
            }else {
                
                echo "There was an error uploading your image!";
                
            }
            
        }else {
            
            echo "You can't upload files of this type!";
            
        }
        
                
    }
        
        ?>
        

        <form method="POST" action="addBooks.php">
            <div class="input-group">
                <label>ISBN</label>
                <input type="number" name="isbn" maxlength="35" placeholder="ISBN" required="">
            </div>
            <div class="input-group">
                <label>Title</label>
                <input type="text" name="title" maxlength="35" placeholder="Title" required="">
            </div>
            <div class="input-group">
                <label>Author</label>
                <input type="text" name="author" maxlength="35" placeholder="Author" required="">
            </div>
            <div class="input-group">
                <label>Image</label>
                <input type="file" name="image"required="">
                <input type="submit" value="Upload Image" name="imgUpload">
            </div>
            <div class="input-group">
                <label>Price</label>
                <input type="number" name="price" maxlength="35" placeholder="Price" required="">
            </div>
            <div class="input-group">
                <label>Quantity In Stock</label>
                <input type="number" name="qtyinstock" maxlength="35" placeholder="Quantity in Stock" required="">
            </div>
            <div class="input-group">
                <label>Publisher</label>
                                <select>
                    <?php 
                    
                    $r = mysqli_query($dbc, "SELECT * from publisher");
                    while($row=mysqli_fetch_array($r))
                    {
                    ?>
                <option><?php echo $row['pubName']; ?></option>
                
                <?php
                
                }
                
                ?>
                </select>
            </div>
            <div class="input-group">
                <label>Category</label>
                <select>
                    <?php 
                    
                    $r = mysqli_query($dbc, "SELECT * from bookcategory");
                    while($row=mysqli_fetch_array($r))
                    {
                    ?>
                <option><?php echo $row['category']; ?></option>
                
                <?php
                
                }
                
                ?>
                </select>
            </div>
            <div class="input-group">
                <label>Sub Category</label>
                                <select>
                    <?php 
                    
                    $r = mysqli_query($dbc, "SELECT * from booksubcategory");
                    while($row=mysqli_fetch_array($r))
                    {
                    ?>
                <option><?php echo $row['subCategory']; ?></option>
                
                <?php
                
                }
                
                ?>
                </select>
            </div>
            <div class="input-group">
                <button type="submit" name="addbook" class="btn">Add Book</button>
            </div>
            

        </form>
    </body>
</html>
