<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

</head>

<body>
	<div class="container">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<h1 class="form-signin-heading">Welcome to my page!</h1>
		
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");	
		$getname=$_SESSION['valid'];				
		$result = mysqli_query($mysqli, "SELECT * FROM userreg WHERE username='$getname'");
		$readdata = mysqli_fetch_assoc($result);
	?>

		<h3>Hi, <?php echo $_SESSION['name'] ?> ! <br/></h3>
		<ul class="list-group">
  			<li class="list-group-item">Name: <?php echo $readdata['name'];?></li>
  			<li class="list-group-item">Objective: <?php echo $readdata['objective'];?></li>
 			<li class="list-group-item">Education: <?php echo $readdata['edu'];?></li>
 			<li class="list-group-item">Religion: <?php echo $readdata['religion'];?></li>
			<li class="list-group-item">Email: <?php echo $readdata['email'];?></li>
			<li class="list-group-item">Username: <?php echo $readdata['username'];?></li>
			<li class="list-group-item"><a href="edit.php?id=<?php echo $readdata['id'];?>">Edit Profile</a> / <a href="delete.php?id=<?php echo $readdata['id'];?>">Delete Profile</a> </li>
		</ul>

		<br/>
		<button class="btn btn-danger"><a style="color: white" href='logout.php'>Logout</a></button>
		<br/><br/>

	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a href='login.php' class='footer'>Login</a> | <a href='register.php' class='footer'>Register</a>";
	}
	?>

	</div>
</body>
</html>
