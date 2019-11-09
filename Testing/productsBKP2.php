<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <script type="text/javascript">
  if (screen.width <= 699) {
    document.location = "productsTEST.php?cat=<?php echo $_GET["cat"];?>";
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
      <div class="col-2">
        <p class="h5 text-center">Filter</p>
        <form class="filter" method="post">
          <p class="h6">Categories</p>
          <div class="custom-control custom-radio">
            <input type="radio" name="cat" class="custom-control-input" value="grocery" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="grocery"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch3">
            <label class="custom-control-label" for="customSwitch3">Grocery</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="cat" class="custom-control-input" value="fruits" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="fruits"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch4">
            <label class="custom-control-label" for="customSwitch4">Fruits</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="cat" class="custom-control-input" value="vegetables" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="vegetables"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch5">
            <label class="custom-control-label" for="customSwitch5">Vegetables</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="cat" class="custom-control-input" value="fish" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="fish"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch12">
            <label class="custom-control-label" for="customSwitch12">Fish</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="cat" class="custom-control-input" value="meat" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="meat"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch11">
            <label class="custom-control-label" for="customSwitch11">Meat</label>
          </div>

          <div class="custom-control custom-radio">
            <input type="radio" name="cat" class="custom-control-input" value="dairy" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="dairy"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">Dairy</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="cat" class="custom-control-input" value="beverages" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="beverages"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch8">
            <label class="custom-control-label" for="customSwitch8">Beverages</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="cat" class="custom-control-input" value="pharmaceuticals" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="pharmaceuticals"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch2">
            <label class="custom-control-label" for="customSwitch2">Pharmaceuticals</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="cat" class="custom-control-input" value="household" <?php if(isset($_GET["cat"])){if($_GET["cat"]=="household"){echo "checked='true'";}}else{echo "checked='true'";} ?> id="customSwitch6">
            <label class="custom-control-label" for="customSwitch6">Household</label>
          </div>
          <br>
          <div class="form-group">
            <label class="h6" for="formControlRange">Price</label>
            <input type="range" class="form-control-range" name="max"  min="0" max="1500" step="100" id="formControlRange">
            <p>0 - 9999</p>
          </div>
          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-warning" name="filterBtn">Find Match</button>
          </div>
        </form>
        <?php
        if (isset($_POST["filterBtn"])) {
          $catid=$_POST["cat"];
          $price=$_POST["max"];
          if (isset($_POST["price"])) {
            header('Location:productsBKP.php?cat='.$catid.'&max='.$price);
          }else {
            header('Location:productsBKP.php?cat='.$catid);
          }
        }

        ?>
      </div>

      <?php include 'dbconfig.php';
      if (isset($_POST["cat"])) {
        if (isset($_POST["max"])) {
          $sql ="SELECT * FROM `products` WHERE `products`.`pcat`='".$_POST["cat"]."'AND `products`.`pprice`<='".$_POST["max"]."'";
        }else {
          $sql ="SELECT * FROM `products` WHERE `products`.`pcat`='".$_POST["cat"]."'";
        }

      }else {
        $sql ="SELECT * FROM `products`";
      }
      $result = mysqli_query($con,$sql);

      echo "<div class='col-10 border'><table class='table table-sm'>";
      $games = 0;
      if(mysqli_num_rows($result)> 0)
      {
        while($row = mysqli_fetch_assoc($result)){
          // make a new row after 3 games
          if($games%4 == 0) {
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
