<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subjects Setup</title>
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

?><form id="insertsubjects" name="insertsubjects" method="post" action="<?php echo($self);?>">
<table class="tabledata">
 <tr>
      <td colspan="3" class="heading">Subjects Setup</td>
    </tr>
  <tr>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td width="195" class="fieldheading">Subject Name</td>
    <td width="566"> <input type="text" name="subjectlist" id="subjectlist" maxlength="100" class="inputfield" />
       <label class="required" >*</label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Save" class="buttonstyle" />
      <input type="button" name="cancel" id="cancel" value="Cancel" class="buttonstyle"  onclick="window.location = 'SubjectsSetup.php'"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
   <?php

$subjectname=$_POST['subjectlist'];

if( isset($form) ) 
{
	if(isset($subjectname) &&  $subjectname !== '') 
	{
	$sql="insert into subjects(Subject)VALUES(\"$subjectname\")";
		if (!mysql_query($sql,$conn))
  		{
  		die('Error: ' . mysql_error());
  		}
		$errormsg="Subject has been added successfully";
	}
	else
	{
	$errormsg="Please provide the required details";

	}
}
mysql_close($conn);

?>
<td class="required">* All fields Required</td>   </tr>
  <tr>
  <td colspan="3"class="error"><?php echo $errormsg;?></td>    </tr>
</table>

</form>
</body>
</html>