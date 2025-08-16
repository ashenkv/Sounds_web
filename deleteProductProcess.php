<?php

require "connection.php";

if(isset($_GET["id"])){

    $dpid = $_GET["id"];

    $dp_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$dpid."'");
    $dp_num = $dp_rs->num_rows;
    $dp_data = $dp_rs->fetch_assoc();

    Database::iud("DELETE FROM `product` WHERE `id`='".$dpid."'");

    $user = $dp_data["user_email"];
    $product = $dp_data["product_id"];;

    Database::iud("INSERT INTO `recent`(`product_id`,`user_email`) VALUES ('".$product."','".$user."');");

    echo("delete");

}else{
    echo("Somting Went Wrong");
}

?>