<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Donar Login</title>
<link rel="stylesheet" href="css/style1.css">
</head>
<body>

<div class="login-box">
<h1>Donor Login</h1>
<?php 
$fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($fullurl,"log=fail")==true)
{
	echo "<div class='alert alert-danger'><center>
  <strong style='color:red;'>Wrong Credentials!</strong> Please try again!!.
</center></div>";
}else if(strpos($fullurl,"log=success")==true){
	echo "<div class='alert alert-success'>
  <strong style='color:green;'>Success!</strong> You have logged in successfully.
</div>";
}
?>
<form method="post" action="checkdonar.php">
<div class="text-box">
<i class="fa fa-envelope" ></i>
<input type="email" placeholder="Email" name="email" value="">
</div>
<div class="text-box">
<i class="fa fa-lock" ></i>
<input type="password" placeholder="Password" name="password" value="">
</div>
<button type="submit" class="btn btn-primary" name="submit">Login</button>
</form>
<p style="color:#4caf50;">If you don't have an account?<a href="donarreg.php" style="color:white">Sign Up</a></p>
</div>
</body>
</html>