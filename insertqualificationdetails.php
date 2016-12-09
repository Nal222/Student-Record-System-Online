<?php
$lastRowIndexPlusOne = $_GET["numberweareat"];

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

if($studentid and $firstname and $lastname and $permanentaddress and $currentaddress and $telephonenumber and $email and $dateofbirth)#ensure values exist
{
	
$ddMMYYYY = explode("-", $dateofbirth);
$mySQLDateOfBirth = $ddMMYYYY[2]."-".$ddMMYYYY[1]."-".$ddMMYYYY[0];

#create the query
$sql="insert into students(StudentID, FirstName, LastName, PermanentAddress, CurrentAddress, TelephoneNo, Email, DOB) values
(\"$studentid\", \"$firstname\", \"$lastname\",\"$permanentaddress\", \"$currentaddress\", \"$telephonenumber\", \"$email\", '".$mySQLDateOfBirth."')";

#execute the query
$rs=mysql_query($sql, $conn);

#confirm the added record details
if($rs){echo("Record added: $studentid $firstname $lastname $permanentaddress $currentaddress $telephonenumber $email $dateofbirth");}
	
}

		
		for($i = 0; $i < $lastRowIndexPlusOne; $i++){
			try{
				#ensure values exist
				if($_POST["LevelID".$i] and $_POST["SubjectID".$i] and $_POST["grade".$i] and $_POST["CountryID".$i] and 
					$_POST["institutiongfrom".$i] and $_POST["dateawarded".$i]){
					$ddMMYYYY = explode("-", $_POST["dateawarded".$i]);
					$dateawarded = $ddMMYYYY[2]."-".$ddMMYYYY[1]."-".$ddMMYYYY[0];
					echo($dateawarded);
					
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
					echo ("1 record added");
					}
				}
			}
			catch(Exception $e){
				//do nothing, the exception will probably be "Undefined index"
				echo "Exceptionnnn";
			}			
		}
mysql_close($conn);

?>