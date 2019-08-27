<?php
    session_start();
    error_reporting( E_ALL );
    ini_set('display_errors', 1);
    
    require_once "../../vendor/autoload.php";
    use MongoDB\Client;
    
    $connection = new Client('mongodb://127.0.0.1:27017');
    $db = $connection->myproject;
    $collection = $db->Users;
?>
