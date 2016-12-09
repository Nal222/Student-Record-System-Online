<?php require_once('db_connect.php');
$term="";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reports</title>

<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body class="pgbkcolor">
<form id="form1" method="post" action="QueryResults.php">
  <table width="923" height="138" border="0">
    <tr>
      <td height="32" colspan="6" class="heading">Student details with Courses and Units</td>
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
      <td><input type="text" name="txtstudentid" id="txtstudentid" class="inputfield"  maxlength="7" /></td>
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
      <td class="fieldheading">Breakdown of Units undertaking a Course</td>
      <td><select name="CourseNameID" id="Course" class="listdata">
        <option value="">Please Select</option>
        <?php  
	$sql="SELECT * from coursenames";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['CourseNameID'].">" .$row['CourseName']."</option>";
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