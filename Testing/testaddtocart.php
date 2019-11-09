<?php
session_start();
foreach($_SESSION["cartProducts"] as $key => $value) {
  echo $key;
  echo "  ";
  echo $value;
  echo "<br>";
}
 ?>
