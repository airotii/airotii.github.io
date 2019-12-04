<?php  

include("config.php");

$connect = mysqli_connect("localhost", "root", "", "buildapc");

 if(isset($_POST['purchase']))  
 {    
    $sql = "SELECT * FROM prebuilds";  
    $con = mysqli_query($connect, $sql);

    $Username = $_SESSION['userLoggedIn'];
    $sqli = "SELECT * FROM users WHERE username = '$Username'";
    $coni = $con = mysqli_query($connect, $sqli);
    $row = mysqli_fetch_assoc($coni);

    $Email = $row['email'];
    $Firstname = $row['firstname'];
    $Lastname = $row['lastname'];
    $Ordername = $_POST['prebuiltname'];
    $Orderprice = $_POST['prebuiltprice'];
    $Date = date("Y-m-d");
    $query = "INSERT INTO orders (username,email,firstname,lastname,ordername,orderprice,orderdate) VALUES ('$Username', '$Email', '$Firstname', '$Lastname', '$Ordername', '$Orderprice', '$Date')";  
    $result = mysqli_query($connect, $query); 
    
    header("Location: buyapc.php");
    
 } 
 else {
     echo "Failed";
 } 
 ?>  