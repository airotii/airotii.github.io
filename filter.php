<?php  
  
 $connect = mysqli_connect("localhost", "root", "", "buildapc");  
 if(isset($_POST["price"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM prebuilds WHERE prebuiltprice <= ".$_POST['price']." ORDER BY prebuiltprice desc";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                <div class="row">
                    <div class="col-md-3 border-right image-container">
                    <img src="'.$row["prebuildimg"].'" class="card-img-top mx-auto" alt="">
                    </div>
                    <div class="col-md-9">  
                  <div style="padding:12px; height:100%;">
                  <form action="purchase.php" method="POST">
                    <div class="m-3">
                    <input type="text" class="part text-center rounded" style="background-color: #f6de61; margin-left: 30%;" name="prebuiltname" value="'.$row["prebuiltname"].'" readonly="readonly">  
                    <span class="text-center">Price:$<input type="text" class="part rounded" style="" name="prebuiltprice" value="'.$row["prebuiltprice"].'" readonly="readonly"></span>
                    </div>  
                    <br>
                    <div class="mt-3 p-3 shadow-sm rounded" style="padding-left: 15%; border: 1px solid #f6de61;">
                    <span class="part"><h4><strong>Motherboard: </strong></h4>'.$row["motherboard"].'</span>
                    <br>
                    <span class="part"><h4><strong>CPU: </strong></h4>'.$row["cpu"].'</span>
                    <br>
                    <span class="part"><h4><strong>GPU: </strong></h4>'.$row["gpu"].'</span>
                    <br>
                    <span class="part"><h4><strong>Memory: </strong></h4>'.$row["memory"].'</span>
                    <br>
                    <span class="part"><h4><strong>PSU: </strong></h4>'.$row["psu"].'</span>
                    <br>
                    <span class="part"><h4><strong>Case: </strong></h4>'.$row["buildcase"].'</span>
                    <br>
                    <span class="part"><h4><strong>Monitor: </strong></h4>'.$row["monitor"].'</span>
                    <br>
                    <span class="part"><h4><strong>Keyboard: </strong></h4>'.$row["keyboard"].'</span>  
                    <br>
                    </div>
                    <input type="submit" class="btn purchase" value="Purchase" id="purchase" name="purchase">
                    </form> 
                  </div> 
                </div> 
              </div>
              <hr>
                ';   
           }  
      }  
      else  
      {  
           $output = "No Products Found";  
      }  
      echo $output;  
 }  
 ?>  

 

