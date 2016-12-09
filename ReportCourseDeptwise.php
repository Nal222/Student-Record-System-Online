<?php 
#require_once('db_connect.php');

error_reporting(E_ALL ^ E_NOTICE);
$self=$_SERVER['PHP_SELF'];
$form = $_POST['submit'];
$deptID=$_POST['DepartmentID'];
$errormsg="";

$conn=@mysql_connect("localhost", "root", "");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("test", $conn);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reports</title>

<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body class="pgbkcolor">
<form id="form1" method="post" action="<?php echo($self);?>">
  <table width="923" height="138" border="0">
    <tr>
      <td height="32" colspan="6" class="heading">Courses By Department</td>
    </tr>
    <tr>
      <td height="32" colspan="6" class="heading">&nbsp;</td>
    </tr>

    <tr>
      <td width="148" height="32" class="fieldheading">Department</td>
      <td width="204"><select name="DepartmentID">
        <option value="">Please Select</option>
        <?php  
	$sql="SELECT * from departments";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['DepartmentID'].">" .$row['DepartmentName']."</option>";
	}
?>
      </select></td>
      <td width="431" class="fieldheading"><input name="submit" type="submit"  value="Search" class="buttonstyle"/></td>
      <td width="31">&nbsp;</td>
      <td width="49" class="fieldheading">&nbsp;</td>
      <td width="34">&nbsp;</td>
    </tr>
    <tr>
      <td height="32" colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
  <?php

if( isset($form) ) 
{
  
  if ($deptID!="")
  {
  	$sql="Select DeptName, CourseName from deptcourseview where DeptID =$deptID";
	$res = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	
		echo '<table border=1 class="displaydata">';
 		echo'<BR>';
   		echo '<th>Department</th>';
  		echo '<th>Courses</th>';
  		
	
		while ($row = mysql_fetch_array($res))
		{
			echo '<tr>';
			echo '<td >'.$row['CourseName'] . '</td>';
			echo '<td >' .$row['DeptName']. '</td>';
			echo '</tr>';
		}
		echo '</table>'	;
  }
  else
  	{
	$errormsg="Please select any Department";
	 }
  
}
    
?>  
    <tr>
      <td height="32" colspan="3" class="fieldheading"><?php echo $errormsg; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
 
  
</form>
</body>
</html>