<?php
require_once 'includes.php';
safe_session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
</head>
<body>
<h1 id="greeting"></h1>
<button id="button">Create new user</button>

<script src="scripts/md5.min.js"></script>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="scripts/api.js"></script>
<script>
    function hash(username, password) {
        return md5(username + password);
    }

    $(function () {
        api_user('get', {},
            function (response) {
                $('body').append(response);
                console.log(response);

                if (response.error !== 0) {
                    $('#greeting').html(response.message);
                } else {
                    let names = [];
                    for (let i = 0; i < response.data.users.length; i++) {
                        names.push($('<p>' + response.data.users[i].firstName + '</p>'));
                    }

                    $('#greeting').append(names);
                }
            });

        api_user('login', {login: 'admin', passwordHash: hash('admin', 'admin')});

        $('#button').click(function (e) {
            api_user('create',
                {
                    login: 'aceads',
                    passwordHash: hash('aceads', '1234'),
                    acctType: 'student',
                    firstName: 'Aaron',
                    lastName: 'Eads',
                    email: 'eads7@purdue.edu',
                    phone: '3173728562'
                });
        });
    });
</script>
</body>
</html>