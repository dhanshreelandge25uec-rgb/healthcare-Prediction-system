<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$bmi = "";
$status = "";

if(isset($_POST['calculate']))
{
    $weight = $_POST['weight'];
    $height = $_POST['height'] / 100;

    if($height > 0)
    {
        $bmi = round($weight / ($height * $height), 2);

        if($bmi < 18.5)
            $status = "Underweight";
        elseif($bmi < 25)
            $status = "Normal";
        elseif($bmi < 30)
            $status = "Overweight";
        else
            $status = "Obesity";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BMI Calculator</title>

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

/* BMI Layout */

.bmi-container{
display:grid;
grid-template-columns:1fr 1fr;
gap:20px;
}

.card{
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.card h2{
margin-bottom:20px;
}

input{
width:100%;
padding:12px;
margin-bottom:15px;
border:1px solid #ccc;
border-radius:5px;
}

button{
width:100%;
padding:12px;
background:#0b8f3a;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
font-size:15px;
}

button:hover{
background:#08702d;
}

.result{
text-align:center;
}

.result h1{
font-size:45px;
color:#0b8f3a;
margin:15px 0;
}

.result h3{
margin-bottom:10px;
}

.result p{
color:#666;
}

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

table th,
table td{
padding:10px;
border:1px solid #ddd;
text-align:left;
}

table th{
background:#f0f0f0;
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

<h2 style="margin-bottom:20px;">BMI Calculator</h2>

<div class="bmi-container">

<div class="card">

<form method="POST">

<label>Weight (kg)</label>
<input type="number" name="weight" required>

<label>Height (cm)</label>
<input type="number" name="height" required>

<button type="submit" name="calculate">
Calculate BMI
</button>

</form>

</div>

<div class="card result">

<h3>Your BMI</h3>

<h1>
<?php
if($bmi!="")
echo $bmi;
else
echo "--";
?>
</h1>

<h3>
<?php
if($status!="")
echo $status;
?>
</h3>

<p>
<?php
if($status=="Normal")
echo "You have a normal body weight. Good job!";
elseif($status=="Underweight")
echo "You are underweight. Improve nutrition.";
elseif($status=="Overweight")
echo "You are overweight. Exercise regularly.";
elseif($status=="Obesity")
echo "Consult a healthcare professional.";
?>
</p>

</div>

</div>

<div class="card" style="margin-top:20px;">

<h3>BMI Range</h3>

<table>

<tr>
<th>BMI Range</th>
<th>Category</th>
</tr>

<tr>
<td>Below 18.5</td>
<td>Underweight</td>
</tr>

<tr>
<td>18.5 - 24.9</td>
<td>Normal</td>
</tr>

<tr>
<td>25 - 29.9</td>
<td>Overweight</td>
</tr>

<tr>
<td>30 and Above</td>
<td>Obesity</td>
</tr>

</table>

</div>

</div>

</div>

</body>
</html>