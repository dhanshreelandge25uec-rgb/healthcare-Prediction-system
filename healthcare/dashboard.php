<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Dashboard</title>

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
color:white;
position:fixed;
left:0;
top:0;
}

.logo{
padding:20px;
font-size:22px;
font-weight:bold;
border-bottom:1px solid rgba(255,255,255,.1);
}

.logo i{
color:#4CAF50;
margin-right:8px;
}

.menu{
padding-top:20px;
}

.menu a{
display:block;
padding:15px 25px;
color:white;
text-decoration:none;
transition:.3s;
}

.menu a:hover{
background:#0b8f3a;
}

.menu i{
width:25px;
}

/* Main Content */

.main{
margin-left:250px;
width:100%;
}

/* Top Bar */

.topbar{
height:70px;
background:#082a54;
color:white;
display:flex;
justify-content:flex-end;
align-items:center;
padding:0 30px;
}

.topbar img{
width:40px;
height:40px;
border-radius:50%;
margin-left:10px;
}

/* Dashboard */

.content{
padding:30px;
}

.content h2{
margin-bottom:20px;
color:#222;
}

/* Cards */

.cards{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
margin-bottom:30px;
}

.card{
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
text-align:center;
}

.card h3{
font-size:30px;
color:#0b8f3a;
margin-bottom:5px;
}

.card p{
color:#666;
}

/* Welcome Section */

.welcome{
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
display:flex;
justify-content:space-between;
align-items:center;
}

.welcome-text{
width:60%;
}

.welcome-text h3{
margin-bottom:15px;
}

.welcome-text p{
line-height:1.8;
color:#555;
}

.welcome img{
width:220px;
}

/* Responsive */

@media(max-width:900px){

.cards{
grid-template-columns:repeat(2,1fr);
}

.welcome{
flex-direction:column;
text-align:center;
}

.welcome-text{
width:100%;
}

}

@media(max-width:600px){

.sidebar{
width:200px;
}

.main{
margin-left:200px;
}

.cards{
grid-template-columns:1fr;
}

}

</style>

</head>
<body>

<!-- Sidebar -->

<div class="sidebar">

<div class="logo">
<i class="fa-solid fa-heart-pulse"></i>
HEALTHCARE
</div>

<div class="menu">

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

<a href="profile.php">
<i class="fa-solid fa-user"></i> Profile
</a>

<a href="logout.php">
<i class="fa-solid fa-right-from-bracket"></i> Logout
</a>

</div>

</div>

<!-- Main -->

<div class="main">

<div class="topbar">
Welcome, <?php echo $name; ?>
<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
</div>

<div class="content">

<h2>Dashboard</h2>

<div class="cards">

<div class="card">
<h3>3</h3>
<p>Predictions</p>
</div>

<div class="card">
<h3>22.4</h3>
<p>BMI</p>
</div>

<div class="card">
<h3>2</h3>
<p>Reports</p>
</div>

<div class="card">
<h3>5</h3>
<p>Doctors</p>
</div>

</div>

<div class="welcome">

<div class="welcome-text">

<h3>Welcome to Healthcare Prediction System</h3>

<p>
Use the menu to predict diseases, calculate BMI,
consult doctors, upload health reports and
view your prediction history.
</p>

</div>

<img src="https://cdn-icons-png.flaticon.com/512/2785/2785482.png">

</div>

</div>

</div>

</body>
</html>