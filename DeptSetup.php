<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Department Setup</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body class="pgbkcolor">

<?php
error_reporting(E_ALL ^ E_NOTICE);
$self=$_SERVER['PHP_SELF'];
$errormsg="";
$form = $_POST['submit'];

$conn=@mysql_connect("localhost", "root", "")or die("Err:Conn");
#include "db_connect.php";
$rs=@mysql_select_db("test", $conn) or die("Err:Db");

?>
<form id="login" name="login" method="post" action="<?php echo($self);?>">
  <table class="tabledata">
    <tr>
          <td colspan="3" class="heading">Department Setup</td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="195" class="fieldheading"><label>Department Name</label></td>
      <td width="10">&nbsp;</td>
      <td width="337"><input name="txtdeptname" type="text" id="txtdeptname" maxlength="100" class="inputfield"/>
         <label class="required" >*</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="submit" type= "submit" id="submit" value="Save" class="buttonstyle"/>
      <input name="cancel" type="button" id="cancel" value="Cancel" class="buttonstyle" onclick="window.location = 'DeptSetup.php'"/></td>
    </tr>
    
    <?php

$deptname=$_POST['txtdeptname'];

if( isset($form) ) 
{
	if(isset($deptname) &&  $deptname !== '') 
	{
	$sql="INSERT INTO departments (DepartmentName)VALUES(\"$deptname\")";
		if (!mysql_query($sql,$conn))
  		{
  		die('Error: ' . mysql_error());
  		}
		$errormsg="Department has been added successfully";
	}
	else
	{
	$errormsg="Please provide the required details";

	}
}
mysql_close($conn);

?>
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
<td class="required">* All fields Required</td>    </tr>
    <tr>
<td colspan="3"class="error"><?php echo $errormsg;?></td>    </tr>
  </table>
</form>
</body>
</html>