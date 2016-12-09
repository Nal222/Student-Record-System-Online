<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserType Access</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body class="pgbkcolor">

<?php
error_reporting(E_ALL ^ E_NOTICE);
$self=$_SERVER['PHP_SELF'];
$errormsg="";
$form = $_POST['submit'];
$usertype=$_POST['UserTypeID'];
$pages=$_POST['PgID'];
$rights=$_POST['UserPrID'];



 $conn=@mysql_connect("localhost", "root", "")or die("Err:Conn");
#include "db_connect.php";
$rs=@mysql_select_db("test", $conn) or die("Err:Db");
?>

<form id="login" name="login" method="post" action="<?php echo($self);?>">
  <table class="tabledata">
    <tr>
      <td colspan="3" class="heading">UserType Rights Setup</td>
    </tr>
    <tr>
      <td class="fieldheading">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="194" class="fieldheading">
        <label>UserType</label></td>
      <td width="13">&nbsp;</td>
      <td width="337"><select name="UserTypeID" class="listdata"> <option value="">Please Select</option>
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
    </tr>
    
    <tr>
      <td class="fieldheading">Pages</td>
      <td>&nbsp;</td>
      <td><select name="PgID" id="drpusertype2" class="listdata">
  <option value="">Please Select</option>
      <?php  
	$sql="SELECT * from pagessetup where active='Y'";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['PgID'].">" .$row['PgDesc']."</option>";
	}
?>
      </select>
        <label class="required">*</label></td>
    </tr>
  <tr>
    <td class="fieldheading">Rights</td>
    <td>&nbsp;</td>
     <td>
	 
	 	   
     <select name="UserPrID" id="PgID" class="listdata">
       <option value="">Please Select</option>
       <?php  
	$sql="SELECT * from userpriviliges";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_array($res))
	{
	echo "<option value=".$row['UserPrID'].">" .$row['Priviliges']."</option>";
	}
?>
     </select>
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
      <td><input name="submit" type="submit" id="submit" value="Save" class="buttonstyle" />
      <input name="cancel" type="button" id="cancel" value="Cancel" class="buttonstyle" onclick="window.location = 'UserTypeSetupAccess.php'"/></td>
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
    <?php
if( isset($form) ) 
{
		mysql_select_db("test", $conn);

	if( isset($usertype) && isset($pages) && isset($rights) && $usertype !== '' && $pages !== '' && $rights !== '' ) 
	{
		$sql="INSERT INTO userroles_privil (UserTypeID,UserPrID,PgID)VALUES(\"$usertype\",\"$rights\",\"$pages\" )";
	
		if (!mysql_query($sql,$conn))
  		{
  			die('Error: ' . mysql_error());
  		}
		$errormsg="User Privileges has been added successfully";

	}
	else
	{
		$errormsg="Please provide the required details";
	}	
}
mysql_close($conn);

?>

    <tr>
      <td colspan="3" class="error"><?php echo $errormsg;?></td>
    </tr>
  </table>
</form>
</body>
</html>