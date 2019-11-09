<?php
session_start();
$itemid = $_GET["id"];


include "../dbconfig.php";

$sql="DELETE FROM `products` WHERE `products`.`id` = '".$_GET["id"]."'";

mysqli_query($con,$sql);

mysqli_close($con);


header('Location:manage-products.php');

?>
