<?php
session_start();

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> handy services </title>
    
      <link rel="stylesheet" href="css/style1.css">

  
</head>

<body>
  <div class="wrapper">
	<div class="container">
		<h1>Welcome</h1>
		
		<form method="post" action="login.php">

		<input type="text" placeholder="Username" name="user_name">
			<input type="password" placeholder="Password" name="user_pass">
			<button type="submit" id="login-button" name="login" >Login</button>
		</form>
	</div>
	</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
<?php
include("includes/connect.php");

if(isset($_POST['login'])) {

	$user_name = mysql_real_escape_string($_POST['user_name']);
	$user_pass = mysql_real_escape_string($_POST['user_pass']);
	$encrypt=md5($user_password);
	$admin_query = "select * from admin where user_name = '$user_name' AND user_pass = '$user_pass'";
	$run= mysql_query($admin_query);

	if(mysql_num_rows($run)>0) {
		$_SESSION['user_name'] = $user_name;
		echo "<script>window.open('index.php','_self')</script>";
	}
	else {
		echo"<script>alert('User name or password is incorrect ')</script>";
	}
}
?>