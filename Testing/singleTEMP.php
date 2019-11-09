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
          <form class="form-inline">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Quantity</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
              <option selected>Choose...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <button type="submit" class="btn btn-warning my-1">Add To Cart</button>
          </form>
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
          $rpsql ="SELECT * FROM `products` WHERE `products`.`pcat`='$category' AND NOT `products`.`pid`='$pid' ORDER BY RAND() LIMIT 5";
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
                    <p class="card-text text-center"><button type="button" class="btn btn-outline-dark">Added To Cart</button></p>
                    <?php
                  }else {
                    ?>
                    <p class="card-text text-center"><a href = "addToCart.php?id=<?php echo "$rppid"; ?>"><button type="button" class="btn btn-outline-success">Add To Cart</button></a></p>
                    <?php
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

  <?php include "footer.php"; ?>

</body>
</html>
