<?php
session_start();
include 'db.php';

$total_users = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
$total_predictions = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM predictions"));
$total_reports = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM reports"));
$total_doctors = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM doctors"));
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin Dashboard</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f5f7fb;
display:flex;
}

/* Sidebar */

.sidebar{
width:250px;
height:100vh;
background:#082a54;
position:fixed;
left:0;
top:0;
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
text-decoration:none;
color:white;
transition:.3s;
}

.sidebar a:hover{
background:#0b8f3a;
}

.sidebar i{
margin-right:10px;
}

/* Main */

.main{
margin-left:250px;
width:calc(100% - 250px);
}

/* Topbar */

.topbar{
height:70px;
background:#082a54;
display:flex;
justify-content:flex-end;
align-items:center;
padding:0 30px;
color:white;
font-weight:600;
}

/* Content */

.content{
padding:30px;
}

.title{
color:#082a54;
margin-bottom:25px;
}

/* Cards */

.cards{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
margin-bottom:25px;
}

.card{
background:white;
padding:25px;
border-radius:10px;
text-align:center;
box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.card h2{
color:#0b8f3a;
font-size:35px;
margin-bottom:10px;
}

.card p{
color:#555;
}

/* Charts */

.chart-section{
display:grid;
grid-template-columns:2fr 1fr;
gap:20px;
}

.chart-box{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.chart-box h3{
margin-bottom:15px;
color:#082a54;
}

canvas{
max-height:350px;
}

/* Responsive */

@media(max-width:900px){

.cards{
grid-template-columns:repeat(2,1fr);
}

.chart-section{
grid-template-columns:1fr;
}

.sidebar{
width:220px;
}

.main{
margin-left:220px;
width:calc(100% - 220px);
}

}

@media(max-width:600px){

.cards{
grid-template-columns:1fr;
}

.sidebar{
position:relative;
width:100%;
height:auto;
}

.main{
margin-left:0;
width:100%;
}

body{
display:block;
}

}

</style>

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

<div class="logo">
🏥 Admin Panel
</div>

<a href="#">
<i class="fas fa-gauge"></i>
Dashboard
</a>

<a href="view_users.php">
<i class="fas fa-users"></i>
Users
</a>

<a href="view_prediction.php">
<i class="fas fa-stethoscope"></i>
Predictions
</a>

<a href="view_reports.php">
<i class="fas fa-file-medical"></i>
Reports
</a>

<a href="view_appointments.php">
<i class="fas fa-calendar-check"></i>
Appointments
</a>



<a href="logout.php">
<i class="fas fa-right-from-bracket"></i>
Logout
</a>

</div>

<!-- Main -->

<div class="main">

<div class="topbar">
Welcome Admin
</div>

<div class="content">

<h2 class="title">Admin Dashboard</h2>

<!-- Cards -->

<div class="cards">

<div class="card">
<h2><?php echo $total_users; ?></h2>
<p>Total Users</p>
</div>

<div class="card">
<h2><?php echo $total_predictions; ?></h2>
<p>Total Predictions</p>
</div>

<div class="card">
<h2><?php echo $total_reports; ?></h2>
<p>Total Reports</p>
</div>

<div class="card">
<h2><?php echo $total_doctors; ?></h2>
<p>Total Doctors</p>
</div>

</div>

<!-- Charts -->

<div class="chart-section">

<div class="chart-box">

<h3>Predictions Overview</h3>

<canvas id="predictionChart"></canvas>

</div>

<div class="chart-box">

<h3>Top Diseases</h3>

<canvas id="diseaseChart"></canvas>

</div>

</div>

</div>

</div>

<script>

/* Line Chart */

new Chart(
document.getElementById("predictionChart"),
{
type:'line',

data:{
labels:[
'1 May',
'2 May',
'3 May',
'4 May',
'5 May',
'6 May',
'7 May'
],

datasets:[{
label:'Predictions',
data:[3,9,5,10,14,15,12],
borderColor:'#0b8f3a',
backgroundColor:'rgba(11,143,58,0.15)',
fill:true,
tension:0.4
}]
},

options:{
responsive:true
}
}
);


/* Pie Chart */

new Chart(
document.getElementById("diseaseChart"),
{
type:'pie',

data:{
labels:[
'Flu',
'Gastritis',
'Migraine',
'Typhoid',
'Others'
],

datasets:[{
data:[25,20,18,22,15],

backgroundColor:[
'#4CAF50',
'#2196F3',
'#9C27B0',
'#FF9800',
'#607D8B'
]
}]
},

options:{
responsive:true
}
}
);

</script>

</body>
</html>