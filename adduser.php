<?php

/*** begin our session ***/
session_start();

/*** set a form token ***/
$form_token = md5( uniqid('auth', true) );

/*** set the session form token ***/
$_SESSION['form_token'] = $form_token;
?>

<html>
<head>
<meta charset="utf-8">
<title>Register</title>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  
  
  $(function() {
    $( document ).tooltip();
  });
  </script>
  <style>
  label {
    display: inline-block;
    
  }
  </style>
  </script>
  </script>

</head>

<body>
<h2>Register</h2>
<form action="test.php" method="post">


<fieldset>
	<p><label for="username">Username</label></p>
	<p><input type="text" id="username" name="username" maxlength="20" title="Must be between 4 and 20 characters" required/>
	</p>

	<p><label for="name">Name</label></p>
	<p><input type="text" id="name" name="name" maxlength="20" title="Must be between 4 and 20 characters" required/>
	</p>
	
	<p><label for="password">Password</label></p>
	<p><input type="password" id="password" name="password" maxlength="20" title="Please enter your password again below" required/>
	</p>

	<p><label for="password1">Confirm password</label></p>
	<p><input type="password" id="password1" name="password1" maxlength="20" title="Please enter your password again" required/>
	</p>
</fieldset>

<fieldset>
	<p>
	<input type="radio" name="gender" value="M" checked> Male
	<input type="radio" name="gender" value="F"> Female
	</p>

	
	<p><label for="DOB">Date Of Birth (dd/mm/yyyy):</label></p>
	<p><input type="text" id="datepicker" name="datepicker" maxlength="10" title="Please enter in dd/mm/yyyy form only" required></p>
	</p>

	<p><label for="address">Address</label>
	<p><input type="text" id="address" name="address" maxlength="100" title="Please enter your current home address (must be more than 4 characters)" required/>
	</p>

	<p><label for="phone">Phone Number</label></p>
	<p><input type="text" id="phone" name="phone" title="Please enter your mobile number (integers only)" required/>
	<p><input type="checkbox" checked> I would like to receive texts about upcoming events
	</p>

	<p><label for="email">Email</label></p>
	<p><input type="text" id="email" name="email" maxlength="35" title="Please enter in correct email format (ie john@gmail.com)" required/>
	</p>

	<p>
	<input type="radio" name="uType" value="user" checked> User
	<input type="radio" name="uType" value="manager"> Manager
	</p>
</fieldset>

<p>
<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
<button type="reset" value="Reset">Reset</button>
<input type="submit" value="Register" />
</p>
</fieldset>
</form>
</body>
</html>