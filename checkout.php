<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Checkout</title>
</head>
<body class="bg-light">
  <?php session_start();?>
  <?php include "headerLoggedOut.php";

  include 'dbconfig.php';
  ?>
  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h2>Checkout form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill"><?php if (isset($_SESSION["cartCount"])) { echo $_SESSION["cartCount"]; }else { echo "0"; } ?></span>
        </h4>
        <ul class="list-group mb-3">
          <?php
          $_SESSION["cartTotal"] = 0;
          foreach($_SESSION["cartProducts"] as $key => $value) {
            $sql ="SELECT * FROM `products` WHERE `products`.`pid`='$key'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)> 0)
            {

              while($row = mysqli_fetch_assoc($result)){

                $title=$row['ptitle'];
                $price=$row['pprice'];

                ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0 text-muted"><?php echo $title ?></h6>

                  </div>
                  <span class="text-muted">LKR <?php $_SESSION["cartTotal"] = $_SESSION["cartTotal"]+$price*$value;  echo $price*$value ?></span>
                </li>
                <?php
              }
            }else {
              echo "Your Cart is empty";
            }
          }
          ?>




          <li class="list-group-item d-flex justify-content-between">
            <strong>Total</strong>
            <strong>LKR <?php echo $_SESSION["cartTotal"]; ?></strong>
          </li>
        </ul>


      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing details</h4>
        <form class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="username">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" id="username" placeholder="Username" required>
              <div class="invalid-feedback" style="width: 100%;">
                Your username is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
  </div>
  <?php include "footer.php"; ?>
</body>
</html>
