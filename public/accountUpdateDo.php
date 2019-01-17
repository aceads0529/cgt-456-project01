<?php
session_start();

//Blocks users trying to enter url without logging in
if(empty($_SESSION["user_name"]))
{
	$_SESSION["errorMessage"]="You must log in!";
	header("Location:index.php");
	exit;
}

include("include/openDBConn.php");

$username=addslashes($_POST["login"]);
$password=addslashes($_POST["password"]);
$firstname=addslashes($_POST["firstName"]);
$lastname=addslashes($_POST["lastName"]);
$account=addslashes($_POST["acctType"]);
$email=addslashes($_POST["email"]);
$phone=addslashes($_POST["phone"]);
$uniqueid=addslashes($_SESSION['user_id']); 

if(($username == "") || ($password == "") || ($firstname == "") || ($lastname == "") || ($account == "") || ($email == "") || ($phone == ""))
{
	$_SESSION["errorMessage"]="All boxes must be filled in";
	header("Location:accountUpdate.php");
	exit;
}
//Making sure Phone Number is only numbers
else if (!is_numeric($phone))
{
	$_SESSION["errorMessage"]="Make sure Phone Number is a number!";
	header("Location:accountUpdate.php");
	exit;
}
else
{
	$_SESSION["errorMessage"]="";
}


$sql="SELECT UniqueID FROM projectlogin WHERE UniqueID=".$uniqueid;


$result = $conn->query($sql);
//if row doesnt exist, something is wrong 
if($result->num_rows == 0)
{
	$_SESSION["errorMessage"]="Critical error. Logout needed.";
	header("location:index.php");
	exit;
}
else
{
	$_SESSION["errorMessage"]="";
}
//update db based on the user's assigned id #
$sql="UPDATE projectlogin SET Username = '".$username."', Password = '".$password."', FirstName = '".$firstname."', LastName = '".$lastname."', AcctType = '".$account."', Email = '".$email."', PhoneNum = '".$phone."' WHERE UniqueID =".$uniqueid;

$result = $conn->query($sql);

include("include/closeDBConn.php");

$_SESSION["errorMessage"]="Account updated.";
header("Location:account.php");

?>