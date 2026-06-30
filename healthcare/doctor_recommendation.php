<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$disease = $_SESSION['disease'] ?? "";

$specialization = "General Physician";

if(stripos($disease,"flu") !== false)
{
    $specialization = "General Physician";
}
elseif(stripos($disease,"migraine") !== false)
{
    $specialization = "Neurologist";
}
elseif(stripos($disease,"gastritis") !== false)
{
    $specialization = "Gastroenterologist";
}
elseif(stripos($disease,"heart") !== false)
{
    $specialization = "Cardiologist";
}

$result = mysqli_query($conn,
"SELECT * FROM doctors WHERE specialization='$specialization'");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor Recommendation</title>

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

.title{
margin-bottom:20px;
}

.doctor-card{
background:white;
padding:20px;
border-radius:10px;
margin-bottom:20px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
display:flex;
justify-content:space-between;
align-items:center;
}

.doctor-info h3{
color:#082a54;
margin-bottom:10px;
}

.doctor-info p{
margin-bottom:8px;
color:#555;
}

.btn{
padding:10px 20px;
background:#0b8f3a;
color:white;
text-decoration:none;
border-radius:5px;
}

.btn:hover{
background:#08702d;
}

.icon{
font-size:60px;
color:#0b8f3a;
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
<i class="fa-solid fa-clock"></i> Prediction History
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

<h2 class="title">Recommended Doctors</h2>

<p style="margin-bottom:20px;">
Disease: <b><?php echo $disease; ?></b>
</p>

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>

<div class="doctor-card">

<div class="doctor-info">

<h3><?php echo $row['doctor_name']; ?></h3>

<p>
<b>Specialization:</b>
<?php echo $row['specialization']; ?>
</p>

<p>
<b>Experience:</b>
<?php echo $row['experience']; ?>
</p>

<p>
<b>Hospital:</b>
<?php echo $row['hospital']; ?>
</p>

</div>

<div>

<div class="icon">
<i class="fa-solid fa-user-doctor"></i>
</div>

<br>

<a href="appointment.php?doctor=<?php echo $row['doctor_name']; ?>&specialization=<?php echo $row['specialization']; ?>" class="btn">
Book Appointment

</a>

</div>

</div>

<?php
    }
}
else
{
?>

<div class="doctor-card">
<h3>No Doctor Found</h3>
</div>

<?php
}
?>

</div>

</div>

</body>
</html>