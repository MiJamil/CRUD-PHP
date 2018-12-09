<?php session_start(); ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

</head>

<body>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM userreg WHERE username='$user' AND password='$pass'")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
}
 else {
?>
	<div class="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
				</ul>
			</div>
		</div>
	</nav>
    <form class="form-signin" method="POST" action="">       
      <h1 class="form-signin-heading">Log in</h1>
      <h4>Don't have an account? <a href="register.php">Create Now.</a></h4>
      <div class="inputWithIcon inputIconBg"> 
        <input type="text" class="form-control" name="username" placeholder="Enter username" required="">
        <i class="fa fa-user" aria-hidden="true"></i>
      </div>
      <br>
      <div class="inputWithIcon inputIconBg">
        <input type="password" class="form-control" name="password" placeholder="Password" required="">
        <i class="fa fa-lock" aria-hidden="true"></i>
      </div>    
        <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe">Remember me</label>
        <label class="link"><a href="#">Forgot Password ?</a></label>
      <button class="btn btn-lg btn-info btn-block" type="submit" name="submit" value="Submit">Login</button>   
    </form>
  </div>
<?php
}
?>
</body>
</html>
