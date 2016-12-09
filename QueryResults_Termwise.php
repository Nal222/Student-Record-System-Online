<html>
<head>
<link href="menu.css" rel="stylesheet" type="text/css" />

</head>
<body class="pgbkcolor">
<?php

$conn=@mysql_connect("localhost", "root", "");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("test", $conn);
# get the ID from Coursename tables

$firstname=$_POST['txtfirstname'];
$studentid=$_POST['txtstudentid'];
$lastname=$_POST['txtlastname'];
$term=$_POST['TermID'];

	
# Filter view according to the criteria
# Selected Coursename
/*if ($coursename!="" )
{
$sql="Select CourseName from coursenames where CourseNameID= '$coursename'";

 $result = mysql_query ($sql);
    $row = mysql_fetch_array($result);
    $coursename = $row['CourseName'];

$sql="Select StudentID,FirstName,LastName,CourseName,TermMon, TermYr,Units from view_studentunitdetails where CourseName Like '%$coursename%' ";
}
*/# Selected FirstName
if ($firstname!="" )
{
	$sql="Select StudentID,FirstName,LastName,CourseName,MonthName(Term) as TermMon, Year(Term)as TermYr,Units  from view_studentunitdetails where FirstName Like '%$firstname%'";
}
# Selected StudentID
else if ($studentid!="" )
{
	$sql="Select StudentID,FirstName,LastName,CourseName,MonthName(Term) as TermMon, Year(Term)as TermYr,Units from view_studentunitdetails where StudentID ='$studentid'";
}
# Selected Lastname
else if ($lastname!="" )

{
		$sql="Select StudentID,FirstName,LastName,CourseName,MonthName(Term) as TermMon, Year(Term)as TermYr,Units from view_studentunitdetails where LastName ='$lastname'";
}

# Selected Termbefore
else if ($term!="" )
{
	$sql="Select Term from termintakes where TermID ='$term'";
	$result = mysql_query ($sql);
    $row = mysql_fetch_array($result);
    $term = $row['Term'];
	
	#$echo $termmon.$termyr;
	$sql="Select StudentID,FirstName,LastName,CourseName,MonthName(Term) as TermMon, Year(Term)as TermYr,Units  from view_studentunitdetails where Term<'$term' ORDER BY Term";
}

	$res = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	
		echo '<table cellpadding="0" cellspacing="0" border="1">';
 		echo'<BR><BR>';
   		echo '<th class="fieldheading">Student ID</th>';
  		echo '<th class="fieldheading">First Name</th>';
  		echo '<th class="fieldheading">Last Name</th>';
		echo '<th class="fieldheading">Course</th>';
  		echo '<th class="fieldheading">Term Year</th>';
  		echo '<th class="fieldheading">Term Month</th>';
		echo '<th class="fieldheading">Units</th>';
	
		while ($row = mysql_fetch_array($res))
		{
			echo '<tr>';
			echo '<td >'.$row['StudentID'] . '</td>';
			echo '<td width=100>' .$row['FirstName']. '</td>';
			echo '<td width=100 "displaydata">' .$row['LastName']. '</td>';
			echo '<td width=200 "displaydata">' .$row['CourseName']. '</td>';
			echo '<td width=100 "displaydata">'.$row['TermMon'].'</td>';
			echo '<td width=100 "displaydata">'.$row['TermYr'].'</td>';
			echo '<td width=500 "displaydata">'.$row['Units'].'</td>';

			echo '</tr>';
		}
	echo '</table>'	;
	?>
</body>

</html>
