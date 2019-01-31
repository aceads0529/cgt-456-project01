<?php
session_start();

include("includes/openDBConn.php");

$username=addslashes($_POST["username"]);
$password=addslashes($_POST["password"]);
$admin=addslashes($_POST["admin"]);
$uniqueid=addslashes("NULL"); 

if(($username == "") || ($password == "") || ($admin == ""))
{
	$_SESSION["errorMessage"]="You must enter a value for all boxes!";
	header("Location:newAccount.php");
	exit;
}
else
{
	$_SESSION["errorMessage"]="";
}

//Checks if the username is in the db
$sql="SELECT Username FROM Accounts WHERE Username='".$username."'";

$result = $conn->query($sql);

//If username already exist, send them back
if($result->num_rows>0)
{
	$_SESSION["errorMessage"]="The username already exist!";
	header("location:newAccount.php");
	exit;
}
else
{
	$_SESSION["errorMessage"]="";
}

//Insert New User
$sql="INSERT INTO Accounts (UniqueID, Username, Passwrd, CatID) VALUES (".$uniqueid.", '".$username."', '".$password."', '".$admin."' )";

$result = $conn->query($sql);

include("includes/closeDBConn.php");

$_SESSION["errorMessage"]="Account has been created!";
header("Location:login.php");

?>