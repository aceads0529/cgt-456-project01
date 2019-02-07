<?php
//Connects to session
require_once '../includes.php';
safe_session_start();

echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1-strickt.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <title>Login</title>
	<!-- My CSS -->
	<link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
	<!-- Title -->
	<div class="bgWhite">
		<h1 style="text-align: center;">Login</h1>
	</div>>
	
	<!-- Login Form -->
	<form id="login-form" name="login-form" method="post">
    	<fieldset id="billing">
        	<legend>Login</legend>
        	<ul>
            	<li> <label title="Login" for="login">Username<span>*</span></label> <input type="text" name="login" id="login" size="30" maxlength="30" /></li>
            	<li> <label title="Password" for="password">Password<span>*</span></label> <input type="password" name="password" id="password" size="30" maxlength="30" /></li>
				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
            	<li>
					<button  id="login" name="submit" type="submit" formaction="loginDo.php">Login</button>
					<button id="create" formaction="newAccount.php">Create Account</button>
				</li>
       		</ul>
    	</fieldset>
	</form>
<script src="../scripts/api.js"></script>
<script>
    api.ready(function () {
        $('#login-form').submit(function (e) {
            // Prevent page from reloading
            e.preventDefault();
            e.stopPropagation();

            // Get login and password from HTML form
            const login = $('#login').val();
            const password = $('#password').val();

            // Make API call
            api.call('user/login', {login: login, password: password}, function (response) {
                // Determine whether username and password a correct
                if (response.success) {
                    // If there was no error, reload the page
                    location.reload();
                } else {
                    alert(response.message);
                }
            });
        });

        // Logout button
        $('#logout').click(function (e) {
            e.preventDefault();
            e.stopPropagation();

            api.call('user/logout', {}, function (response) {
                if (response.success) {
                    location.reload();
                } else {
                    alert(response.message);
                }
            });
        });
    });
</script>
</body>
</html>