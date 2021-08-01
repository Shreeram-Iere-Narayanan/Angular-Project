<?php 
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();

?>

<HTML>
<style>
body{
	background: wheat;
}
input{
    width: 50%;
    margin: 20px;
    border-radius: 24px;
    background-image: linear-gradient(to right, tan, white);
    height: 30px;
}
input[type=submit]{
	background: brown;
    color: white;
}
form{
	display: inline-grid;
}
img{
	width: 10%;
    margin-right: 600px;
    border-radius: 24px;
    background: tan;
    margin-left: 600px;
}
</style>
<HEAD>
</HEAD>
<BODY>

<h1 style="display:inline-block;"> Enterprisee Application Development - Assignment 2 </h1>

<div>
<form action="index.php" method="POST">
<center>
	<input type="text" name="username" placeholder="Enter username">
	<input type="password" name="password" placeholder="Enter password">
	<img src="capcha.php" /><input type="text" name="captcha" placeholder="Enter the values in the image" />
	<input type="submit" name="submit" value="Login" />
</form>
</center>
</div>

</BODY>
</HTML>


<?php

	if(isset($_POST) & !empty($_POST)){
		if($_POST['captcha'] == $_SESSION['code']){
			if(isset($_REQUEST['submit'])){
				
				$username = $_REQUEST['username'];
				$passowrd = $_REQUEST['password'];
				
				$dbuser = "sinarayanan";  
				$dbpass = "IceCream2692"; 
				$db = "SSID"; 
				$connect = OCILogon($dbuser, $dbpass, $db); 
				if (!$connect)  
					{ 
						echo "Error! Cannot be connected to the database"; 
						exit; 
					} 
					
				$query = "SELECT * FROM USERS WHERE USERNAME='".$username."'"; 
				$stmt = OCIParse($connect, $query); 
				if(!$stmt) 
					{ 
					?>  
					<div>
					<h3>Error!</h3>
					<p>An error occurred in parsing the SQL </p>
					</div>
					<?php
					exit; 
					} 
				OCIExecute($stmt);
			   
				if(OCIFetch($stmt)) {
				   
					if($username==OCIResult($stmt,"USERNAME")){
		
					   if($passowrd == OCIResult($stmt,"PASSWORD")){
						$_SESSION['username'] = $username;
						echo "<script>window.location='display_data.php'</script>";
					   }else{
							echo "<p><center>Incorrect Password. Please Try again!</center></p>";
					   }
					}
				}else{
						echo "<p><center>Please enter a valid user name</center></p>";
				   }
		}
		}else{
			echo "<center>Capcha Invalid</center>";
		}
	}

	
?>
