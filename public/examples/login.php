<?php
require_once '../includes.php';
safe_session_start();

?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>Index</title>

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
</head>
<body>

<h1>Login page</h1>

<?php if ($user = AuthService::get_active_user()): ?>

    <h2>Hello, <?php echo $user->get_first_name(); ?>!</h2>
    <h3><?php echo $user->get_user_group()->get_label(); ?></h3>

<?php endif; ?>

<form id="login-form">
    <input id="login" type="text" placeholder="username"/>
    <input id="password" type="password" placeholder="password"/>

    <input type="submit" value="Login"/>
    <button id="logout">Logout</button>

    <p id="nametag"></p>
</form>


<script src="../scripts/api.js"></script>
<script>
    api.ready(function () {
        if (api.user)
            $('#nametag').text(api.user.firstName);

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

        const form = {
            employer: {
                name: "Company ABC",
                address: "105 Churchman Bypass",
                cgt_field_ids: [1],
            },
            session: {
                jobTitle: "Research Assistant",
                startDate: "2018-12-20",
                endDate: "2019-05-29",
                offsite: false,
                totalHours: 340,
                payRate: 17.60
            },
            supervisor: {
                email: "supervisor@email.com"
            },
            prompts: {
                rating: 4,
                relevantWork: "",
                difficulties: "",
                relatedToMajor: "",
                wantedToLearn: "",
                cgtChangedMind: "",
                providedContacts: ""
            }
        };

        api.call('form/student', form, function (response) {
            console.log(response);
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