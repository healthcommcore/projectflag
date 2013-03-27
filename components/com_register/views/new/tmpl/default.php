<?php

defined ( '_JEXEC') or die ('Restricted access');
	// $buttonurl =  "images/M_images/printButton.png";
	
	// IF edit mode, verify permissions
	//	account gid
	//	current username allowed for patient data
	$task =JRequest::getVar('task', '');
	if ( $task == 'edit' && $this->user) {
	
		$edit = true;
	
	
	}
	else $edit = false;
		$dobarray = date_parse($this->user->dob);
		// print_r($dobarray);
		
		// echo $dobarray[day];
	

?>
						<script language="javascript" type="text/javascript">
	<!--
		function isBlank(val) {
			if (val == null || val == "") return true;
			for(var i=0;i<val.length;i++) {
				if ((val.charAt(i)!=' ')&&(val.charAt(i)!="\t")&&(val.charAt(i)!="\n")&&(val.charAt(i)!="\r")){return false;}
				}
			return true;
				
		}
		
 		function checkForm(form) {
	
				var msg = "Please specify ";

				var flag = false;
				var howlearned;
				var relatedyn;
				
				if (isBlank(form.firstname.value)) {
					msg += "<?php echo 'your first name'; ?>\n";
				}
				if (isBlank(form.lastname.value)) {
					msg += "<?php echo 'your last name'; ?>\n";
				}
				if (isBlank(form.email.value)) {
					msg += "<?php echo 'your email'; ?>\n";
				}
				if (isBlank(form.address.value)) {
					msg += "<?php echo 'your address'; ?>\n";
				}
				if (isBlank(form.city.value)) {
					msg += "<?php echo 'your city'; ?>\n";
				}
				if (isBlank(form.state.value)) {
					msg += "<?php echo 'your state'; ?>\n";
				}
				// Zip is not required for all countries
				if (isBlank(form.year.value)) {
					msg += "<?php echo 'your birth year'; ?>\n";
				} else {
					if ( (form.year.value > 1900) && !isNaN(form.year.value) ) {
					} else 	msg += "<?php echo 'a valid birth year'; ?>\n";
				}
				if (form.month.selectedIndex == 0) {
					msg += "<?php echo 'your birth month'; ?>\n";
				}
				if (isBlank(form.day.value)) {
					msg += "<?php echo 'your birth day'; ?>\n";
				} else {
					if ( (form.day.value > 0) && (form.day.value <= 31 )) {
					} else 	msg += "<?php echo 'a valid birth day'; ?>\n";
				}
				/*
				if (form.year.selectedIndex == 0) {
					msg += "<?php echo 'your year of birth'; ?>\n";
				}
				if (form.day.selectedIndex == 0) {
					msg += "<?php echo 'your day of birth'; ?>\n";
				}
				*/

				// alert(form.phonetype.selectedIndex );
				if (form.phonetype.selectedIndex == 0) {
					msg += "<?php echo 'your phone type'; ?>\n";
				}

				if (isBlank(form.phoneno.value)) {
					msg += "<?php echo 'your phone number'; ?>\n";
				}


				for (var i=0; i < form.howlearned.length; i++){
					if (form.howlearned[i].checked) {
						flag = true;
						howlearned = form.howlearned[i].value;
					}
				}
				if (flag == false) {
					msg += "<?php echo 'how you learned about us'; ?>\n";
				}
				flag = false;
				if ((howlearned == "Other") && (isBlank(form.foundusother.value)) ) {
					msg += "<?php echo 'how you learned about us'; ?>\n";
				}

				for (var i=0; i < form.currentpatient.length; i++){
					if (form.currentpatient[i].checked) flag = true;
				}
				if (flag == false) {
					msg += "<?php echo 'whether you are a current patient'; ?>\n";
				}
				flag = false;
				
				for (var i=0; i < form.relatedyn.length; i++){
					if (form.relatedyn[i].checked) {
						flag = true;
						relatedyn = form.relatedyn[i].value;
					}
				}
				if (flag == false) {
					msg += "<?php echo 'whether you are related'; ?>\n";
				}
				if ((relatedyn == "Yes") && (isBlank(form.yesrelated.value)) ) {
					msg += "<?php echo 'how you are related'; ?>\n";
				}
			
			
				/* 
				if (isBlank(form.mm_email.value) || !isEmail(form.mm_email.value)) {
					msg += "a valid email\n";
				}
				*/
				/* 
				
				*/	
						
					
				if (msg != "Please specify ") {
					alert(msg);
					return false;	
				}
				else				
					return true;

		}	
		//-->
		</script>
<?php	
		if ( ! $edit ) {
?>
	
<div class="componentheading">Registration</div>
<p>
There are <strong>TWO</strong> ways you can join Project FLAG:
</p>
<ol>
  <li>CALL TOLL-FREE <strong>1 (800) 828-6622, option #1</strong>. </li>
  <li>Fill out the form below</li>
</ol>
<p> The FLAG Study Manager will answer any questions you may have. You can also request that she mail you the materials to be completed to join Project FLAG.</p>

<?php } 
?>

<form action="index.php" method="post" onSubmit="return checkForm (this)">
<table cellpadding="5" cellspacing="0" border="0" width="98%" class="contentpane" id="registrationTable">
<?php	
		if ( $edit ) {
?>
        <tr>
        <td class="titleCell">
        	ID :
        </td>
        
        <td>
        <input type="hidden" name="id"  value="<?php echo $this->user->id; ?>" />
        <?php if ($this->user->id > 0) echo $this->user->id; ?>
 		</td>
               
        </tr>
<?php } ?>
  <tr>
    <td class="titleCell">First Name:</td>
    <td class="fieldCell"><input class="inputbox" type="text" size="40" mosReq="1" mosLabel="First Name" id="firstname" name="firstname" value="<?php echo ( $edit) ? $this->user->firstname: ''; ?>" />
    </td>
  </tr>
  <tr>
    <td class="titleCell">Last Name:</td>
    <td class="fieldCell"><input class="inputbox" type="text" size="40" mosReq="1" mosLabel="Last Name" id="lastname" name="lastname" value="<?php echo ( $edit) ? $this->user->lastname: ''; ?>" />
    </td>
  </tr>
  <tr>
    <td class="titleCell">E-mail:</td>
    <td class="fieldCell"><input type="text" id="email" name="email" mosReq="1" mosLabel="E-mail:" size="40" value="<?php echo ( $edit) ? $this->user->email: ''; ?>" class="inputbox" />
    </td>
  </tr>
  <tr id="cbfr_73">
    <td colspan="2" class="delimiterCell">What is your date of birth?</td>
  </tr>
  <tr id="cbfr_61">
    <td class="titleCell">Birth Date (month/day/year):</td>



    <td colspan="1" class="fieldCell">
	<select name="month" id="month" class="inputbox">
        <option value="" <?php echo ($edit && ($dobarray[month] > 0) ) ? '': 'selected="selected"' ?> >Month</option>
        <?php 
		$MonthNames = array( 1 => 'January', 2 => 'February',3 => 'March',4 => 'April', 5 => 'May',
			6 => 'June', 7 =>'July', 8 => 'August',9 => 'September', 10 => 'October',11=> 'November',12 => 'December');

		foreach ($MonthNames as $key=> $month) { ?>
        <option value="<?php echo $key?>" <?php echo ($edit && ($dobarray[month] == $key) ) ? 'Selected': '' ?>><?php echo $month?></option>
        <?php } ?>
      </select>
	<input type="text" id="day" name="day"  size="2" value="<?php echo ( $edit) ? $dobarray[day]:'' ?>" class="inputbox" />
	<input type="text" id="year" name="year"  size="4" value="<?php echo ( $edit) ? $dobarray[year]:'' ?>" class="inputbox"  />
	
	
	<!--select name="year" id="year" class="inputbox">
        <option value="" selected="selected">Year</option>
        <?php 
		$YearStart = 1902;
		$YearEnd = date('Y'); 

		for ($year = $YearStart; $year <= $YearEnd; $year++) { ?>
        <option value="<?php echo $year?>"><?php echo $year?></option>
        <?php } ?>
      </select>

 
 	<select name="day" id="day" class="inputbox">
        <option value="" selected="selected">Day</option>
        <?php 
		$DayStart = 1;
		$DayEnd = 31; 
		
		for ($day = $DayStart; $day <= $DayEnd; $day++) { ?>
        <option value="<?php echo $day?>" ><?php echo $day?></option>
        <?php } ?>
      </select-->

    </td>

  </tr>
  <td colspan="2" class="delimiterCell">Your Address</td>
  </tr>
  <tr id="cbfr_55">
    <td class="titleCell">Address:</td>
    <td colspan="1" class="fieldCell"><input class="inputbox"  mosReq="1" mosLabel="Address"  size='30'   maxlength='100'  type="text" name="address" value="<?php echo ( $edit) ? $this->user->address: ''; ?>" /></td>
  </tr>
  <tr id="cbfr_80">
    <td class="titleCell">Address 2:</td>
    <td colspan="1" class="fieldCell"><input class="inputbox"  mosReq="0" mosLabel="Address 2"  size='30'   maxlength='100'  type="text" name="addresstwo" value="<?php echo ( $edit) ? $this->user->addresstwo: ''; ?>" /></td>
  </tr>
  <tr id="cbfr_57">
    <td class="titleCell">City:</td>
    <td colspan="1" class="fieldCell"><input class="inputbox"  mosReq="1" mosLabel="City"  size='30'   maxlength='100'  type="text" name="city" value="<?php echo ( $edit) ? $this->user->city: ''; ?>" /></td>
  </tr>
  <tr id="cbfr_58">
    <td class="titleCell">State/ Province:</td>
    <td colspan="1" class="fieldCell"><input class="inputbox"  mosReq="1" mosLabel="State"  size='30'   maxlength='100'  type="text" name="state" value="<?php echo ( $edit) ? $this->user->state: ''; ?>" />
    </td>
  </tr>
  <tr id="cbfr_59">
    <td class="titleCell">Postal Code:</td>
    <td colspan="1" class="fieldCell"><input class="inputbox"  mosReq="1" mosLabel="Zip Code"  size='20'   maxlength='20'  type="text" name="zip" value="<?php echo ( $edit) ? $this->user->zip: ''; ?>" />
    </td>
  </tr>
  <tr id="cbfr_59">
    <td class="titleCell">Country (if outside U.S.):</td>
    <td colspan="1" class="fieldCell"><input class="inputbox"  mosReq="1" mosLabel="Country"  size='30'   maxlength='100'  type="text" name="country" value="<?php echo ( $edit) ? $this->user->country: ''; ?>" />
    </td>
  </tr>
  <tr id="cbfr_60">
    <td colspan="2" class="delimiterCell">Phone Number with international area codes if outside U.S."</td>
  </tr>
  <tr>
    <td colspan="2" class="descriptionCell">Please tell us the phone number where it's best for us to reach you, and let us know what type of phone it is.</td>
  </tr>
  <tr id="cbfr_67">
    <td class="titleCell">Phone type:</td>
    <td colspan="1" class="fieldCell"><select name="phonetype" class="inputbox" size="0"  mosReq="1" mosLabel="Phone type">
        <option value="">Select</option>
        <option value="Home" <?php echo ($edit && ($this->user->phonetype == 'Home') ) ? 'Selected': '' ?>>Home</option>
        <option value="Work" <?php echo ($edit && ($this->user->phonetype == 'Work') ) ? 'Selected': '' ?>>Work</option>
        <option value="Cell" <?php echo ($edit && ($this->user->phonetype == 'Cell') ) ? 'Selected': '' ?>>Cell</option>
      </select>
    </td>
  </tr>
  <tr id="cbfr_68">
    <td class="titleCell">Number:</td>
    <td colspan="1" class="fieldCell"><input class="inputbox"  mosReq="1" mosLabel="Number"  size='30'   maxlength='50'  type="text" name="phoneno" value="<?php echo ( $edit) ? $this->user->phoneno: ''; ?>" /></td>
  </tr>
  <tr id="cbfr_66">
    <td colspan="2" class="delimiterCell">How did you learn about this web site?</td>
  </tr>
  <tr>
    <td colspan="2" class="descriptionCell">If "Other" please explain in the field below.</td>
  </tr>
  <tr id="cbfr_65">
    <td class="titleCell">Found web site:</td>
    <td colspan="1" class="fieldCell"><table class='cbMulti'>
        <tr>
          <td><input type="radio" name="howlearned" mosReq="1" size="1" mosLabel="Found web site" value="Dana-Farber" id="howlearned0" <?php echo ($edit && ($this->user->howlearned == 'Dana-Farber') ) ? 'checked': '' ?>/>
            <label for="howlearned0">Dana-Farber</label></td>
          <td><input type="radio" name="howlearned"  size="1" mosLabel="Found web site" value="Memorial Sloan-Kettering" id="howlearned1" <?php echo ($edit && ($this->user->howlearned == 'Memorial Sloan-Kettering') ) ? 'checked': '' ?>/>
            <label for="cb_howlearned1">Memorial Sloan-Kettering</label></td>
        </tr>
        <tr>
          <td><input type="radio" name="howlearned"  size="1" mosLabel="Found web site" value="MD Anderson" id="howlearned2" <?php echo ($edit && ($this->user->howlearned == 'MD Anderson') ) ? 'checked': '' ?>/>
            <label for="howlearned2">MD Anderson</label></td>
          <td><input type="radio" name="howlearned"  size="1" mosLabel="Found web site" value="GSI" id="howlearned3" <?php echo ($edit && ($this->user->howlearned == 'GSI') ) ? 'checked': '' ?> />
            <label for="cb_howlearned3">GSI</label></td>
        </tr>
        <tr>
          <td><input type="radio" name="howlearned"  size="1" mosLabel="Found web site" value="Life Raft" id="howlearned4" <?php echo ($edit && ($this->user->howlearned == 'Life Raft') ) ? 'checked': '' ?> />
            <label for="howlearned4">Life Raft</label></td>
          <td><input type="radio" name="howlearned"  size="1" mosLabel="Found web site" value="A family member" id="howlearned5" <?php echo ($edit && ($this->user->howlearned == 'A family member') ) ? 'checked': '' ?>/>
            <label for="cb_howlearned5">A family member</label></td>
        </tr>
        <tr>
          <td><input type="radio" name="howlearned"  size="1" mosLabel="Found web site" value="Other" id="howlearned6" <?php echo ($edit && ($this->user->howlearned == 'Other') ) ? 'checked': '' ?> />
            <label for="howlearned6">Other</label></td>
        </tr>
      </table></td>
  </tr>
  <tr id="cbfr_76">
    <td class="titleCell">If Other:</td>
    <td colspan="1" class="fieldCell"><input class="inputbox"  mosReq="0" mosLabel="If Other"  size='25'   maxlength='25'  type="text" name="foundusother" value="<?php echo ( $edit) ? $this->user->foundusother: ''; ?>" /></td>
  </tr>
  <tr id="cbfr_75">
    <td colspan="2" class="delimiterCell">Are you currently a patient at any of the following institutions?</td>
  </tr>
  <tr id="cbfr_74">
    <td class="titleCell">Patient at:</td>
    <td colspan="1" class="fieldCell"><table class='cbMulti'>
        <tr>
          <td><input type="radio" name="currentpatient" mosReq="1" size="1" mosLabel="Patient at" value="Yes, I'm a patient at Dana-Farber Cancer Institute" id="currentpatient0" <?php echo ($edit && ($this->user->currentpatient == 'Yes, I\'m a patient at Dana-Farber Cancer Institute') ) ? 
		'checked': '' ?> />
            <label for="currentpatient0">Yes, I'm a patient at Dana-Farber Cancer Institute</label></td>
        </tr>
        <tr>
          <td><input type="radio" name="currentpatient"  size="1" mosLabel="Patient at" value="Yes, I'm a patient at Memorial Sloan-Kettering Cancer Center" id="currentpatient1" <?php echo ($edit && ($this->user->currentpatient == 'Yes, I\'m a patient at Memorial Sloan-Kettering Cancer Center') ) ? 
		'checked': '' ?> />
            <label for="currentpatient1">Yes, I'm a patient at Memorial Sloan-Kettering Cancer Center</label></td>
        </tr>
        <tr>
          <td><input type="radio" name="currentpatient"  size="1" mosLabel="Patient at" value="Yes, I'm a patient at MD Anderson Cancer Center" id="currentpatient2" <?php echo ($edit && ($this->user->currentpatient == 'Yes, I\'m a patient at MD Anderson Cancer Center') ) ? 
		'checked': '' ?> />
            <label for="currentpatient2">Yes, I'm a patient at MD Anderson Cancer Center</label></td>
        </tr>
        <tr>
          <td><input type="radio" name="currentpatient"  size="1" mosLabel="Patient at" value="No, I'm not a patient at any of these institutions" id="currentpatient3"  <?php echo ($edit && ($this->user->currentpatient == 'No, I\'m not a patient at any of these institutions') ) ? 
		'checked': '' ?> />
            <label for="currentpatient3">No, I'm not a patient at any of these institutions</label></td>
        </tr>
      </table></td>
  </tr>
  <tr id="cbfr_77">
    <td colspan="2" class="delimiterCell">Are you related to an existing Project FLAG participant?</td>
  </tr>
  <tr>
    <td colspan="2" class="descriptionCell">If "Yes" please enter your relative's name in the field below.</td>
  </tr>
  <tr id="cbfr_79">
    <td class="titleCell">Relative:</td>
    <td colspan="1" class="fieldCell">
	
	<input type="radio" name="relatedyn" mosReq="1" size="1" mosLabel="Relative" value="Yes" id="relatedyn0" <?php echo ($edit && ($this->user->relatedyn == 'Yes') ) ? 
		'checked': '' ?> />
      <label for="cb_relatedyn0">Yes</label>
      <input type="radio" name="relatedyn"  size="1" mosLabel="Relative" value="No" id="relatedyn1" <?php echo ($edit && ($this->user->relatedyn == 'No')) ? 
		'checked': '' ?> />
      <label for="cb_relatedyn1">No</label>
    </td>
  </tr>
  <tr id="cbfr_78">
    <td class="titleCell">Relative&#039;s name:</td>
    <td colspan="1" class="fieldCell"><input class="inputbox"  mosReq="0" mosLabel="Relative&#039;s name"  size='40'   maxlength='40'  type="text" name="yesrelated" value="<?php echo ( $edit) ? $this->user->yesrelated: ''; ?>" /></td>
  
  
  </tr>
  <tr>
    <td colspan="2" width="100%" class="contentpaneopen">Thank you for registering with Project FLAG!</td>
  </tr>
  <tr>
    <td colspan="2">
	<input type="hidden" name="task" value="<?php echo ( $edit) ? 'update' : 'add'; ?> " />
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="submit" value="Send Registration" class="button" />
    </td>
  </tr>
</table>
</form>
