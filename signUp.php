<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Signup</title>

  <script type="text/javascript">
  function validateUserName()
  {
    var uName = document.getElementById("txtuname").value;
    if(uName== "" || uName==null)
    {
      alert("please enter  the correct user name");
      return false;
    }
    return true;
  }

  function validateEmail()
  {
    var email = document.getElementById("txtemail").value;
    var at=email.indexOf("@");
    var dt=email.lastIndexOf(".");
    var len=email.length();

    if((at < 2) || (dt - at < 2) || (len - dt < 2))
    {
      alert("Please enter a valid email address");
      return false;
    }
    return true;
  }

  function validatePassword()
  {
    var pwd = document.getElementById("txtpwd").value;
    var cpwd = document.getElementById("txtcpwd").value;
    if((pwd.length < 5) || (pwd != cpwd))
    {
      alert("Please enter a correct password and enter to confirm password");
      return false;
    }
    return true;
  }

  function validatePhoneNO()
  {
    var cno = document.getElementById("txtpnumber").value;
    if((isNaN(cno))||(cno.length!=10))
    {
      alert("please enter the valid contact number")
      return false;
    }
    return true;
  }

  function validate()
  {
    if(validateUserName() &&  validateEmail() && validatePassword() && validatePhoneNO())
    {
      alert("account has been created")
    }
    else
    {
      event.preventDefault();
    }
  }

  </script>

</head>
<body>

  <div class="container w-25 border boreder-dark">
    <div class="row">
      <div class="col text-center">
        <h4>SIGNUP</h4>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <form method="post" action="signUp.php">

          <div class="form-group">
            <label for="usrname">User Name</label>
            <input type="text" class="form-control" id="txtuname" name="txtuname">
          </div>

          <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="txtemail" name="txtemail">
          </div>

          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" class="form-control" id="txtpwd" name="txtpwd">
          </div>

          <div class="form-group">
            <label for="cpwd">Confirm Password</label>
            <input type="password" class="form-control" id="txtcpwd" name="txtcpwd">
          </div>

          <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="txtlocation" name="txtlocation">
          </div>


          <div class="form-group text-center">
            <input type="submit" value="Register" name="submit" id="submit" onClick="validate()">
          </div>

        </form>
      </div>
    </div>

  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  <?php

  if(isset($_POST["submit"]))
  {
    $email = $_POST["txtemail"];
    $fullName = $_POST["txtuname"];
    $password = $_POST["txtpwd"];
    $addr=$_POST["txtlocation"];

    include "dbconfig.php";



    $sql = "INSERT INTO `customer` (`cid`, `cemail`, `cname`, `caddr`, `cpass`) VALUES (NULL,'".$email."','".$fullName."','".$addr."','".$password."');";
    mysqli_query($con,$sql);

  }

  ?>

</body>
</html>
