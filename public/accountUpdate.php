<?php
//Connects to session
session_start();

//Sets errorMessage to blank
if(empty($_SESSION["errorMessage"]))
{
	$_SESSION["errorMessage"]="";
}
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");

//Blocks users trying to enter url without logging in
if(empty($_SESSION["user_name"]))
{
	$_SESSION["errorMessage"]="You must log in!";
	header("Location:index.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1-strickt.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <title>Update Account Info</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles_2.css">
</head>

<body>
	<button style="	position:absolute; top: 10px; right: 10px; padding: 10px; font-size: 15px; font-family: 'Noto Serif KR', sans-serif; color: white; background: #5F9EA0; border-radius: 6px; border: none;"><a href = "logout.php" style=" text-decoration: none; color: white;">Logout</a></button>
	<h1 style="text-align: center;">Update Account</h1>
	<?php include("include/menu.php"); ?>

	<form id="form0" name="form0" method="post" action="accountUpdateDo.php">
    	<fieldset id="billing">
        	<legend>Update</legend>
        	<ul>
            	<li> <label title="Username" for="login">Username<span>*</span></label> <input type="text" name="login" id="login" size="30" maxlength="30" /></li>
				<li> <label title="Password" for="password">Password<span>*</span></label> <input type="password" name="password" id="password" size="30" maxlength="30" /></li>
				<li> <label title="FirstName" for="firstName">First Name<span>*</span></label> <input type="text" name="FirstName" id="firstName" size="30" maxlength="30" /></li>
				<li> <label title="LastName" for="lastName">Last Name<span>*</span></label> <input type="text" name="LastName" id="lastName" size="30" maxlength="30" /></li>
				<li><label title="AcctType" for="acctType">Account Type<span>*</span></label>
					<select name="acctType" id="acctType">
						<option value="0">Student</option>
						<option value="1">Admin</option>
						<option value="2">Advisor</option>
						<option value="3">Supervisor</option>				
					</select>
				</li>
				<li> <label title="Email" for="email">Email<span>*</span></label> <input type="text" name="email" id="email" size="30" maxlength="30" /></li>
				<li> <label title="PhoneNum" for="phone">Phone Number<span>*</span></label> <input type="text" name="phone" id="phone" size="30" maxlength="30" /></li>
				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
            	<li><button  id="submit" name="submit" type="submit">Update</button></li>
       		</ul>
    	</fieldset>

		<?php
			$_SESSION["errorMessage"]="";
		?>

    	<script type="text/javascript">
        	document.getElementByID("uniqueid").focus();
    	</script>

	</form>

</body>

</html>

