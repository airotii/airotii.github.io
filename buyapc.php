<?php 
  include("config.php");
	include("Account.php");
	include("Constants.php");
	include("register-handler.php");
  include("login-handler.php");

  $query = "SELECT * FROM prebuilds ORDER BY prebuiltprice desc";  
  $result = mysqli_query($con, $query);  

  if (!isset($_SESSION['userLoggedIn'])){
      header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Changa+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/buyapc.css" />
  <title>Buy a PC</title>
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
          <a class="nav-link active" href="buyapc.php">Buy a Pre-built PC</a>
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
    <div class="row" id="priceRangePickRow">
      <div class="col-12">
        <h1 class="buyapcH1">Specify your budget, and buy what suits you: </h1>
      </div>
      <div align="center">
        <span>$500 </span><input type="range" min="500" max="5000" step="500" value="500" id="min-price"
          name="min-price" />
        <span id="price-range"></span>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="card-body mt-3">
          <div id="build-details">
            <?php  
                    if(mysqli_num_rows($result) > 0)  
                    {  
                        while($row = mysqli_fetch_array($result))  
                        {  
                          $Prebuiltname = $row['prebuiltname'];
                          $Prebuiltprice = $row['prebuiltprice'];
                    ?>
            <div class="row">
              <div class="col-md-3 border-right image-container">
                <img src="<?php echo $row['prebuildimg']; ?>" class="card-img-top mx-auto" name="prebuildimg" alt="">
              </div>

              <div class="col-md-9">
                <div style="padding:12px; height:100%;">
                  <form action="purchase.php" method="POST">
                    <div class="m-3">
                      <input type="text" class="part text-center rounded"
                        style="background-color: #f6de61; margin-left: 30%;" name="prebuiltname"
                        value="<?php echo $row['prebuiltname']; ?>" readonly="readonly">
                      <span class="text-center">Price:$<input type="text" class="part rounded" style=""
                          name="prebuiltprice" value="<?php echo $row['prebuiltprice']; ?>" readonly="readonly"></span>
                    </div>
                    <br>
                    <div class="mt-3 p-3 shadow-sm rounded" style="padding-left: 15%; border: 1px solid #f6de61;">
                      <span class="part">
                        <h4><strong>Motherboard: </strong></h4><?php echo $row["motherboard"]; ?>
                      </span>
                      <br>
                      <span class="part">
                        <h4><strong>CPU: </strong></h4><?php echo $row["cpu"]; ?>
                      </span>
                      <br>
                      <span class="part">
                        <h4><strong>GPU: </strong></h4><?php echo $row["gpu"]; ?>
                      </span>
                      <br>
                      <span class="part">
                        <h4><strong>Memory: </strong></h4><?php echo $row["memory"]; ?>
                      </span>
                      <br>
                      <span class="part">
                        <h4><strong>PSU: </strong></h4><?php echo $row["psu"]; ?>
                      </span>
                      <br>
                      <span class="part">
                        <h4><strong>Case: </strong></h4><?php echo $row["buildcase"]; ?>
                      </span>
                      <br>
                      <span class="part">
                        <h4><strong>Monitor: </strong></h4><?php echo $row["monitor"]; ?>
                      </span>
                      <br>
                      <span class="part">
                        <h4><strong>Keyboard: </strong></h4><?php echo $row["keyboard"]; ?>
                      </span>
                      <br>
                    </div>
                    <input type='submit' class="btn purchase" value='Purchase' id="purchase" name="purchase">
                  </form>
                </div>
              </div>

            </div>
            <hr>
            <?php  
                        }  
                    }  
                    ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="parts.js"></script>
  <script src="filter.js"></script>
</body>

</html>
<script>
  $(document).ready(function () {
    $('#min-price').change(function () {
      var price = $(this).val();
      $("#price-range").text("$" + price);
      $.ajax({
        url: "filter.php",
        method: "POST",
        data: {
          price: price
        },
        success: function (data) {
          $("#build-details").fadeIn(500).html(data);
        }
      });
    });

    $("#purchase").click(function () {
      alert("Order Has Been Placed");
    })
  });
</script>