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
		<title>Student Form</title> 
	</head>

	<body>
		<div class="banner-holder">
			<img src="form/images/ribbon-01.png" alt="ribbon">
		</div>
		<form action="studentFormDo.php" method="post"> <!-- update action when connecting files -->
			<fieldset>
			<h2>Student Information</h2>
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
			<label class="control-label col-md-4">Campus</label>
				<div class="row">
					<div class="col-md-4">
					<select name="campus">
						<option value="westLafayette">West Lafayette</option>
						<option value="fortWayne">Fort Wayne</option>
						<option value="iupui">IUPUI</option>
						<option value="northwest">Northwest</option>
						<option value="other">Other</option>
					</select>
					</div>
				</div>
			<label class="control-label col-md-4">Student Email: </label>
				<div class="row">
					<div class="col-md-4">
						<input type="email" name="email" class="form-control" placeholder="example@gmail.com">
					</div>
				</div>
			<label class="control-label col-md-4">Student Phone: </label>
				<div class="row">
					<div class="col-md-4">
						<input type="tel" name="phone" class="form-control" placeholder="(XXX-XXX-XXXX)">
					</div>
				</div>	
			<label class="control-label col-md-4">Academic Advisor: </label>
				<div class="row">
					<div class="col-md-4">
					<select name="advisor">
						<option value="oneal">T.R. Oneal</option>
						<option value="mayorga">Heather Mayorga</option>
						<option value="other">Other</option>
					</select>
					</div>
				</div>
			<label class="control-label col-md-4">Student Classification at Purdue: </label>
				<div class="row">
					<div class="col-md-4">
					<select name="class">
						<option value="freshman">Freshman</option>
						<option value="freshman">Sophomore</option>
						<option value="freshman">Junior</option>
						<option value="freshman">Senior</option>
					</select>
					</div>
				</div>
			</fieldset>	
			<fieldset>	
			<h2>Company Information</h2>
			<label class="control-label col-md-4">Name of Company </label>
				<div class="row">
					<div class="col-md-4">
						<input type="text" class="form-control" name="companyName">
					</div>
				</div>
			<label class="control-label col-md-4">Address of Home/Main Office </label>
				<div class="row">
					<div class="col-md-4">
						<input type="text" class="form-control" name="companyAddress">
					</div>
				</div>
			<div class="row">
				<label class="control-label col-md-8">Type/Sector of CGT Industry - select all that apply </label>
			</div>
				<div class="col-md-12" style="margin-bottom: 10px;">
      				<label class="checkbox-inline col-md-4">
        				<input type="checkbox" id="inlineCheckbox1" value="allowance"> Animation
      				</label>
      				<label class="checkbox-inline col-md-4">
        				<input type="checkbox" id="inlineCheckbox1" value="gas"> BCM
      				</label>
      			</div>
      			<div class="col-md-12" style="margin-bottom: 10px;">
      				<label class="checkbox-inline col-md-4">
        				<input type="checkbox" id="inlineCheckbox1" value="vehicle"> Data Vizualization
      				</label>
      				<label class="checkbox-inline col-md-4">
        				<input type="checkbox" id="inlineCheckbox1" value="airfare"> Game Studies
      				</label>
      			</div>
      			<div class="col-md-12" style="margin-bottom: 10px;">
      				<label class="checkbox-inline col-md-4">
        				<input type="checkbox" id="inlineCheckbox1" value="vehicle"> User Experience
      				</label>
      				<label class="checkbox-inline col-md-4">
        				<input type="checkbox" id="inlineCheckbox1" value="airfare"> VPI
      				</label>
      			</div>
      			<div class="col-md-12" style="margin-bottom: 10px;">
      				<label class="checkbox-inline col-md-4">
        				<input type="checkbox" id="inlineCheckbox1" value="vehicle"> Visual Effects
      				</label>
      				<label class="checkbox-inline col-md-4">
        				<input type="checkbox" id="inlineCheckbox1" value="airfare"> Web Development
      				</label>
      			</div>
      			<br>
				<label class="control-label col-md-4">Location of job site where you worked, if different than the main office</label>
					<div class="row">
						<div class="col-md-4">
							<input type="text" name="addressIfDifferent" class="form-control">
						</div>
					</div>
			</fieldset>
			<fieldset>	
			<h2>Work Period of Internship</h2>
			<label class="control-label col-md-4">Start Date: </label>
				<div class="row">
					<div class="col-md-4">
						<input type="date" class="form-control" name="startDate">
					</div>
				</div>
			<label class="control-label col-md-4">End Date: </label>
				<div class="row">
					<div class="col-md-4">
						<input type="date" class="form-control" name="endDate">
					</div>
				</div>
			<div class="row">
				<label class="control-label col-md-8">Total hours worked @ internships over 4 summers </label>
			</div>
			<label class="control-label col-md-4" style="margin-left: 40px;">Summer 1: </label>
				<div class="row">
					<div class="col-md-4">
						<input type="number" name="oneHours" class="form-control input-md text-right amount">
					</div>
				</div>
			<label class="control-label col-md-4" style="margin-left: 40px;">Summer 2:</label>
				<div class="row">
					<div class="col-md-4">
						<input type="number" name="twoHours" class="form-control input-md text-right amount">
					</div>
				</div>
			<label class="control-label col-md-4" style="margin-left: 40px;">Summer 3: </label>
				<div class="row">
					<div class="col-md-4">
						<input type="number" name="threeHours" class="form-control input-md text-right amount">
					</div>
				</div>
			<label class="control-label col-md-4" style="margin-left: 40px;">Summer 4: </label>
				<div class="row">
					<div class="col-md-4">
						<input type="number" name="fourHours" class="form-control input-md text-right amount">
					</div>
				</div>
			<label class="control-label col-md-4" style="color: #ffffff; margin-left: 40px;">Total: </label>
				<div class="row">
					<div class="col-md-4">
						<input type="number" name="oneHours" class="form-control input-md text-right" readonly id="total_amount">
					</div>
				</div>
			</fieldset>
			<fieldset>	
<!-- The next section could potentially be put onto another page -->
			<h2>Internship Questionnaire </h2>
			<label class="control-label col-md-6" style="margin-bottom: 20px;">Did you work in an office or on site? </label>
			<div class="col-md-4">
				<select name="setting">
					<option value="office">Office</option>
					<option value="site">On Site</option>
				</select>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">List 5 activities that you regularly performed during the internship. Give examples of activities. </label>
			<div class="md-form">
  				<textarea type="text" class="md-textarea form-control" rows="2" style="margin-bottom: 20px;"></textarea>
			</div>
			<div class="md-form">
  				<textarea type="text" class="md-textarea form-control" rows="2" style="margin-bottom: 20px;"></textarea>
			</div>
			<div class="md-form">
  				<textarea type="text" class="md-textarea form-control" rows="2" style="margin-bottom: 20px;"></textarea>
			</div>
			<div class="md-form">
  				<textarea type="text" class="md-textarea form-control" rows="2" style="margin-bottom: 20px;"></textarea>
			</div>
			<div class="md-form">
  				<textarea type="text" class="md-textarea form-control" rows="2" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Did the supervisor give you relevant work to accomplish? Specify! </label>
			<div class="md-form">
  				<textarea type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Difficulties or problem areas encountered during internship. </label>
			<div class="md-form">
  				<textarea type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Explain how work experience related to your major. </label>
			<div class="md-form">
  				<textarea type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Is there anything you wanted to learn during internship that you were not able to? </label>
			<div class="md-form">
  				<textarea type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Has this work experience changed your mind about which sector of CGT you might be most interested in pursuing? </label>
			<div class="md-form">
  				<textarea type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Did the internship provide you with contacts which may lead to future employment? </label>
			<div class="md-form">
  				<textarea type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Considering your overall experience, how would you rate this internship? </label>
				<input class="form-check-input radio-inline" type="radio" name="rating">Very Dissatisfied
				<input class="form-check-input radio-inline" type="radio" name="rating">Dissatisfied
				<input class="form-check-input radio-inline" type="radio" name="rating">Neutral
				<input class="form-check-input radio-inline" type="radio" name="rating">Satisfied
				<input class="form-check-input radio-inline" type="radio" name="rating">Very Satisfied
			</fieldset>
			<fieldset>
			<h2>Salary/Hourly Rate </h2>
       		<div class="row">
       			<label class="control-label col-md-6">Were you paid? </label>
            		<input class="form-check-input radio-inline" type="radio" name="paid" id="gridRadios1" value="option1" checked> Yes
            		<input class="form-check-input radio-inline" type="radio" name="paid" id="gridRadios2" value="option2"> No
        	</div>
        	<div class="row"> 
				<label class="control-label col-md-4">If so, how much? </label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="amountPaid">
					</div>
			</div>
			<div class="row"> 
				<label class="control-label col-md-6" style="margin-bottom: 20px;">Did you receive a housing stipend? </label>
					<input class="form-check-input radio-inline" type="radio" name="housingStipend">Yes
					<input class="form-check-input radio-inline" type="radio" name="housingStipend">No
			</div>
			<div class="row">
				<label class="control-label col-md-12">Did you receive any assistance from the company for your internship? Please select all that apply </label>
			</div>
				<div class="col-md-12">
      				<label class="checkbox-inline col-md-4" style="margin-bottom: 10px;">
        				<input type="checkbox" id="inlineCheckbox1" value="allowance"> Per Diem Allowance
      				</label>
      				<label class="checkbox-inline col-md-4" style="margin-bottom: 10px;">
        				<input type="checkbox" id="inlineCheckbox1" value="gas"> Gas Reimbursement
      				</label>
      			</div>
      			<div class="col-md-12">
      				<label class="checkbox-inline col-md-4" style="margin-bottom: 10px;">
        				<input type="checkbox" id="inlineCheckbox1" value="vehicle"> Company Vehicle
      				</label>
      				<label class="checkbox-inline col-md-4" style="margin-bottom: 10px;">
        				<input type="checkbox" id="inlineCheckbox1" value="airfare"> Paid Airfare/Transportation
      				</label>
      			</div>
      			<div class="col-md-12">
      				<label class="checkbox-inline col-md-4" style="margin-bottom: 10px;">
        				<input type="checkbox" id="inlineCheckbox1" value="other"> Other
      				</label>
      			</div>
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

			// mask
			$('.amount').mask('###',{reverse : true});
			// function that will get the total amount by each class
			var total_amount = function() {
				
				var sum=0;
				
				$('.amount').each(function(){
					
					var num = $(this).val().replace(',','');
					
					if(num != 0) {
						sum += parseFloat(num);
					}
					
				});
				
				$('#total_amount').val(sum);
			}
			
			//keyup handler
			
			$('.amount').keyup(function(){
				
				total_amount();
				
			});
		});

	</script>
	</body>
</html>


