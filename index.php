<?php
    include_once("config.php");
?>

<html>
<head>
<title>Homepage</title>
</head>
<body>
<?php
        $options = [];
		$cursor = $collection->find([]);
        $data = "<table cellpadding='5' cellspacing='5' style='border:1px solid #000;";
    	$data .= "border-collapse:collapse' border='1px'>";
    	$data .= "<thead>";
    	$data .= "<tr>";
        $data .= "<th>S.No.</th>";
    	$data .= "<th>First Name</th>";
        $data .= "<th>Last Name</th>";
    	$data .= "<th>Email</th>";
    	$data .= "<th>Username</th>";
        $data .= "<th colspan='2'>Action</th>";
    	$data .= "</tr>";
    	$data .= "</thead>";
    	$data .= "<tbody>";
        $i=1;
		foreach ($cursor as $document) {
            $data .= "<tr>";
            $data .= "<td>".$i."</td>";
            $data .= "<td>".$document["firstname"]."</td>";
            $data .= "<td>".$document["lastname"]."</td>";
            $data .= "<td>".$document["email"]."</td>";
            $data .= "<td>".$document["username"]."</td>";
            $data .= "<td><a href=edit.php?id=".$document["_id"].">EDIT</a></td>";
            $data .= "<td><a href=delete.php?id=".$document["_id"]." onClick=\"return confirm('Are you sure you want to delete?')\">DELETE</a></td>";
            $data .= "</tr>";
            $i++;
		}
    	$data .= "</tbody>";
        $data .= "</table>";
        if(!empty($document)) {
            echo "<div style='width:50%;text-align:center;margin:0 auto;'>";
            echo '<br><br><br>';
            echo '<p style="color:red">'.@$_SESSION['success'].'</p>';
		}
        //echo '<br><br><br>';
        echo $data;
        echo "</div>";
        unset($_SESSION['success']);
?>
</body>
</html>
