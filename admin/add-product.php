<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "../imports.php"; ?>
  <title>Add Product</title>
</head>
<body>
  <?php include "adminHeader.php"; ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <form action="add-product.php" method="post" enctype="multipart/form-data">

          <table class="table" width="80%" border="0" align="center">
            <tr>
              <td class="updateitem-td right" width="50%">Title</td>
              <td class="updateitem-td" width="50%"><input class="p1" type="text" name="ptitle" id="ptitle" /></td>
            </tr>
            <tr>
              <td class="updateitem-td right" width="50%">Price</td>
              <td class="updateitem-td" width="50%"><input class="p1" type="text" name="pprice" id="pprice" /></td>
            </tr>
            <tr>
              <td class="updateitem-td right"  width="50%">Image</td>
              <td class="updateitem-td "  width="50%"><input class="p1" type="file" name="fileImage" id="fileImage" /></td>
            </tr>
            <tr>
              <td class="updateitem-td right"  width="50%" height="43">Category</td>
              <td class="updateitem-td">
                <input type="checkbox" name="chkGrocery" id="chkGrocery" /> Grocery <br>
                <input type="checkbox" name="chkFruits" id="chkFruits" /> Fruits <br>
                <input type="checkbox" name="chkVegetables" id="chkVegetables" /> Vegetables<br>
                <input type="checkbox" name="chkFish" id="chkFish" /> Fish<br>
                <input type="checkbox" name="chkMeat" id="chkMeat" /> Meat
              </td>
            </tr>
            <tr>
              <td colspan="2"><br />
                <?php
                if(isset($_POST["btnSubmit"]))
                {
                  $title=$_POST["ptitle"];
                  $image = "images/products/".basename($_FILES["fileImage"]["name"]);
                  $price=$_POST["pprice"];

                  if(isset($_POST["chkGrocery"]))
                  {			 $category = "grocery";		 }
                  if(isset($_POST["chkFruits"]))
                  {			 $category = "fruits";		 }
                  if(isset($_POST["chkVegetables"]))
                  {			 $category = "vegetables";	}
                  if(isset($_POST["chkFish"]))
                  {			 $category = "fish";	}
                  if(isset($_POST["chkMeat"]))
                  {			 $category = "meat";	}

                  include "../dbconfig.php";

                  $sql="INSERT INTO `products` (`id`, `title`, `category`, `image`, `price`) VALUES (NULL, '".$title."', '".$category."', '".$image."', '".$price."');";

                  if(  mysqli_query($con,$sql))
                  {
                    echo "File uploaded Successfully";
                  }
                  else
                  {
                    echo "Opps something is wrong, Please select the file again";
                  }

                }

                ?>

              </td>
            </tr>
            <tr>
              <td class="updateitem-td center" colspan="2"><blockquote>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="btn btn-warning" name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Add Now"   />
                <input class="btn btn-dark" name="btnReset" type="reset" class="button" id="btnReset" value="Cancel"   />

              </blockquote></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
