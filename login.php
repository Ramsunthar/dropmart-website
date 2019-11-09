<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Login</title>
  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
  </style>
  <link href="login.css" rel="stylesheet">
</head>
<body>

  <form class="form-signin" method="post" action="login.php">
    <div class="text-center mb-4">
      <img class="mb-4" src="https://via.placeholder.com/100x100.png?text=Logo" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    </div>
    <div class="text-center mb-4">
      <div class="form-label-group">
        <input type="email" id="inputEmail" name="emailID" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>
      <?php
      if(isset($_POST["cLogin"]))
      {
        $username=$_POST["emailID"];
        $password=$_POST["password"];
        $valid=false;
        include "dbconfig.php";
        $sql="SELECT * FROM `customer` WHERE `cemail`='".$username."' and `cpass`='".$password."'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) >0)
        {
          $valid=true;
        }
        else
        {
          $valid=false;
        }
        if($valid)
        {
          $_SESSION["loggedInCust"] =$username;
          header('Location:index.php');
        }
        else
        {
          echo "Please enter the correct username and password";
        }
      }
      ?>
      <a href="signUp.php"><button class="btn btn-lg btn-warning btn-block mt-3" name="cLogin" type="submit">Sign in</button></a>
      <div class="checkbox mt-3">
        <label>
          <a href="#">Create An Account</a>
        </label>
      </div>
      <p class="mt-5 mb-3 text-muted text-center"><a href="index.php" class="text-muted">&larr; Go To Home</a></p>
    </div>
  </form>
</body>
</html>
