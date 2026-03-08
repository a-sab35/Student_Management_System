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

$sql = "SELECT * from user WHERE usertype='student'";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        table {
            width: 90%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            cursor: pointer;
            background-color: #f2f2f2;
            position: relative;
        }
        th i {
            margin-left: 5px;
            font-size: 12px;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .filter-container {
            margin: 20px;
        }
        .filter-container input, .filter-container select {
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 8px;
        }
    </style>
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
        <li><a href="view_student.php">View Student</a></li>
        <li><a href="">Add Teacher</a></li>
        <li><a href="">View Teacher</a></li>
        <li><a href="">Add Courses</a></li>
        <li><a href="">View Courses</a></li>
    </ul>
</aside>

<div class="content">
    <center>
    <h1>Applied for Admission</h1>

    <!-- Filter Controls -->
    <div class="filter-container">
        <input type="text" id="searchDepartment" placeholder="Filter by Department">
        <input type="text" id="searchYear" placeholder="Filter by Academic Year">
        <input type="number" step="0.01" id="cgpaMin" placeholder="CGPA Min" style="width:100px;">
        <input type="number" step="0.01" id="cgpaMax" placeholder="CGPA Max" style="width:100px;">
        <button onclick="applyFilter()" class="btn btn-success">Apply Filter</button>
        <button onclick="resetFilter()" class="btn btn-default">Reset Filter</button>
    </div>

    <table id="studentTable">
        <thead>
            <tr>
                <th onclick="sortTable(0, this)">User Name <i class="fa-solid"></i></th>
                <th onclick="sortTable(1, this)">Email <i class="fa-solid"></i></th>
                <th onclick="sortTable(2, this)">Date of Birth <i class="fa-solid"></i></th>
                <th onclick="sortTable(3, this)">Academic Year <i class="fa-solid"></i></th>
                <th onclick="sortTable(4, this)">Department <i class="fa-solid"></i></th>
                <th onclick="sortTable(5, this)">CGPA <i class="fa-solid"></i></th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($info = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $info['username']; ?></td>
                <td><?php echo $info['Email']; ?></td>
                <td><?php echo $info['DateOfBirth']; ?></td>
                <td><?php echo $info['AcademicYear']; ?></td>
                <td><?php echo $info['Department']; ?></td>
                <td><?php echo $info['CGPA']; ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    </center>
</div>

<script>
// Sorting with arrows
var sortDirection = {};

function sortTable(columnIndex, header) {
    var table = document.getElementById("studentTable");
    var tbody = table.tBodies[0];
    var rows = Array.from(tbody.rows);

    // Toggle sorting direction
    sortDirection[columnIndex] = !sortDirection[columnIndex];
    var direction = sortDirection[columnIndex] ? 1 : -1;

    // Reset all icons
    var allHeaders = table.querySelectorAll("th");
    allHeaders.forEach(function(th) {
        var icon = th.querySelector('i');
        if (icon) {
            icon.className = "fa-solid"; // reset
        }
    });

    // Set clicked header icon
    var icon = header.querySelector('i');
    if (icon) {
        if (sortDirection[columnIndex]) {
            icon.className = "fa-solid fa-arrow-up";
        } else {
            icon.className = "fa-solid fa-arrow-down";
        }
    }

    rows.sort(function(rowA, rowB) {
        var cellA = rowA.cells[columnIndex].textContent.trim().toLowerCase();
        var cellB = rowB.cells[columnIndex].textContent.trim().toLowerCase();

        var numA = parseFloat(cellA);
        var numB = parseFloat(cellB);
        if (!isNaN(numA) && !isNaN(numB)) {
            return (numA - numB) * direction;
        }

        if (cellA < cellB) return -1 * direction;
        if (cellA > cellB) return 1 * direction;
        return 0;
    });

    rows.forEach(function(row) {
        tbody.appendChild(row);
    });
}

// Filtering
function applyFilter() {
    var departmentInput = document.getElementById("searchDepartment").value.toUpperCase();
    var yearInput = document.getElementById("searchYear").value.toUpperCase();
    var cgpaMin = parseFloat(document.getElementById("cgpaMin").value);
    var cgpaMax = parseFloat(document.getElementById("cgpaMax").value);
    var table = document.getElementById("studentTable");
    var tr = table.getElementsByTagName("tr");

    for (var i = 1; i < tr.length; i++) {
        var tdDept = tr[i].getElementsByTagName("td")[4];
        var tdYear = tr[i].getElementsByTagName("td")[3];
        var tdCgpa = tr[i].getElementsByTagName("td")[5];

        if (tdDept && tdYear && tdCgpa) {
            var deptValue = tdDept.textContent || tdDept.innerText;
            var yearValue = tdYear.textContent || tdYear.innerText;
            var cgpaValue = parseFloat(tdCgpa.textContent || tdCgpa.innerText);

            var deptMatch = deptValue.toUpperCase().indexOf(departmentInput) > -1;
            var yearMatch = yearValue.toUpperCase().indexOf(yearInput) > -1;
            var cgpaMatch = true;
            if (!isNaN(cgpaMin)) {
                cgpaMatch = cgpaMatch && (cgpaValue >= cgpaMin);
            }
            if (!isNaN(cgpaMax)) {
                cgpaMatch = cgpaMatch && (cgpaValue <= cgpaMax);
            }

            if (deptMatch && yearMatch && cgpaMatch) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function resetFilter() {
    document.getElementById("searchDepartment").value = "";
    document.getElementById("searchYear").value = "";
    document.getElementById("cgpaMin").value = "";
    document.getElementById("cgpaMax").value = "";
    applyFilter();
}
</script>

</body>
</html>
