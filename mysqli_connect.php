<?php 

DEFINE ('DB_USERNAME', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'loginsystem');

$dbc = mysqli_connect(DB_HOST, DB_USERNAME,DB_PASSWORD, DB_NAME) or DIE ('Could not connect to MySQL');

mysqli_set_charset($dbc, 'utf8');

session_start();
$firstName = "";
$lastName = "";
$username = "";
$email = "";

$empEmail = "";
$empFirstName = "";
$empLastName = "";
$empUsername = "";
$empId = "";

$userId = "";
$address = "";
$city = "";
$state = "";
$zip = "";
$phone = "";
$shipAddress = "";
$shipCity = "";
$shipState = "";
$shipZip = "";
$shipCountry = "";
$errors = array();  

if (isset($_GET['logout'])) {
    
    session_destroy();
    unset($_SESSION['username']);
    header('location: index.php');
    
}
