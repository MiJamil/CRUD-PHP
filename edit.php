<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['name'];
	$objective = $_POST['objective'];
	$edu = $_POST['edu'];
	$email = $_POST['email'];
	
	
	// checking empty fields
	if(empty($name) || empty($edu) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($objective)) {
			echo "<font color='red'>Objective field is empty.</font><br/>";
		}
		
		if(empty($edu)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE userreg SET name='$name', objective='$objective', edu='$edu', email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM userreg WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$objective = $res['objective'];
	$edu = $res['edu'];
	$email = $res['email'];

}
?>
<html>
<head>	
	<title>Edit Profile</title>
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
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<br/><br/>
	
		<form name="form1" method="post" action="edit.php">
			<ul class="list-group">
  				<li class="list-group-item">Name: <input type="text" name="name" value="<?php echo $name;?>"></li>
  				<li class="list-group-item">Objective: <input type="text" name="objective" value="<?php echo $objective;?>"></li>
 				<li class="list-group-item">Education: <input type="text" name="edu" value="<?php echo $edu;?>"></li>
				<li class="list-group-item">Email: <input type="text" name="email" value="<?php echo $email;?>"></li>
			</ul>
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
			<input type="submit" name="update" value="Update">
		</form>
	</div>
</body>
</html>
