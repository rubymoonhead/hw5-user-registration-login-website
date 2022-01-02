<?php //HW5 - register.php
//this page lets people sign up for the site

//print some introductory text
echo '<h3>Sign Up Form</h3>
	<p>Sign up for VIP Specials and free monthly gifts!</p>';
	
//check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$problem = false; //no problems
	
	//check for each value
	if (empty($_POST['first_name'])) {
		$problem = true;
		echo '<p class="text-error">Please enter your first name!</p>';
	}
	
	if (empty($_POST['last_name'])) {
		$problem = true;
		echo '<p class="text-error">Please enter your last name!</p>';
	}

	if (empty($_POST['email'])) {
		$problem = true;
		echo '<p class="text-error">Please enter your email address!</p>';
	}

	if (empty($_POST['password1'])) {
		$problem = true;
		echo '<p class="text-error">Please enter a password!</p>';
	}

	if ($_POST['password1'] != $_POST['password2']) {
		$problem = true;
		echo '<p class="text-error">Your password did not match your confirmed password!</p>';
	} 
	
	if (!$problem) { //no problems

		//print message
		echo '<p class="text-success">You are now signed up!<br>But, this is a pretend sign-up...¯\_(ツ)_/¯</p>';

		//clear posted values
		$_POST = [];
	
	} else { //forgot a field
		echo '<p class="text-error">Please try again!</p>';
	}

} //end of IF handle form

//create the form
?>
<form action="register.php" method="post" class="form--inline">
	
	<p>
  <label for="first_name">First Name: </label>
  <input type="text" name="first_name" size="30" 
  value="<?php if (isset($_POST['first_name'])) { echo htmlspecialchars($_POST['first_name']); } ?>">
  </p>

	<p><label for="last_name">Last Name: </label><input type="text" name="last_name" size="30" value="<?php if (isset($_POST['last_name'])) { echo htmlspecialchars($_POST['last_name']); } ?>"></p>

	<p><label for="email">Email Address: </label><input type="email" name="email" size="30" value="<?php if (isset($_POST['email'])) { echo htmlspecialchars($_POST['email']); } ?>"></p>

	<p><label for="password1">Password: </label><input type="password" name="password1" size="30" value="<?php if (isset($_POST['password1'])) { echo htmlspecialchars($_POST['password1']); } ?>"></p>
	<p><label for="password2">Confirm Password: </label><input type="password" name="password2" size="30" value="<?php if (isset($_POST['password2'])) { echo htmlspecialchars($_POST['password2']); } ?>"></p>

	<p><input type="submit" name="submit" value="Sign Up!" class="button-pill"></p>

</form>

