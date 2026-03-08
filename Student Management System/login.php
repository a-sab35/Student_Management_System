<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "studentmanagement";

$data = mysqli_connect($host, $user, $password, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $entered_password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($data, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);


        if (password_verify($entered_password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['usertype'];

            if ($row['usertype'] == 'admin') {
                header("location:adminhome.php");
            } else if ($row['usertype'] == 'student') {
                header("location:studenthome.php");
            }
        } else {
            $_SESSION['loginMessage'] = "Incorrect Password.";
            header("location:login.php");
        }
    } else {
        $_SESSION['loginMessage'] = "Username not found.";
        header("location:login.php");
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>

	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body background="login_bg.jpg" class="body_deg">

	<center>
		

		<div class="form_deg">

			<center class="title_deg">
				Login Form

				<h4>
					<?php 

					error_reporting(0);
					session_start();
					session_destroy();
			
					echo $_SESSION['loginMessage'];
			

					?>

				</h4>
			</center>
			
			<form action="login_check.php" method="POST" class="login_form">
				
				<div>
					<label class="label_deg">Username</label>
					<input type="text" name="username">
				</div>

				<div>
					<label class="label_deg">Password</label>
					<input type="Password" name="password">
				</div>

				<div>
					
					<input class="btn btn-primary" type="submit" name="submit" value="Login">
				</div>

			</form>


		</div>

	</center>

</body>
</html>