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
<script language="javascript">


	  
</script>

</head>

<body class="pgbkcolor">
<?
$errormsg="";
?>
<form id="form1" method="post" action="<?php echo($self);?>">
  <table width="100%" height="100%" border="0">
    <tr>
      <td colspan="7" class="heading">Student Academic Grades</td>
    </tr>
    <tr>
      <td width="164" height="32" class="fieldheading">Student ID</td>
      <td width="240"><input type="text" name="txtstudentid" id="txtstudentid" class="inputfield"/></td>
      <td width="60" class="fieldheading">&nbsp;</td>
      <td width="178"><input name="submit" type="submit"  value="Add Grades" class="buttonstyle"/>
      <td width="214" class="fieldheading">&nbsp;</td>
      <td width="17">&nbsp;</td>
      <td width="20">&nbsp;</td>
    </tr>
       
    
<?php
$str="";

session_start();
$studentid=$_POST['txtstudentid'];
//echo "This bit entered";
/*
if(isset($_POST["txtstudentid"]) && $_POST["txtstudentid"]!="") {
	$studentid=$_POST['txtstudentid'];
	$_SESSION['studid']=$studentid;
	//echo "Post student id found, it is ".$studentid;
}
else if (isset($_SESSION["studid"])){
	$studentid = $_SESSION["studid"];
	//echo "Session student id found, it is ".$studentid;
}
else{
	//echo "Neither post NOR session student id found!";	
}
*/

  $conn=@mysql_connect("localhost", "root", "");
  
	
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("test", $conn);

	function GetUnitID($name)
	{
		$name = trim($name);
		$sqlunit="Select UnitID from Units where UnitName ='$name'";
		$resultunit = mysql_query ($sqlunit);
		$unitrow = mysql_fetch_array($resultunit);
		$unitid = $unitrow['UnitID'];
		return $unitid;
	}  




if( isset($form) ) 
{
	if(isset($studentid) && $studentid !== '') 
	{
		//echo "Student id IS SET and is NOT empty! It is ".$studentid;
		$sql="Select StudentID,FirstName,LastName,CourseName, monthname(Term) as TermMon, year(Term) as TermYr, TermID, Units from view_studentunitdetails where StudentID ='$studentid'";
		$res = mysql_query($sql);
				
		if (!mysql_query($sql,$conn)){	die('Error: ' . mysql_error());}
		
		$row = mysql_fetch_array($res);
		$fullname= $row['FirstName']." ".$row['LastName'];
		$strunits = $row['Units'];
		$termperiod=$row['TermMon']." ".$row['TermYr'];
		$termid=$row['TermID'];
		$studentid=$row['StudentID'];
		$array = explode(",", $strunits);
	}
	else
	{
#	 $errormsg="Please provide the required details";
	}
		
}


  
  ?>
  
  <?php
  if(isset($array)){
   echo
    "<tr>".
      "<td>&nbsp;</td>".
      "<td></td>".
      "<td>&nbsp;</td>".
      "<td>&nbsp;</td>".
      "<td>&nbsp;</td>".
      "<td>&nbsp;</td>".
    "</tr>".
    "<tr>".
      "<td class='fieldheading'>StudentID:</td>".
      "<td class='fielddisplay'>".$row['StudentID']."</td>".
      "<td>&nbsp;</td>".
      "<td class='fieldheading'>CourseName:</td>".
      "<td class='fielddisplay'>".$row['CourseName']."</td>".
      "<td>&nbsp;</td>".
    "</tr>".
    "<tr>".
      "<td class='fieldheading'>Student Name:</td>".
      "<td class='fielddisplay'>".$fullname."</td>".
      "<td>&nbsp;</td>".
      "<td class='fieldheading'>Term:</td>".
      "<td class='fielddisplay'>".$termperiod."</td>".
      "<td>&nbsp;</td>".
    "</tr>".
    "<tr>".
      "<td>&nbsp;</td>".
      "<td>&nbsp;</td>".
      "<td>&nbsp;</td>".
      "<td>&nbsp;</td>".
      "<td>&nbsp;</td>".
      "<td>&nbsp;</td>".
    "</tr>".
    "<tr>".
      "<td class='heading'>Units Details </td>".
      "<td class='heading'>Grade</td>".
      "<td>&nbsp;</td>".
      "<td>&nbsp;</td>".
      "<td>&nbsp;</td>".
      "<td>&nbsp;</td>".
    "</tr>";
  }
?>    
	<?php
	
	if(isset($_POST["txtstudentid"])){
		echo '<input type="hidden" name="txtstudentid" value="'.$_POST["txtstudentid"].'">';
	}
	
	?>
    
    
<?php
		  
	$i = 0;
	  
	if(isset($_POST["txtstudentid"])){
		foreach($array as $value){
			echo '<tr>';
			echo '<td class="fielddisplay"><label>' .$value. '</label></td>';
			echo '<td class="fielddisplay"><input type="text" name="txtgrade'.$i.'" id="grade"/></td>';
			
			echo '<td class="fielddisplay"></td>';
			echo '<td></td>';
			echo '<td></td>';  
			echo '<td></td>';
			echo '</tr>';
		
			if(isset($_POST["txtgrade".$i])){
				//echo "query entered";
				//echo "Attempting to insert UnitID for ".trim($value).", which is: ".GetUnitID($value);
			 	$qry=	"insert into studentunitdetails(StudentID,UnitID,Grade,TermID) values('".
						$studentid."','".GetUnitID($value)."','".$_POST["txtgrade".$i]."','".$termid."')";
				$result=mysql_query($qry);
				//echo(" \nThe result is ".$result);
				//echo("The number is ".$_SESSION['studid']);
				//echo mysql_error($conn);
				
			}
			else{
				//echo "\n query not executed";
			
			}
			$i++;
		}
	}
	  
	  
	  ?>
     
<?php
if(isset($array)){ 
	echo
    '<tr>'.
      '<td><input name="submit" type="submit"  value="Save" class="buttonstyle" onclick="SaveData()"/>&nbsp;'.
      '<input name="submit" type="submit"  value="Cancel" class="buttonstyle" onclick=""/></td>'.
      '<td>&nbsp;</td>'.
      '<td></td>'.
      '<td >&nbsp;</td>'.
      '<td ></td>'.
      '<td>&nbsp;</td>'.
    '</tr>';
}
?>       
  </table>
  </form>
  
<?php  mysql_close($conn);
?>  
</body>
</html>