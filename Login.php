     <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Login</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body class="pgbkcolor">
<form action="passwordauthenticate.php" method="post" >
  <br />
    <br />

  <table width="1200" border="0" class="tableheading" align="center">
      <tr>
        <td width="1158" class="heading">USER LOGIN</td>
      </tr>
  </table>
  <br />
  <br />
  <br />
  <br />

  <table align="center" class="singletable">
    <tr>
      <td width="93" height="37"><label for="userid" class="fieldheading">User ID</label>
      </td>
      <td width="247"><input name="txtuserid" type="text"  maxlength="7" class="inputfield"/></td>
    </tr>
    
    <tr>
      <td height="35" ><label for="password" class="fieldheading">Password</label></td>
      <td ><input name="txtpassword" type="password"maxlength="7" class="inputfield" /></td>
    </tr>
    <tr>
      <td height="32">&nbsp;</td>
      <td><input name="submit" type="submit" value="Log In" class="buttonstyle" /></td>
    </tr>


  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

</form>
</body>
</html>