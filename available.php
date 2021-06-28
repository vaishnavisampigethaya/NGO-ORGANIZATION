<html>
	<head>
		<title>NGO Organization</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style3.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
	<section id="nav-bar">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="image/ngologo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.html">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">ABOUT</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="services.html">SERVICES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">CONTACT US</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="available.php">REQUIRED ITEMS</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="require.php">AVAILABLE ITEMS</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="logout.php">LOGOUT</a>
      </li>
    </ul>
  </div>
</nav>
<section id="price">
				<div class="container">
				<h1>REQUIRED ITEMS</h1>
				<?php 
				require('connection.php');
				$sel=mysqli_query($con,"select * from `requested_item`");
				$inc=4;
				while($row=mysqli_fetch_array($sel)){
					$inc = ($inc == 4) ? 1 : $inc+1; 
					if($inc == 1) echo "<div class='row'>"; 
				?>
				<div class="col-md-3">
				<div class="single-price">
				<div class="price-head">
				<h2>Required</h2>
				</div>
				<div class="price-content">
				<ul>
				<li>Product type:<?php echo $row['type'];?></li>
				<li>Product Description:<?php echo $row['prod_desc'];?></li>
				<li>Quantity:<?php echo $row['qnty']?></li>
				<li>Requested by:<?php echo $row['email']; ?></li>
				<form enctype="multipart/form-data"  method="post" action="donate.php">
				<li><label style="color:gray;padding-left:10px;" >Product Photo</label>
                 <input placeholder="Photo" type="file"  name="photo" required></li>
				 <li><input type="hidden" name="id" value="<?php echo  $row['id']; ?>"></li>
				</ul>
				<?php $id=$row['id']; ?>
				<div class="price-button">
				<button class="buy-btn" name="submit1" >DONATE</button>
				</form>
				</div>
				</div>
			</div>
				
		 </div>
		 <?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
	</section>
	<div class="login-box">
<h2>Donate Items</h2>
<?php 
$fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($fullurl,"reg=fail")==true)
{
	echo "<div class='alert alert-danger'>
  <strong>Wrong Credentials!</strong> Please try again!!.
</div>";
}else if(strpos($fullurl,"reg=success")==true){
	echo "<div class='alert alert-success'>
  <strong>Success!</strong> You have donated successfully.
</div>";
}
?>
<form enctype="multipart/form-data"  method="post" action="available1.php">
<div class="text-box">
<i class="fa fa-user" ></i>
<input type="text" placeholder="Name" name="name" value="" required>
</div>
<div class="text-box">
<i class="fa fa-envelope" ></i>
<input type="email" placeholder="Email" name="email" value="" required>
</div>
<div class="text-box">
<i class="fa fa-phone" ></i>
<input type="tele" placeholder="Phone No" name="phone" value="" required>
</div>
<div class="text-box">
<i class="" ></i>
<input type="number" placeholder="Quantity" name="quantity" value="" required>
</div>
<div class="text-box">
<i class="" ></i>
<?php 
require('connection.php');
$position=mysqli_query($con,"SELECT *FROM `types` ");
echo "<label style='color:gray';>Item type</label>";
echo "<select name='type1' style='background:none;color:white;width:80%;'>";
while($row=mysqli_fetch_array($position)) {
echo "<option style='color:black'>";
echo $row['type'];
echo "\n</option>";
}
echo "</select>";
?>
</div>
<div class="text-box">
<i class="fa fa-picture-o" ></i>
<label style="color:gray;padding-left:10px;" >Product Photo</label>
<input placeholder="Photo" type="file"  name="photo"  required >
</div>
<div class="text-box">
<i class="fa fa-id-card-o" ></i>
<label style="color:gray;padding-left:10px;" ></label>
<textarea type="text" placeholder="Product Description" name="description" value="" required></textarea>
</div>
<button type="submit" class="btn btn-primary" name="submit">Donate</button>
</form>
</div>
	<section id="footer">
				<div class="container text-center">
				<p><i class="fa fa-copyright"></i>COPYRIGHT 2020</p>
				</div>
				</section>
	</body>
	</html>