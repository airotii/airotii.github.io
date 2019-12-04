<?php 
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://fonts.googleapis.com/css?family=Changa+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Home</title>
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
          <a class="nav-link" href="submission.php">Submit a Part</a>
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
      <div class="col-md-10" id="topLeftHead">
        <h1 class="indexHeading">A PC Building Platform</h1>
        <h2 class="indexSubHeading">Easily build your PC</h2>
      </div>

      <div class="d-none d-md-block col-md-2" id="topRightHead">
      </div>
      <h1 class="header d-none d-lg-block"><span class="span" style="color:white;">PC Building</span> Made Easier</h1>
    </div>

    <div class="cardContainer m-5 mb-3 shadow-lg">
      <div class="row pt-5 mb-3">
        <div class="card shadow-lg" id="buildCard">
          <div class="mx-auto pt-3">
            <img src="images/build.png" alt="buildIcon" class="rounded-circle">
          </div>
          <div class="card-body">
            <h5 class="card-title ml-5 pl-5">Build a PC</h5>
            <hr>
            <p>
              Pick parts for your PC based on your needs, preferences, and
              knowledge of PC building.
            </p>
            <a href="buildapc.php" class="btn" id="buildBtn">Learn More</a>
          </div>

        </div>

        <div class="card shadow-lg" id="buyCard">
          <div class="mx-auto pt-3">
            <img src="images/buy.png" alt="buyIcon" class="rounded-circle">
          </div>
          <div class="card-body">
            <h5 class="card-title ml-5 pl-5">Buy a PC</h5>
            <hr>
            <p>
              Buy a prebuilt PC without having to know anything about PC
              building.
            </p>
            <a href="buyapc.php" class="btn" id="buildBtn">Learn More</a>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row mt-5 mb-5 accordion-container-row">
      <div class="col-md-6 mt-5 mb-5 accordion-container">
        <div id="accordion" class="pl-5">
          <div class="card shadow rounded" id="colCardOne">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                  aria-controls="collapseOne" id="jsOne">
                  Sell Your parts
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                Submit your parts on the "Submit a Part" page, and sell them for the right price
              </div>
            </div>
          </div>
          <div class="card shadow rounded" id="colCardTwo">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
                  aria-expanded="false" aria-controls="collapseTwo" id="jsTwo">
                  Build Your PC
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                Build the right PC for you based on your preferences from 50+ combinations of parts
              </div>
            </div>
          </div>
          <div class="card shadow rounded" id="colCardThree">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                  aria-expanded="false" aria-controls="collapseThree" id="jsThree">
                  Buy pre-built PCs
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                Specify the range of your budget and buy a prebuilt PC from a variety of PC combinations
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6" class="collapse-content">
        <video width="630" height="350" class="video mt-5" autoplay loop>
          <source src="images/gif.mp4" type="video/mp4">
        </video>
        <img src="images/undraw_building_blocks_n0nc.png" class="collapse-img" alt="collapse-build-img">
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

<script>
  $(document).ready(function () {
    $(".collapse-img").hide();

    $('#jsOne').click(function () {
      $(".video").show();
      $(".collapse-img").hide();

      $('#jsTwo').click(function () {
        $(".video").hide();
        $(".collapse-img").show();
      });
    });
  });
</script>