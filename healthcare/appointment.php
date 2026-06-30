<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$msg = "";

if(isset($_POST['book']))
{
    $user_id = $_SESSION['user_id'];
    $doctor_name = mysqli_real_escape_string($conn,$_POST['doctor_name']);
    $specialization = mysqli_real_escape_string($conn,$_POST['specialization']);
    $appointment_date = $_POST['appointment_date'];

    $insert = mysqli_query($conn,"
    INSERT INTO appointments
    (user_id,doctor_name,specialization,appointment_date,status)
    VALUES
    ('$user_id','$doctor_name','$specialization','$appointment_date','Pending')
    ");

    if($insert)
    {
        $msg = "Appointment Booked Successfully!";
    }
    else
    {
        $msg = "Failed to Book Appointment!";
    }
}

$doctor_name = $_GET['doctor'] ?? '';
$specialization = $_GET['specialization'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Appointment</title>

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

.container{
width:500px;
margin:50px auto;
background:#fff;
padding:30px;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

h2{
text-align:center;
margin-bottom:25px;
color:#082a54;
}

label{
display:block;
margin-bottom:6px;
font-weight:bold;
color:#082a54;
}

input{
width:100%;
padding:12px;
margin-bottom:15px;
border:1px solid #ccc;
border-radius:5px;
font-size:15px;
}

input:focus{
outline:none;
border-color:#0b8f3a;
}

button{
width:100%;
padding:12px;
background:#0b8f3a;
color:white;
border:none;
border-radius:5px;
font-size:16px;
cursor:pointer;
}

button:hover{
background:#08702d;
}

.msg{
text-align:center;
margin-bottom:15px;
font-weight:bold;
color:green;
}

.back-btn{
display:block;
text-align:center;
margin-top:15px;
text-decoration:none;
color:#082a54;
font-weight:bold;
}

</style>
</head>
<body>

<div class="container">

<h2>Book Appointment</h2>

<div class="msg">
<?php echo $msg; ?>
</div>

<form method="POST">

<label>Doctor Name</label>
<input type="text"
name="doctor_name"
value="<?php echo htmlspecialchars($doctor_name); ?>"
readonly>

<label>Specialization</label>
<input type="text"
name="specialization"
value="<?php echo htmlspecialchars($specialization); ?>"
readonly>

<label>Appointment Date</label>
<input type="date"
name="appointment_date"
required>

<button type="submit" name="book">
Confirm Appointment
</button>

</form>

<a href="doctor_recommendation.php" class="back-btn">
← Back to Doctor Recommendations
</a>

</div>

</body>
</html>