<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Users Setup</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body class="pgbkcolor">
<?php
error_reporting(E_ALL ^ E_NOTICE);
$self=$_SERVER['PHP_SELF'];
$errormsg="";
$form = $_POST['submit'];
$login=$_POST['txtlogin'];
$password=md5($_POST['txtpassword']);
$usertype=$_POST['UserTypeID'];
$status=$_POST['active'];


$conn=@mysql_connect("localhost", "root", "")or die("Err:Conn");
#include "db_connect.php";
$rs=@mysql_select_db("test", $conn) or die("Err:Db");
?>
<form id="login" name="login" method="post" action="<?php echo($self);?>">
  <table class="tabledata">
    <tr>
      <td colspan="3" class="heading">Users</td>
    </tr>
    
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
       <tr>
      <td class="fieldheading">User Type</td>
      <td>&nbsp;</td>
      <td><select name="UserTypeID" id="drpRole" class="listdata">
     
      <?php  
	$sql="SELECT * from usertype where active='Y'";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['UserTypeID'].">" .$row['UserType']."</option>";
	}
?>
      </select>
          <label class="required">*</label></td>
    </tr> <tr>
      <td height="35" class="fieldheading">Login</td>
      <td>&nbsp;</td>
        <td><input type="text" name="txtlogin" id="txtlogin" class="inputfield"/>
          <label class="required">*</label></td>
    </tr>
  
    <tr>
      <td class="fieldheading">Password</td>
      <td>&nbsp;</td>
      <td><input name="txtpassword" type="password" id="txtpassword" class="inputfield"/>
          <label class="required">*</label></td>
    </tr>
    
    <tr>
      <td class="fieldheading">Status</td>
      <td>&nbsp;</td>
      <td class="fieldheading"><input name="active" type="radio" id="active" value="Y" />
      Yes
        <input name="active" type="radio" id="active" value="N" />
        No
                  <label class="required">*</label></td>

    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" id="btnSave" value="Save" class="buttonstyle"/>
      <input name="cancel" type="button" id="btncancel" value="Cancel" class="buttonstyle" onclick="window.location = 'UsersSetup.php'"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td class="required">* All fields Required</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <?php
if( isset($form) ) 
{
		mysql_select_db("test", $conn);

	if( isset($password) && isset($usertype) && isset($login) && isset($status) && $status !== '' && $login !== '' && $usertype !== '' && $password !== '' ) 
	{
		$sql="INSERT INTO users (Password,UserTypeID,Login,InvalidAttempts,UserActive,UserCreationDate,LastLogin)
		VALUES(\"$password\",\"$usertype\",\"$login\",0,\"$status\",now(),'NULL' )";
	
		if (!mysql_query($sql,$conn))
  		{
  			die('Error: ' . mysql_error());
  		}
		$errormsg="User has been created successfully";

	}
	else
	{
		$errormsg="Please provide the required details";
	}	
}
mysql_close($conn);

?>
  <td colspan="3" class="error"><?php echo $errormsg;?></td>
    </tr>
  </table>
</form>
</body>
</html>