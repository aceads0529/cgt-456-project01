<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1-strickt.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<!-- Student section of the form -->
		<title>Student Form</title> 
	</head>

	<body>
		<h1>Internship Report Form</h1>
		<form action="studentFormDo.php" method="post"> <!-- update action when connecting files -->
			<fieldset>
			<h2>Name of Student: <input type="text" name="firstName" placeholder="First Name"><input type="text" name="lastName" placeholder="Last Name"></h2>
			<p>Campus: <select name="campus">
				<option value="westLafayette">West Lafayette</option>
				<option value="fortWayne">Fort Wayne</option>
				<option value="iupui">IUPUI</option>
				<option value="northwest">Northwest</option>
				<option value="other">Other</option>
			</select></p>
			<p>Today's Date: <input type="date" name="todayDate"></p>	
			<h3>Work Period of Internship -</h3>
			<p>Start Date: <input type="date" name="startDate"></p>
			<p>End Date: <input type="date" name="endDate"></p>
			<p>Total hours worked @ internships over 4 summers</p>
				<table>
				<tr>
					<th>Summer 1</th>
					<th>Summer 2</th>
					<th>Summer 3</th>
					<th>Summer 4</th>
					<th>Total</th>
				</tr>
				<tr>
					<td><input type="number" name="oneHours"></td>
					<td><input type="number" name="twoHours"></td>
					<td><input type="number" name="threeHours"></td>
					<td><input type="number" name="fourHours"></td>
					<td><input type="number" name="totalHours"></td>
				</tr>
				</table>
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
			<p><input type="text" name="activities"></p>
			<p><input type="text" name="activities"></p>
			<p><input type="text" name="activities"></p>
			<p><input type="text" name="activities"></p>
			<p><input type="text" name="activities"></p>
			<p>Did the supervisor give you relevant work to accomplish - specify! <input type="text" name="relevantWork"></p>
			<p>Difficulties or problem areas encountered during internship. <input type="text" name="difficulties"></p>
			<p>Explain how work experience related to your major. <input type="text" name="relatedToMajor"></p>
			<p>Is there anything you wanted to learn during internship that you were not able to? <input type="text" name="wantedToLearn"></p>
			<p>Has this work experience changed your mind about which sector of CGT you might be most interested in pursuing? <input type="text" name="cgtChangedMind"></p>
			<p>Internship provided me with contacts which may lead to future employment- <input type="text" name="providedContacts"></p>	
			<p>Considering your overall experience—how would you rate this internship? </p>
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
				<p><input type="checkbox" name="cgt_fields" value="animation">Animation
				<input type="checkbox" name="cgt_fields" value="construction">Construction
				<input type="checkbox" name="cgt_fields" value="dataViz">Data Viz
				<input type="checkbox" name="cgt_fields" value="game">Game
				<input type="checkbox" name="cgt_fields" value="ux">UX
				<input type="checkbox" name="cgt_fields" value="vpi">VPI
				<input type="checkbox" name="cgt_fields" value="visefx">Vis EFX
				<input type="checkbox" name="cgt_fields" value="web">Web</p>
			<p>Location of office or job site where you worked if it is different than the main office <input type="text" name="addressIfDifferent"></p>
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


