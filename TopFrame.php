<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Top Frame</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#CC0000">
<?php
require_once('db_connect.php');
$login = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];

if ($login!="")
{
	$sql="Select FirstName, LastName from students where StudentID='$login '";
	$result = mysql_query ($sql);
    $row = mysql_fetch_array($result);
	$firstname=$row['FirstName'];
	$lastname=$row['LastName'];
}

$name =  $firstname." ".$lastname ;

?>
<table width="100%" border="0">
  <tr>
    <td colspan="2" class="heading">Student Information System </td>
    <td width="89"class="heading" ><a href="logout.php" target="_parent">Logout</a></td>
  </tr>
  <tr>
    <td width="450" class="fieldheading"><?php echo "Welcome  ".$usertype;?>:&nbsp;<?php echo $name;?></td>
    <td width="762">&nbsp;</td>
    <td></td>
  </tr>
</table>



</body>
</html>
