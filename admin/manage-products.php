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
  <title>Manage Products</title>
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
        <a class="btn btn-warning" href="add-product.php">Add Product</a>
        <table id="table_id" class="table mt-3 display">
          <?php

          include "../dbconfig.php";
          $sql ="SELECT * FROM `products`";

          $result = mysqli_query($con,$sql);

          if(mysqli_num_rows($result)> 0)
          {
            echo   " <thead><tr class='manage-products-tr'><td class='manage-products-td'>Image</td><td class='manage-products-td'>Title</td><td class='manage-products-td'>Price</td>
            <td class='manage-products-td'>Category</td><td class='manage-products-td'>Edit</td><td class='manage-products-td'>Delete</td></tr> </thead><tbody> ";
            while($row = mysqli_fetch_assoc($result))
            {

              echo   " <tr class='manage-products-tr'><td class='align-middle'> <div class='image'> <img src='".$row["image"]."'  /> </div></td>  ";
              echo   " <td class='align-middle'><div class=''>".$row["title"]."</div></td>  ";
              echo   " <td class='align-middle'><div class=''>".$row["price"]."</div></td>  ";
              echo   " <td class='align-middle'><div class=''>".$row["category"]."</div></td>  ";
              echo "<td class='align-middle' width='48'><a href='update-product.php?id=".$row["id"]."'><img src='../images/edit-icon.png' alt='' width='32' height='34' /></a></td>  ";
              echo " <td class='align-middle' width='48'><a href='delete-product.php?id=".$row["id"]."'><img src='../images/delete-icon.png' alt='' width='32' height='34' /></a></td> ";
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
