<?php
    include_once("config.php");
?>

<html>
<head>
    <title>Login Page</title>
    <style type = "text/css">
        body { font-family:Arial, Helvetica, sans-serif; font-size:14px;  }
        label { font-weight:bold; width:100px; font-size:14px; }
        .box {border:#666666 solid 1px;}
    </style>
</head>
<body bgcolor = "#FFFFFF" style = "margin:50px">
            
<?php
      if(isset($_POST['submit'])){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
    
		$query = array(
		'username' => $username,
        'hashedPassword' => $password
		);
        
        $options = [];
        $cursor = $collection->find($query, $options);
        $data = "<table cellpadding='5' cellspacing='5' style='border:1px solid #000;";
    	$data .= "border-collapse:collapse' border='1px'>";
    	$data .= "<thead>";
    	$data .= "<tr>";
    	$data .= "<th>First Name</th>";
        $data .= "<th>Last Name</th>";
    	$data .= "<th>Email</th>";
    	$data .= "<th>Username</th>";
        $data .= "<th>Action</th>";
    	$data .= "</tr>";
    	$data .= "</thead>";
    	$data .= "<tbody>";
		foreach ($cursor as $document) {  
			$_SESSION['login_user'] = $document['username'];
            $_SESSION['login_userid'] = $document['_id'];
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
        	echo "<h1 style='text-align:center'>Welcome ".@$document['username']."</h1>";
            echo "<h4 style='float:right'><a href = 'logout.php'>Sign Out</a></h4>";
		}
        echo '<br><br><br>';
        echo $data;
        echo "</div>";
    } else {
    ?>
<h3 style="text-align:center">DEMO - Bypass Login with MongoDB</h3>
<div align = "center">
<div style = "width:300px; border: solid 1px #333333; " align = "left">
<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
<div style = "margin:30px">
<form action = "" method = "POST">
<label>Username </label><input type = "text" name = "username" class = "box" value=""/><br /><br />
<label>Password </label><input type="password" name = "password" class = "box" /><br/><br />
<input type = "submit" value = "Login"  name="submit"/><br />
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
