<?php

include("facadeClass.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['updateAdBtn'])) {

    $name = $_POST['schName'];
    $lastDate = $_POST['lastDate'];
    $db = new DBFacade();
    $db->updateScholarship($name, $lastDate);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['existAdBtn'])) {

    $sname = $_POST['schName'];
    $lastDate = $_POST['lastDate'];
    $publishDate = $_POST['publishDate'];
    $db = new DBFacade();
    $db->publishExistsScholarship($sname, $lastDate, $publishDate);
}
?>