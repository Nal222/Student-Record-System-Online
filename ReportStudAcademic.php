<?php 
error_reporting (E_ALL ^ E_NOTICE); 
$term=$_POST['TermID'];
require_once('db_connect.php');
$firstname=$_POST['txtfirstname'];
$studentid=$_POST['txtstudentid'];
$lastname=$_POST['txtlastname'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reports</title>

<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body class="pgbkcolor">
<form id="form1" method="post" action="QueryResults_Academic.php">
  <table width="923" height="138" border="0">
    <tr>
      <td height="32" colspan="6" class="heading">Students Mitigation and Academic Advices</td>
    </tr>
    <tr>
      <td height="32" class="fieldheading">&nbsp;</td>
      <td>&nbsp;</td>
      <td class="fieldheading">&nbsp;</td>
      <td>&nbsp;</td>
      <td class="fieldheading">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="32" class="fieldheading">Student ID</td>
      <td><input type="text" name="txtstudentid" id="txtstudentid" class="inputfield"/></td>
      <td class="fieldheading">First Name</td>
      <td><input type="text" name="txtfirstname" class="inputfield"/></td>
      <td class="fieldheading">Last Name</td>
      <td><input type="text" name="txtlastname" class="inputfield"/></td>
    </tr>
    <tr>
      <td height="32" colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="648" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="fieldheading">List of all Academic Issues for Students who registered in:</td>
      <td><select name="TermID" class="listdata"><option value="">Please Select</option>
 <?php  
	$sql="SELECT TermID,MONTHNAME(Term) AS dtMonth, YEAR(Term) AS dtYear FROM termintakes";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['TermID'].">" .$row['dtMonth'].$row['dtYear']."</option>";
	}
?>
     
      </select></td>
      <td><input name="submit" type="submit"  value="Search" class="buttonstyle"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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