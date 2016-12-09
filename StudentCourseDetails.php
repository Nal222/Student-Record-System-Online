<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Course Details</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script type="text/javascript">

function AjaxFunction(cour_id){
	
	function stateck(data){
			
			var myarray=eval(data);
		
			for(var i=0;i<myarray.length;i++){
			}
		
			// Before adding new we must remove previously loaded elements
			for(var j=document.StudCourse.TermID.options.length-1;j>=0;j--){

				document.StudCourse.TermID.remove(j);

			}
		
		
			for (var i=0;i<myarray.length;i++){
				var optn = document.createElement("OPTION");
				optn.text = myarray[i];
				optn.value = myarray[i];
				document.StudCourse.TermID.options.add(optn);
				} 


	}
	$.ajax({url: "SSC.php?cour_id="+cour_id}).done(stateck);

}
</script>

</head>

<body class="pgbkcolor">
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
$self=$_SERVER['PHP_SELF'];
$errormsg="";
$form = $_POST['submit'];
$studentid = $_SESSION['studentid'];


$conn=@mysql_connect("localhost", "root", "")or die("Err:Conn");
#include "db_connect.php";
$rs=@mysql_select_db("test", $conn) or die("Err:Db");

?>
<link href="menu.css" rel="stylesheet" type="text/css" />

<form id="StudCourse" name="StudCourse" method="post" action="<?php echo($self);?>">
  <table class="tabledata">
    <tr>
      <td colspan="3" class="heading">Student Course Details</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td class="fieldheading">&nbsp;</td>
    </tr>
    <tr>
      <td><label for="coursenm2" class="fieldheading" >StudentID</label></td>
      <td>&nbsp;</td>
      <td class="fieldheading"><?php echo($studentid);?></td>
    </tr>
    <tr>
      <td width="195"><label for="coursenm" class="fieldheading" >Course Name</label></td>
      <td width="10">&nbsp;</td>
      <td width="337"><select name="CourseNameID" class="listdata" id="Coursename" onchange="AjaxFunction(this.value)"> <option value="">Please Select</option>

<?php  
	
			$sql="SELECT distinct CourseID, Coursename from course_details_view";
			
			$res = mysql_query($sql);
			while ($row = mysql_fetch_array($res))
			{
			echo "<option value=".$row['CourseID'].">" .$row['Coursename']."</option>";
			}
	
?>
    </select>
        <label class="required" >*
      </label></td>

    </tr>
      <td class="fieldheading">Term</td>
      <td>&nbsp;</td>
      <td ><select name="TermID"></select>
        <label class="required" >*
        </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" id="submit" value="Save" class="buttonstyle"/>
      <input name="cancel" type="button" id="cancel" value="Cancel" class="buttonstyle" onclick="window.location = 'Coursedetails.php'"/></td>
    </tr>
<?php

$Term=$_POST['TermID'];
$coursename=$_POST['CourseNameID'];

$sql="Select TermID from termintakes where Term= '$Term'";
$result = mysql_query ($sql);
$row = mysql_fetch_array($result);
$termid = $row['TermID'];

if( isset($form) ) 
{
	if(isset($coursename) && isset($termid)&& isset($studentid)&& $coursename !== '' && $termid !== '' && $studentid !=='') 
	{
	$sql="INSERT INTO studentcoursedetails (StudentID,CourseNameID,TermID,AdmissionDate)
	VALUES(\"$studentid\",\"$coursename\",\"$termid\",now())";
		if (!mysql_query($sql,$conn))
  		{
  		die('Error: ' . mysql_error());
  		}
		$errormsg="Student Coursedetails have been added successfully";
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