<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <script type="text/javascript">
  if (screen.width >= 699) {
    document.location = "products.php?cat=<?php echo $_GET["cat"];  ?>";
  }
</script>
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
      <?php include 'dbconfig.php';
      if (isset($_GET["cat"])) {
        if (isset($_GET["max"])) {
          $sql ="SELECT * FROM `products` WHERE `products`.`pcat`='".$_GET["cat"]."'AND `products`.`pprice`<='".$_GET["max"]."'";
        }else {
          $sql ="SELECT * FROM `products` WHERE `products`.`pcat`='".$_GET["cat"]."'";
        }

      }else {
        $sql ="SELECT * FROM `products`";
      }
      $result = mysqli_query($con,$sql);

      echo "<div class='col border'><div class='table table-sm'>";
      $games = 0;
      if(mysqli_num_rows($result)> 0)
      {
        while($row = mysqli_fetch_assoc($result)){
          // make a new row after 3 games
          if($games%5 == 0) {
            if($games > 0) {
              // and only close it if it's not the first game
              echo '</div>';
            }
            echo "<div class='card-column'>";
          }
          $pid=$row['pid'];
          $title=$row['ptitle'];
          $price=$row['pprice'];
          $image=$row['pimg'];
          ?>
          <td>
              <div class="card shadow">
                <img class="card-img-top" src="<?php echo $image; ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $title; ?></h5>
                  <p class="card-text mt-n3"><?php echo "LKR $price"; ?></p>
                  <p class="card-text text-center"><a href="single.php?id=<?php echo "$pid"; ?>"><button type="button" class="btn btn-outline-success">View Details</button></a></p>
                </div>
              </div>
              <br>

          </td>
          <?php
          $games++; // increment the $games element so we know how many games we've already processed
        }
      }else {
        echo "NOTHING FOUND";
      }
      ?>
    </div>
      </div>

    </div>
  </div>

  <?php include "footer.php" ?>

</body>
</html>
