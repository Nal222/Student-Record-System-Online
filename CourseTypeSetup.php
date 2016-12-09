<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CourseType Setup</title>
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
  <table width="555" height="77" border="0" class="tabledata">
    <tr>
      <td colspan="3" class="heading">CourseType Setup</td>
    </tr>
    <tr>
      <td width="133">&nbsp;</td>
      <td width="11"><label for="coursetypeid"></label></td>
            <td>&nbsp;</td>

    </tr>
    
    <tr>
      <td class="fieldheading"><label for="coursenm">CourseType</label></td>
      <td>&nbsp;</td>
      <td width="397"><input name="txtcoursetype" type="text" id="txtcoursetype" class="inputfield" maxlength="20"/>
      <span class="required">*</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr> 
  
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" id="save" value="Save" class="buttonstyle"/>
            <input name="cancel" type="button" id="cancel" value="Cancel" class="buttonstyle" onclick="window.location = 'CourseTypeSetup.php'"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
<td class="required">&nbsp;</td>          <td><span class="required">* All fields Required</span></td>
    </tr>
    
     <?php

$coursetype=$_POST['txtcoursetype'];

if( isset($form) ) 
{
	if(isset($coursetype) &&  $coursetype !== '') 
	{
	$sql="INSERT INTO coursetypes (CourseTypeDescription)VALUES(\"$coursetype\")";
		if (!mysql_query($sql,$conn))
  		{
  		die('Error: ' . mysql_error());
  		}
		$errormsg="Course Type has been added successfully";
	}
	else
	{
	$errormsg="Please provide the required details";

	}
}
mysql_close($conn);

?>
    <tr>
<td colspan="3"class="error"><?php echo $errormsg;?></td>     </tr>
  </table>
</form>
</body>
</html>