<?php
/*
session_start();
if(!isset($_SESSION["loggedInAdmin"]))
{
header('Location:admin.php');
}
*/
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "../imports.php"; ?>
  <title>Manage Customers</title>
  <script type="text/javascript">
  $(document).ready(function() {
  $('#table_id').DataTable();
} );
  </script>
</head>
<body>
  <?php include "adminHeader.php"; ?>
  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col">
<!--a class="btn btn-warning" href="add-product.php">Add Product</a-->
        <table id="table_id" class="table mt-3 display">
          <?php

          include "../dbconfig.php";
          $sql ="SELECT * FROM `customers`";

          $result = mysqli_query($con,$sql);

          if(mysqli_num_rows($result)> 0)
          {
            echo   " <thead><tr class='manage-customers-tr'><td class='manage-customers-td'>Image</td><td class='manage-customers-td'>ID</td><td class='manage-customers-td'>Name</td>
            <td class='manage-customers-td'>E-mail</td><td class='manage-customers-td'>Address</td></tr> </thead><tbody> ";
            while($row = mysqli_fetch_assoc($result))
            {

              echo   " <tr class='manage-customers-tr'><td class='align-middle'> <div class='image'> <img src='".$row["image"]."'  /> </div></td>  ";
              echo   " <td class='align-middle'><div class=''>".$row["id"]."</div></td>  ";
              echo   " <td class='align-middle'><div class=''>".$row["name"]."</div></td>  ";
              echo   " <td class='align-middle'><div class=''>".$row["email"]."</div></td>  ";
              echo   " <td class='align-middle'><div class=''>".$row["address"]."</div></td>  ";
              echo "</tr>";

            }
            echo "</tbody>";
          }
          ?>
        </table>

      </div>
    </div>
  </div>
</body>
</html>
