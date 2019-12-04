<?php 
    $con = mysqli_connect('127.0.0.1', 'root', '');

    if (!$con) {
        echo 'Not Connected to Server';
    }

    if (!mysqli_select_db($con, 'buildapc')) {
        echo 'Database Not Selected';
    }

    $file_get = $_FILES['partImg']['name'];
    $temp = $_FILES['partImg']['tmp_name'];

    $file_to_saved = "./images/".$file_get;
    move_uploaded_file($temp, $file_to_saved);

    $Email = $_POST['email'];
    $Username = $_POST['username'];
    $Partname = $_POST['partName'];
    $Partprice = $_POST['partPrice'];
    $Parttype = $_POST['select'];
    $Partcon = $_POST['state'];
    

    $sql = "INSERT INTO partsubmission (email,username,partname,parttype,partCon,partprice,partImg) VALUES ('$Email', '$Username', '$Partname', '$Parttype', '$Partcon', '$Partprice','$file_to_saved')";

    if (!mysqli_query($con, $sql)) {
        echo 'Part Not Submitted';
    }

    else {
        echo 'Part Submitted';
    }

    header("Location: buildapc.php");
?>