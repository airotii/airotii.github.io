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
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://fonts.googleapis.com/css?family=Changa+One&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed&display=swap" rel="stylesheet"> 
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/submission.css" />
    <title>Submit a Part</title>
    <script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
    <script>
        Weglot.initialize({
            api_key: 'wg_4339f2fe0bc7f04e01e1341abf2d2d942'
        });
    </script>
  </head>
<body>
    <nav class="navbar navbar-expand-md navbar-light shadow-lg bg-light mt-3 p-3 rounded sticky-top">
      <a class="navbar-brand" href="index.php">BUILDAPC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">
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
            <a class="nav-link active" href="submission.php">Submit a Part</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php">Your Orders</a>
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
        <div class="row">
        <div class="col-12">
        <h1 class="submitH1">Submit your parts to be sold: </h1>
        </div>
            <div class="col-sm-6 border shadow-lg mb-3" id="form">
                <form action="submit.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="partName">Part Name</label>
                        <input type="text" class="form-control" id="partName" placeholder="Part Name" name="partName" required>
                    </div>
                    <div class="form-group">
                        <label for="select" required>Select Part Type</label>
                        <select class="form-control" id="select" name="select" required>
                          <option>Motherboard</option>
                          <option>CPU</option>
                          <option>GPU</option>
                          <option>Memory</option>
                          <option>PSU</option>
                          <option>Case</option>
                          <option>Monitor</option>
                          <option>Keyboard</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="state" required>Select Part Condition</label>
                        <select class="form-control" id="state" name="state" required>
                          <option>New</option>
                          <option>Used</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="partPrice">Part Price</label>
                        <input type="text" class="form-control" id="partPrice" placeholder="Part Price" name="partPrice" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Part Image</label>
                        <input type="file" class="form-control-file" id="partImg" name="partImg" required>
                    </div>
                    <button type="submit" class="btn submit" name="partSubmitBtn" value="Insert" id="insert">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>

<script>
  $("#insert").click(function() {
    alert("Part Submitted Successfully!");
  })
</script>