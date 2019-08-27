<?php
    include_once("config.php");
    
    if (isset($_GET['id'])) {
        $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    }
    $_SESSION['success'] = "User deleted successfully";
    header("Location: welcome.php");
    
    ?>
