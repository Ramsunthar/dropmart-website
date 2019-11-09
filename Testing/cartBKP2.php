<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Cart</title>
</head>
<body>
  <?php session_start();
  if(!isset($_SESSION["loggedInCust"]))
  {
    include "headerLoggedOut.php";
  }else {
    include "headerLoggedIn.php";
  }
  include 'dbconfig.php';
  ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <?php
              foreach($_SESSION["cartProducts"] as $key => $value) {
                $sql ="SELECT * FROM `products` WHERE `products`.`pid`='$key'";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)> 0)
                {
                  $row = mysqli_fetch_assoc($result)
                    $title=$row['ptitle'];
                    $price=$row['pprice'];
                    $image=$row['pimg'];
                    ?>
                    <tr class="bg-light mb-5">
                      <form method="post">
                        <td class="align-middle text-center"><img class="img-fluid" src="<?php echo $image; ?>"></td>
                        <td class="align-middle text-center"><p class=""><?php echo $title; ?></p></td>
                        <td class="align-middle text-center"><input type="number" value="<?php echo $_SESSION["cartProducts"][$key]; ?>" class="form-control w-100" id="newqty" name="newqty" min="1" max="25" placeholder= "QTY"/></td>
                        <td class="align-middle text-center">LKR <?php echo $price*$_SESSION["cartProducts"][$key] ?></td>
                        <td class="align-middle text-center"><button type="submit" name="updateItem" class="btn btn-outline-warning">Update</button></td>
                        <td class="align-middle text-center"><button type="submit" name="deleteItem" class="btn btn-outline-danger">Remove</button></td>
                      </form>
                      <?php
                      if (isset($_POST["updateItem"])) {
                        if (isset($_POST["newqty"])) {
                          $_SESSION["temp"]=$_POST["newqty"];/*try assigning to session variabl*/
                          $_SESSION["cartProducts"][$key] = $_SESSION["temp"];
                          echo  "<script> location.replace('cart.php'); </script>";
                        }
                      }
                       ?>

                    </tr>
                    <?php

                }else {
                  echo "Your Cart is empty";
                }
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>

    </div>

  </div>

  <?php include "footer.php"; ?>

</body>
</html>
