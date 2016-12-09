<?php
$cour_id=$_GET['cour_id'];
$conn=@mysql_connect("localhost", "root", "");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("test", $conn);

$q=mysql_query("SELECT distinct TermID,Term from course_details_view where CourseID='$cour_id'");

echo mysql_error();
$myarray=array();
$str="";
while($nt=mysql_fetch_array($q))
{
$str=$str . "\"$nt[Term]\"".",";

}
$str=substr($str,0,(strLen($str)-1)); // Removing the last char , from the string
echo "new Array(".$str.")";
?>