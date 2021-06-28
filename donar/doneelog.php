<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Donee Login</title>
<link rel="stylesheet" href="css/style2.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="login-box">
<h1>Donee Login</h1>
<?php 
$fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($fullurl,"login=fail")==true)
{
	echo "<div class='alert alert-danger'>
  <strong style='color:red;'>Wrong Credentials!</strong> Please try again!!.
</div>";
}else if(strpos($fullurl,"login=success")==true){
	echo "<div class='alert alert-success'>
  <strong style='color:green;' >Success!</strong> You have logged in successfully.
</div>";
}
?>
<form method="post" action="checkdonee.php">
<div class="text-box">
<div class="form-group">
<i class="fa fa-envelope" ></i>
<input class="from-control" type="email" placeholder="Email" name="email" value="">
</div>
</div>
<div class="text-box">
<div class="form-group">
<i class="fa fa-lock" ></i>
<input class="form-control" type="password" placeholder="Password" name="password" value="">
</div>
</div>
<button type="submit" class="btn btn-primary" name="submit">Login</button>
</form>
<p style="color:#4caf50;">If you don't have an account?<a href="doneereg.php" style="color:white">Sign Up</a></p>
</div>
</body>
</html>