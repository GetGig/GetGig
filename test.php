<?php
/*** begin our session ***/
session_start();

$name = $_POST['name'];
$datepicker = $_POST['datepicker'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$uType = $_POST['uType'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$message = '';
$message1 = '';


	//Check username
	if(!empty( $_POST['username'])) 
	{
		if (strlen($_POST['username']) < 4)
		{
			$message1 = 'Incorrect Length for Username- too small';
		}
		elseif (ctype_alnum($_POST['username']) != true)
		{
			$message1 = "Username must be alpha numeric";
		}
		else
		{
			$message1 = 'Username added.';
		}
		
	}
	else 
	{
		$message1 = 'Please enter a valid username';
	}

	echo '<p>' . $message1 . '</p>';
	
	//Check Name
	if(!empty( $_POST['name'])) 
	{
		if (strlen($_POST['name']) < 4)
		{
			$message2 = 'Incorrect Length for Name- too small';
		}
		/*elseif (ctype_alnum($_POST['name']) != true)
		{
			$message2 = "Name must be alpha numeric";
		}*/
		else
		{
			$message2 = 'Name added.';
		}
		
	}
	else 
	{
		$message2 = 'Please enter a valid name';
	}

	echo '<p>' . $message2 . '</p>';

	//Check password
	if(!empty( $_POST['password'])) 
	{
		if (($_POST['password']) == ($_POST['password1']))
		{
			if (strlen($_POST['password']) < 4)
			{
				$message = 'Incorrect Length for Password- too small';
			}
			elseif (ctype_alnum($_POST['password']) != true)
			{
				$message = "Password must be alpha numeric";
			}
			else
			{
				$message = 'Password added.';
			}
		}
		else
		{
			echo 'Passwords do not match';
		}
	}
	else 
	{
		$message = 'Please enter a valid password';
	}
	echo '<p>' . $message . '</p>';
	
	

	//Check dob 
	if(empty($_POST['datepicker']))
	{
		echo '<p>Please enter valid date of birth in the format dd/mm/yyyy</p>';
	}
	
	//Check address 
	if(empty($_POST['address']))
	{
		echo '<p>Please enter valid address</p>';
		if (ctype_alnum($_POST['username']) != true)
		{
			echo '<p>Address must be alpha numeric</p>';
		}
	}
	

	//Check phone number 
	if(empty($_POST['phone']))
	{
		if(!is_numeric($phone)) 
		{
			echo '<p>Please enter valid numeric phone number</p>';
		}
	}
	
	//Check email
	$sanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
	if (!(filter_var($sanitized, FILTER_VALIDATE_EMAIL)))
	{
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $sanitized))
		{
			echo "<p>Please enter valid email address</p>";
		}
	}
	
	if( $_POST['form_token'] != $_SESSION['form_token'])
	{
		echo 'Invalid form submission';
	}
	
	
    /*** if we are here the data is valid and we can insert it into database ***/
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	
	
    /*** now we can encrypt the password ***/
   // $phpro_password = sha1( $phpro_password );
    
    /*** connect to database ***/	
	
	/*** mysql hostname ***/
    $servername = 'localhost';

    /*** mysql username ***/
    $username = 'fzs1';

    /*** mysql password ***/
    $password = 'ruraigop';

    /*** database name ***/
    $dbname = '2017_project_GETGIG';
    try
    {
		$dbconnection = mysql_connect($servername, $username, $password);
		 if ( ! $dbconnection )
		 {
			die('Unable to connect!');
		 }
			
		 // Try to select database
		 $dbselection = mysql_select_db($dbname);
		 if ( ! $dbselection )
		 {
			die('Unable to select database');
		 }	
		//execute the SQL query and return records
		$sql = "INSERT INTO users(username,datepicker,name,email,phone,address,uType,gender,password) VALUES ( '$username', '$datepicker', '$name', '$email', '$phone', '$address', '$uType', '$gender', '$password');";

		$dbresult = mysql_query($sql);
		if ( ! $dbresult )
		{
			die('Error in query ' . mysql_error());
		}    
		
		mysql_close($dbconnection);
		
        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );

        /*** if all is done, say thanks ***/
        $message = 'New user added';
		
		
		
    }
    catch(Exception $e)
    {
        /*** check if the username already exists ***/
        if( $e->getCode() == 23000)
        {
            $message = 'Username already exists';
        }
        else
        {
            /*** if we are here, something has gone wrong with the database ***/
            $message = 'We are unable to process your request. Please try again later';
        }
    
}
?>

<html>
<head>
<title>Login</title>

				
</head>
<body>
<p> 
</body>
</html>