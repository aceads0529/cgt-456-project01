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
						<input type="text" name="firstName" class="form-control" placeholder="First Name">
					</div>
					<div class="col-md-2">
						<input type="text" name="lastName" class="form-control" placeholder="Last Name">
					</div>
				</div>
			<label class="control-label col-md-4">Today's Date:</label> 
				<div class="row">
					<div class="col-md-4">
						<p id="todayDate"></p>
					</div>
				</div>
			<label class="control-label col-md-4">Company Name</label>
				<div class="row">
					<div class="col-md-4">
						<input type="text" name="company" class="form-control">
					</div>
				</div>
			<label class="control-label col-md-4">Email: </label>
				<div class="row">
					<div class="col-md-4">
						<input type="email" name="email" class="form-control" placeholder="example@gmail.com">
					</div>
				</div>
			<label class="control-label col-md-4">Phone: </label>
				<div class="row">
					<div class="col-md-4">
						<input type="tel" name="phone" class="form-control" placeholder="(XXX-XXX-XXXX)">
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
        			<td><input type="radio" name="dependable"></td>
        			<td><input type="radio" name="dependable"></td>
        			<td><input type="radio" name="dependable"></td>
        			<td><input type="radio" name="dependable"></td>
    			</tr>
    			<tr>
					<td>Cooperates with co-workers and supervisors</td>
					<td><input type="radio" name="cooperative"></td>
					<td><input type="radio" name="cooperative"></td>
					<td><input type="radio" name="cooperative"></td>
					<td><input type="radio" name="cooperative"></td>
				</tr>
				<tr>
					<td>Shows interest in work</td>
					<td><input type="radio" name="interested"></td>
					<td><input type="radio" name="interested"></td>
					<td><input type="radio" name="interested"></td>
					<td><input type="radio" name="interested"></td>
				</tr>
				<tr>
					<td>Cooperates with co-workers and supervisors</td>
					<td><input type="radio" name="cooperative"></td>
					<td><input type="radio" name="cooperative"></td>
					<td><input type="radio" name="cooperative"></td>
					<td><input type="radio" name="cooperative"></td>
				</tr>
				<tr>
					<td>Shows interest in work</td>
					<td><input type="radio" name="interested"></td>
					<td><input type="radio" name="interested"></td>
					<td><input type="radio" name="interested"></td>
					<td><input type="radio" name="interested"></td>
				</tr>
				<tr>
					<td>Learns quickly</td>
					<td><input type="radio" name="fastLearner"></td>
					<td><input type="radio" name="fastLearner"></td>
					<td><input type="radio" name="fastLearner"></td>
					<td><input type="radio" name="fastLearner"></td>
				</tr>
				<tr>
					<td>Shows initiative</td>
					<td><input type="radio" name="initiative"></td>
					<td><input type="radio" name="initiative"></td>
					<td><input type="radio" name="initiative"></td>
					<td><input type="radio" name="initiative"></td>
				</tr>
				<tr>
					<td>Produces high quality work</td>
					<td><input type="radio" name="workQuality"></td>
					<td><input type="radio" name="workQuality"></td>
					<td><input type="radio" name="workQuality"></td>
					<td><input type="radio" name="workQuality"></td>
				</tr>
				<tr>
					<td>Accepts responsibility</td>
					<td><input type="radio" name="responsibility"></td>
					<td><input type="radio" name="responsibility"></td>
					<td><input type="radio" name="responsibility"></td>
					<td><input type="radio" name="responsibility"></td>
				</tr>
				<tr>
					<td>Accepts criticism</td>
					<td><input type="radio" name="acceptCriticism"></td>
					<td><input type="radio" name="acceptCriticism"></td>
					<td><input type="radio" name="acceptCriticism"></td>
					<td><input type="radio" name="acceptCriticism"></td>
				</tr>
				<tr>
					<td>Demonstrates organizational skills</td>
					<td><input type="radio" name="organization"></td>
					<td><input type="radio" name="organization"></td>
					<td><input type="radio" name="organization"></td>
					<td><input type="radio" name="organization"></td>
				</tr>
				<tr>
					<td>Demonstrates technical knowledge and expertise</td>
					<td><input type="radio" name="techKnowledge"></td>
					<td><input type="radio" name="techKnowledge"></td>
					<td><input type="radio" name="techKnowledge"></td>
					<td><input type="radio" name="techKnowledge"></td>
				</tr>
				<tr>
					<td>Shows good judgment</td>
					<td><input type="radio" name="judgment"></td>
					<td><input type="radio" name="judgment"></td>
					<td><input type="radio" name="judgment"></td>
					<td><input type="radio" name="judgment"></td>
				</tr>
				<tr>
					<td>Demonstrates creativity/originality</td>
					<td><input type="radio" name="creativity"></td>
					<td><input type="radio" name="creativity"></td>
					<td><input type="radio" name="creativity"></td>
					<td><input type="radio" name="creativity"></td>
				</tr>
				<tr>
					<td>Analyzes problems effectively</td>
					<td><input type="radio" name="problemAnalysis"></td>
					<td><input type="radio" name="problemAnalysis"></td>
					<td><input type="radio" name="problemAnalysis"></td>
					<td><input type="radio" name="problemAnalysis"></td>
				</tr>
				<tr>
					<td>Is self-reliant</td>
					<td><input type="radio" name="selfReliance"></td>
					<td><input type="radio" name="selfReliance"></td>
					<td><input type="radio" name="selfReliance"></td>
					<td><input type="radio" name="selfReliance"></td>
				</tr>
				<tr>
					<td>Communicates well</td>
					<td><input type="radio" name="communication"></td>
					<td><input type="radio" name="communication"></td>
					<td><input type="radio" name="communication"></td>
					<td><input type="radio" name="communication"></td>
				</tr>
				<tr>
					<td>Writes effectively</td>
					<td><input type="radio" name="writing"></td>
					<td><input type="radio" name="writing"></td>
					<td><input type="radio" name="writing"></td>
					<td><input type="radio" name="writing"></td>
				</tr>
				<tr>
					<td>Has a professional attitude</td>
					<td><input type="radio" name="profAttitude"></td>
					<td><input type="radio" name="profAttitude"></td>
					<td><input type="radio" name="profAttitude"></td>
					<td><input type="radio" name="profAttitude"></td>
				</tr>
				<tr>
					<td>Gives a professional appearance</td>
					<td><input type="radio" name="profAppearance"></td>
					<td><input type="radio" name="profAppearance"></td>
					<td><input type="radio" name="profAppearance"></td>
					<td><input type="radio" name="profAppearance"></td>
				</tr>
				<tr>
					<td>Is punctual</td>
					<td><input type="radio" name="punctuality"></td>
					<td><input type="radio" name="punctuality"></td>
					<td><input type="radio" name="punctuality"></td>
					<td><input type="radio" name="punctuality"></td>
				</tr>
				<tr>
					<td>Uses time effectively</td>
					<td><input type="radio" name="timeEffective"></td>
					<td><input type="radio" name="timeEffective"></td>
					<td><input type="radio" name="timeEffective"></td>
					<td><input type="radio" name="timeEffective"></td>
				</tr>
				</tbody>
			</table>
			<input type="submit" name="submit" class="submit" value="Submit"/>
			</fieldset>
		</form>
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