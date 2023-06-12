<?php

require "../config.php";
require "../modeli/destinacija.php";

if (isset($_POST['id'])) {
    $myArray = Destinacija::getById($_POST['id'], $conn);
    echo json_encode($myArray);
}