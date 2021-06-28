<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Donor Registration</title>
<link rel="stylesheet" href="css/style1.css">
</head>
<body>
<div class="login-box">
<h1>Donor Registration</h1>
<?php 
$fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($fullurl,"reg=fail")==true)
{
	echo "<div class='alert alert-danger'>
  <strong style='color:red;'>Wrong Credentials!</strong> Your password is mismatched!!.
</div>";
}else if(strpos($fullurl,"reg=success")==true){
	echo "<div class='alert alert-success'>
  <strong style='color:green';Success!</strong> You have registered successfully.Now login.
</div>";
}
?>
<form enctype="multipart/form-data" method="post" action="donarregcheck.php">
<div class="text-box">
<i class="fa fa-user" ></i>
<input type="text" placeholder="username" name="name" value="" required>
</div>
<div class="text-box">
<i class="fa fa-map-marker" ></i>
<input type="text" placeholder="address" name="address" value="" required>
</div>
<div class="text-box">
<i class="fa fa-envelope" ></i>
<input type="email" placeholder="Email" name="email" value="" required>
</div>
<div class="text-box">
<i class="fa fa-lock" ></i>
<input type="password" placeholder="Password" name="password" value="" required>
</div>
<div class="text-box">
<i class="fa fa-lock" ></i>
<input type="password" placeholder="Confirm password" name="confirm" value="" required>
</div>
<div class="text-box">
<i class="fa fa-phone" ></i>
<input type="tele" placeholder="Phone No" name="phone" value="" required>
</div>
<div class="text-box">
<i class="fa fa-picture-o" ></i>
<label style="color:gray;padding-left:10px;" > Photo</label>
<input placeholder="Photo" type="file"  name="photo"  required>
</div>
<div class="text-box">
<i class="fa fa-id-card-o" ></i>
<label style="color:gray;padding-left:10px;" >Id Proof</label>
<input type="file" placeholder="Id proof" name="idproof" required>
</div>
<button type="submit" class="btn btn-primary" name="submit">Register</button>
</form>
<p style="color:#4caf50;">If you already have an account?<a href="donarlog.php">Sign In</a></p>
</div>
</body>
</html>