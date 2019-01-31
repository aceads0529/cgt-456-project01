<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1-strickt.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
    	<link rel="stylesheet" type="text/css" href="../css/general.css" />
    	<link rel="stylesheet" type="text/css" href="../css/studentForm.css" />
<!-- Student section of the form -->
		<title>Student Form</title> 
	</head>

	<body>
		<h1>Internship Report Form</h1>
		<form action="studentFormDo.php" method="post"> <!-- update action when connecting files -->
			<fieldset>
			<h2>Name of Student: <input type="text" name="firstName"><input type="text" name="lastName"></h2>
			<p>Campus: <select name="campus">
				<option value="westLafayette">West Lafayette</option>
				<option value="fortWayne">Fort Wayne</option>
				<option value="iupui">IUPUI</option>
				<option value="northwest">Northwest</option>
				<option value="other">Other</option>
			</select></p>
			<!-- can't we generate today's date? -->
			<p>Today's Date: <input type="date" name="todayDate"></p>	
			<h3>Work Period of Internship</h3>
			<p>Start Date: <input type="date" name="startDate"></p>
			<p>End Date: <input type="date" name="endDate"></p>
			<p>Total hours worked @ internships over 4 summers</p>

			<p>Summer 1: <input type="number" name="oneHours"></p>
			<p>Summer 2: <input type="number" name="twoHours"></p>
			<p>Summer 3: <input type="number" name="threeHours"></p>
			<p>Summer 4: <input type="number" name="fourHours"></p>
			<!-- can we calculate this for them w/ JS? -->
			<p>Total: <input type="number" name="totalHours"></p>

			</fieldset>
			<fieldset>
			<h3>Student Info</h3>
			<p>Student Email: <input type="email" name="email"></p>
			<p>Student Phone: <input type="tel" name="phone"></p>	
			<p>Academic Advisor: <select name="advisor">
				<option value="oneal">T.R. Oneal</option>
				<option value="mayorga">Heather Mayorga</option>
				<option value="other">Other</option>
			</select></p>
			<p>Student Classification at Purdue: <select name="class">
				<option value="freshman">Freshman</option>
				<option value="freshman">Sophomore</option>
				<option value="freshman">Junior</option>
				<option value="freshman">Senior</option>
			</select></p>
			</fieldset>	
			<fieldset>	
<!-- The next section could potentially be put onto another page -->
			<h3>Job Title</h3>
			<p>Did you work in an office or on site? <select name="setting">
				<option value="office">Office</option>
				<option value="site">On Site</option>
			</select></p>
			<p>List 5 activities that you regularly performed during the internship. Give examples of activities.</p>
			<p><input type="text" name="activities" class="long"></p>
			<p><input type="text" name="activities" class="long"></p>
			<p><input type="text" name="activities" class="long"></p>
			<p><input type="text" name="activities" class="long"></p>
			<p><input type="text" name="activities" class="long"></p>
			<p>Did the supervisor give you relevant work to accomplish? Specify!</p>
			<p><input type="text" name="relevantWork" class="long"></p>
			<p>Difficulties or problem areas encountered during internship. </p>
			<p><input type="text" name="difficulties" class="long"></p>
			<p>Explain how work experience related to your major. </p>
			<p><input type="text" name="relatedToMajor" class="long"></p>
			<p>Is there anything you wanted to learn during internship that you were not able to? </p>
			<p><input type="text" name="wantedToLearn" class="long"></p>
			<p>Has this work experience changed your mind about which sector of CGT you might be most interested in pursuing? </p>
			<p><input type="text" name="cgtChangedMind" class="long"></p>
			<p>Internship provided me with contacts which may lead to future employment- </p>
			<p><input type="text" name="providedContacts"></p>	
			<p>Considering your overall experience, how would you rate this internship? </p>
				<p><input type="radio" name="rating">Very Dissatisfied
				<input type="radio" name="rating">Dissatisfied
				<input type="radio" name="rating">Neutral
				<input type="radio" name="rating">Satisfied
				<input type="radio" name="rating">Very Satisfied</p>
			</fieldset>
			<fieldset>	
			<h3>Company Information</h3>
			<p>Name of Company <input type="text" name="companyName"></p>
			<p>Address of Home/Main Office <input type="text" name="companyAddress"></p>
			<p>Type/Sector of CGT Industry - select all that apply </p>
				<p><input type="checkbox" name="cgt_fields" value="animation">Animation<br>
				<input type="checkbox" name="cgt_fields" value="construction">Construction<br>
				<input type="checkbox" name="cgt_fields" value="dataViz">Data Viz<br>
				<input type="checkbox" name="cgt_fields" value="game">Game<br>
				<input type="checkbox" name="cgt_fields" value="ux">UX<br>
				<input type="checkbox" name="cgt_fields" value="vpi">VPI<br>
				<input type="checkbox" name="cgt_fields" value="visefx">Vis EFX<br>
				<input type="checkbox" name="cgt_fields" value="web">Web</p>
			<p>Location of office or job site where you worked, if different than the main office:</p>
			<p> <input type="text" name="addressIfDifferent" class="long"></p>
			</fieldset>
			<fieldset>	
			<p>Name of Supervisor - direct <input type="text" name="supervisorName"></p>
			<p>Supervisor's phone <input type="tel" name="supervisorPhone"></p>
			<p>Supervisor's email <input type="email" name="supervisorEmail"></p>
			<p>Performance Review of Supervisor - Rate Employees work behaviors below: To be filled out by Supervisor</p>
			</fieldset>
			<fieldset>	
<!-- Supervisor review table -->
			<h3>Supervisors Review of Intern: </h3>
			<p>2=Exceptional 1=Average 0=Unacceptable </p>
<!-- This table format will need to be changed, but will do for a prototype -->
			<table style="width: 50%">
				<tr>
					<th>Behaviors</th>
					<th>2</th>
					<th>1</th>
					<th>0</th>
					<th>N/A</th>
				</tr>
				<tr>
					<td>Performs in a dependable manner</td>
					<td><input type="radio" name="dependable"><span class="customradio"></span></td>
					<td><input type="radio" name="dependable"><span class="customradio"></span></td></td>
					<td><input type="radio" name="dependable"><span class="customradio"></span></td></td>
					<td><input type="radio" name="dependable"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Cooperates with co-workers and supervisors</td>
					<td><input type="radio" name="cooperative"><span class="customradio"></span></td></td>
					<td><input type="radio" name="cooperative"><span class="customradio"></span></td></td>
					<td><input type="radio" name="cooperative"><span class="customradio"></span></td></td>
					<td><input type="radio" name="cooperative"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Shows interest in work</td>
					<td><input type="radio" name="interested"><span class="customradio"></span></td></td>
					<td><input type="radio" name="interested"><span class="customradio"></span></td></td>
					<td><input type="radio" name="interested"><span class="customradio"></span></td></td>
					<td><input type="radio" name="interested"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Learns quickly</td>
					<td><input type="radio" name="fastLearner"><span class="customradio"></span></td></td>
					<td><input type="radio" name="fastLearner"><span class="customradio"></span></td></td>
					<td><input type="radio" name="fastLearner"><span class="customradio"></span></td></td>
					<td><input type="radio" name="fastLearner"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Shows initiative</td>
					<td><input type="radio" name="initiative"><span class="customradio"></span></td></td>
					<td><input type="radio" name="initiative"><span class="customradio"></span></td></td>
					<td><input type="radio" name="initiative"><span class="customradio"></span></td></td>
					<td><input type="radio" name="initiative"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Produces high quality work</td>
					<td><input type="radio" name="workQuality"><span class="customradio"></span></td></td>
					<td><input type="radio" name="workQuality"><span class="customradio"></span></td></td>
					<td><input type="radio" name="workQuality"><span class="customradio"></span></td></td>
					<td><input type="radio" name="workQuality"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Accepts responsibility</td>
					<td><input type="radio" name="responsibility"><span class="customradio"></span></td></td>
					<td><input type="radio" name="responsibility"><span class="customradio"></span></td></td>
					<td><input type="radio" name="responsibility"><span class="customradio"></span></td></td>
					<td><input type="radio" name="responsibility"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Accepts criticism</td>
					<td><input type="radio" name="acceptCriticism"><span class="customradio"></span></td></td>
					<td><input type="radio" name="acceptCriticism"><span class="customradio"></span></td></td>
					<td><input type="radio" name="acceptCriticism"><span class="customradio"></span></td></td>
					<td><input type="radio" name="acceptCriticism"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Demonstrates organizational skills</td>
					<td><input type="radio" name="organization"><span class="customradio"></span></td></td>
					<td><input type="radio" name="organization"><span class="customradio"></span></td></td>
					<td><input type="radio" name="organization"><span class="customradio"></span></td></td>
					<td><input type="radio" name="organization"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Demonstrates technical knowledge and expertise</td>
					<td><input type="radio" name="techKnowledge"><span class="customradio"></span></td></td>
					<td><input type="radio" name="techKnowledge"><span class="customradio"></span></td></td>
					<td><input type="radio" name="techKnowledge"><span class="customradio"></span></td></td>
					<td><input type="radio" name="techKnowledge"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Shows good judgment</td>
					<td><input type="radio" name="judgment"><span class="customradio"></span></td></td>
					<td><input type="radio" name="judgment"><span class="customradio"></span></td></td>
					<td><input type="radio" name="judgment"><span class="customradio"></span></td></td>
					<td><input type="radio" name="judgment"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Demonstrates creativity/originality</td>
					<td><input type="radio" name="creativity"><span class="customradio"></span></td></td>
					<td><input type="radio" name="creativity"><span class="customradio"></span></td></td>
					<td><input type="radio" name="creativity"><span class="customradio"></span></td></td>
					<td><input type="radio" name="creativity"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Analyzes problems effectively</td>
					<td><input type="radio" name="problemAnalysis"><span class="customradio"></span></td></td>
					<td><input type="radio" name="problemAnalysis"><span class="customradio"></span></td></td>
					<td><input type="radio" name="problemAnalysis"><span class="customradio"></span></td></td>
					<td><input type="radio" name="problemAnalysis"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Is self-reliant</td>
					<td><input type="radio" name="selfReliance"><span class="customradio"></span></td></td>
					<td><input type="radio" name="selfReliance"><span class="customradio"></span></td></td>
					<td><input type="radio" name="selfReliance"><span class="customradio"></span></td></td>
					<td><input type="radio" name="selfReliance"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Communicates well</td>
					<td><input type="radio" name="communication"><span class="customradio"></span></td></td>
					<td><input type="radio" name="communication"><span class="customradio"></span></td></td>
					<td><input type="radio" name="communication"><span class="customradio"></span></td></td>
					<td><input type="radio" name="communication"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Writes effectively</td>
					<td><input type="radio" name="writing"><span class="customradio"></span></td></td>
					<td><input type="radio" name="writing"><span class="customradio"></span></td></td>
					<td><input type="radio" name="writing"><span class="customradio"></span></td></td>
					<td><input type="radio" name="writing"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Has a professional attitude</td>
					<td><input type="radio" name="profAttitude"><span class="customradio"></span></td></td>
					<td><input type="radio" name="profAttitude"><span class="customradio"></span></td></td>
					<td><input type="radio" name="profAttitude"><span class="customradio"></span></td></td>
					<td><input type="radio" name="profAttitude"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Gives a professional appearance</td>
					<td><input type="radio" name="profAppearance"><span class="customradio"></span></td></td>
					<td><input type="radio" name="profAppearance"><span class="customradio"></span></td></td>
					<td><input type="radio" name="profAppearance"><span class="customradio"></span></td></td>
					<td><input type="radio" name="profAppearance"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Is punctual</td>
					<td><input type="radio" name="punctuality"><span class="customradio"></span></td></td>
					<td><input type="radio" name="punctuality"><span class="customradio"></span></td></td>
					<td><input type="radio" name="punctuality"><span class="customradio"></span></td></td>
					<td><input type="radio" name="punctuality"><span class="customradio"></span></td></td>
				</tr>
				<tr>
					<td>Uses time effectively</td>
					<td><input type="radio" name="timeEffective"><span class="customradio"></span></td></td>
					<td><input type="radio" name="timeEffective"><span class="customradio"></span></td></td>
					<td><input type="radio" name="timeEffective"><span class="customradio"></span></td></td>
					<td><input type="radio" name="timeEffective"><span class="customradio"></span></td></td>
				</tr>
			</table><br>
			</fieldset>
			<fieldset>
			<h3>Salary/Hourly Rate </h3>	
			<p>Were you paid? 
				<input type="radio" name="paid">Yes
				<input type="radio" name="paid">No</p>
			<p>If so, how much? <input type="text" name="amountPaid"></p>					
			<p>Did you receive a housing stipend? 
				<input type="radio" name="housingStipend">Yes
				<input type="radio" name="housingStipend">No</p>
			<p>Did you receive any assistance from the company for your internship? Please select all that apply </p>
				<input type="checkbox" name="otherAssistance" value="allowance">Per Diem Allowance<br>
				<input type="checkbox" name="otherAssistance" value="gas">Gas Reimbursement<br>
				<input type="checkbox" name="otherAssistance" value="vehicle">Company Vehicle<br>
				<input type="checkbox" name="otherAssistance" value="airfare">Paid Airfare or travel to/from internship location<br>
				<input type="checkbox" name="otherAssistance" value="other">Other<br>
			</fieldset>
			<input type="submit" name="submit" class="submit" value="Submit"/>
		</form>
	</body>
</html>


