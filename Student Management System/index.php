<?php
	
	error_reporting(0);
	session_start();
	session_destroy();

	if($_SESSION['message'])
	{
		$message=$_SESSION['message'];

		echo "<script type='text/javascript'>

		alert('$message');

			</script>";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>
	.input_txt {
	  width: 410px;
	  height: 100px;
	  resize: none;
	  overflow-wrap: break-word;
	  word-wrap: break-word;
	  overflow: auto;
	  padding: 10px;
	  font-size: 16px;
	  border: 1px solid blue;
	}

	</style>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

	<nav>
		<label class="logo">University of Technology</label>

		<ul>
			<li><a href="">Home</a></li>
			<li><a href="">Contact</a></li>
			<li><a href="">Admission</a></li>
			<li><a href="login.php" class="btn btn-primary">Login</a></li>
		</ul>
	</nav>


	<div class="section1">
		
		<label class="img_text">We Teach Students With Care</label>
		<img class="main_img" src="School_classroom.jpg">
	</div>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="welcome_img" src="university.jpg">
				
			</div>

			<div class="col-md-8">

				<h1>About University of Technology</h1>

				<p align="justify">Founded in 1987, the University of Technology is a leading institution of higher learning located in Nova City, a fast-growing technological hub. With a strong focus on innovation, research, and practical application, it has become a cornerstone of progress in science, engineering, and digital technologies. The university offers programs in fields such as Computer Science, Engineering, Artificial Intelligence, Business Technology, and Environmental Sciences—designed to meet both current industry needs and future challenges. The university hosts over 300 active research projects annually in areas such as machine learning, sustainable engineering, and data science. With over 18,000 students and 1,200 faculty members from around the world, it fosters a diverse, inclusive, and collaborative academic environment supported by cutting-edge labs and research centers. Through global partnerships and a strong commitment to entrepreneurship, the University of Technology continues to shape the next generation of visionary thinkers and leaders.</p>
				
			</div>
			

		</div>
		

	</div>

	<br><br><br><hr>


	<center>
		<br>
		<h1 >Our Teachers</h1>
	</center>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="teacher" src="teacher1.jpg">

				<p><b>Dr. Elena Carter -</b> A distinguished lady professor specializing in Data Science and Machine Learning.</p>
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="teacher2.jpg">
				<p align="justify"> <b>Mr. Tobias Hawkins -</b> A leading male professor in  the<br> field of Cybersecurity, focusing on ethical hacking and <br> network security.</p>
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="teacher3.jpg">
				<p align="justify"> <b>J. Samuel Armitage -</b> A renowned male professor of <br> Partial Differential Equations, known for contributions <br> to mathematical modeling and analysis.</p>
				
			</div>
			

		</div>
		

	</div>



	<br><br><br><hr>


	<center>
		<br>
		<h1>Our Courses</h1>
	</center>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="teacher" src="cyber_security.jpg">
				<h3>Cyber Security</h3>
				<div style="width: 315px; height: 150px; overflow: hidden; border: null;">
  					<p align="justify">This course introduces fundamental concepts in cyber security, including threat analysis, risk management, cryptography, and network protection. Students will gain the skills necessary to identify vulnerabilities, implement security measures, and address emerging digital threats across various sectors.</p>
				</div>
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="mathematics.jpg">
				<h3>Partial Differential Equations</h3>
				<div style="width: 315px; height: 150px; overflow: hidden; border: null;">
  					<p align="justify">Focusing on theoretical and practical aspects, this course examines methods for solving partial differential equations. Students will apply these techniques to model physical, engineering, and financial systems, developing analytical skills essential for advanced scientific study.</p>
				</div>
			</div>


			<div class="col-md-4">

				<img class="teacher" src="data_science.jpg">
				<h3>Data Science</h3>
				<div style="width: 315px; height: 150px; overflow: hidden; border: null;">
  					<p align="justify">This course provides a foundation in data science, covering statistical methods, machine learning, data management, and visualization. Students will learn to derive insights from complex datasets and apply data-driven strategies across diverse professional fields.</p>
				</div>
				
			</div>
			

		</div>
		

	</div>


	<br><br><br><hr>

	<center>
		<h1 class="adm" align="center">Admission Form</h1>

	</center>


	<div align="center" class="admission_form">

		<form action="data_check.php" method="POST">
			
		<div class="adm_int">
			<label class="label_text">Name</label>
			<input class="input_deg" type="text" name="name">
		</div>

		<div class="adm_int">
			<label class="label_text">Email</label>
			<input class="input_deg" type="text" name="email">
		</div>

		<div class="adm_int">
			<label class="label_text">Phone</label>
			<input class="input_deg" type="text" name="phone">
		</div>
		<div class="adm_int">
			<label class="label_text">Message</label>
			<textarea class="input_txt" name="message"></textarea>
		</div>

		<div class="adm_int" >
			
			<input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply">
		</div>


		</form>
		
	</div>


	<footer>
		<h3 class="footer_text">All @copyright reserved by Tech Team Dhaka</h3>
	</footer>


</body>
</html>