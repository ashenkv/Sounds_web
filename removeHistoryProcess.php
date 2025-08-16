<?php

require "connection.php";

if(isset($_GET["id"])){

    $iid = $_GET["id"];

    $rh_rs = Database::search("SELECT * FROM `invoice` WHERE `id`='".$iid."'");
    $rh_num = $rh_rs->num_rows;
    $rh_data = $rh_rs->fetch_assoc();

    $user = $rh_data["user_email"];
    $product = $rh_data["product_id"];

    Database::iud("INSERT INTO `recent`(`product_id`,`user_email`) VALUES ('".$product."','".$user."');");
    Database::iud("DELETE FROM `invoice` WHERE `id`='".$iid."'");

    echo("removed");

}else{
    echo("Somting Went Wrong");
}

?>