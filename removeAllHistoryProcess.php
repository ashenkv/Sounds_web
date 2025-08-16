<?php

require "connection.php";

if(isset($_GET["id"])){

    $cid = $_GET["id"];

    Database::iud("DELETE FROM `invoice`");

    echo("all removed");

}else{
    echo("Somting Went Wrong");
}

?>