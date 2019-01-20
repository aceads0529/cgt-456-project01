<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Student section of the form -->
<title>Student Form</title> 
</head>

<body>
<h1>Internship Report Form</h1>
<form action="studentFormDo.php" method="post"> <!-- update action when connecting files -->
	<fieldset>
Name of Student: <input type="text" name="name"><br>
Campus: 
<select name="campus">
	<option value="westLafayette">West Lafayette</option>
	<option value="fortWayne">Fort Wayne</option>
	<option value="iupui">IUPUI</option>
	<option value="northwest">Northwest</option>
	<option value="other">Other</option>
</select><br>
	
Today's Date: 
<input type="date" name="todayDate"><br>
	
Work Period of Internship -<br>
Start Date: <input type="date" name="startDate"><br>
End Date: <input type="date" name="endDate"><br>
Total hours worked during the period noted<input type="number" name="periodHours"><br>
	
Total hours worked @ internships over 4 summers<br>
Summer 1<input type="number" name="oneHours"><br>
Summer 2<input type="number" name="twoHours"><br>
Summer 3<input type="number" name="threeHours"><br>
Summer 4<input type="number" name="fourHours"><br>
Total<input type="number" name="totalHours"><br>
	</fieldset>
	<fieldset>
Student Info<br>
Students Email<input type="email" name="studentEmail"><br>
Students Phone<input type="tel" name="studentPhone"><br>	
Academic Advisor
<select name="advisor">
	<option value="oneal">T.R. Oneal</option>
	<option value="mayorga">Heather Mayorga</option>
	<option value="other">Other</option>
</select><br>
Student Classification at Purdue
<select name="class">
	<option value="freshman">Freshman</option>
	<option value="freshman">Sophomore</option>
	<option value="freshman">Junior</option>
	<option value="freshman">Senior</option>
</select>
</fieldset>	
<fieldset>	
<!-- The next section could potentially be put onto another page -->
Job Title<br>
Did you work in an office or on site?
<select name="setting">
	<option value="office">Office</option>
	<option value="site">On Site</option>
</select><br>
	
List 5 activities that you regularly performed during the internship<br>
1.<input type="text" name="activity1"><br>
2.<input type="text" name="activity2"><br>
3.<input type="text" name="activity3"><br>
4.<input type="text" name="activity4"><br>
5.<input type="text" name="activity5"><br>
Give examples of activities<input type="text" name="examples"><br>
Did the supervisor give you relevant work to accomplish - specify!<input type="text" name="relevantWork"><br>
	
Difficulties or problem areas encountered during internship<input type="text" name="difficulties"><br>
Explain how work experience related to your major<input type="text" name="relate"><br>
Is there anything you wanted to learn during internship that you were not able to? <input type="text" name="missedLearn"><br>
Has this work experience changed your mind about which sector of CGT you might be most interested in pursuing?<input type="text" name="mind"><br>
Internship provided me with contacts which may lead to future employment-<input type="text" name="contacts"><br>	
	
Considering your overall experience—how would you rate this internship?<br>
	<input type="radio" name="rate">Very Dissatisfied<br>
	<input type="radio" name="rate">Dissatisfied<br>
	<input type="radio" name="rate">Neutral<br>
	<input type="radio" name="rate">Satisfied<br>
	<input type="radio" name="rate">Very Satisfied<br>
</fieldset>
<fieldset>	
Company Information<br>
	Name of Company<input type="text" name="companyName"><br>
	Address of Home/Main Office<input type="text" name="companyAddress"><br>
	Type/Sector of CGT Indusrty - select all that apply<br>
	<input type="checkbox" name="sector" value="animation">Animation<br>
	<input type="checkbox" name="sector" value="construction">Construction<br>
	<input type="checkbox" name="sector" value="dataViz">Data Viz<br>
	<input type="checkbox" name="sector" value="game">Game<br>
	<input type="checkbox" name="sector" value="ux">UX<br>
	<input type="checkbox" name="sector" value="vpi">VPI<br>
	<input type="checkbox" name="sector" value="visefx">Vis EFX<br>
	<input type="checkbox" name="sector" value="web">Web<br>

Location of office or jobsite where you worked if it is different than the main office<input type="text" name="differentAddress"><br>
</fieldset>
<fieldset>	
Name of Supervisor - direct<input type="text" name="supervisorName"><br>
Supervisors email<input type="email" name="supervisorEmail"><br>
Performance Review of Supervisor - Rate Employees work behaviors below: To be filled out by Supervisor<br>
</fieldset>
<fieldset>	
<!-- Supervisor review table -->
Supervisors Review of Intern:<br>
2=Exceptional 1=Average 0=Unacceptable<br>
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
		<td><input type="radio" name="performance"></td>
		<td><input type="radio" name="performance"></td>
		<td><input type="radio" name="performance"></td>
		<td><input type="radio" name="performance"></td>
	</tr>
	<tr>
		<td>Cooperates with co-workers and supervisors</td>
		<td><input type="radio" name="coop"></td>
		<td><input type="radio" name="coop"></td>
		<td><input type="radio" name="coop"></td>
		<td><input type="radio" name="coop"></td>
	</tr>
	<tr>
		<td>Shows interest in work</td>
		<td><input type="radio" name="interest"></td>
		<td><input type="radio" name="interest"></td>
		<td><input type="radio" name="interest"></td>
		<td><input type="radio" name="interest"></td>
	</tr>
	<tr>
		<td>Learns quickly</td>
		<td><input type="radio" name="learnSpeed"></td>
		<td><input type="radio" name="learnSpeed"></td>
		<td><input type="radio" name="learnSpeed"></td>
		<td><input type="radio" name="learnSpeed"></td>
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
		<td><input type="radio" name="quality"></td>
		<td><input type="radio" name="quality"></td>
		<td><input type="radio" name="quality"></td>
		<td><input type="radio" name="quality"></td>
	</tr>
	<tr>
		<td>Accepts responsibility</td>
		<td><input type="radio" name="responsible"></td>
		<td><input type="radio" name="responsible"></td>
		<td><input type="radio" name="responsible"></td>
		<td><input type="radio" name="responsible"></td>
	</tr>
	<tr>
		<td>Accepts criticism</td>
		<td><input type="radio" name="criticism"></td>
		<td><input type="radio" name="criticism"></td>
		<td><input type="radio" name="criticism"></td>
		<td><input type="radio" name="criticism"></td>
	</tr>
	<tr>
		<td>Demonstrates organizational skills</td>
		<td><input type="radio" name="orginization"></td>
		<td><input type="radio" name="orginization"></td>
		<td><input type="radio" name="orginization"></td>
		<td><input type="radio" name="orginization"></td>
	</tr>
	<tr>
		<td>Demonstrates technical knowledge and expertise</td>
		<td><input type="radio" name="knowledge"></td>
		<td><input type="radio" name="knowledge"></td>
		<td><input type="radio" name="knowledge"></td>
		<td><input type="radio" name="knowledge"></td>
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
		<td><input type="radio" name="creative"></td>
		<td><input type="radio" name="creative"></td>
		<td><input type="radio" name="creative"></td>
		<td><input type="radio" name="creative"></td>
	</tr>
	<tr>
		<td>Analyzes problems effectively</td>
		<td><input type="radio" name="analyze"></td>
		<td><input type="radio" name="analyze"></td>
		<td><input type="radio" name="analyze"></td>
		<td><input type="radio" name="analyze"></td>
	</tr>
	<tr>
		<td>Is self-reliant</td>
		<td><input type="radio" name="selfReliant"></td>
		<td><input type="radio" name="selfReliant"></td>
		<td><input type="radio" name="selfReliant"></td>
		<td><input type="radio" name="selfReliant"></td>
	</tr>
	<tr>
		<td>Communicates well</td>
		<td><input type="radio" name="com"></td>
		<td><input type="radio" name="com"></td>
		<td><input type="radio" name="com"></td>
		<td><input type="radio" name="com"></td>
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
		<td><input type="radio" name="proAttitude"></td>
		<td><input type="radio" name="proAttitude"></td>
		<td><input type="radio" name="proAttitude"></td>
		<td><input type="radio" name="proAttitude"></td>
	</tr>
	<tr>
		<td>Gives a professional appearance</td>
		<td><input type="radio" name="proAppearance"></td>
		<td><input type="radio" name="proAppearance"></td>
		<td><input type="radio" name="proAppearance"></td>
		<td><input type="radio" name="proAppearance"></td>
	</tr>
	<tr>
		<td>Is punctual</td>
		<td><input type="radio" name="punctual"></td>
		<td><input type="radio" name="punctual"></td>
		<td><input type="radio" name="punctual"></td>
		<td><input type="radio" name="punctual"></td>
	</tr>
	<tr>
		<td>Uses time effectively</td>
		<td><input type="radio" name="timeManagment"></td>
		<td><input type="radio" name="timeManagment"></td>
		<td><input type="radio" name="timeManagment"></td>
		<td><input type="radio" name="timeManagment"></td>
	</tr>
</table><br>
</fieldset>
<fieldset>
Salary/Hourly Rate<br>	
Were you paid?<br>
	<input type="radio" name="payment">Yes<br>
	<input type="radio" name="payment">No<br>
If so, how much?<input type="text" name="payRate"><br>					
Did you receive a housing stipend?<br>
	<input type="radio" name="stipend">Yes<br>
	<input type="radio" name="stipend">No<br>
Did you receive any assistance from the company for your internship? Please select all that apply<br>
	<input type="checkbox" name="finance" value="allowance">Per Diem Allowance<br>
	<input type="checkbox" name="finance" value="gas">Gas Reimbursement<br>
	<input type="checkbox" name="finance" value="vehicle">Company Vehicle<br>
	<input type="checkbox" name="finance" value="airfare">Paid Airfare or travel to/from internship location<br>
	<input type="checkbox" name="finance" value="other">Other<br>
</fieldset>
	<input type="submit" name="submit" class="submit" value="Submit"/>
</form>
</body>
</html>




































