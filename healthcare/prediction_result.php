<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$disease = $_SESSION['disease'] ?? "No Prediction";
$medicine = $_SESSION['medicine'] ?? "N/A";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Prediction Result</title>

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

/* Result Card */

.result-box{
background:white;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
overflow:hidden;
display:flex;
justify-content:space-between;
align-items:center;
}

.result-left{
width:65%;
padding:30px;
}

.result-header{
background:#e8f5e9;
padding:20px;
margin-bottom:20px;
border-radius:8px;
}

.result-header h4{
color:#0b8f3a;
margin-bottom:10px;
}

.result-header h2{
color:#222;
}

.section{
margin-bottom:20px;
}

.section h3{
margin-bottom:10px;
color:#333;
}

.section ul{
padding-left:20px;
}

.section li{
margin-bottom:8px;
color:#555;
}

.result-right{
width:35%;
text-align:center;
}

.result-right img{
width:220px;
}

.btn{
display:inline-block;
padding:10px 25px;
background:#0b8f3a;
color:white;
text-decoration:none;
border-radius:5px;
margin-top:15px;
margin-right:10px;
}

.btn:hover{
background:#08702d;
}

.btn-back{
background:#555;
}

.btn-back:hover{
background:#333;
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

<h2 style="margin-bottom:20px;">Prediction Result</h2>

<div class="result-box">

<div class="result-left">

<div class="result-header">
<h4>Possible Disease</h4>
<h2><?php echo $disease; ?></h2>
</div>

<div class="section">
<h3>Recommended Medicine</h3>
<p><?php echo $medicine; ?></p>
</div>

<div class="section">
<h3>Precautions</h3>

<ul>
<li>Drink plenty of water</li>
<li>Take proper rest</li>
<li>Eat healthy food</li>
<li>Avoid junk food and cold drinks</li>
<li>Consult a doctor if symptoms persist</li>
</ul>

</div>

<a href="prediction_history.php" class="btn">
Save to History
</a>

<a href="disease_prediction.php" class="btn btn-back">
Back
</a>

</div>

<div class="result-right">

<img src="https://cdn-icons-png.flaticon.com/512/2966/2966481.png">

</div>

</div>

</div>

</div>

</body>
</html>