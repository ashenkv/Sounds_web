<?php

require "connection.php";

if(isset($_GET["id"])){

    $cid = $_GET["id"];

    $cat_rs = Database::search("SELECT * FROM `category` WHERE `id`='".$cid."'");
    $cat_num = $cat_rs->num_rows;
    $cat_data = $cat_rs->fetch_assoc();

    Database::iud("DELETE FROM `category` WHERE `id`='".$cid."'");

    echo("removed");

}else{
    echo("Somting Went Wrong");
}

?>