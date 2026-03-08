<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "studentmanagement";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_dateOfBirth = $_POST['date'];
    $user_academicYear = $_POST['year'];
    $user_department = $_POST['department'];
    $user_cgpa = $_POST['cgpa'];
    $user_password = $_POST['password'];
    $usertype = "student";

    // CHECK if username already exists
    $check_user = "SELECT * FROM user WHERE username='$username'";
    $check_result = mysqli_query($data, $check_user);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['message'] = 'Username already exists. Try another one!';
        echo "<script type='text/javascript'>alert('Username already exists. Try another one!'); window.location.href='add_student.php';</script>";
    } else {
        // HASH the password before saving
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user(username, Email, DateOfBirth, AcademicYear, Department, CGPA, usertype, password) 
                VALUES('$username', '$user_email', '$user_dateOfBirth', '$user_academicYear', '$user_department', '$user_cgpa', '$usertype', '$hashed_password')";

        $result = mysqli_query($data, $sql);

        if ($result) {
            echo "<script type='text/javascript'>alert('Data Upload Success'); window.location.href='add_student.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Upload Failed');</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-top: 45px;
            padding-bottom: 45px;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
        <li><a href="admission.php">Admission</a></li>
        <li><a href="add_student.php">Add Student</a></li>
        <li><a href="">View Student</a></li>
        <li><a href="">Add Teacher</a></li>
        <li><a href="">View Teacher</a></li>
        <li><a href="">Add Courses</a></li>
        <li><a href="">View Courses</a></li>
    </ul>
</aside>

<div class="content">
    <center>
        <h1>Add Student</h1>

        <?php
        if (isset($_SESSION['message'])) {
            echo "<script>alert('" . $_SESSION['message'] . "');</script>";
            unset($_SESSION['message']);
        }
        ?>

        <div class="div_deg">
            <form action="add_student.php" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label>Date of Birth</label>
                    <input type="date" name="date" required style="width: 176px; height: 26px;">
                </div>
                <div>
                    <label>Academic Year</label>
                    <input type="text" name="year" required>
                </div>
                <div>
                    <label>Department</label>
                    <input type="text" name="department" required>
                </div>
                <div>
                    <label>CGPA</label>
                    <input type="number" step="0.01" name="cgpa" required>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
                </div>
            </form>
        </div>
    </center>
</div>

</body>
</html>
