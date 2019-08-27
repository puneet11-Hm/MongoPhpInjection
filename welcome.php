<?php
    include_once("config.php");
    ?>

<html>

<head>
<title>Welcome </title>
</head>

<body>
<br><br><br<br><br><br<br>
<div style='width:50%;text-align:center;margin:0 auto;'>
<p style="color:red;font-size:20px;font-weight:bold"><?php echo @$_SESSION['success'];?> </p>
<?php unset($_SESSION['success']); ?>
</div>
</body>

</html>
