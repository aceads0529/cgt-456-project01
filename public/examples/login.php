<?php
require_once '../includes.php';
safe_session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
</head>
<body>

<?php if ($user = AuthService::get_active_user()): ?>
    <h1>Hello, <?php echo $user->get_first_name(); ?>!</h1>
<?php endif; ?>

<form id="login-form">
    <input id="login" type="text" placeholder="username"/>
    <input id="password" type="password" placeholder="password"/>

    <input type="submit" value="Login"/>
    <button id="logout">Logout</button>
</form>


<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

<script src="../scripts/api.js"></script>

<script>
    $(function () {
        $('#login-form').submit(function (e) {
            // Prevent page from reloading
            e.preventDefault();
            e.stopPropagation();

            // Get login and password from HTML form
            const login = $('#login').val();
            const password = $('#password').val();

            // Make API call
            api_user('login', {login: login, password: password}, function (response) {
                // Determine whether username and password a correct
                if (response.error !== 0) {
                    alert(response.message);
                } else {
                    alert('Login successful!');
                }

                location.reload();
            });
        });

        // Logout button
        $('#logout').click(function (e) {
            e.preventDefault();
            e.stopPropagation();

            api_user('logout', {}, function (response) {
                if (response.error !== 0) {
                    alert(response.message);
                }

                location.reload();
            });
        });
    });
</script>

</body>
</html>