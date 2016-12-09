<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course Setup</title>
<link href="menu.css" rel="stylesheet" type="text/css" />

</head>

<body class="pgbkcolor">
<?php
error_reporting(E_ALL ^ E_NOTICE);
$self=$_SERVER['PHP_SELF'];
$errormsg="";
$form = $_POST['submit'];
$coursename=$_POST['txtcoursename'];
$deptID=$_POST['DepartmentID'];

#require_once('db_connect.php');
$conn=@mysql_connect("localhost", "root", "");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
$rs=@mysql_select_db("test", $conn)
?>

<form id="login" name="login" method="post" action="<?php echo($self);?>">
  <table class="tabledata">
    <tr>
      <td colspan="3" class="heading">Course Setup</h1></td>
    </tr>
    <tr>
      <td class="fieldheading">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="195" class="fieldheading">Department</td>
      <td width="10">&nbsp;</td>
      <td width="337"><select name="DepartmentID">
        <option value="">Please Select</option>
        <?php  
	$sql="SELECT * from departments";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['DepartmentID'].">" .$row['DepartmentName']."</option>";
	}
?>
      </select> 
          <label class="required">*</label></td>
    </tr>
    
    <tr>
      <td class="fieldheading"><label for="coursenm">Course Name</label></td>
      <td>&nbsp;</td>
      <td><input type="text" name="txtcoursename" id="txtcoursename" class="inputfield"/> 
        <label class="required">*</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr> <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td class="error"><input name="submit" type="submit" id="btnSave" value="Save" class="buttonstyle"/>
      <input name="cancel" type="button" id="btncancel" value="Cancel" class="buttonstyle" onclick="window.location = 'CourseSetup.php'"/></td>
    </tr>
  
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label class="required">* All fields Required</label></td>
    </tr>
<?php
if( isset($form) ) 
{
		mysql_select_db("test", $conn);

	if( isset($coursename) && isset($deptID) && $coursename !== '' && $deptID !== '' ) 
	{
		$sql="INSERT INTO coursenames (CourseName, DeptID)VALUES(\"$coursename\",\"$deptID\" )";
	
		if (!mysql_query($sql,$conn))
  		{
  			die('Error: ' . mysql_error());
  		}
		$errormsg="Course has been added successfully";

	}
	else
	{
		$errormsg="Please provide the required details";
	}	
}
mysql_close($conn);

?>
  <tr>
  <td colspan="3" class="error"><?php echo $errormsg;?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

</body>
</html>