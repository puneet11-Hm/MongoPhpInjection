<?php
    include_once("config.php");
    if (isset($_REQUEST['id'])) {
        $record = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_REQUEST['id'])]);
    }
    if( isset($_POST['submit'])){ 
        $options = [];
        $collection->updateOne(['_id' => new MongoDB\BSON\ObjectID($_REQUEST['id'])],
                                        ['$set' => ['firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'],'username' => $_POST['username']]]);
        $cursor = $collection->find(['_id' => new MongoDB\BSON\ObjectID($_REQUEST['id'])]);
        $_SESSION['success'] = "User updated successfully";
        //header("Location: index.php");
        $data = "<table cellpadding='5' cellspacing='5' style='border:1px solid #000;";
        $data .= "border-collapse:collapse' border='1px'>";
        $data .= "<thead>";
        $data .= "<tr>";
        $data .= "<th>First Name</th>";
        $data .= "<th>Last Name</th>";
        $data .= "<th>Email</th>";
        $data .= "<th>Username</th>";
        $data .= "<th colspan='2'>Action</th>";
        $data .= "</tr>";
        $data .= "</thead>";
        $data .= "<tbody>";
        foreach ($cursor as $document) {
            $_SESSION['login_user'] = $document['username'];
            $data .= "<tr>";
            $data .= "<td>".$document["firstname"]."</td>";
            $data .= "<td>".$document["lastname"]."</td>";
            $data .= "<td>".$document["email"]."</td>";
            $data .= "<td>".$document["username"]."</td>";
            $data .= "<td><a href=edit.php?id=".$document["_id"].">EDIT</a></td>";
            $data .= "<td><a href=delete.php?id=".$document["_id"]." onClick=\"return confirm('Are you sure you want to delete?')\">DELETE</a></td>";
            $data .= "</tr>";
        }
        $data .= "</tbody>";
        $data .= "</table>";
        
        if(!empty($document)) {
            echo "<div style='width:50%;text-align:center;margin:0 auto;'>";
            echo '<br><br><br>';
            echo '<p style="color:red">'.@$_SESSION['success'].'</p>';
        }
        echo '<br><br><br>';
        echo $data;
        echo "</div>";
        unset($_SESSION['success']);
    } else {
?>

<html>
<head>
<title>Edit Page</title>
<style type = "text/css">
    body { font-family:Arial, Helvetica, sans-serif; font-size:14px;  }
    label { font-weight:bold; width:100px; font-size:14px; margin-right:5px}
    .box {border:#666666 solid 1px;}
    .submit {text-align:center}
</style>
</head>
<body bgcolor = "#FFFFFF" style = "margin:80px">
        <h3 style="text-align:center">Edit User Detail</h3>
        <div align = "center">
        <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;">Edit</b></div>
        <div style = "margin:30px">
        <form action = "" method = "POST">
        <input type="hidden" id="userId" name="id" value="<?php echo $_REQUEST['id'];?>">
        <label> First Name</label>
        <input type = "text" name = "firstname" class = "box" value="<?php echo $record->firstname;?>"/><br /><br />
        <label>Last Name </label>
        <input type="text" name = "lastname" class = "box" value="<?php echo $record->lastname;?>"><br/><br />
        <label>Username</label>
        <input type="text" name = "username" class = "box" value="<?php echo $record->username;?>" /><br/><br />
        <input type = "submit" value = "Update"  name="submit" class="submit"/><br />
        </form>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px">
        <?php //echo $error; ?>
        </div>
        </div>
        </div>
        </div>
<?php } ?>
</body>
</html>
