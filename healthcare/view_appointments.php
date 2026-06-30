<?php
session_start();
include 'db.php';

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,"DELETE FROM appointments WHERE id='$id'");

    header("Location:view_appointments.php");
    exit();
}

$result = mysqli_query($conn,"
SELECT a.*,u.name
FROM appointments a
LEFT JOIN users u ON a.user_id=u.id
ORDER BY a.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Appointments</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f4f7fa;
}

.header{
background:#082a54;
color:white;
padding:20px;
font-size:24px;
font-weight:bold;
}

.container{
width:95%;
margin:30px auto;
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
}

h2{
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

.status{
background:#e8f5e9;
color:#0b8f3a;
padding:5px 10px;
border-radius:20px;
font-size:12px;
font-weight:bold;
}

.delete-btn{
background:red;
color:white;
padding:6px 12px;
border-radius:4px;
text-decoration:none;
}

.delete-btn:hover{
background:darkred;
}

</style>
</head>
<body>

<div class="header">
🏥 Healthcare Prediction System - Admin
</div>

<div class="container">

<h2>View Appointments</h2>

<table>

<tr>
<th>ID</th>
<th>User Name</th>
<th>Doctor Name</th>
<th>Specialization</th>
<th>Appointment Date</th>
<th>Status</th>
<th>Booked On</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['doctor_name']; ?></td>

<td><?php echo $row['specialization']; ?></td>

<td><?php echo $row['appointment_date']; ?></td>

<td>
<span class="status">
<?php echo $row['status']; ?>
</span>
</td>

<td><?php echo $row['created_at']; ?></td>

<td>
<a href="?delete=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Delete Appointment?')">
Delete
</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>