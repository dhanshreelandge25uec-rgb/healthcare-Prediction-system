<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Healthcare Prediction System</title>

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
background:#f4f8f7;
}

/* HEADER */

header{
background:#fff;
padding:15px 60px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 2px 10px rgba(0,0,0,.08);
}

.logo{
display:flex;
align-items:center;
gap:10px;
}

.logo i{
font-size:35px;
color:#0b8f3a;
}

.logo h2{
font-size:24px;
color:#222;
}

.logo span{
display:block;
font-size:12px;
color:#0b8f3a;
font-weight:600;
}

nav a{
text-decoration:none;
color:#333;
margin-left:25px;
font-weight:500;
}

nav a:hover{
color:#0b8f3a;
}

/* HERO */

.hero{
display:flex;
justify-content:space-between;
align-items:center;
padding:60px;
background:#eef8f4;
}

.hero-text{
width:50%;
}

.hero-text h1{
font-size:50px;
line-height:1.2;
color:#222;
margin-bottom:20px;
}

.hero-text p{
font-size:16px;
line-height:1.8;
color:#666;
margin-bottom:30px;
}

.btn{
padding:12px 30px;
background:#0b8f3a;
color:white;
text-decoration:none;
border-radius:5px;
display:inline-block;
margin-right:10px;
}

.btn:hover{
background:#08722e;
}

.btn2{
background:white;
border:2px solid #0b8f3a;
color:#0b8f3a;
}

.hero-image img{
width:350px;
}

/* FEATURES */

.features{
padding:60px;
}

.features h2{
margin-bottom:30px;
color:#222;
}

.feature-box{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
}

.card{
background:white;
padding:25px;
border-radius:10px;
text-align:center;
box-shadow:0 4px 12px rgba(0,0,0,.08);
transition:.3s;
}

.card:hover{
transform:translateY(-5px);
}

.card i{
font-size:35px;
color:#0b8f3a;
margin-bottom:15px;
}

.card h3{
font-size:18px;
margin-bottom:10px;
}

.card p{
font-size:14px;
color:#666;
}

/* ABOUT */

.about{
padding:60px;
background:white;
text-align:center;
}

.about h2{
margin-bottom:20px;
}

.about p{
max-width:900px;
margin:auto;
line-height:1.8;
color:#666;
}

/* CONTACT */

.contact{
padding:60px;
background:#eef8f4;
text-align:center;
}

.contact h2{
margin-bottom:20px;
}

.contact p{
margin-bottom:10px;
color:#555;
}

/* FOOTER */

footer{
background:#082a54;
color:white;
text-align:center;
padding:20px;
}

/* RESPONSIVE */

@media(max-width:900px){

.hero{
flex-direction:column;
text-align:center;
}

.hero-text{
width:100%;
}

.hero-image img{
width:250px;
margin-top:30px;
}

.feature-box{
grid-template-columns:repeat(2,1fr);
}

}

@media(max-width:600px){

header{
flex-direction:column;
gap:15px;
}

.feature-box{
grid-template-columns:1fr;
}

.hero-text h1{
font-size:35px;
}

}

</style>
</head>
<body>

<header>

<div class="logo">
<i class="fa-solid fa-heart-pulse"></i>
<div>
<h2>HEALTHCARE</h2>
<span>PREDICTION SYSTEM</span>
</div>
</div>

<nav>
<a href="#">Home</a>
<a href="#about">About</a>
<a href="#services">Services</a>
<a href="#contact">Contact</a>
<a href="login.php">Login</a>
</nav>

</header>

<section class="hero">

<div class="hero-text">

<h1>
Predict Your Disease <br>
Take Care Of Your Health
</h1>

<p>
This is an advanced healthcare prediction system.
Enter your symptoms and get the best suggestions,
BMI calculation, doctor recommendations and report management.
</p>

<a href="login.php" class="btn">Login</a>
<a href="register.php" class="btn btn2">Register</a>

</div>

<div class="hero-image">

<img src="https://cdn-icons-png.flaticon.com/512/3774/3774299.png">

</div>

</section>

<section class="features" id="services">

<h2>Our Features</h2>

<div class="feature-box">

<div class="card">
<i class="fa-solid fa-stethoscope"></i>
<h3>Disease Prediction</h3>
<p>Predict diseases based on symptoms entered by users.</p>
</div>

<div class="card">
<i class="fa-solid fa-weight-scale"></i>
<h3>BMI Calculator</h3>
<p>Calculate body mass index and health category.</p>
</div>

<div class="card">
<i class="fa-solid fa-user-doctor"></i>
<h3>Doctor Recommendation</h3>
<p>Find specialist doctors according to diseases.</p>
</div>

<div class="card">
<i class="fa-solid fa-file-medical"></i>
<h3>Upload Reports</h3>
<p>Store and manage your health reports securely.</p>
</div>

</div>

</section>

<section class="about" id="about">

<h2>About Us</h2>

<p>
Healthcare Prediction System helps users predict diseases,
maintain health records, calculate BMI, upload reports,
view prediction history and get doctor recommendations.
The system provides a simple and user-friendly healthcare platform.
</p>

</section>

<section class="contact" id="contact">

<h2>Contact Us</h2>

<p><b>Email:</b> healthcare@gmail.com</p>
<p><b>Phone:</b> +91 9876543210</p>
<p><b>Address:</b> Pune, Maharashtra, India</p>

</section>

<footer>
© 2026 Healthcare Prediction System | All Rights Reserved
</footer>

</body>
</html>