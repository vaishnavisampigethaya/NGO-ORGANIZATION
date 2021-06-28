<?php
 session_start();
 session_destroy();
 header("location:../index.html");
 ?><html>
<body background="5.jpg">
<center>
<h1>You have successfully logged out of your control pannel.</h1>
<p>Return to</p>
<a href="admin.php">Login</a>
</center>
</body>
</html>