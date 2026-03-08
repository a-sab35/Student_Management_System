<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
}

$username = $_SESSION['username']; 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Dashboard</title>

    <link rel="stylesheet" type="text/css" href="admin.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Bootstrap Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

    <header class="header">
        
        <a href="">Student Dashboard</a>

        <div class="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>

    </header>

    <aside>
        <ul>
            <li><a href="">My Result</a></li>
            <li><a href="">My Courses</a></li>
            <li><a href="">Semester Fee</a></li>
            <li><a href="">Semester Schedule</a></li>
        </ul>
    </aside>

    <div class="content">

		<center>
			
	    <a class="btn btn-success" style="margin-top: 20px; pointer-events: none; font-size: 18px;">
	        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
	        <?php echo $username; ?> is logged in.
	    </a>


        <h1>Student Dashboard</h1>

		</center>

    </div>

</body>
</html>
