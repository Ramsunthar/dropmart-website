<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Single</title>
</head>
<script type="text/javascript">
$(document).ready(function(){
  $("button").click(function(){
    $(".card-text").load();
  });
});
</script>
<body>
  <?php session_start();
  if(!isset($_SESSION["loggedInCust"]))
  {
    include "headerLoggedOut.php";
  }else {
    include "headerLoggedIn.php";
  }
  ?>

  <div class="container">
    <?php include 'dbconfig.php';

    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];


    $sql ="SELECT * FROM `products` WHERE `products`.`pid`='".$_GET["id"]."'";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result)> 0)
    {
      $row = mysqli_fetch_assoc($result);
      $pid=$row['pid'];
      $title=$row['ptitle'];
      $price=$row['pprice'];
      $image=$row['pimg'];
      $category=$row['pcat'];
      ?>
      <div class="row">
        <div class="col-7">
          <img src="<?php echo $image; ?>" class="img-fluid w-100" alt="Responsive image">
        </div>
        <div class="col-5">
          <p class="h2 font-weight-bold"><?php echo $title; ?></p>
          <p class="h4 font-weight-normal">LKR <?php echo $price; ?></p>
          <hr>
          <p class="h6">Item Code - <?php echo $pid; ?></p>
          <p class="h6">Category - <?php echo ucwords($category); ?></p>
          <?php
          if (array_key_exists($pid,$_SESSION["cartProducts"]))
          {
            ?>
            <a href="cart.php"><p class="card-text text-center"><button type="button" class="btn btn-outline-dark">Added To Cart</button></p></a>
            <?php
          }else {
            ?>
            <form method="post">
              <input type="hidden" value="<?php echo $pid; ?>" name="id"/>
              <div class="row mx-2">
                <input type="number" value="1" class="form-control col w-25" name="qty" min="1" max="25" placeholder="1"/>
                <div class="col-2"></div>
                <button type="submit" name="Addbtn" class="btn btn-outline-success col">Add To Cart</button>
              </div>
            </form>
            <?php
            if(isset($_POST["Addbtn"])){
              $id=$_POST["id"];
              $qty=$_POST["qty"];
              if (isset($_POST["qty"])) {
                $_SESSION["cartProducts"][$id] = $qty;
                echo "<script>window.onload = function() {if(!window.location.hash) {window.location = window.location + '#Added';window.location.reload();}}</script>";
              }else {
                $_SESSION["cartProducts"][$id] = 1;
                echo "<script>window.onload = function() {if(!window.location.hash) {window.location = window.location + '#Added';window.location.reload();}}</script>";
              }
            }
          }
          ?>
        </div>
      </div>
      <?php
    }
    mysqli_close($con);
    ?>

    <div class="row">
      <div class="col">
        <p class="h2 text-center">Related Products</p>
        <div class="card-deck">
          <?php
          include 'dbconfig.php';
          $rpsql ="SELECT * FROM `products` WHERE `products`.`pcat`='$category' AND NOT `products`.`pid`='$pid' ORDER BY RAND() LIMIT 4";
          $rpresult = mysqli_query($con,$rpsql);
          if(mysqli_num_rows($rpresult)> 0)
          {
            while($rprow = mysqli_fetch_assoc($rpresult)){
              $rppid=$rprow['pid'];
              $rptitle=$rprow['ptitle'];
              $rpprice=$rprow['pprice'];
              $rpimage=$rprow['pimg'];
              $rpcategory=$rprow['pcat'];
              ?>
              <div class="card shadow">
                <a href="single.php?id=<?php echo "$rppid"; ?>"><img class="card-img-top" src="<?php echo $rpimage; ?>" alt="Card image cap"></a>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $rptitle; ?></h5>
                  <p class="card-text mt-n3">LKR <?php echo $rpprice; ?></p>
                  <?php
                  if (array_key_exists($rppid,$_SESSION["cartProducts"]))
                  {
                    ?>
                    <a href="cart.php"><p class="card-text text-center"><button type="button" class="btn btn-outline-dark">Added To Cart</button></p></a>
                    <?php
                  }else {
                    ?>
                    <form method="post">
                      <input type="hidden" value="<?php echo $pid; ?>" name="id"/>
                      <div class="row mx-2 pb-3">
                        <label for="qty">Quantity</label>&nbsp;&nbsp;&nbsp;
                        <input type="number" value="1" class="form-control col" id="qty" name="qty" min="1" max="25" placeholder="1"/>
                      </div>
                      <div class="row mx-2">
                        <button type="submit" name="Addbtn" class="btn btn-outline-success col">Add To Cart</button>
                      </div>
                    </form>
                    <?php
                    if(isset($_POST["Addbtn"])){
                      $id=$_POST["id"];
                      $qty=$_POST["qty"];
                      if (isset($_POST["qty"])) {
                        $_SESSION["cartProducts"][$id] = $qty;
                      }else {
                        $_SESSION["cartProducts"][$id] = 1;
                      }
                    }
                  }
                  ?>
                </div>
              </div>
              <?php
            }
          }else {
            echo "NO RELATED PRODUCTS";
          }
          ?>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">
  <?php include "footer.php"; ?>
</div>


</body>
</html>
