<html>
<head>
	<title>Register</title>
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
	$name = $_POST['name'];
	$objective = $_POST['objective'];
	$edu = $_POST['education'];
	$religion=$_POST['religion'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($name == "" ||$objective == "" || $edu == "" || $religion == "" || $email == "" || $user=="" || $pass=="") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO userreg(name,objective,edu,religion, email, username, password) VALUES('$name','$objective','$edu','$religion', '$email', '$user', '$pass')")
			or die("Could not execute the insert query.");
			
		echo "<span id='rg'>Registration completed successfully! Please Login.</span>";
		echo "<br/>";
		echo "<a href='login.php' id='lg'>Login</a>";
	}
} else {
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
      <h1 class="form-signin-heading">Register</h1>
      <h4>Already have an account? <a href="login.php">Login Now</a></h4>
      <div class="inputWithIcon inputIconBg"> 
        <input type="text" class="form-control" name="name" placeholder="Enter your name" required="">
        <i class="fa fa-pen" aria-hidden="true"></i>
      </div>
      <br>
      <div class="inputWithIcon inputIconBg"> 
        <input type="text" class="form-control" name="objective" placeholder=" Enter your objective" required="">
        <i class="fa fa-star" aria-hidden="true"></i>
      </div>
      <br>
      <div class="inputWithIcon inputIconBg"> 
        <input type="text" class="form-control" name="education" placeholder=" Enter your education" required="">
        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
      </div>
      <br>
      <div class="inputWithIcon inputIconBg"> 
        <input type="text" class="form-control" name="religion" placeholder=" e.g. Islam, Hindu etc." required="">
        <i class="fa fa-mosque" aria-hidden="true"></i>
      </div>
      <br>
      <div class="inputWithIcon inputIconBg"> 
        <input type="text" class="form-control" name="email" placeholder="Enter your email" required="">
        <i class="fa fa-envelope" aria-hidden="true"></i>
      </div>
      <br>
      <div class="inputWithIcon inputIconBg"> 
        <input type="text" class="form-control" name="username" placeholder="Enter a username" required="">
        <i class="fa fa-user" aria-hidden="true"></i>
      </div>
      <br>
      <div class="inputWithIcon inputIconBg">
        <input type="password" class="form-control" name="password" placeholder="Password" required="">
        <i class="fa fa-key" aria-hidden="true"></i>
      </div>
      <br>
      <button class="btn btn-lg btn-info btn-block" type="submit" name="submit" value="Submit">Register</button>   
    </form>
  </div>


<?php
}
?>
</body>
</html>
