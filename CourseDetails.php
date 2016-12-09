<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course Details</title>
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
<link href="menu.css" rel="stylesheet" type="text/css" />

<form id="login" name="login" method="post" action="<?php echo($self);?>">
  <table class="tabledata">
    <tr>
      <td colspan="3" class="heading">Course Details</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td class="fieldheading">&nbsp;</td>
    </tr>
    <tr>
      <td width="195"><label for="coursenm" class="fieldheading" >Course Name</label></td>
      <td width="10">&nbsp;</td>
      <td width="337"><select name="CourseNameID" class="listdata"> <option value="">Please Select</option>

<?php  
	
			$sql="SELECT * from coursenames";
			
			$res = mysql_query($sql);
			while ($row = mysql_fetch_array($res))
			{
			echo "<option value=".$row['CourseNameID'].">" .$row['CourseName']."</option>";
			}
	
?>
    </select>
        <label class="required" >*</label></td>
    </tr>
    <tr>
      <td class="fieldheading">Qualification</td>
      <td>&nbsp;</td>
      <td><select name="QualificationTypeID" class="listdata"><option value="">Please Select</option>
 <?php  
	$sql="SELECT * from qualificationtypes";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['QualificationTypeID'].">" .$row['QualificationType']."</option>";
	}
?>
           
     </select>
        <label class="required" >*</label></td>
    </tr>
      <td class="fieldheading">Term</td>
      <td>&nbsp;</td>
      <td ><select name="TermID" class="listdata"><option value="">Please Select</option>
 <?php  
	$sql="SELECT TermID,MONTHNAME(Term) AS dtMonth, YEAR(Term) AS dtYear FROM termintakes";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['TermID'].">" .$row['dtMonth'].$row['dtYear']."</option>";
	}
?>
     
      </select>
        <label class="required" >*</label></td>
    </tr>
    <tr>
      <td class="fieldheading">Course Type</td>
      <td>&nbsp;</td>
      <td><select name="CourseTypeID" class="listdata"><option value="">Please Select</option>
 <?php  
	$sql="SELECT * from coursetypes";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['CourseTypeID'].">" .$row['CourseTypeDescription']."</option>";
	}
	
?>
        </select>
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
      <td><input name="submit" type="submit" id="submit" value="Save" class="buttonstyle"/>
      <input name="cancel" type="button" id="cancel" value="Cancel" class="buttonstyle" onclick="window.location = 'Coursedetails.php'"/></td>
    </tr>
<?php

$coursename=$_POST['CourseNameID'];
$QualTypeID=$_POST['QualificationTypeID'];
$TermID=$_POST['TermID'];
$coursetypeID=$_POST['CourseTypeID'];
#mysql_select_db("test", $conn);

if( isset($form) ) 
{
	if(isset($coursename) && isset($TermID)&& isset($coursetypeID)&& isset($QualTypeID)&&  $coursename !== '' && $TermID !== '' && $coursetypeID !==''&& $QualTypeID !=='' ) 
	{
	$sql="INSERT INTO courses (CourseNameID,QualificationTypeID,TermID,CourseTypeID)
	VALUES(\"$coursename\",\"$QualTypeID\",\"$TermID\",\"$coursetypeID\")";
		if (!mysql_query($sql,$conn))
  		{
  		die('Error: ' . mysql_error());
  		}
		$errormsg="Coursedetails have been added successfully";
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
      <td class="required">* All fields Required</td>
    </tr>
    <tr>
      <td colspan="3"class="error"><?php echo $errormsg;?></td>
    </tr>
  
  </table>
</form>
</body>
</html>