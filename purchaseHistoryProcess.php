<?php

require "connection.php";
session_start();

$id = $_POST["id"];
$qty = $_POST["qty"];
$total = $_POST["total"];
$user_email = $_SESSION["u"]["email"];
$Order_id = uniqid();

$product_search = Database::search("SELECT * FROM `cart` WHERE `id` = '" . $id . "'");
$product_fetch = $product_search->fetch_assoc();


$dateTime = new DateTime();
$timeZone = new DateTimeZone("Asia/Colombo");
$dateTime->setTimezone($timeZone);
$date = $dateTime->format("Y-m-d H:i:s");

Database::iud("INSERT INTO `transaction_history` (`order_id`,`product_id`,`user_email`,`date`,`quantity`,`total`) VALUES ('" . $Order_id . "','" . $product_fetch["product_id"] . "','" . $user_email . "','" . $date . "','" . $qty . "','" . $total . "')");
echo "success";
