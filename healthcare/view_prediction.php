<?php
session_start();
include 'db.php';

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,"DELETE FROM predictions WHERE id='$id'");

    header("Location:view_predictions.php");
    exit();
}

$result = mysqli_query($conn,"
SELECT p.*,u.name
FROM predictions p
LEFT JOIN users u ON p.user_id=u.id
ORDER BY p.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Predictions</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial, sans-serif;
}

body{
background:#f5f7fa;
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
box-shadow:0 2px 10px rgba(0,0,0,0.1);
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

.badge{
background:#e8f5e9;
color:#0b8f3a;
padding:5px 10px;
border-radius:20px;
font-size:12px;
font-weight:bold;
}

</style>

</head>
<body>

<div class="header">
🏥 Healthcare Prediction System - Admin
</div>

<div class="container">

<h2>View Predictions</h2>

<table>

<tr>
<th>ID</th>
<th>User Name</th>
<th>Symptoms</th>
<th>Disease</th>
<th>Medicine</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>
<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['symptoms']; ?></td>

<td>
<span class="badge">
<?php echo $row['disease']; ?>
</span>
</td>

<td><?php echo $row['medicine']; ?></td>

<td><?php echo $row['prediction_date']; ?></td>

<td>
<a class="delete-btn"
href="?delete=<?php echo $row['id']; ?>"
onclick="return confirm('Delete prediction?')">
Delete
</a>
</td>

</tr>
<?php
}
?>

</table>

</div>

</body>
</html>