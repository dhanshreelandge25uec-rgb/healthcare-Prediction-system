<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

if(isset($_POST['predict']))
{
    $symptoms = strtolower(trim($_POST['symptoms']));

    $disease = "";
    $medicine = "";

    if(strpos($symptoms,'fever') !== false &&
       strpos($symptoms,'cough') !== false)
    {
        $disease = "Flu (Influenza)";
        $medicine = "Paracetamol, Cough Syrup";
    }
    elseif(strpos($symptoms,'headache') !== false)
    {
        $disease = "Migraine";
        $medicine = "Pain Reliever";
    }
    elseif(strpos($symptoms,'stomach') !== false)
    {
        $disease = "Gastritis";
        $medicine = "Antacid";
    }
    elseif(strpos($symptoms,'body pain') !== false)
    {
        $disease = "Typhoid";
        $medicine = "Antibiotics";
    }
    else
    {
        $disease = "Common Cold";
        $medicine = "Rest and Hydration";
    }

    $_SESSION['disease'] = $disease;
    $_SESSION['medicine'] = $medicine;
    $_SESSION['symptoms'] = $symptoms;

    $user_id = $_SESSION['user_id'];

    mysqli_query($conn,"
    INSERT INTO predictions
    (user_id,symptoms,disease,medicine)
    VALUES
    ('$user_id','$symptoms','$disease','$medicine')
    ");

    header("Location: prediction_result.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Disease Prediction</title>

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
background:#f5f7fa;
display:flex;
}

/* SIDEBAR */

.sidebar{
width:250px;
height:100vh;
background:#082a54;
color:white;
position:fixed;
}

.sidebar h2{
padding:20px;
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

/* MAIN */

.main{
margin-left:250px;
width:100%;
}

.topbar{
height:70px;
background:#082a54;
color:white;
display:flex;
align-items:center;
justify-content:flex-end;
padding-right:30px;
}

.content{
padding:30px;
}

.card{
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
max-width:800px;
}

.card h2{
margin-bottom:20px;
}

textarea{
width:100%;
height:150px;
padding:15px;
border:1px solid #ccc;
border-radius:5px;
resize:none;
}

button{
margin-top:20px;
padding:12px 30px;
background:#0b8f3a;
border:none;
color:white;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#08712f;
}

.note{
margin-top:15px;
font-size:13px;
color:#666;
}

</style>

</head>
<body>

<div class="sidebar">

<h2>🏥 HEALTHCARE</h2>

<a href="dashboard.php">
<i class="fa fa-home"></i> Dashboard
</a>

<a href="disease_prediction.php">
<i class="fa fa-stethoscope"></i> Disease Prediction
</a>

<a href="bmi_calculator.php">
<i class="fa fa-calculator"></i> BMI Calculator
</a>

<a href="doctor_recommendation.php">
<i class="fa fa-user-doctor"></i> Doctor Recommendation
</a>

<a href="upload_report.php">
<i class="fa fa-file-medical"></i> Upload Report
</a>

<a href="prediction_history.php">
<i class="fa fa-clock"></i> Prediction History
</a>

<a href="logout.php">
<i class="fa fa-sign-out"></i> Logout
</a>

</div>

<div class="main">

<div class="topbar">
Welcome, <?php echo $_SESSION['name']; ?>
</div>

<div class="content">

<div class="card">

<h2>Disease Prediction</h2>

<form method="POST">

<label>Enter Your Symptoms</label>

<textarea
name="symptoms"
placeholder="Example: Fever, headache, cough, body pain"
required></textarea>

<button type="submit" name="predict">
Predict Disease
</button>

<div class="note">
Note: Enter symptoms separated by commas.
</div>

</form>

</div>

</div>

</div>

</body>
</html>