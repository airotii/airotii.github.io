<?php 
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/buildapc.css" />
  <title>Build a PC</title>
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
          <a class="nav-link active" href="buildapc.php">Build a PC</a>
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

    <!-- Part Categories -->

    <div class="row">
      <div class="col-sm-3" id="partCat">
        <ul class="list-group mt-3">
          <li class="btn btn-dark m-1" id="mthrBrd">Motherboard +</li>
          <li class="btn btn-dark m-1" id="cpu">CPUs +</li>
          <li class="btn btn-dark m-1" id="gpu">GPUs +</li>
          <li class="btn btn-dark m-1" id="memory">Memory +</li>
          <li class="btn btn-dark m-1" id="psu">PSUs +</li>
          <li class="btn btn-dark m-1" id="case">Cases +</li>
          <li class="btn btn-dark m-1" id="monitor">Monitors +</li>
          <li class="btn btn-dark m-1" id="keyboard">Keyboards +</li>
        </ul>
      </div>
      <div class="col-sm-9" id="bldContent">
        <span class="display-4" style="margin-left: 25%;">Build Your PC</span>

        <img src="images/buildapcPng.png" alt="buildapc" id="buildapcPng">

        <!-- Motherboard list -->

        <div class="mbList shadow-sm mt-3 p-3">
          <div class="row">
            <?php
                  $query = "SELECT * FROM partsubmission WHERE parttype ='Motherboard'";
                  $select_part_names = mysqli_query($con,$query);
                      while ($row = mysqli_fetch_assoc($select_part_names)) {
                          $Partname = $row['partname'];
                          $Partprice = $row['partprice'];
                          $PartImg = $row['partImg'];
                          $Username = $row['username'];
                          $Partcon = $row['partCon'];
                          ?>

            <div class="col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div>
                    <span>Sold By: <?php echo $Username;?></span>
                  </div>
                  <hr>
                  <img src="<?php echo $PartImg;?>" class="card-img-top" alt="Motherboard">
                  <div class="part-details">
                    <span class="part-title"><?php echo $Partname;?></span>
                    <hr>
                    <span><strong>Price: </strong><span class="part-price">$<?php echo $Partprice;?></span></span>
                    <strong><span class="m-1 p-3"><?php echo $Partcon;?></span></strong>
                    <br>
                    <button class="btn addtoList" type="button">Add to List</button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <!-- CPU List -->

        <div class="cpuList shadow-sm mt-3 p-3">
          <div class="row">
            <?php
                  $query = "SELECT * FROM partsubmission WHERE parttype ='CPU'";
                  $select_part_names = mysqli_query($con,$query);
                      while ($row = mysqli_fetch_assoc($select_part_names)) {
                          $Partname = $row['partname'];
                          $Partprice = $row['partprice'];
                          $PartImg = $row['partImg'];
                          $Username = $row['username'];
                          $Partcon = $row['partCon'];
                          ?>

            <div class="col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div>
                    <span>Sold By: <?php echo $Username;?></span>
                  </div>
                  <hr>
                  <img src="<?php echo $PartImg;?>" class="card-img-top" alt="CPU">
                  <div class="part-details">
                    <span class="part-title"><?php echo $Partname;?></span>
                    <hr>
                    <span><strong>Price: </strong><span class="part-price">$<?php echo $Partprice;?></span></span>
                    <strong><span class="m-1 p-3"><?php echo $Partcon;?></span></strong>
                    <br>
                    <button class="btn addtoList" type="button">Add to List</button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <!-- GPU List -->

        <div class="gpuList shadow-sm mt-3 p-3">
          <div class="row">
            <?php
                    $query = "SELECT * FROM partsubmission WHERE parttype ='GPU'";
                    $select_part_names = mysqli_query($con,$query);
                        while ($row = mysqli_fetch_assoc($select_part_names)) {
                            $Partname = $row['partname'];
                            $Partprice = $row['partprice'];
                            $PartImg = $row['partImg'];
                            $Username = $row['username'];
                            $Partcon = $row['partCon'];
                            ?>
            <div class="col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div>
                    <span>Sold By: <?php echo $Username;?></span>
                  </div>
                  <hr>
                  <img src="<?php echo $PartImg;?>" class="card-img-top" alt="GPU">
                  <div class="part-details">
                    <span class="part-title"><?php echo $Partname;?></span>
                    <hr>
                    <span><strong>Price: </strong><span class="part-price">$<?php echo $Partprice;?></span></span>
                    <strong><span class="m-1 p-3"><?php echo $Partcon;?></span></strong>
                    <br>
                    <button class="btn addtoList" type="button">Add to List</button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <!-- Memory List -->

        <div class="memoryList shadow-sm mt-3 p-3">
          <div class="row">
            <?php
                    $query = "SELECT * FROM partsubmission WHERE parttype ='Memory'";
                    $select_part_names = mysqli_query($con,$query);
                        while ($row = mysqli_fetch_assoc($select_part_names)) {
                            $Partname = $row['partname'];
                            $Partprice = $row['partprice'];
                            $PartImg = $row['partImg'];
                            $Username = $row['username'];
                            $Partcon = $row['partCon'];
                            ?>
            <div class="col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div>
                    <span>Sold By: <?php echo $Username;?></span>
                  </div>
                  <hr>
                  <img src="<?php echo $PartImg;?>" class="card-img-top" alt="GPU">
                  <div class="part-details">
                    <span class="part-title"><?php echo $Partname;?></span>
                    <hr>
                    <span><strong>Price: </strong><span class="part-price">$<?php echo $Partprice;?></span></span>
                    <strong><span class="m-1 p-3"><?php echo $Partcon;?></span></strong>
                    <br>
                    <button class="btn addtoList" type="button">Add to List</button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <!-- PSU List -->

        <div class="psuList shadow-sm mt-3 p-3">
          <div class="row">
            <?php
                  $query = "SELECT * FROM partsubmission WHERE parttype ='PSU'";
                  $select_part_names = mysqli_query($con,$query);
                      while ($row = mysqli_fetch_assoc($select_part_names)) {
                          $Partname = $row['partname'];
                          $Partprice = $row['partprice'];
                          $PartImg = $row['partImg'];
                          $Username = $row['username'];
                          $Partcon = $row['partCon'];
                          ?>

            <div class="col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div>
                    <span>Sold By: <?php echo $Username;?></span>
                  </div>
                  <hr>
                  <img src="<?php echo $PartImg;?>" class="card-img-top" alt="PSU">
                  <div class="part-details">
                    <span class="part-title"><?php echo $Partname;?></span>
                    <hr>
                    <span><strong>Price: </strong><span class="part-price">$<?php echo $Partprice;?></span></span>
                    <strong><span class="m-1 p-3"><?php echo $Partcon;?></span></strong>
                    <br>
                    <button class="btn addtoList" type="button">Add to List</button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <!-- Case list -->

        <div class="casesList shadow-sm mt-3 p-3">
          <div class="row">
            <?php
                  $query = "SELECT * FROM partsubmission WHERE parttype ='Case'";
                  $select_part_names = mysqli_query($con,$query);
                      while ($row = mysqli_fetch_assoc($select_part_names)) {
                          $Partname = $row['partname'];
                          $Partprice = $row['partprice'];
                          $PartImg = $row['partImg'];
                          $Username = $row['username'];
                          $Partcon = $row['partCon'];
                          ?>

            <div class="col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div>
                    <span>Sold By: <?php echo $Username;?></span>
                  </div>
                  <hr>
                  <img src="<?php echo $PartImg;?>" class="card-img-top" alt="Case">
                  <div class="part-details">
                    <span class="part-title"><?php echo $Partname;?></span>
                    <hr>
                    <span><strong>Price: </strong><span class="part-price">$<?php echo $Partprice;?></span></span>
                    <strong><span class="m-1 p-3"><?php echo $Partcon;?></span></strong>
                    <br>
                    <button class="btn addtoList" type="button">Add to List</button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <!-- Monitor List -->

        <div class="monitorList shadow-sm mt-3 p-3">
          <div class="row">
            <?php
                  $query = "SELECT * FROM partsubmission WHERE parttype ='Monitor'";
                  $select_part_names = mysqli_query($con,$query);
                      while ($row = mysqli_fetch_assoc($select_part_names)) {
                          $Partname = $row['partname'];
                          $Partprice = $row['partprice'];
                          $PartImg = $row['partImg'];
                          $Username = $row['username'];
                          $Partcon = $row['partCon'];
                          ?>
            <div class="col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div>
                    <span>Sold By: <?php echo $Username;?></span>
                  </div>
                  <hr>
                  <img src="<?php echo $PartImg;?>" class="card-img-top" alt="Monitor">
                  <div class="part-details">
                    <span class="part-title"><?php echo $Partname;?></span>
                    <hr>
                    <span><strong>Price: </strong><span class="part-price">$<?php echo $Partprice;?></span></span>
                    <strong><span class="m-1 p-3"><?php echo $Partcon;?></span></strong>
                    <br>
                    <button class="btn addtoList" type="button">Add to List</button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <!-- Keyboard List -->

        <div class="keyboardList shadow-sm mt-3 p-3">
          <div class="row">
            <?php
                  $query = "SELECT * FROM partsubmission WHERE parttype ='Keyboard'";
                  $select_part_names = mysqli_query($con,$query);
                      while ($row = mysqli_fetch_assoc($select_part_names)) {
                          $Partname = $row['partname'];
                          $Partprice = $row['partprice'];
                          $PartImg = $row['partImg'];
                          $Username = $row['username'];
                          $Partcon = $row['partCon'];
                          ?>
            <div class="col-sm-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div>
                    <span>Sold By: <?php echo $Username;?></span>
                  </div>
                  <img src="<?php echo $PartImg;?>" class="card-img-top" alt="Monitor">
                  <div class="part-details">
                    <span class="part-title"><?php echo $Partname;?></span>
                    <hr>
                    <span><strong>Price: </strong><span class="part-price">$<?php echo $Partprice;?></span></span>
                    <strong><span class="m-1 p-3"><?php echo $Partcon;?></span></strong>
                    <br>
                    <button class="btn addtoList" type="button">Add to List</button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Created combination list -->

    <div class="row">
      <div class="col-sm-11 mt-4 mx-auto" id="listContainer">
        <div class="mt-4 mb-3 p-3 shadow-sm list">

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-3 mt-3">
      </div>
      <div class="col-sm-9 mt-3 mb-3 p-3" id="total">
        <strong><span class="list-total"></span></strong>
        <!-- <input type='submit' class="btn purchase" value='Purchase' id="purchase" name="purchase"> -->
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="parts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>
