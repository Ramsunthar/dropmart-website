<?php
$min = 100;
$max = 1000;
$_SESSION["minsql"] = $min-50;
$_SESSION["maxsql"] = $max+500;

if (! empty($_POST['min_price'])) {
    $min = $_POST['min_price'];
    $_SESSION["minsql"] = $min-50;
}

if (! empty($_POST['max_price'])) {
    $max = $_POST['max_price'];
    $_SESSION["maxsql"] = $max+500;
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
  if (screen.width <= 699) {
    document.location = "product.php?cat=<?php echo $_GET["cat"];?>";
  }
</script>

<title>Products</title>
<style>
.card{
  margin-left: 0.5em !important;
  margin-right: 0.5em !important;
}


</style>
<script type="text/javascript">

  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: <?php echo $_SESSION["minsql"]; ?>,
      max: <?php echo $_SESSION["maxsql"]; ?>,
      values: [ <?php echo $min; ?>, <?php echo $max; ?> ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		$( "#min" ).val(ui.values[ 0 ]);
		$( "#max" ).val(ui.values[ 1 ]);
      }
      });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>
</head>
<body>
  <?php session_start();
  if(!isset($_SESSION["loggedInCust"]))
  {
    require "headerLoggedOut.php";
  }else {
    require "headerLoggedIn.php";
  }
  ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        <p class="h5 text-center">Filter</p>
        <form class="filter" method="get">
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
          <p class="h6">Price</p>
          <div class="form-group">
            <div>
              <div id="slider-range"></div>
                <input type="" id="min" name="min_price"
                    value="<?php echo $min; ?>">

                <input type="" id="max" name="max_price"
                    value="<?php echo $max; ?>">

            </div>
          </div>
          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-warning">Find Match</button>
          </div>
        </form>
        <?php
        if (isset($_GET["filterBtn"])) {
          $catid=$_GET["cat"];
          $maxprice=$_GET["max_price"];
          $minprice=$_GET["min_price"];
          if (isset($_GET["max_price"])) {
            header('Location:products.php?cat='.$catid.'&max='.$maxprice);
          }else {
            header('Location:products.php?cat='.$catid);
          }
        }

        ?>
      </div>

      <?php include 'dbconfig.php';
      if (isset($_GET["cat"])) {
        if (isset($_GET["max_price"])) {
          $sql ="SELECT * FROM `products` WHERE `products`.`pcat`='".$_GET["cat"]."'AND `products`.`pprice`<='".$_GET["max_price"]."' AND `products`.`pprice`>='".$_GET["min_price"]."'";
          $_SESSION["minsql"] = "SELECT MIN(`products`.`pprice`) FROM `products` WHERE `products`.`pcat`='".$_GET["cat"]."'AND `products`.`pprice`<='".$_GET["max_price"]."' AND `products`.`pprice`>='".$_GET["min_price"]."'";
          $_SESSION["maxsql"] = "SELECT MAX(`products`.`pprice`) FROM `products` WHERE `products`.`pcat`='".$_GET["cat"]."'AND `products`.`pprice`<='".$_GET["max_price"]."' AND `products`.`pprice`>='".$_GET["min_price"]."'";
        }else {
          $sql ="SELECT * FROM `products` WHERE `products`.`pcat`='".$_GET["cat"]."'";
          $_SESSION["minsql"] = "SELECT MIN(`products`.`pprice`) FROM `products` WHERE `products`.`pcat`='".$_GET["cat"]."'";
          $_SESSION["maxsql"] = "SELECT MAX(`products`.`pprice`) FROM `products` WHERE `products`.`pcat`='".$_GET["cat"]."'";
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
                <a href="single.php?id=<?php echo "$pid"; ?>"><button type="submit" name="Addbtn" class="btn btn-outline-success col">View Details</button></a>
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
