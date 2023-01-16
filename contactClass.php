<?php
include("facadeClass.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $contact=$_POST['contact'];
    $email = $_POST['email'];
    
    $db = new DBFacade();
    $db->setContact($contact, $email);
}
?>