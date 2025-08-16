<?php

require "connection.php";

// $txt = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `watchlist`";

if (!empty($txt) && $select == 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'";
} else if (empty($txt) && $select != 0) {
    $query .= " WHERE `watchlist_id`='" . $select . "'";
} else if (!empty($txt) && $select != 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%' AND `watchlist_id`='" . $select . "'";
}
