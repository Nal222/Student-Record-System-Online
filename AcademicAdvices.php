<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Academic Advice</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body class="pgbkcolor">
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
session_start();

$self=$_SERVER['PHP_SELF'];
$mitigation=$_POST['mitigation'];
$academicadvice=$_POST['academicadvice'];
$errormsg="";
$form = $_POST['submit'];
$studentid=$_POST['txtstudentid'];

$conn=@mysql_connect("localhost", "root", "")or die("Err:Conn");
#include "db_connect.php";
$rs=@mysql_select_db("test", $conn) or die("Err:Db");

?>
<form id="mitigationform" name="mitigationform" method="post" action="<?php echo($self);?>">
<table class="tabledata">
  <tr>
    <th colspan="3" class="heading"><label >Student Academic Advices</label></th>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="fieldheading">Student ID</td>
    <td>&nbsp;</td>
    <td class="fieldheading"><?php echo $studentid ;?></td>
  </tr>
  <tr>
    <td class="fieldheading"><label>Mitigation</label></td>
    <td>&nbsp;</td>
    <td><textarea name="mitigation" id="mitigation" cols="45" rows="5" class="textarea"></textarea>
      <label class="required">*</label></td>
  </tr>
  <tr>
    <td class="fieldheading"><label>Academic Advice</label></td>
    <td>&nbsp;</td>
    <td><textarea name="academicadvice" id="academicadvice" cols="45" rows="5" class="textarea"></textarea>
      </td>
  </tr>
  
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Save" class="buttonstyle" />
      <input type="button" name="cancel" id="cancel" value="Cancel" class="buttonstyle" onclick="window.location = 'AcademicAdvices.php'" /></td>
  </tr>
  
  <?php

if( isset($form) ) 
{
	if(isset($mitigation) &&  $mitigation !== '' && isset($academicadvice) &&  $academicadvice !== '' && isset($studentid) &&  $studentid !== '') 
	{
$sql="insert into studentmitigationdetails(StudentID, Mitigation, Advices, Date) values (\"$studentid\", \"$mitigation\", \"$academicadvice\", now())";
		if (!mysql_query($sql,$conn))
  		{
  		die('Error: ' . mysql_error());
  		}
		$errormsg="Academic Advice for student has been added successfully";
		$studentid="";
	}
	else
	{
	$errormsg="Please provide the required details";

	}
}
mysql_close($conn);

?>
    
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td class="required">* All fields Required</td>
  </tr>
  <tr>
    <td colspan="3" class="error"><?php echo $errormsg;?></td>
    </tr>
  
</table>
<?php
	if(isset($_POST["txtstudentid"])){
		echo "<input type='hidden' name='txtstudentid' value=".$_POST["txtstudentid"].">";
	}
?>
</form>
<p>&nbsp;</p>
</body>
</html>