<?php
session_start();
$id = $_GET["id"];
$val = $_GET["val"]

$_SESSION["cartProducts"][$id] = $val;

 ?>
