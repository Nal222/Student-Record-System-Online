<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Logout</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body class="pgbkcolor">

<?php
session_start();
session_destroy();
$display="You have been logged out, <a href='login.php'>click here</a> to Log in again.";
?>
<BR />
<BR />

<label class="fieldheading"><?php echo $display?></label>
</body>
</html>
