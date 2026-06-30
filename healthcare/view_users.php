<?php
session_start();
include 'db.php';

/*
if(!isset($_SESSION['admin']))
{
    header("Location: admin_login.php");
    exit();
}
*/

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,"DELETE FROM users WHERE id='$id'");

    header("Location: view_users.php");
}

$result = mysqli_query($conn,"SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Users</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f4f7fa;
display:flex;
}

/* Sidebar */

.sidebar{
width:250px;
height:100vh;
background:#082a54;
position:fixed;
color:white;
}

.logo{
padding:20px;
font-size:22px;
font-weight:bold;
border-bottom:1px solid rgba(255,255,255,.1);
}

.sidebar a{
display:block;
padding:15px 20px;
color:white;
text-decoration:none;
}

.sidebar a:hover{
background:#0b8f3a;
}

/* Main */

.main{
margin-left:250px;
width:100%;
}

.topbar{
height:70px;
background:#082a54;
display:flex;
justify-content:flex-end;
align-items:center;
padding-right:30px;
color:white;
}

.content{
padding:30px;
}

.card{
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.card h2{
margin-bottom:20px;
color:#082a54;
}

table{
width:100%;
border-collapse:collapse;
}

table th{
background:#0b8f3a;
color:white;
padding:12px;
text-align:left;
}

table td{
padding:12px;
border-bottom:1px solid #ddd;
}

table tr:hover{
background:#f9f9f9;
}

.delete-btn{
background:red;
color:white;
padding:6px 12px;
text-decoration:none;
border-radius:4px;
}

.delete-btn:hover{
background:darkred;
}

</style>
</head>
<body>

<div class="sidebar">

<div class="logo">
🏥 Admin Panel
</div>

<a href="admin_dashboard.php">
<i class="fa fa-gauge"></i> Dashboard
</a>

<a href="view_users.php">
<i class="fa fa-users"></i> Users
</a>

<a href="view_predictions.php">
<i class="fa fa-stethoscope"></i> Predictions
</a>

<a href="view_reports.php">
<i class="fa fa-file-medical"></i> Reports
</a>

<a href="appointments.php">
<i class="fa fa-calendar-check"></i> Appointments
</a>

<a href="settings.php">
<i class="fa fa-gear"></i> Settings
</a>

<a href="logout.php">
<i class="fa fa-sign-out-alt"></i> Logout
</a>

</div>

<div class="main">

<div class="topbar">
Admin
</div>

<div class="content">

<div class="card">

<h2>Registered Users</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Password</th>
<th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['password']; ?></td>

<td>
<a href="?delete=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Delete this user?')">
Delete
</a>
</td>

</tr>

<?php
}
?>

</table>

</div>

</div>

</div>

</body>
</html>