<?php //HW5 - inc_login.php
//this page lets people login to the site

//define function
function checkLogin($email, $password) {
	if ($email == "user@user.com" && $password == "12345") {
		echo '<p>You are now logged in!</p>';
	}	else {
			echo "<p>The email and password you entered were not found. Please try again.</p>";
	}
}

//print some introductory text
echo '<h3>Login Form</h3>';
	
//check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$problem = false; //if no problems
	
	//check for each value
	if (empty($_POST['email'])) {
		$problem = true;
		echo '<p class="text-error">Please enter your email address!</p>';
	}

	if (empty($_POST['password'])) {
		$problem = true;
		echo '<p class="text-error">Please enter a password!</p>';
	}

	if (!$problem) { //if no problems
	
		//function with parameter
		checkLogin($_POST['email'], $_POST['password']);

		//clear posted values
		$_POST = [];
	
	} else { //forgot a field
		echo '<p class="text-error">Please try again!</p>';
	}

} //end of IF handle form

//create the form
?>
<form action="login.php" method="post" class="form-inline">

	<p><label for="email">Email Address: </label><input type="email" name="email" size="30" value="<?php if (isset($_POST['email'])) { echo htmlspecialchars($_POST['email']); } ?>"></p>

	<p><label for="password">Password: </label><input type="password" name="password" size="30" value="<?php if (isset($_POST['password'])) { echo htmlspecialchars($_POST['password']); } ?>"></p>

	<p><input type="submit" name="submit" value="Login!" class="button-pill"></p>

</form>
