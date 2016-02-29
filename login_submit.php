<?php

/*** begin our session ***/
session_start();

/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['phpro_username'], $_POST['phpro_password']))
{
    $message = 'Please enter a valid username and password';
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['phpro_username']) > 20 || strlen($_POST['phpro_username']) < 4)
{
    $message = 'Incorrect Length for Username';
}
elseif (strlen( $_POST['phpro_password']) > 20 || strlen($_POST['phpro_password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['phpro_password']) > 20 || strlen($_POST['phpro_password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['phpro_username']) != true)
{
    /*** if there is no match ***/
    $message = "Username must be alpha numeric";
}
/*** check the password has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['phpro_password']) != true)
{
        /*** if there is no match ***/
        $message = "Password must be alpha numeric";
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $phpro_username = filter_var($_POST['phpro_username'], FILTER_SANITIZE_STRING);
    $phpro_password = filter_var($_POST['phpro_password'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    //$phpro_password = sha1( $phpro_password );
       
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
		$data = mysql_query("SELECT user_name FROM users WHERE user_name = '$phpro_username' AND passw = '$phpro_password' ;");
		
		if (mysql_num_rows($data) == 0) {
			die("Sorry! Your username or password is invalid. Please try again." .mysql_error());
		}else{
			while($row = mysql_fetch_assoc($data))
			{
				$message =  $phpro_username . ", you are now logging in!"  ;	  
				$_SESSION['phpro_username'] = $phpro_username;	
			}
		}
		mysql_close($dbconnection);
    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later ';
    }
}

?>

<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="login.css">
</head>
<body onload="setTimeout(function(){window.location = 'http://cs1.ucc.ie/~fzs1/gg/project';}, 3000)">
<h1><?php echo $message;?></h1>
<div id="coverimage">
		    <img src="images/crowd.jpeg" alt="crowd">
			<div id="wrapper">
<div id="loading">
<img id="loading-image" src="http://cdn.nirmaltv.com/images/generatorphp-thumb.gif" alt="Loading..." />
</div>

</div>
		</div>
</body>
</html>