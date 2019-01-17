<?php
	session_start();

$username=addslashes($_POST["login"]);
$firstname=addslashes($_POST["firstName"]);
$lastname=addslashes($_POST["lastName"]);
$account=addslashes($_POST["acctType"]);
$email=addslashes($_POST["email"]);
$phone=addslashes($_POST["phone"]);
$jobtitle=addslashes($_POST["jobTitle"]);
$addressdiff=addslashes($_POST["addressIfDifferent"]);
$startdate=addslashes($_POST["startDate"]);
$enddate=addslashes($_POST["endDate"]);
$offsite=addslashes($_POST["offsite"]);
$totalhours=addslashes($_POST["totalHours"]);
$totalpay=addslashes($_POST["totalPay"]);
$assistance=addslashes($_POST["assistance"]);
$activities=addslashes($_POST["activities"]);
$rating=addslashes($_POST["rating"]);
$relevantwork=addslashes($_POST["relevantWork"]);
$difficulties=addslashes($_POST["difficulties"]);
$relatedtomajor=addslashes($_POST["relatedToMajor"]);
$wantedtolearn=addslashes($_POST["wantedToLearn"]);
$cgtchangedmind=addslashes($_POST["cgtChangedMind"]);
$providedcontacts=addslashes($_POST["providedContacts"]);
$advisorid=addslashes($_POST["advisorId"]);
$name=addslashes($_POST["name"]);
$address=addslashes($_POST["address"]);
$cgtfields=addslashes($_POST["cgt_fields"]);
$supervisorid=addslashes($_POST["supervisorId"]);
$supervisorphone=addslashes($_POST["supervisorPhone"]);
$supervisoremail=addslashes($_POST["supervisorEmail"]);
$dependable=addslashes($_POST["dependable"]);
$cooperative=addslashes($_POST["cooperative"]);
$interested=addslashes($_POST["interested"]);
$fastlearner=addslashes($_POST["fastLearner"]);
$initiative=addslashes($_POST["initiative"]);
$workquality=addslashes($_POST["workQuality"]);
$responsibility=addslashes($_POST["responsibility"]);
$acceptcriticism=addslashes($_POST["acceptCriticism"]);
$organization=addslashes($_POST["organization"]);
$techknowledge=addslashes($_POST["techKnowledge"]);
$judgement=addslashes($_POST["judgement"]);
$creativity=addslashes($_POST["creativity"]);
$problemanalysis=addslashes($_POST["problemAnalysis"]);
$selfreliance=addslashes($_POST["selfReliance"]);
$communication=addslashes($_POST["communication"]);
$writing=addslashes($_POST["writing"]);
$profattitude=addslashes($_POST["profAttitude"]);
$profappearance=addslashes($_POST["profAppearance"]);
$punctuality=addslashes($_POST["punctuality"]);
$timeeffective=addslashes($_POST["timeEffective"]);
$paid=addslashes($_POST["paid"]);
$amountpaid=addslashes($_POST["amountPaid"]);
$housingstipend=addslashes($_POST["housingStipend"]);
$otherassistance=addslashes($_POST["otherAssistance"]);

$uniqueid=addslashes($_SESSION['user_id']); 

if(($username == "") || ($firstname == "") || ($lastname == "") || ($account == "") || ($email == "") || ($phone == "") || ($jobtitle == "") || ($addressdiff == "") || ($startdate == "") || ($enddate == "") || ($offsite == "") || ($totalhours == "") || ($totalpay == "") || ($assistance == "") || ($activities == "") || ($rating == "") || ($relevantwork == "") || ($difficulties == "") || ($relatedtomajor == "") || ($wantedtolearn == "") || ($cgtchangedmind == "") || ($providedcontacts == "") || ($advisorid == "") || ($name == "") || ($address == "") || ($cgtfields == "") || ($supervisorid == "") || ($supervisorphone == "") || ($supervisoremail == "") || ($dependable == "") || ($cooperative == "") || ($interested == "") || ($fastlearner == "") || ($initiative == "") || ($workquality == "") || ($responsibility == "") || ($acceptcriticism == "") || ($organization == "") || ($techknowledge == "") || ($judgement == "") || ($creativity == "") || ($problemanalysis == "") || ($selfreliance == "") || ($communication == "") || ($writing == "") || ($profattitude == "") || ($profappearance == "") || ($punctuality == "") || ($timeeffective == "") || ($paid == "") || ($amountpaid == "") || ($housingstipend == "") || ($otherassistance == ""))
	{
		$_SESSION["errorMessage"]="You must enter a value for all boxes!";
		header("Location:formUpdate.php");
		exit;
	}
	//Making sure Phone Number is only numbers
	else if (!is_numeric($phone) || ($totalhours) || ($totalpay) || ($supervisorphone) || ($amountpaid))
	{
	$_SESSION["errorMessage"]="Make sure Field Entry is a number!";
	header("Location:accountUpdate.php");
	exit;
	}
	else
	{
		$_SESSION["errorMessage"]="";
	}

	include("includes/openDBConn.php");

	$sql="SELECT FROM  WHERE UniqueID=".$uniqueid;

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

	$sql="UPDATE  SET login = '".$username."', firstname = '".$firstname."', lastname = '".$lastname."', acctType = '".$account."', email = '".$email."', phone = '".$phone."' WHERE .UniqueID = " . $uniqueid; 
	//echo($sql);

	$result = $conn->query($sql);

	include("includes/closeDBconn.php");

	header("Location:form.php");

?>