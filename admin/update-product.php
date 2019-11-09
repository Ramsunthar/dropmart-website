<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "../imports.php"; ?>
  <title>Update Product</title>
</head>
<body>
  <?php include "adminHeader.php"; ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php include "../dbconfig.php";
        $sql ="SELECT * FROM `products` WHERE `pid`=".$_GET["id"]."";

        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)> 0)
        {
          $row = mysqli_fetch_assoc($result);

         ?>
         <form action="updateProduct.php?id=<?php echo $_GET["id"];?>" method="post" enctype="multipart/form-data">

   				<table class="table" width="80%" border="0" align="center">
   					<tr>
   						<td class="updateitem-td right" width="50%">Title</td>
   						<td class="updateitem-td" width="50%"><input type="text" class="p1" name="ptitle" id="ptitle" value="<?php echo $row["title"];?>" /></td>
   					</tr>
   					<tr>
   						<td class="updateitem-td right" width="50%">Price</td>
   						<td class="updateitem-td" width="50%"><input type="text" class="p1" name="pprice" id="pprice" value="<?php echo $row["price"];?>" /></td>
   					</tr>
   					<tr>
   						<td class="updateitem-td right" width="50%">Image</td>
   						<td class="updateitem-td" ><input type="file" class="p1" name="fileImage" id="fileImage" value="<?php echo $row["image"];?>" /></td>
   					</tr>
   					<tr>
   						<td class="updateitem-td right" width="50%" height="43">Category</td>
   						<td class="updateitem-td" >
                <input type="checkbox" name="chkGrocery" id="chkGrocery"  <?php if($row["category"]=="grocery"){echo "checked";}?> /> Grocery <br>
   							<input type="checkbox" name="chkFruits" id="chkFruits" <?php if($row["category"]=="fruits"){echo "checked";}?> /> Fruits <br>
   							<input type="checkbox" name="chkVegetables" id="chkVegetables" <?php if($row["category"]=="vegetables"){echo "checked";}?> /> Vegetables <br>
   							<input type="checkbox" name="chkFish" id="chkFish" <?php if($row["category"]=="fish"){echo "checked";}?> /> Fish <br>
   							<input type="checkbox" name="chkMeat" id="chkMeat" <?php if($row["category"]=="meat"){echo "checked";}?> /> Meat
   						</td>
   					</tr>
   					<tr>
   						<td class="updateitem-td center"  colspan="2"><blockquote>

   							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   							<input name="btnSubmit" type="submit" class="btn btn-warning" id="btnSubmit" value="Update"   />
   							<input name="btnReset" type="reset" class="btn btn-dark" id="btnReset" value="Cancel"   />

   						</blockquote></td>
   					</tr>
   				</table>
   				<?php
   			}
   			mysqli_close($con);
   			?>
   		</form>

      </div>
    </div>
  </div>

</body>
