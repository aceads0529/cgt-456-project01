<?php
require_once '../includes.php';
safe_session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
</head>
<body>

<h1>Employers</h1>

<script src="../scripts/api.js"></script>
<script>
    api.ready(function () {
        api.call('employer/select', 'all', (response) => {
            console.log(response);
        });
    });
</script>

</body>
</html>
