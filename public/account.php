<?php
//Connects to session
session_start();

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
    <title>Account Information</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles_2.css">
</head>

<body>
	<button style="	position:absolute; top: 10px; right: 10px; padding: 10px; font-size: 15px; font-family: 'Noto Serif KR', sans-serif; color: white; background: #5F9EA0; border-radius: 6px; border: none;"><a href = "logout.php" style=" text-decoration: none; color: white;">Logout</a></button>
	<h1>Account Information</h1>
	<?php 
		include("include/menu.php"); 
		
		//Variables
		$servername="104.248.58.191";
		$username="turne248";
		$password="Slayer593";
		$dbname="Project 1";	
	
		include("include/openDBConn.php");
		
//Selects user info
		$sql= "SELECT * FROM projectlogin WHERE UniqueID=".$_SESSION["user_id"];
		
		$result=$conn->query($sql);
	?>
	
	<form id="form0" name="form0" method="post" action="accountUpdate.php">
    	<fieldset id="billing">
        	<legend>Account Info</legend>
			<!-- Fetches information from the database -->
			<?php while ($row = $result->fetch_assoc())
					{ ?>
        	<ul>
				<!-- Displays information from row -->
            	<li> <label title="Username" for="login">Username<span>*</span></label> <?php echo(trim($row["Username"])); ?> </li>
				<li> <label title="Password" for="password">Password<span>*</span></label> <?php echo(trim($row["Password"])); ?> </li>
            	<li> <label title="FirstName" for="firstName">First Name<span>*</span></label> <?php echo(trim($row["FirstName"])); ?></li>
				<li> <label title="LastName" for="lastName">Last Name<span>*</span></label> <?php echo(trim($row["LastName"])); ?></li>
				<li> <label title="AcctType" for="acctType">Account Type<span>*</span></label> <?php if($row["AcctType"] == 0){echo("Student");} else if($row["AcctType"] == 1){echo("Admin");} else if($row["AcctType"] == 2){echo("Advisor");} else{echo("Supervisor");} ?> </li>
				<li> <label title="Email" for="email">Email<span>*</span></label> <?php echo(trim($row["Email"])); ?> </li>
				<li> <label title="PhoneNum" for="phone">Phone Number<span>*</span></label> <?php echo(trim($row["PhoneNum"])); ?> </li>
					<?php 
					 $last_four = substr(trim($row["IDNum"]),6,4);
					 echo ("XXXXXX-$last_four");
					?>
				</li>
				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
				<li><button  id="submit" name="submit" type="submit">Update</button></li>
       		</ul>
			<?php } ?>
    	</fieldset>

		<?php
			$_SESSION["errorMessage"]="";
		?>

    	<script type="text/javascript">
        	document.getElementByID("uniqueid").focus();
    	</script>

	</form>
	
	<?php
		mysql_free_result($result);
		include("include/closeDBConn.php");
	?>	
</body>