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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
<!-- Student section of the form -->
		<title>Supervisor Form</title> 
	</head>

	<body>
		<div class="banner-holder">
			<img src="form/images/ribbon-02.png" alt="ribbon2">
		</div>
		<form action="supervisorFormDo.php" method="post">
		<fieldset>
			<h2>Supervisor Information</h2>
			<label class="control-label col-md-4">Name</label>
				<div class="row">
					<div class="col-md-2">	
						<input id="" type="text" name="firstName" class="form-control" placeholder="First Name">
					</div>
					<div class="col-md-2">
						<input id="" type="text" name="lastName" class="form-control" placeholder="Last Name">
					</div>
				</div>			
			<label class="control-label col-md-4">Name of Intern: </label>
				<div class="row">
					<div class="col-md-4">
						<input type="text" name="internName" class="form-control" placeholder="FirstName LastName">
					</div>
				</div>	
			</fieldset>	
			<fieldset>
<!-- Supervisor review table -->
			<h2>Supervisor's Review of Intern</h2>
			<div class="col-md-4">
				<p>2=Exceptional </p>
			</div>
			<div class="col-md-4">
				<p>1=Average </p>
			</div>
			<div class="col-md-4">
				<p>0=Unacceptable </p>
			</div>
			<table id="table" class="table table-bordered">
    			<thead>
    			<tr>
        			<th data-field="behavior">Behaviors</th>
        			<th data-field="N/A">N/A</th>
        			<th data-field="0">0</th>
        			<th data-field="1">1</th>
        			<th data-field="2">2</th>
    			</tr>
    			</thead>
    			<tbody>
    			<tr>
        			<td>Performs in a dependable manner</td>
        			<td><input id="dependable" type="radio" name="dependable" value="na"></td>
        			<td><input id="dependable" type="radio" name="dependable" value="0"></td>
        			<td><input id="dependable" type="radio" name="dependable" value="1"></td>
        			<td><input id="dependable" type="radio" name="dependable" value="2"></td>
    			</tr>
    			<tr>
					<td>Cooperates with co-workers and supervisors</td>
					<td><input id="cooperative" type="radio" name="cooperative" value="na"></td>
					<td><input id="cooperative" type="radio" name="cooperative" value="0"></td>
					<td><input id="cooperative" type="radio" name="cooperative" value="1"></td>
					<td><input id="cooperative" type="radio" name="cooperative" value="2"></td>
				</tr>
				<tr>
					<td>Shows interest in work</td>
					<td><input id="interested" type="radio" name="interested" value="na"></td>
					<td><input id="interested" type="radio" name="interested" value="0"></td>
					<td><input id="interested" type="radio" name="interested" value="1"></td>
					<td><input id="interested" type="radio" name="interested" value="2"></td>
				</tr>
				<tr>
					<td>Learns quickly</td>
					<td><input id="fastLearner" type="radio" name="fastLearner" value="na"></td>
					<td><input id="fastLearner" type="radio" name="fastLearner" value="0"></td>
					<td><input id="fastLearner" type="radio" name="fastLearner" value="1"></td>
					<td><input id="fastLearner" type="radio" name="fastLearner" value="2"></td>
				</tr>
				<tr>
					<td>Shows initiative</td>
					<td><input id="initiative" type="radio" name="initiative" value="na"></td>
					<td><input id="initiative" type="radio" name="initiative" value="0"></td>
					<td><input id="initiative" type="radio" name="initiative" value="1"></td>
					<td><input id="initiative" type="radio" name="initiative" value="2"></td>
				</tr>
				<tr>
					<td>Produces high quality work</td>
					<td><input id="workQuality" type="radio" name="workQuality" value="na"></td>
					<td><input id="workQuality" type="radio" name="workQuality" value="0"></td>
					<td><input id="workQuality" type="radio" name="workQuality" value="1"></td>
					<td><input id="workQuality" type="radio" name="workQuality" value="2"></td>
				</tr>
				<tr>
					<td>Accepts responsibility</td>
					<td><input id="responsibility" type="radio" name="responsibility" value="na"></td>
					<td><input id="responsibility" type="radio" name="responsibility" value="0"></td>
					<td><input id="responsibility" type="radio" name="responsibility" value="1"></td>
					<td><input id="responsibility" type="radio" name="responsibility" value="2"></td>
				</tr>
				<tr>
					<td>Accepts criticism</td>
					<td><input id="acceptCriticism" type="radio" name="acceptCriticism" value="na"></td>
					<td><input id="acceptCriticism" type="radio" name="acceptCriticism" value="0"></td>
					<td><input id="acceptCriticism" type="radio" name="acceptCriticism" value="1"></td>
					<td><input id="acceptCriticism" type="radio" name="acceptCriticism" value="2"></td>
				</tr>
				<tr>
					<td>Demonstrates organizational skills</td>
					<td><input id="organization" type="radio" name="organization" value="na"></td>
					<td><input id="organization" type="radio" name="organization" value="0"></td>
					<td><input id="organization" type="radio" name="organization" value="1"></td>
					<td><input id="organization" type="radio" name="organization" value="2"></td>
				</tr>
				<tr>
					<td>Demonstrates technical knowledge and expertise</td>
					<td><input id="techKnowledge" type="radio" name="techKnowledge" value="na"></td>
					<td><input id="techKnowledge" type="radio" name="techKnowledge" value="0"></td>
					<td><input id="techKnowledge" type="radio" name="techKnowledge" value="1"></td>
					<td><input id="techKnowledge" type="radio" name="techKnowledge" value="2"></td>
				</tr>
				<tr>
					<td>Shows good judgment</td>
					<td><input id="judgment" type="radio" name="judgment" value="na"></td>
					<td><input id="judgment" type="radio" name="judgment" value="0"></td>
					<td><input id="judgment" type="radio" name="judgment" value="1"></td>
					<td><input id="judgment" type="radio" name="judgment" value="2"></td>
				</tr>
				<tr>
					<td>Demonstrates creativity/originality</td>
					<td><input id="creativity" type="radio" name="creativity" value="na"></td>
					<td><input id="creativity" type="radio" name="creativity" value="0"></td>
					<td><input id="creativity" type="radio" name="creativity" value="1"></td>
					<td><input id="creativity" type="radio" name="creativity" value="2"></td>
				</tr>
				<tr>
					<td>Analyzes problems effectively</td>
					<td><input id="problemAnalysis" type="radio" name="problemAnalysis" value="na"></td>
					<td><input id="problemAnalysis" type="radio" name="problemAnalysis" value="0"></td>
					<td><input id="problemAnalysis" type="radio" name="problemAnalysis" value="1"></td>
					<td><input id="problemAnalysis" type="radio" name="problemAnalysis" value="2"></td>
				</tr>
				<tr>
					<td>Is self-reliant</td>
					<td><input id="selfReliance" type="radio" name="selfReliance" value="na"></td>
					<td><input id="selfReliance" type="radio" name="selfReliance" value="0"></td>
					<td><input id="selfReliance" type="radio" name="selfReliance" value="1"></td>
					<td><input id="selfReliance" type="radio" name="selfReliance" value="2"></td>
				</tr>
				<tr>
					<td>Communicates well</td>
					<td><input id="communication" type="radio" name="communication" value="na"></td>
					<td><input id="communication" type="radio" name="communication" value="0"></td>
					<td><input id="communication" type="radio" name="communication" value="1"></td>
					<td><input id="communication" type="radio" name="communication" value="2"></td>
				</tr>
				<tr>
					<td>Writes effectively</td>
					<td><input id="writing" type="radio" name="writing" value="na"></td>
					<td><input id="writing" type="radio" name="writing" value="0"></td>
					<td><input id="writing" type="radio" name="writing" value="1"></td>
					<td><input id="writing" type="radio" name="writing" value="2"></td>
				</tr>
				<tr>
					<td>Has a professional attitude</td>
					<td><input id="profAttitude" type="radio" name="profAttitude" value="na"></td>
					<td><input id="profAttitude" type="radio" name="profAttitude" value="0"></td>
					<td><input id="profAttitude" type="radio" name="profAttitude" value="1"></td>
					<td><input id="profAttitude" type="radio" name="profAttitude" value="2"></td>
				</tr>
				<tr>
					<td>Gives a professional appearance</td>
					<td><input id="profAppearance" type="radio" name="profAppearance" value="na"></td>
					<td><input id="profAppearance" type="radio" name="profAppearance" value="0"></td>
					<td><input id="profAppearance" type="radio" name="profAppearance" value="1"></td>
					<td><input id="profAppearance" type="radio" name="profAppearance" value="2"></td>
				</tr>
				<tr>
					<td>Is punctual</td>
					<td><input id="punctuality" type="radio" name="punctuality" value="na"></td>
					<td><input id="punctuality" type="radio" name="punctuality" value="0"></td>
					<td><input id="punctuality" type="radio" name="punctuality" value="1"></td>
					<td><input id="punctuality" type="radio" name="punctuality" value="2"></td>
				</tr>
				<tr>
					<td>Uses time effectively</td>
					<td><input id="timeEffective" type="radio" name="timeEffective" value="na"></td>
					<td><input id="timeEffective" type="radio" name="timeEffective" value="0"></td>
					<td><input id="timeEffective" type="radio" name="timeEffective" value="1"></td>
					<td><input id="timeEffective" type="radio" name="timeEffective" value="2"></td>
				</tr>
				</tbody>
			</table>
			<input type="submit" name="submit" class="submit" value="Submit"/>
			</fieldset>
		</form>
		<script src="../scripts/api.js"></script>
<script>
    api.ready(function () {
        $('#student-form').submit(function (e) {
            // Prevent page from reloading
            e.preventDefault();
            e.stopPropagation();

            // Get HTML form varibles
			const dependable = $('#dependable').val();
			const cooperative = $('#cooperative').val();
			const interested = $('#interested').val();
			const fastLearner = $('#fastLearner').val();
			const initiative = $('#initiative').val();
			const workQuality = $('#workQuality').val();
			const responsibility = $('#responsibility').val();
			const acceptCriticism = $('#acceptCriticism').val();
			const organization = $('#organization').val();
			const techKnowledge = $('#techKnowledge').val();
			const judgment = $('#judgment').val();
			const creativity = $('#creativity').val();
			const problemAnalysis = $('#problemAnalysis').val();
			const selfReliance = $('#selfReliance').val();
			const communication = $('#communication').val();
			const writing = $('#writing').val();
			const profAttitude = $('#profAttitude').val();
			const profAppearance = $('#profAppearance').val();
			const punctuality = $('#punctuality').val();
			const timeEffective = $('#timeEffective').val();
			
			const data = {
				dependable: dependable,
				cooperative: cooperative,
				interested: interested,
				fastLearner: fastLearner,
				initiative: initiative,
				workQuality: workQuality,
				responsibility: responsibility,
				acceptCriticism: acceptCriticism,
				organization: organization,
				techKnowledge: techKnowledge,
				judgment: judgment,
				creativity: creativity,
				problemAnalysis: problemAnalysis,
				selfReliance: selfReliance,
				communication: communication,
				writing: writing,
				profAttitude: profAttitude,
				profAppearance: profAppearance,
				punctuality: punctuality,
				timeEffective: timeEffective,
			};

            // Make API call
            api.call('form/student', {data}, function (response) {
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
		<script type="text/javascript">
		$(function() {
			
			//today's date generator
			n =  new Date();
			y = n.getFullYear();
			m = n.getMonth() + 1;
			d = n.getDate();
			document.getElementById("todayDate").innerHTML = m + "/" + d + "/" + y;
		});

	</script>
	</body>
</html>