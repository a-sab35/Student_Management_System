<?php

session_start();
	if(!isset($_SESSION['username']))
	{
		header("location:login.php");
	}
	elseif($_SESSION['usertype']=='student')
	{
		header("location:login.php");
	}


	$host="localhost";

	$user="root";

	$password="";

	$db="studentmanagement";


	$data=mysqli_connect($host,$user,$password,$db);

	$sql="SELECT * from admission";

	$result=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

	<link rel="stylesheet" type="text/css" href="admin.css">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

	<header class="header">
		
		<a href="">Admin Dashboard</a>

		<div class="logout">
			
			<a href="logout.php" class="btn btn-primary">Logout</a>

		</div>

	</header>


	<aside>
		
		<ul>
			
			<li>
				<a href="admission.php">Admission</a>
			</li>

			<li>
				<a href="add_student.php">Add Student</a>
			</li>

			<li>
				<a href="">View Student</a>
			</li>

			<li>
				<a href="">Add Teacher</a>
			</li>

			<li>
				<a href="">View Teacher</a>
			</li>
			<li>
				<a href="">Add Courses</a>
			</li>
			<li>
				<a href="">View Courses</a>
			</li>


		</ul>


	</aside>


	<div class="content">
		<center>
			
		<h1>Applied for Admission</h1>

		<br><br>

		<table border="1px">
			<tr>
				<th style="padding: 20px; font-size: 15px;">Name</th>
				<th style="padding: 20px; font-size: 15px;">Email</th>
				<th style="padding: 20px; font-size: 15px;">Phone</th>
				<th style="padding: 20px; font-size: 15px;">Message</th>
			</tr>


			<?php

			while($info= $result-> fetch_assoc())
			{
			?>

			<tr>
				<td style="padding: 20px;">	<?php echo "{$info['name']}"; ?></td>
				<td style="padding: 20px;">	<?php echo "{$info['email']}"; ?></td>
				<td style="padding: 20px;">	<?php echo "{$info['phone']}"; ?></td>
				<td style="padding: 20px;">	<?php echo "{$info['message']}"; ?></td>
			</tr>

			<?php
			}
			?>
		</table>
		</center>

	</div>

</body>
</html>
