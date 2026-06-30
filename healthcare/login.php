<?php
session_start();
include 'db.php';

$msg = "";

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email' AND password='$password'");

    if(mysqli_num_rows($query)>0)
    {
        $row = mysqli_fetch_assoc($query);

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];

        header("Location: dashboard.php");
        exit();
    }
    else
    {
        $msg = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Login</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#eef6f5;
}

/* HEADER */

.header{
background:#0b8f3a;
height:70px;
display:flex;
align-items:center;
padding-left:25px;
color:white;
font-size:22px;
font-weight:bold;
}

.header span{
font-size:13px;
display:block;
}

/* MAIN */

.container{
height:calc(100vh - 70px);
display:flex;
justify-content:center;
align-items:center;
background:url('https://www.transparenttextures.com/patterns/cubes.png');
}

.login-box{
width:380px;
background:#fff;
padding:30px;
border-radius:8px;
box-shadow:0 4px 15px rgba(0,0,0,0.1);
}

.login-box h2{
text-align:center;
margin-bottom:20px;
color:#333;
}

.input-group{
margin-bottom:15px;
}

.input-group input{
width:100%;
padding:12px;
border:1px solid #ddd;
border-radius:5px;
font-size:14px;
}

.input-group input:focus{
outline:none;
border-color:#0b8f3a;
}

.options{
display:flex;
justify-content:space-between;
font-size:13px;
margin-bottom:15px;
}

.options a{
text-decoration:none;
color:#0b8f3a;
}

.btn{
width:100%;
padding:12px;
background:#0b8f3a;
color:white;
border:none;
border-radius:5px;
font-size:15px;
cursor:pointer;
}

.btn:hover{
background:#08702d;
}

.message{
text-align:center;
margin-bottom:15px;
color:red;
font-size:14px;
}

.register-link{
text-align:center;
margin-top:15px;
font-size:14px;
}

.register-link a{
color:#0b8f3a;
font-weight:bold;
text-decoration:none;
}

.logo{
display:flex;
align-items:center;
gap:10px;
}

</style>

</head>
<body>

<div class="header">
<div class="logo">
❤️
<div>
HEALTHCARE
<span>PREDICTION SYSTEM</span>
</div>
</div>
</div>

<div class="container">

<div class="login-box">

<h2>User Login</h2>

<div class="message">
<?php echo $msg; ?>
</div>

<form method="POST">

<div class="input-group">
<input type="email"
name="email"
placeholder="Enter Email"
required>
</div>

<div class="input-group">
<input type="password"
name="password"
placeholder="Enter Password"
required>
</div>

<div class="options">
<label>
<input type="checkbox"> Remember Me
</label>

<a href="#">Forgot Password?</a>
</div>

<button type="submit"
name="login"
class="btn">
Login
</button>

</form>

<div class="register-link">
Don't have an account?
<a href="register.php">Register</a>
</div>

</div>

</div>

</body>
</html>