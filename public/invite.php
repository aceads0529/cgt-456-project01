<?php
include_once 'includes.php';

if (InviteService::is_invited())
    header('Location: ' . InviteService::get_invitation_link());

if (!isset($_GET['id'])) {
    header('Location: /public/examples/login.php');
    exit;
}

$email_failed = false;

if (isset($_GET['h'])) {
    $id = $_GET['id'];
    $hash = $_GET['h'];

    try {
        if (InviteService::register_invite($id, $hash)) {
            header('Location: ' . InviteService::get_invitation_link());
            exit;
        } else {
            $email_failed = true;
        }
    } catch (Exception $e) {
        $email_failed = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register email</title>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
</head>

<body>

<h1>Verify email address</h1>

<?php if ($email_failed): ?>
    <p style="color: red;">Email is incorrect</p>
<?php endif; ?>

<input id="email" type="email" placeholder="Email"/>
<input id="submit" type="submit" value="Submit"/>

<script src="scripts/api.js"></script>
<script src="scripts/md5.min.js"></script>
<script>
    api.ready(function () {
        $("#submit").click(function (event) {
            const email = md5($("#email").val());

            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get("id");

            window.location.search = "?id=" + id + "&h=" + email;
        });
    });
</script>


</body>
</html>
