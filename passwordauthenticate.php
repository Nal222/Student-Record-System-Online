<?php 
$conn=@mysql_connect("localhost", "root", "");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("test", $conn);


session_start();
$error = '';
$form = $_POST['submit'];
$login = $_POST['txtuserid'];
$password = md5($_POST['txtpassword']);
$_SESSION['userid']="";

function Getfield($id)
{
$sql="Select UserType from usertype where Active='Y' and UserTypeID = '$id'";
$result = mysql_query ($sql);
$row = mysql_fetch_array($result);
$type = $row['UserType'];
return $type;
}

if( isset($form) ) 
{

	if( isset($login) && isset($password) && $login !== '' && $password !== '' ) 
	{
	$sql = "SELECT * FROM users WHERE Login= '$login' and Password='$password' and UserActive='Y'";
	
 	$result = mysql_query ($sql);
    $row = mysql_fetch_array($result);
    $usertypeid = $row['UserTypeID'];
	$usertype=Getfield($usertypeid);
	$_SESSION['usertype'] = $usertype;

	
	if( $usertypeid != 0 ) 
		{ //user name and password verified
			$_SESSION['logged-in'] = true;
			$_SESSION['userid'] = $login;
			
			
			#get user type
			if ($usertypeid==10)
			{
			header('Location: Index.html');
			exit;
			}
			else if ($usertypeid==11)
			{
			header('Location: Index_Student.html');
			exit;
			}
			else if ($usertypeid==12)
			{
			header('Location: Index_S.html');
			exit;
			}

		} 
	else 
	{ 
	$error = "Required details are incorrect, please try again"; 
	echo "$error";
	}
} 
else 
	{ 
			$error = 'All information is not filled out correctly';
	
	header('Location: Login.php');
			exit;
	echo "$error";
	
	}
}
?>