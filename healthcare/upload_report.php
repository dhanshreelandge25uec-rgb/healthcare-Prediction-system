<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$message = "";

if(isset($_POST['upload']))
{
    $user_id = $_SESSION['user_id'];

    $filename = $_FILES['report']['name'];
    $tempname = $_FILES['report']['tmp_name'];

    $folder = "uploads/" . $filename;

    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $allowed = array("pdf","jpg","jpeg","png");

    if(in_array($extension,$allowed))
    {
        if(move_uploaded_file($tempname,$folder))
        {
            mysqli_query($conn,
            "INSERT INTO reports(user_id,file_name)
            VALUES('$user_id','$filename')");

            $message = "Report Uploaded Successfully!";
        }
        else
        {
            $message = "Upload Failed!";
        }
    }
    else
    {
        $message = "Only PDF, JPG, JPEG, PNG files allowed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Health Report</title>

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
padding:30px;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
max-width:700px;
}

.card h2{
margin-bottom:20px;
color:#082a54;
}

.upload-box{
border:2px dashed #0b8f3a;
padding:40px;
text-align:center;
border-radius:10px;
margin-bottom:20px;
}

.upload-box i{
font-size:60px;
color:#0b8f3a;
margin-bottom:15px;
}

input[type=file]{
width:100%;
padding:10px;
}

button{
margin-top:20px;
padding:12px 30px;
background:#0b8f3a;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#08702d;
}

.message{
margin-top:15px;
font-weight:bold;
color:green;
}

.info{
margin-top:20px;
color:#666;
line-height:1.8;
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

<h2>Upload Health Report</h2>

<form method="POST" enctype="multipart/form-data">

<div class="upload-box">

<i class="fa-solid fa-cloud-arrow-up"></i>

<h3>Select Medical Report</h3>
<br>

<input type="file" name="report" required>

</div>

<button type="submit" name="upload">
Upload Report
</button>

</form>

<div class="message">
<?php echo $message; ?>
</div>

<div class="info">
<b>Supported Files:</b> PDF, JPG, JPEG, PNG<br>
<b>Maximum Recommended Size:</b> 5 MB
</div>

</div>

</div>

</div>

</body>
</html>