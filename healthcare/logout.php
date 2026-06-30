<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <meta http-equiv="refresh" content="3;url=login.php">
    <style>
        body{
            margin:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#f4f7fc;
            font-family:Arial,sans-serif;
        }

        .logout-box{
            background:#fff;
            padding:40px;
            border-radius:10px;
            text-align:center;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
            width:350px;
        }

        .logout-box h2{
            color:#28a745;
            margin-bottom:15px;
        }

        .logout-box p{
            color:#555;
            margin-bottom:20px;
        }

        .btn{
            display:inline-block;
            padding:10px 20px;
            background:#28a745;
            color:white;
            text-decoration:none;
            border-radius:5px;
        }

        .btn:hover{
            background:#218838;
        }
    </style>
</head>
<body>

<div class="logout-box">
    <h2>Logout Successful</h2>
    <p>You have been logged out successfully.</p>
    <p>Redirecting to Login Page...</p>
    <a href="login.php" class="btn">Login Again</a>
</div>

</body>
</html>