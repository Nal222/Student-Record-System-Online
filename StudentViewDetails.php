<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="menu.css" rel="stylesheet" type="text/css" />


<title>Student Profile</title>

<script type="text/javascript">
var oldlabel;
var td;
var newText=document.createElement('textarea');
var button1;
var oldlabel2;
var td2;
var newText2=document.createElement('textarea');
var button2;
var oldlabel3;
var td3;
var newText3=document.createElement('input');
newText3.setAttribute("type", "text");
var button3;
var oldlabel4;
var td4;
var newText4=document.createElement('input');
newText4.setAttribute("type", "text");
var button4;

/*$(document).ready(function() {
   $('#editpermaddress').click(function(){
      $('label.permadd').hide();
	  
    });
});*/
   function fieldshidden(){
	   	
		oldlabel=document.getElementById('permadd');
 		td = document.getElementById('tdpermAdd');
		td.removeChild(oldlabel);
		
		newText=document.createElement('textarea');
		td.appendChild(newText);
		newText.setAttribute("name","textareapermadd");
		
		
		button1 = document.getElementById('editpermaddress');
		
		
		button1.value = "Cancel edit";
	
		button1.onclick = cancelEdit;
		
		
		
   }
   
   function cancelEdit(){
		//alert("Cancel edit called!");
		//var label=document.getElementById('permadd');
 				newText.id="textareapermadd";

		//var textarea1 = document.getElementById('textareapermadd');
		td.removeChild(newText);
		td.appendChild(oldlabel);
		button1.value="Edit";
		button1.onclick=fieldshidden;
	}
	function fieldshidden2(){
	   	
		oldlabel2=document.getElementById('curradd');
 		td2 = document.getElementById('tdcurrAdd');
		td2.removeChild(oldlabel2);
		
		newText2=document.createElement('textarea');
		td2.appendChild(newText2);
		newText2.setAttribute("name","textareacurradd");
		
		button2 = document.getElementById('editcurraddress');
		
		
		button2.value = "Cancel edit";
	
		button2.onclick = cancelEdit2;
		
		
		
   }
   
   function cancelEdit2(){
		//alert("Cancel edit called!");
		//var label=document.getElementById('permadd');
 				newText2.id="textareapermadd";

		//var textarea1 = document.getElementById('textareapermadd');
		td2.removeChild(newText2);
		td2.appendChild(oldlabel2);
		button2.value="Edit";
		button2.onclick=fieldshidden2;
	}
	function fieldshidden3(){
	   	
		oldlabel3=document.getElementById('telnumber');
 		td3 = document.getElementById('tdtelNumber');
		td3.removeChild(oldlabel3);
		
		newText3=document.createElement('input');
		newText3.setAttribute("type", "text");
		td3.appendChild(newText3);
		newText3.setAttribute("name","textfieldtelnumber");
		
		button3 = document.getElementById('edittelnumber');
		
		
		button3.value = "Cancel edit";
	
		button3.onclick = cancelEdit3;
		
		
		
   }
   
   function cancelEdit3(){
		//alert("Cancel edit called!");
		//var label=document.getElementById('permadd');
 				newText3.id="textareapermadd";

		//var textarea1 = document.getElementById('textareapermadd');
		td3.removeChild(newText3);
		td3.appendChild(oldlabel3);
		button3.value="Edit";
		button3.onclick=fieldshidden3;
	}
	function fieldshidden4(){
	   	
		oldlabel4=document.getElementById('email');
 		td4 = document.getElementById('tdEmail');
		td4.removeChild(oldlabel4);
		
		newText4=document.createElement('input');
		newText4.setAttribute("type", "text");
		td4.appendChild(newText4);
		newText4.setAttribute("name","textfieldemail");
		
		button4 = document.getElementById('editemail');
		
		
		button4.value = "Cancel edit";
	
		button4.onclick = cancelEdit4;
		
		
		
   }
   
   function cancelEdit4(){
		//alert("Cancel edit called!");
		//var label=document.getElementById('permadd');
 				newText4.id="textareapermadd";

		//var textarea1 = document.getElementById('textareapermadd');
		td4.removeChild(newText4);
		td4.appendChild(oldlabel4);
		button4.value="Edit";
		button4.onclick=fieldshidden4;
	}

</script>
</head>

<body class="pgbkcolor">
<?php
$self=$_SERVER['PHP_SELF'];
session_start();
$login = $_SESSION['userid'];
$conn=@mysql_connect("localhost", "root", "");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("test", $conn);

if(isset($_POST['textareapermadd']) || isset($_POST['textareacurradd']) ||  isset($_POST['textfieldtelnumber']) || isset($_POST['textfieldemail']) ){

$sqlstring = "update students set ";

if(isset($_POST['textareapermadd'])){
	$sqlstring .= "PermanentAddress='".$_POST['textareapermadd']."',";
}
if(isset($_POST['textareacurradd'])){
	$sqlstring .= "CurrentAddress='".$_POST['textareacurradd']."',";
}
if(isset($_POST['textfieldtelnumber'])){
	$sqlstring .= "TelephoneNo='".$_POST['textfieldtelnumber']."',";
}
if(isset($_POST['textfieldemail'])){
	$sqlstring .= "Email='".$_POST['textfieldemail']."',";
}

$sqlstring = substr($sqlstring, 0, (strlen($sqlstring)-1));

$sqlstring .= " where StudentID='$login'";

echo(" ".$sqlstring." ");
	$rs11=mysql_query($sqlstring, $conn);
	if($rs11){echo("Record added");}
	else{echo "Some error executing query";}
}

$sql="select FirstName from students where StudentID='$login'";
$rs1=mysql_query($sql, $conn);
$array1 = mysql_fetch_array($rs1);
$firstName = $array1['FirstName']; 
$sql2="select LastName from students where StudentID='$login'";
$rs2=mysql_query($sql2, $conn);
$array2 = mysql_fetch_array($rs2);
$lastName = $array2['LastName']; 
$sql3="select PermanentAddress from students where StudentID='$login'";
$rs3=mysql_query($sql3, $conn);
$array3 = mysql_fetch_array($rs3);
$permanentAddress = $array3['PermanentAddress'];

$sql4="select CurrentAddress from students where StudentID='$login'";
$rs4=mysql_query($sql4, $conn);
$array4 = mysql_fetch_array($rs4);
$currentAddress = $array4['CurrentAddress'];

$sql5="select TelephoneNo from students where StudentID='$login'";
$rs5=mysql_query($sql5, $conn);
$array5 = mysql_fetch_array($rs5);
$telephoneNo = $array5['TelephoneNo']; 

$sql6="select Email from students where StudentID='$login'";
$rs6=mysql_query($sql6, $conn);
$array6 = mysql_fetch_array($rs6);
$email = $array6['Email']; 

$sql7="select DOB from students where StudentID='$login'";
$rs7=mysql_query($sql7, $conn);
$array7 = mysql_fetch_array($rs7);
$dob = $array7['DOB'];
$YYYYMMDD = explode("-", $dob);
$displayDOB = $YYYYMMDD[2]."/". $YYYYMMDD[1]."/".$YYYYMMDD[0];

$sql8= "select CourseName, Units from view_studentunitdetails where StudentID ='$login'";
$rs8=mysql_query($sql8, $conn);
$row = mysql_fetch_array($rs8);
$courseName = $row['CourseName'];
$strunits = $row['Units'];
$array = explode(",", $strunits);


$sql9="SELECT SD.Grade FROM STUDENTS S, Units U, StudentUnitdetails SD
WHERE S.StudentID=SD.StudentID
and SD.UnitID=U.UnitID
and SD.StudentID='$login'";
$rs9=mysql_query($sql9, $conn);
#$row = mysql_fetch_array($rs9);


/*"SELECT coursenames.CourseName
FROM coursenames
INNER JOIN studentcoursedetails
ON coursenames.CourseNameID=studentcoursedetails.CourseNameID
WHERE studentcoursedetails.StudentID='$login'";*/

/*$sql9="select units.UnitName from units
INNER JOIN studentunitdetails 
on units.UnitID=studentunitdetails.UnitID
WHERE StudentID='$login'";
$rs9=mysql_query($sql9, $conn);
$array9 = mysql_fetch_array($rs9);
$unitNames = $array9['UnitName'];

 
$sql10="select units.UnitName, units.Credits, studentunitdetails.Grade, studentunitdetails.YearEnrolled
from units INNER JOIN
studentunitdetails on units.UnitID=studentunitdetails.UnitID WHERE StudentID='$login'";

*/

?>

<form id="updatestudentdetails" name="updatestudentdetails" method="post" action="<?php echo($self);?>">
 
<table class="tabledata">
<tr><td height="47" colspan="2"></td></tr>
<tr>
  <td class="heading">Student Personal Details</td>
  <td></td></tr>
  
  
<tr><td width="50%" height="288"><table width="445" border="0">

  <tr>
    <td width="213">&nbsp;</td>
    <td width="146">&nbsp;</td>
  </tr>
  <tr>
    <td class="fieldheading">Student:</td>
    <td class="fielddisplay"><label><?php echo($login);?></label>&nbsp;</th>
  </tr>
  <tr>
    <td class="fieldheading">First Name:</td>
    <td><label id="firstname" class="fielddisplay"><?php echo($firstName); ?></label>&nbsp;</td>
  </tr>
  <tr>
    <td class="fieldheading">Last Name:</td>
    <td class="fielddisplay"><label><?php echo($lastName); ?></label>&nbsp;</td>
  </tr>
  <tr>
  	<td class="fieldheading">Permanent Address:</td>
    <td id="tdpermAdd"  class="fielddisplay"><label id="permadd"><?php echo($permanentAddress); ?></label>&nbsp;</td>
    <td width="72" id="tdbutton"><!--<form id="form1" name="form1" method="post" action="">-->
      <input type="button" class="buttonstyle" name="editpermaddress" id="editpermaddress" value="Edit" onclick="fieldshidden()" />
    </td>
  </tr>
  <tr>
  <td class="fieldheading">Current Address:</td>
    <td id="tdcurrAdd"  class="fielddisplay"><label id="curradd"><?php echo($currentAddress); ?></label>&nbsp;</td>
    <td>
      <input type="button" name="editcurraddress" id="editcurraddress" value="Edit" class="buttonstyle" onclick="fieldshidden2()" />
    </td>
  </tr>
  <tr>
  <td class="fieldheading">Telephone Number:</td>
    <td id="tdtelNumber" class="fielddisplay"><label id="telnumber" ><?php echo($telephoneNo); ?></label></td>
    <td>
      <input type="button" class="buttonstyle" name="edittelnumber" id="edittelnumber" value="Edit" onclick="fieldshidden3()" />
    </td>
  </tr>
  <tr>
  <td class="fieldheading">E-mail:</td>
    <td id="tdEmail" class="fieldheading"><label id="email"><?php echo($email); ?></label>&nbsp;</td>
    <td>
      <input type="button" class="buttonstyle" name="editemail" id="editemail" value="Edit" onclick="fieldshidden4()" />
    </td>
  </tr>
  <tr>
    <td class="fieldheading">Date of Birth:</td>
    <td class="fielddisplay"><label><?php echo($displayDOB); ?></label>&nbsp;</td>
  </tr>
  <tr><td colspan="2"></td></tr>
</table> 
    
      <input type="submit" class="buttonstyle" name="updatebutton" id="updatebutton" value="Update" />
</form>
<table>
    <p>&nbsp;</p></td><td width="50%"></td></tr>
<tr>
  <td height="12" colspan="2" class="heading">Course Details</td></tr>
<tr><td width="50%" height="78"><table width="444" border="0">
  <tr>
    <td class="fieldheading">Course Name:</td>
    <td class="fielddisplay"><label><?php echo($courseName); ?></label>&nbsp;</td>
  </tr>
</table></td><td width="50%"><table width="409" border="0">
  <tr>
    <td class="fieldheading">Department:</td>
    <td class="fielddisplay"><label>label</label>&nbsp;</td>
  </tr>
</table></td></tr>
<tr><td>
 
  
  </td><td width="50%"></td></tr>
  
  <tr><td>Description of Units</td></tr>
  <?php
  foreach($array as $value){
	  	
			echo '<tr>';
					
			echo '<td><label>' .$value. '</label></td>';
						echo '</tr>';
 }
?>
  
  <td>Grade</td>
  </tr>
  <?php
  
  while ($row = mysql_fetch_array($rs9))
  {
  echo '<tr>';
   echo '<td></td>';
   echo '<td>'.$row['Grade'].'</td>';
  echo '</tr>';
  }
  ?>
  
  


</table>
</body>
</html>

