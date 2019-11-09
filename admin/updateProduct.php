<?php
session_start();
$pid = $_GET["id"];
$title=$_POST["title"];
$image = "images/products/".basename($_FILES["fileImage"]["name"]);
$price=$_POST["price"];


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

$sql="UPDATE `products` SET  `title` = '".$title."', `category` = '".$category."', `image` = '".$image."', `price` = '".$price."' WHERE `products`.`id` = ".$pid.";";

if(  mysqli_query($con,$sql))
{
  echo "File uploaded Successfully";
}
else
{
  echo "Opps something is wrong, Please select the file again";
}

header('Location:manage-products.php');

?>
