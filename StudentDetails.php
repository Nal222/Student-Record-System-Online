<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Details</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link href="menu.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
$(document).ready(
	function(){
		$("#dateofbirth").datepicker(
			{
            	changeMonth: true,
            	changeYear: true,
				minDate: "-120Y",
				maxDate: "-10Y",
				defaultDate: "-21Y",
				dateFormat: 'dd-mm-yy'
        	}
		);
		$("#dateawarded0").datepicker(
			{
            	changeMonth: true,
            	changeYear: true,
				minDate: "-120Y",
				maxDate: 0,
				defaultDate: "-1Y",
				dateFormat: 'dd-mm-yy'
        	}
		);
  	}
);

var tableId = "qualificationTable";
function addQualification(){
	 var table = document.getElementById(tableId);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
			
			var inputs = row.getElementsByTagName("input");
	
			for(var i=0; i<inputs.length; i++){
				//alert("Was: " + inputs[i].name);
				inputs[i].id = inputs[i].id.replace(/[0-9]/g, "")  + numberWeAreAt;
				inputs[i].name = inputs[i].name.replace(/[0-9]/g, "")  + numberWeAreAt;
				//alert("Is now: " + inputs[i].name);
			}
			
			var selects = row.getElementsByTagName("select");
			
			for(var i=0; i<selects.length; i++){
				//alert("Was: " + selects[i].name);
				selects[i].id = selects[i].id.replace(/[0-9]/g, "")  + numberWeAreAt;
				selects[i].name = selects[i].name.replace(/[0-9]/g, "")  + numberWeAreAt;
				
				//alert("Is now: " + selects[i].name);
			}
			
			$("#dateawarded" + numberWeAreAt).removeClass('hasDatepicker').datepicker(
				{
					changeMonth: true,
					changeYear: true,
					minDate: "-120Y",
					maxDate: 0,
					defaultDate: "-1Y",
					dateFormat: 'dd-mm-yy'
				}
			);
			
			numberWeAreAt++;
			var action = document.getElementById("form1").action;
			document.getElementById("form1").action = action.replace(/[0-9]/g, "") + numberWeAreAt;
        }
 
 		var numberWeAreAt = 1;
		
        function deleteQualification() {
            try {
            var table = document.getElementById(tableId);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
	
	function doValidate(){
		var error = false;
		//alert("doValidate() called");
		var myfield1 = document.getElementById("studentid");
		if(myfield1.value.length==0)
		{
			document.getElementById("hiddentr1").style.display = '';
    		document.getElementById("hiddentr1").innerHTML = "Please enter student id";
			var oldHTML = document.getElementById('hiddentr1').innerHTML;
	var newHTML = "<span style='color:#ff0000'>" + oldHTML + "</span>";
	document.getElementById('hiddentr1').innerHTML = newHTML;
			error = true;
			//alert("entered");
		}
		var myfield2 = document.getElementById("firstname");
		if(myfield2.value.length==0)
		{
			document.getElementById("hiddentr2").style.display = '';
    		document.getElementById("hiddentr2").innerHTML = "Please enter first name";
			var oldHTML = document.getElementById('hiddentr2').innerHTML;
	var newHTML = "<span style='color:#ff0000'>" + oldHTML + "</span>";
	document.getElementById('hiddentr2').innerHTML = newHTML;
			error = true;
		}
		var myfield3 = document.getElementById("lastname");
		if(myfield3.value.length==0)
		{
			document.getElementById("hiddentr3").style.display = '';
    		document.getElementById("hiddentr3").innerHTML = "Please enter last name";
			var oldHTML = document.getElementById('hiddentr3').innerHTML;
	var newHTML = "<span style='color:#ff0000'>" + oldHTML + "</span>";
	document.getElementById('hiddentr3').innerHTML = newHTML;
			error = true;
		}
		var myfield4 = document.getElementById("permanentaddress");
		if(myfield4.value.length==0)
		{
			document.getElementById("hiddentr4").style.display = '';
    		document.getElementById("hiddentr4").innerHTML = "Please enter permanent address";
			var oldHTML = document.getElementById('hiddentr4').innerHTML;
	var newHTML = "<span style='color:#ff0000'>" + oldHTML + "</span>";
	document.getElementById('hiddentr4').innerHTML = newHTML;
			error = true;
		}
		var myfield5 = document.getElementById("currentaddress");
		if(myfield5.value.length==0)
		{
			document.getElementById("hiddentr5").style.display = '';
    		document.getElementById("hiddentr5").innerHTML = "Please enter current address";
			var oldHTML = document.getElementById('hiddentr5').innerHTML;
	var newHTML = "<span style='color:#ff0000'>" + oldHTML + "</span>";
	document.getElementById('hiddentr5').innerHTML = newHTML;
			error = true;
		}
		var myfield6 = document.getElementById("telephonenumber");
		if(myfield6.value.length==0)
		{
			document.getElementById("hiddentr6").style.display = '';
    		document.getElementById("hiddentr6").innerHTML = "Please enter telephone number";
			var oldHTML = document.getElementById('hiddentr6').innerHTML;
	var newHTML = "<span style='color:#ff0000'>" + oldHTML + "</span>";
	document.getElementById('hiddentr6').innerHTML = newHTML;
			error = true;
		}
		var numericExpression = /^[0-9]+$/;
		if(myfield6.value.match(numericExpression)){
			
			
		}
		else{
			document.getElementById("hiddentr6").style.display = '';
    		document.getElementById("hiddentr6").innerHTML = "Please enter numbers only";
			var oldHTML = document.getElementById('hiddentr6').innerHTML;
	var newHTML = "<span style='color:#ff0000'>" + oldHTML + "</span>";
	document.getElementById('hiddentr6').innerHTML = newHTML;
			error = true;
			
		}
		var myfield7 = document.getElementById("email");
		if(myfield7.value.length==0)
		{
			document.getElementById("hiddentr7").style.display = '';
    		document.getElementById("hiddentr7").innerHTML = "Please enter email";
			var oldHTML = document.getElementById('hiddentr7').innerHTML;
	var newHTML = "<span style='color:#ff0000'>" + oldHTML + "</span>";
	document.getElementById('hiddentr7').innerHTML = newHTML;
			error = true;
		}
		var myfield8 = document.getElementById("dateofbirth");
		if(myfield8.value.length==0)
		{
			document.getElementById("hiddentr8").style.display = '';
    		document.getElementById("hiddentr8").innerHTML = "Please enter date of birth";
			var oldHTML = document.getElementById('hiddentr8').innerHTML;
	var newHTML = "<span style='color:#ff0000'>" + oldHTML + "</span>";
	document.getElementById('hiddentr8').innerHTML = newHTML;
			error = true;
		}
		var x=document.forms["form1"]["email"].value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
 		 {
  			document.getElementById("hiddentr7").style.display = '';
    		document.getElementById("hiddentr7").innerHTML = "Not a valid email address";
			var oldHTML = document.getElementById('hiddentr7').innerHTML;
	var newHTML = "<span style='color:#ff0000'>" + oldHTML + "</span>";
	document.getElementById('hiddentr7').innerHTML = newHTML;
			error = true;
  		}
				
		var table = document.getElementById(tableId);
		
		var justInputs = table.getElementsByTagName("input");
		
		for(var i=0; i<justInputs.length; i++){
			
			if(justInputs[i].value.length==0){
				alert("Please make sure all fields are filled");
				error = true;
				break;
			}
			
		}
		
		if(error==false){
			var justSelects = table.getElementsByTagName("select");
			
			for(var i=0; i<justSelects.length; i++){
			
				if(justSelects[i].value.length==0){
					alert("Please make sure all fields are filled");
					error = true;
					break;
				}
				
			}
		}
		
		

		if(error==true){
			return false;
		}
		
		
	}
	
</script>

</head>

<body class="pgbkcolor">
<?php 
error_reporting (E_ALL ^ E_NOTICE); 
session_start();
$self=$_SERVER['PHP_SELF'];
$errormsg1="";
$errormsg2="";
$form = $_POST['submit'];
?>


<form id="form1" name="form1" method="post" action="<?php echo($self);?>" onsubmit="return doValidate()">
<table class="tabledata">
    <tr>
      <td colspan="3" class="heading">Personal Details</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="127"><label for="studentid" class="fieldheading">Student ID</label></td>
      <td width="172"> <input type="text" name="studentid" id="studentid" class="inputfield" /></td>
      <td width="156" id="hiddentr1">&nbsp;</td>
    </tr>
    <tr>
      <td width="127"><label for="firstname" class="fieldheading">First Name</label></td>
      <td width="172"><input type="text" name="firstname" id="firstname" class="inputfield"/></td>
      <td width="156" id="hiddentr2">&nbsp;</td>
    </tr>
    <tr>
      <td width="127"><label for="lastname" class="fieldheading">Last Name</label></td>
      <td width="172"><input type="text" name="lastname" id="lastname" class="inputfield"/></td>
      <td width="156"id="hiddentr3">&nbsp;</td>
    </tr>
    <tr>
      <td width="127"> <label for="permanentaddress" class="fieldheading">Permanent Address</label></td>
      <td width="172"><textarea name="permanentaddress" cols="45" rows="5" id="permanentaddress" class="textarea"></textarea></td>
      <td width="156" id="hiddentr4">&nbsp;</td>
    </tr>
    <tr>
      <td width="127"><label for="currentaddress" class="fieldheading">Current Address</label></td>
      <td width="172"><textarea name="currentaddress"cols="45" rows="5" id="currentaddress" class="textarea"></textarea></td>
      <td width="156" id="hiddentr5">&nbsp;</td>
    </tr>
    <tr>
      <td width="127"><label for="telephonenumber" class="fieldheading">Telephone No.</label></td>
      <td width="172"><input type="text" name="telephonenumber" id="telephonenumber" class="inputfield" /></td>
      <td width="156" id="hiddentr6">&nbsp;</td>
    </tr>
    <tr>
      <td width="127"> <label for="email" class="fieldheading">Email</label></td>
      <td width="172"><input type="text" name="email" id="email"class="inputfield" /></td>
      <td width="156" id="hiddentr7">&nbsp;</td>
    </tr>
    <tr>
      <td width="127"><label for="dateofbirth" class="fieldheading">Date of Birth</label></td>
      <td width="172"><input name="dateofbirth" type="text" id="dateofbirth" maxlength="6" /></td>
      <td width="156"id="hiddentr8">&nbsp;</td>
    </tr>
    
  </table>
  <p>
    <label class="heading">Qualifications</label>
  </p>
  <table width="529" border="0">
    <tr>
      <td width="217">&nbsp;</td>
      <td width="44">&nbsp;</td>
      <td width="254">&nbsp;</td>
    </tr>
    
    <?php
	
#$lastRowIndexPlusOne = $_GET["numberweareat"];

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$permanentaddress=$_POST['permanentaddress'];
$currentaddress=$_POST['currentaddress'];
$telephonenumber=$_POST['telephonenumber'];
$email=$_POST['email'];
$dateofbirth=$_POST['dateofbirth'];
$studentid=$_POST['studentid'];

$conn=@mysql_connect("localhost", "root", "");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
#$rs=@mysql_select_db("test", $conn)
mysql_select_db("test", $conn);

if( isset($form) ) 
{

	if($studentid and $firstname and $lastname and $permanentaddress and $currentaddress and $telephonenumber and $email and $dateofbirth)#ensure values exist
	{
	
	$numberweareat=1;
	$lastRowIndexPlusOne = $numberweareat;
	$_SESSION['studentid'] = $studentid;

	$ddMMYYYY = explode("-", $dateofbirth);
	$mySQLDateOfBirth = $ddMMYYYY[2]."-".$ddMMYYYY[1]."-".$ddMMYYYY[0];

	#create the query
	$sql="insert into students(StudentID, FirstName, LastName, PermanentAddress, CurrentAddress, TelephoneNo, Email, DOB) values
	(\"$studentid\", \"$firstname\", \"$lastname\",\"$permanentaddress\", \"$currentaddress\", \"$telephonenumber\", \"$email\", '".$mySQLDateOfBirth."')";

	#execute the query
	$rs=mysql_query($sql, $conn);

	#confirm the added record details
	if($rs){
		#echo("Record added: $studentid $firstname $lastname $permanentaddress $currentaddress $telephonenumber $email $dateofbirth");
		$errormsg2="Student details have and.";

		}
	
	}

		
		for($i = 0; $i < $lastRowIndexPlusOne; $i++){
			try{
				#ensure values exist
				if($_POST["LevelID".$i] and $_POST["SubjectID".$i] and $_POST["grade".$i] and $_POST["CountryID".$i] and 
					$_POST["institutiongfrom".$i] and $_POST["dateawarded".$i]){
					$ddMMYYYY = explode("-", $_POST["dateawarded".$i]);
					$dateawarded = $ddMMYYYY[2]."-".$ddMMYYYY[1]."-".$ddMMYYYY[0];
					
					$sql = 	"insert into qualifications (StudentID, LevelID, SubjectID, Grade, CountryID, ".
							"Institutions, DateAwarded) VALUES('".$studentid."', '".$_POST["LevelID".$i]."', '".
							$_POST["SubjectID".$i]."', '".$_POST["grade".$i]."', '".$_POST["CountryID".$i]."', '".
							$_POST["institutiongfrom".$i]."', '".$dateawarded."')";
					/*if (!mysql_query($sql,$conn)){
						die('Error: ' . mysql_error());
					}*/
					$rs=mysql_query($sql, $conn);
					if($rs)
					{
					#echo ("1 record added");
					$errormsg2="Qualification details have been added successfully.";
					}
				}
			}
			catch(Exception $e){
				//do nothing, the exception will probably be "Undefined index"
				echo "Exceptionnnn";
			}			
		}
		
}
mysql_close($conn);

?>
    <tr>
      <td colspan="3"class="error"><?php echo $errormsg1.$errormsg2;?></td>
    </tr>
  </table>
  <p>
    <input name="addqualification" type="button" id="addqualification" value="Add" class="buttonstyle" onclick="addQualification()"/>
    <input type="button" name="deletequalification" id="deletequalification" value="Delete" class="buttonstyle" onclick="deleteQualification()" />
    </span>  </p>
  <table width="900" border="0" id="qualificationTable">
    <tr>
      <td><input type="checkbox" name="deletecheckbox" id="deletecheckbox" /></td>
      <td><label for="level" class="fieldheading">Level</label></td>
      <td><select name="LevelID0" id="LevelID0" class="input"><option value="">Please Select</option>
      <?php  
	  $conn=@mysql_connect("localhost", "root", "");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
#$rs=@mysql_select_db("test", $conn)
mysql_select_db("test", $conn);

	$sql="SELECT * from levels";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['LevelID'].">" .$row['Level']."</option>";
	}
?>
  
      
      
      </select></td>
      <td><label for="subject" class="fieldheading">Subject</label></td>
      <td><select name="SubjectID0" id="SubjectID0" class="input"><option value="">Please Select</option>
       <?php  
	$sql="SELECT * from subjects";
	$res = mysql_query($sql);
	
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['SubjectID'].">" .$row['Subject']."</option>";
	}
?>
      
      
      
      </select></td>
      <td width="10"><label for="grade" class="fieldheading">Grade</label></td>
      <td width="5"><input type="text" name="grade0" id="grade0" /></td>
       <td><label for="country" class="fieldheading">Country</label></td>
      <td><select name="CountryID0" id="CountryID0" class="input"><option value="">Please Select</option>
       <?php  
	$sql="SELECT * from countries";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['CountryID'].">" .$row['Country']."</option>";
	}
?>
      
      
      
      </select></td>
      
      <td><label for="institutiongfrom" class="fieldheading">Institution Gained from</label></td>
      <td><input type="text" name="institutiongfrom0" id="institutiongfrom0" /></td>
      <td><label for="dateawarded" class="fieldheading">Date Awarded</label></td>
      <td><input type="text" name="dateawarded0" id="dateawarded0" /></td>
    </tr>
   
  </table>
  <p>
    <input type="submit" name="submit" value="Save" class="buttonstyle"> 
    <input type="button" value="Cancel" class="buttonstyle" onclick="window.location = 'StudentDetails.php'">
    
</p>
</form>
<p>&nbsp;</p>
</body>
</html>