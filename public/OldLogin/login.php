<?php
//Connects to session
session_start();

//Sets errorMessage to blank
if(empty($_SESSION["errorMessage"]))
{
	$_SESSION["errorMessage"]="";
}
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1-strickt.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <title>Login</title>
	<!-- Specific CSS -->
    <style type="text/css">
		form{width: 400px; margin: 0px auto;}
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px;}
		ul li input{ float:right; margin-right:10px; border:1px solid #000; padding:3px; font-family: Georgia, Times New Roman, Times, serif; width:240px;}
		li input:focus{ border:1px solid #999;}
		fieldset{ padding:10px; background-color: rgba(255,255,255,0.5); border:1px solid #000; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000; margin:0 10px 0 0; padding: 0 5px; font-size:15pt; font-weight:bold; }
		label span{color:#ff0000; }
		ul li span{color: #0000ff; font-weight: bold;}
		button{background-color: #e7e7e7; color: #000; border: 2px solid #434343; text-align: center; font-size: 16px; cursor: pointer;}
		button#login{width: 43.5%; height: 30px; position: relative;  left: 0px;}
		button#create{width: 43.5%; height: 30px; position: relative;}
    </style>
	<!-- My CSS -->
	<link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
	<!-- Title -->
	<div class="bgWhite">
		<h1 style="text-align: center;">Login</h1>
	</div>>
	
	<!-- Login Form -->
	<form id="form0" name="form0" method="post">
    	<fieldset id="billing">
        	<legend>Login</legend>
        	<ul>
            	<li> <label title="Username" for="username">Username<span>*</span></label> <input type="text" name="username" id="username" size="30" maxlength="30" /></li>
            	<li> <label title="Password" for="password">Password<span>*</span></label> <input type="password" name="password" id="password" size="30" maxlength="30" /></li>
				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
            	<li>
					<button  id="login" name="submit" type="submit" formaction="loginDo.php">Login</button>
					<button id="create" formaction="newAccount.php">Create Account</button>
				</li>
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