<?php
session_start();


$id=$_POST["id"];
$qty=10;

if (array_key_exists($id,$_SESSION["cartProducts"]))
{
  $tmpqty = $_SESSION["cartProducts"][$id];
  $_SESSION["cartProducts"][$id] = $tmpqty + $qty;
}
else
{
  $_SESSION["cartProducts"][$id] = $qty;
}

header("location:javascript://history.go(-1)");


echo "<pre>";
print_r($_SESSION["cartProducts"]);

echo '</pre>';

die();


?>
