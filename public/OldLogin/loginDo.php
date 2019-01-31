<?php
session_start();

include("includes/openDBConn.php");

$username=addslashes($_POST["username"]);
$password=addslashes($_POST["password"]);

//Checking if username and password are in the db
$sql="SELECT * FROM Accounts WHERE Username='".$username."' AND Passwrd='".$password."'";

$result = $conn->query($sql);

if($result->num_rows==1)
{
	//Success
	$_SESSION["errorMessage"]="";

	//Grabs the uniqueID and Name from db and save them as session varibles
	while ($row = $result->fetch_assoc()){
		$_SESSION['firstname'] = $row["Firstname"];
		$_SESSION['userID'] = $row["UserID"];
		$_SESSION['acctType'] = $row["AcctType"];
	}
	
	header("location:index.php");
}
else
{
	//Failed
	$_SESSION["errorMessage"]="Username or Password is incorrect!";
	header("location:login.php");
	exit;
}

include("includes/closeDBConn.php");
?>