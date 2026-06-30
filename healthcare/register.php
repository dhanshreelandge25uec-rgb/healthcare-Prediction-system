<?php
include 'db.php';

$msg = "";

if(isset($_POST['register']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);
    $confirm = md5($_POST['confirm_password']);

    if($password != $confirm)
    {
        $msg = "Passwords do not match!";
    }
    else
    {
        $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

        if(mysqli_num_rows($check)>0)
        {
            $msg = "Email already exists!";
        }
        else
        {
            mysqli_query($conn,"INSERT INTO users(name,email,password)
            VALUES('$name','$email','$password')");

            $msg = "Registration Successful!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>

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
font-size:14px;
display:block;
font-weight:normal;
}

/* CONTAINER */

.container{
height:calc(100vh - 70px);
display:flex;
justify-content:center;
align-items:center;
background:url('https://www.transparenttextures.com/patterns/cubes.png');
}

.register-box{
width:380px;
background:white;
padding:30px;
border-radius:8px;
box-shadow:0 4px 15px rgba(0,0,0,0.1);
}

.register-box h2{
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

.btn{
width:100%;
padding:12px;
background:#0b8f3a;
color:white;
border:none;
border-radius:5px;
font-size:16px;
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

.login-link{
text-align:center;
margin-top:15px;
font-size:14px;
}

.login-link a{
color:#0b8f3a;
text-decoration:none;
font-weight:bold;
}

.logo{
display:flex;
align-items:center;
gap:10px;
}

.logo img{
width:35px;
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

<div class="register-box">

<h2>User Registration</h2>

<div class="message">
<?php echo $msg; ?>
</div>

<form method="POST">

<div class="input-group">
<input type="text"
name="name"
placeholder="Full Name"
required>
</div>

<div class="input-group">
<input type="email"
name="email"
placeholder="Email Address"
required>
</div>

<div class="input-group">
<input type="password"
name="password"
placeholder="Password"
required>
</div>

<div class="input-group">
<input type="password"
name="confirm_password"
placeholder="Confirm Password"
required>
</div>

<button type="submit"
name="register"
class="btn">
Register
</button>

</form>

<div class="login-link">
Already have an account?
<a href="login.php">Login</a>
</div>

</div>

</div>

</body>
</html>