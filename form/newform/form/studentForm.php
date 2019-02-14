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
		<title>Student Form</title> 
	</head>

	<body>
		<div class="banner-holder">
			<img src="form/images/ribbon-01.png" alt="ribbon">
		</div>
		<form id="student-form" name="student-form" action="studentFormDo.php" method="post"> <!-- update action when connecting files -->	
			<fieldset>	
			<h2>Company Information</h2>
			<label class="control-label col-md-4">Name of Company </label>
				<div class="row">
					<div class="col-md-4">
						<input id="companyName" type="text" class="form-control" name="companyName">
					</div>
				</div>
			<label class="control-label col-md-4">Address of Home/Main Office </label>
				<div class="row">
					<div class="col-md-4">
						<input id="companyAddress" type="text" class="form-control" name="companyAddress">
					</div>
				</div>
			<div class="row">
				<label class="control-label col-md-8">Type/Sector of CGT Industry - select all that apply </label>
			</div>
				<div class="col-md-12" style="margin-bottom: 10px;">
      				<label class="checkbox-inline col-md-4">
        				<input id="anim" type="checkbox" id="inlineCheckbox1" value="allowance"> Animation
      				</label>
      				<label class="checkbox-inline col-md-4">
        				<input id="construction" type="checkbox" id="inlineCheckbox1" value="gas"> BCM
      				</label>
      			</div>
      			<div class="col-md-12" style="margin-bottom: 10px;">
      				<label class="checkbox-inline col-md-4">
        				<input id="dataviz" type="checkbox" id="inlineCheckbox1" value="vehicle"> Data Vizualization
      				</label>
      				<label class="checkbox-inline col-md-4">
        				<input id="game" type="checkbox" id="inlineCheckbox1" value="airfare"> Game Studies
      				</label>
      			</div>
      			<div class="col-md-12" style="margin-bottom: 10px;">
      				<label class="checkbox-inline col-md-4">
        				<input id="ux" type="checkbox" id="inlineCheckbox1" value="vehicle"> User Experience
      				</label>
      				<label class="checkbox-inline col-md-4">
        				<input id="vpi" type="checkbox" id="inlineCheckbox1" value="airfare"> VPI
      				</label>
      			</div>
      			<div class="col-md-12" style="margin-bottom: 10px;">
      				<label class="checkbox-inline col-md-4">
        				<input id="vfx" type="checkbox" id="inlineCheckbox1" value="vehicle"> Visual Effects
      				</label>
      				<label class="checkbox-inline col-md-4">
        				<input id="web" type="checkbox" id="inlineCheckbox1" value="airfare"> Web Development
      				</label>
      			</div>
      			<br>
				<label class="control-label col-md-4">Location of job site where you worked, if different than the main office</label>
					<div class="row">
						<div class="col-md-4">
							<input id="addressDifferent" type="text" name="addressIfDifferent" class="form-control">
						</div>
					</div>
			</fieldset>
			<fieldset>	
			<h2>Work Period of Internship</h2>
			<label class="control-label col-md-4">Job Title: </label>
				<div class="row">
					<div class="col-md-4">
						<input id="jobTitle" type="date" class="form-control" name="jobTitle">
					</div>
				</div>
			<label class="control-label col-md-4">Start Date: </label>
				<div class="row">
					<div class="col-md-4">
						<input id="startDate" type="date" class="form-control" name="startDate">
					</div>
				</div>
			<label class="control-label col-md-4">End Date: </label>
				<div class="row">
					<div class="col-md-4">
						<input id="endDate" type="date" class="form-control" name="endDate">
					</div>
				</div>
			<div class="row">
				<label class="control-label col-md-8">Total hours worked @ internships over 4 summers </label>
			</div>
			<label class="control-label col-md-4" style="margin-left: 40px;">Summer 1: </label>
				<div class="row">
					<div class="col-md-4">
						<input id="hourSummer1" type="number" name="oneHours" class="form-control input-md text-right amount">
					</div>
				</div>
			<label class="control-label col-md-4" style="margin-left: 40px;">Summer 2:</label>
				<div class="row">
					<div class="col-md-4">
						<input id="hourSummer2" type="number" name="twoHours" class="form-control input-md text-right amount">
					</div>
				</div>
			<label class="control-label col-md-4" style="margin-left: 40px;">Summer 3: </label>
				<div class="row">
					<div class="col-md-4">
						<input id="hourSummer3" type="number" name="threeHours" class="form-control input-md text-right amount">
					</div>
				</div>
			<label class="control-label col-md-4" style="margin-left: 40px;">Summer 4: </label>
				<div class="row">
					<div class="col-md-4">
						<input id="hourSummer4" type="number" name="fourHours" class="form-control input-md text-right amount">
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
				<select id="offsite" name="setting">
					<option value="office">Office</option>
					<option value="site">On Site</option>
				</select>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">List 5 activities that you regularly performed during the internship. Give examples of activities. </label>
			<div class="md-form">
  				<textarea id="activity1" type="text" class="md-textarea form-control" rows="2" style="margin-bottom: 20px;"></textarea>
			</div>
			<div class="md-form">
  				<textarea id="activity2" type="text" class="md-textarea form-control" rows="2" style="margin-bottom: 20px;"></textarea>
			</div>
			<div class="md-form">
  				<textarea id="activity3" type="text" class="md-textarea form-control" rows="2" style="margin-bottom: 20px;"></textarea>
			</div>
			<div class="md-form">
  				<textarea id="activity4" type="text" class="md-textarea form-control" rows="2" style="margin-bottom: 20px;"></textarea>
			</div>
			<div class="md-form">
  				<textarea id="activity5" type="text" class="md-textarea form-control" rows="2" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Did the supervisor give you relevant work to accomplish? Specify! </label>
			<div class="md-form">
  				<textarea id="relaventWork" type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Difficulties or problem areas encountered during internship. </label>
			<div class="md-form">
  				<textarea id="problems" type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Explain how work experience related to your major. </label>
			<div class="md-form">
  				<textarea id="related" type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Is there anything you wanted to learn during internship that you were not able to? </label>
			<div class="md-form">
  				<textarea id="learn" type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Has this work experience changed your mind about which sector of CGT you might be most interested in pursuing? </label>
			<div class="md-form">
  				<textarea id="changeMind" type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Did the internship provide you with contacts which may lead to future employment? </label>
			<div class="md-form">
  				<textarea id="contact" type="text" class="md-textarea form-control" rows="1" style="margin-bottom: 20px;"></textarea>
			</div>
			<label class="control-label col-md-12" style="margin-bottom: 20px;">Considering your overall experience, how would you rate this internship? </label>
				<input id="rate" class="form-check-input radio-inline" type="radio" name="rating">Very Dissatisfied
				<input id="rate" class="form-check-input radio-inline" type="radio" name="rating">Dissatisfied
				<input id="rate" class="form-check-input radio-inline" type="radio" name="rating">Neutral
				<input id="rate" class="form-check-input radio-inline" type="radio" name="rating">Satisfied
				<input id="rate" class="form-check-input radio-inline" type="radio" name="rating">Very Satisfied
			</fieldset>
			<fieldset>
			<h2>Salary/Hourly Rate </h2>
       		<div class="row">
       			<label class="control-label col-md-6">Were you paid? </label>
            		<input id="ifPaid" class="form-check-input radio-inline" type="radio" name="paid" id="gridRadios1" value="yes" checked> Yes
            		<input id="ifPaid" class="form-check-input radio-inline" type="radio" name="paid" id="gridRadios2" value="no"> No
        	</div>
        	<div class="row"> 
				<label class="control-label col-md-4">If so, how much? </label>
					<div class="col-md-6">
						<input id="payRate" type="text" class="form-control" name="amountPaid">
					</div>
			</div>
			<div class="row"> 
				<label class="control-label col-md-6" style="margin-bottom: 20px;">Did you receive a housing stipend? </label>
					<input id="housing" class="form-check-input radio-inline" type="radio" name="housingStipend" value="yes">Yes
					<input id="housing" class="form-check-input radio-inline" type="radio" name="housingStipend" value="no">No
			</div>
			<div class="row">
				<label class="control-label col-md-12">Did you receive any assistance from the company for your internship? Please select all that apply </label>
			</div>
				<div class="col-md-12">
      				<label class="checkbox-inline col-md-4" style="margin-bottom: 10px;">
        				<input id="perDiem" type="checkbox" id="inlineCheckbox1" value="allowance"> Per Diem Allowance
      				</label>
      				<label class="checkbox-inline col-md-4" style="margin-bottom: 10px;">
        				<input id="gas" type="checkbox" id="inlineCheckbox1" value="gas"> Gas Reimbursement
      				</label>
      			</div>
      			<div class="col-md-12">
      				<label class="checkbox-inline col-md-4" style="margin-bottom: 10px;">
        				<input id="vehicle" type="checkbox" id="inlineCheckbox1" value="vehicle"> Company Vehicle
      				</label>
      				<label class="checkbox-inline col-md-4" style="margin-bottom: 10px;">
        				<input id="airfare" type="checkbox" id="inlineCheckbox1" value="airfare"> Paid Airfare/Transportation
      				</label>
      			</div>
      			<div class="col-md-12">
      				<label class="checkbox-inline col-md-4" style="margin-bottom: 10px;">
        				<input id="other" type="checkbox" id="inlineCheckbox1" value="other"> Other
      				</label>
      			</div>
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
			//employer
			const companyName = $('#companyName').val();
            const companyAddress = $('#companyAddress').val();
			const cgtFields = [
				'anim',
				'construction',
				'dataviz',
				'game',
				'ux',
				'vfx',
				'vpi',
				'web'
			];
			var selectedFields = [];
			for (const f of cgtFields) {
				if ($('#' + f).prop('checked')) {
					selectedFields.push(f);
				}
			}
			//session
			const jobTitle = $('#jobTitle').val();
			const startDate = $('#startDate').val();
			const endDate = $('#endDate').val();
			const offsite = $('#offsite').val();
			const totalHours = $('#total_amount').val();
			const payRate = $('#payRate').val();		
			//supervisor
			const workSessionID = '';
			//prompts
			//fi

			const data = {
				employer:{
					companyName: companyName,
					companyAddress: companyAddress,
					cgtFieldIds: selectedFields 
				},
				session:{

				},
				supervisor:{

				},
				prompts:{

				},
				fi:{

				}
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


