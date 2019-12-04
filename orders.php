<?php 
  include("config.php");
  include("Account.php");
  include("Constants.php");
  include("register-handler.php");
  include("login-handler.php");

  if (!isset($_SESSION['userLoggedIn'])){
      header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Changa+One&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed&display=swap" rel="stylesheet"> 
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Your Orders</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-lg mt-3 p-3 rounded sticky-top">
      <a class="navbar-brand" href="index.php">BUILDAPC</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#nav"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="buildapc.php">Build a PC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="buyapc.php">Buy a Pre-built PC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="submission.php">Submit a Part</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="orders.php">Your Orders</a>
          </li>
        </ul>
        <?php if(!isset($_SESSION['userLoggedIn']))
          {
          ?>
            <a class="btn" id="login" href="login.php">Login</a>
          <?php 
        }
        else{ 
          ?>
            <a class="btn" id="logout" href="logout.php">Logout</a>
          <?php
         } 
         ?>
      </div>
    </nav>
    <div class="container-fluid">
    <div class="col-12">
        <h1 class="ordersH1">Your orders: </h1>
        </div>
        <div class="row">
         <div class="col-sm-10" style="height: 100%; margin-top: 50px;">
            <div class="row">
                <div class="col-12 p-3 shadow-lg">
                    <table class="table table-hover">
                            <tr>
                            <th scope="col">Username</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Order</th>
                            <th scope="col">Price</th>
                            <th scope="col">Order Date</th>
                            </tr>
                        <?php
                        $Username = $_SESSION['userLoggedIn'];
                        $query = "SELECT * FROM orders WHERE username = '$Username'";
                        $select_details = mysqli_query($con,$query);
                        while ($row = mysqli_fetch_assoc($select_details)) {
                            $Username = $row['username'];
                            $Firstname = $row['firstname'];
                            $Lastname = $row['lastname'];
                            $Order = $row['ordername'];
                            $Price = $row['orderprice'];
                            $ETA = $row['orderdate'];
                          ?>
                        <tbody>
                            <tr>
                            <th scope="row"><?php echo $Username ?></th>
                            <td><?php echo $Firstname ?></td>
                            <td><?php echo $Lastname ?></td>
                            <td><?php echo $Order ?></td>
                            <td>$<?php echo $Price ?></td>
                            <td><?php echo $ETA ?></td>
                            </tr>
                            <tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
         </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>