<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include "../imports.php"; ?>
    <title>Admin</title>
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
    <link href="../login.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" method="post" action="admin.php">
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
        if(isset($_POST["aLogin"]))
        {
          $username=$_POST["emailID"];
          $password=$_POST["password"];
          $valid=false;
          include "../dbconfig.php";
          $sql="SELECT * FROM `admins` WHERE `email`='".$username."' and `password`='".$password."'";
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
            $_SESSION["loggedInAdmin"] =$username;
            header('Location:manage-products.php');
          }
          else
          {
            echo "Please enter the correct username and password";
          }
        }
        ?>
        <button class="btn btn-lg btn-warning btn-block mt-3" name="aLogin" type="submit">Sign in</button>
      </div>
    </form>

  </body>
</html>
