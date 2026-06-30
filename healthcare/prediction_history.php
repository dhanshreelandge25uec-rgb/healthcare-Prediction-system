<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,
"SELECT * FROM predictions
WHERE user_id='$user_id'
ORDER BY prediction_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Prediction History</title>

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
background:#f5f5f5;
}

.no-data{
text-align:center;
padding:30px;
color:#666;
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

<div class="sidebar">

<div class="logo">
🏥 HEALTHCARE
</div>

<a href="dashboard.php">
<i class="fa-solid fa-gauge"></i> Dashboard
</a>

<a href="disease_prediction.php">
<i class="fa-solid fa-stethoscope"></i> Disease Prediction
</a>

<a href="bmi_calculator.php">
<i class="fa-solid fa-weight-scale"></i> BMI Calculator
</a>

<a href="doctor_recommendation.php">
<i class="fa-solid fa-user-doctor"></i> Doctor Recommendation
</a>

<a href="upload_report.php">
<i class="fa-solid fa-file-medical"></i> Upload Report
</a>

<a href="prediction_history.php">
<i class="fa-solid fa-clock-rotate-left"></i> Prediction History
</a>

<a href="logout.php">
<i class="fa-solid fa-right-from-bracket"></i> Logout
</a>

</div>

<div class="main">

<div class="topbar">
Welcome, <?php echo $_SESSION['name']; ?>
</div>

<div class="content">

<div class="card">

<h2>
<i class="fa-solid fa-clock-rotate-left"></i>
 Prediction History
</h2>

<?php
if(mysqli_num_rows($result) > 0)
{
?>

<table>

<tr>
<th>ID</th>
<th>Symptoms</th>
<th>Disease</th>
<th>Medicine</th>
<th>Date</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['symptoms']; ?></td>

<td>
<span class="badge">
<?php echo $row['disease']; ?>
</span>
</td>

<td><?php echo $row['medicine']; ?></td>

<td><?php echo $row['prediction_date']; ?></td>

</tr>

<?php
}
?>

</table>

<?php
}
else
{
?>

<div class="no-data">
No prediction history found.
</div>

<?php
}
?>

</div>

</div>

</div>

</body>
</html>