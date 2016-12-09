<?php 

error_reporting (E_ALL ^ E_NOTICE); 
require_once('db_connect.php');
$self=$_SERVER['PHP_SELF'];
$form = $_POST['submit'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Student</title>

<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body class="pgbkcolor">
<?
$errormsg="";
?>
<form id="form1" method="post" action="AcademicAdvices.php">
  <table width="923" height="206" border="0">
    <tr>
      <td height="32" colspan="7" class="heading">Student Academic Advices</td>
    </tr>
    <tr>
      <td width="164" height="32" class="fieldheading">Search By:</td>
      <td width="271">&nbsp;</td>
      <td width="29" class="fieldheading">&nbsp;</td>
      <td width="373">&nbsp;</td>
      <td width="19" class="fieldheading">&nbsp;</td>
      <td width="17">&nbsp;</td>
      <td width="20">&nbsp;</td>
    </tr>
    <tr>
      <td height="32" class="fieldheading">Student ID</td>
      <td><input type="text" name="txtstudentid" id="txtstudentid" class="inputfield"/></td>
      <td class="fieldheading">&nbsp;</td>
      <td><input name="submit" type="submit"  value="Add Academic Advices" class="buttonstyle"/>

      <td class="fieldheading">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="32" colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="32" colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
  <?php
session_start();  
$studentid=$_POST['txtstudentid'];
  
$conn=@mysql_connect("localhost", "root", "");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("test", $conn);


if( isset($form) ) 
{
	if(isset($studentid) && $studentid !== '') 
	{
  	$sql="Select * from students where StudentID='$studentid'";
	$res = mysql_query($sql);
		
	if (!mysql_query($sql,$conn)){	die('Error: ' . mysql_error());}
		echo '<table class="displaydata" border="1">';
 		echo'<BR><BR>';
   		echo '<th class="fieldheading">Student ID</th>';
  		echo '<th class="fieldheading">First Name</th>';
  		echo '<th class="fieldheading">Last Name</th>';
  		echo '<th class="fieldheading">DOB</th>';
  	#	echo '<th class="fieldheading">Academic Advice</th>';
		
		$_SESSION['studentid'] = $_POST['txtstudentid'];
	
		while ($row = mysql_fetch_array($res))
		{
			echo '<tr>';
			echo '<td>'  .$row['StudentID'] . '</td>';
			echo '<td >' .$row['FirstName']. '</td>';
			echo '<td >' .$row['LastName']. '</td>';
			echo '<td >' .$row['DOB']. '</td>';
			echo '</tr>';
		}
		echo '</table>'	;
	}
	else
	{
	 $errormsg="Please provide the required details";
	}
		
}
 mysql_close($conn);

  
  ?>  
    <tr>
      <td height="32" colspan="2" class="error"><?php echo $errormsg;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  </form>
  
  
</body>
</html>