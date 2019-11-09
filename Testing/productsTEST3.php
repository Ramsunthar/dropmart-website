<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Products</title>
  <style>
    .card{
      margin-left: 0.5em !important;
      margin-right: 0.5em !important;
    }
  </style>
</head>
<body>
  <?php session_start();
  if(!isset($_SESSION["loggedInCust"]))
  {
    include "headerLoggedOut.php";
  }else {
    include "headerLoggedIn.php";
  }
  ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        <p class="h5 text-center">Filter</p>
        <form class="filter" action="index.html" method="post">
          <p class="h6">Categories</p>
          <div class="custom-control custom-radio">
            <input type="radio" name="customRadio" class="custom-control-input" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="grocery"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch3">
            <label class="custom-control-label" for="customSwitch3">Grocery</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="customRadio" class="custom-control-input" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="fruits"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch4">
            <label class="custom-control-label" for="customSwitch4">Fruits</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="customRadio" class="custom-control-input" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="vegetables"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch5">
            <label class="custom-control-label" for="customSwitch5">Vegetables</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="customRadio" class="custom-control-input" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="fish"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch12">
            <label class="custom-control-label" for="customSwitch12">Fish</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="customRadio" class="custom-control-input" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="meat"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch11">
            <label class="custom-control-label" for="customSwitch11">Meat</label>
          </div>

          <div class="custom-control custom-radio">
            <input type="radio" name="customRadio" class="custom-control-input" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="dairy"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">Dairy</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="customRadio" class="custom-control-input" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="beverages"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch8">
            <label class="custom-control-label" for="customSwitch8">Beverages</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="customRadio" class="custom-control-input" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="pharmaceuticals"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch2">
            <label class="custom-control-label" for="customSwitch2">Pharmaceuticals</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="customRadio" class="custom-control-input" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="household"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch6">
            <label class="custom-control-label" for="customSwitch6">Household</label>
          </div>
          <br>
          <div class="form-group">
            <label class="h6" for="formControlRange">Price</label>
            <input type="range" class="form-control-range"  min="0" max="9999" step="10" id="formControlRange">
            <p>0 - 9999</p>
          </div>
          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-warning">Find Match</button>
          </div>
        </form>
      </div>

      <?php include 'dbconfig.php';
      if (isset($_GET["cat"])) {
        if (isset($_GET["max"])) {
          $sql ="SELECT * FROM `products` WHERE `products`.`pcat`='".$_GET["cat"]."'AND `products`.`pprice`<='".$_GET["max"]."'";
        }else {
          $sql ="SELECT RAND()*1 FROM `products` WHERE `products`.`pcat`='".$_GET["cat"]."'";
        }

      }else {
        $sql ="SELECT * FROM `products` ORDER BY RAND() LIMIT 5";
      }
      $result = mysqli_query($con,$sql);

      echo "<div class='col-10 border'><table>";
      $games = 0;
      if(mysqli_num_rows($result)> 0)
      {

        while($row = mysqli_fetch_assoc($result)){
          // make a new row after 3 games
          if($games%5 == 0) {
            if($games > 0) {
              // and only close it if it's not the first game
              echo '</tr>';
            }
            echo "<tr class='card-column'>";
          }
          $pid=$row['pid'];
          $title=$row['ptitle'];
          $price=$row['pprice'];
          $image=$row['pimg'];
          ?>
          <td>
              <div class="card shadow">
                <a href="single.php?id=<?php echo "$pid"; ?>"><img class="card-img-top" src="<?php echo $image; ?>" alt="Card image cap"></a>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $title; ?></h5>
                  <p class="card-text mt-n3"><?php echo "LKR $price"; ?></p>
                  <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
                </div>
              </div>
            <br />
          </td>
          <?php
          $games++; // increment the $games element so we know how many games we've already processed
        }
      }else {
        echo "NOTHING FOUND";
      }
      ?>
      </table>
      </div>

    </div>
  </div>

  <?php include "footer.php" ?>

</body>
</html>
