<?php
include 'include/config.php';
include 'include/firstheader.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration Form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" href="vendor/css/style2.css">
	</head>
	<body>
		<br>
		<br>
		<br>
		<div class="wrapper" style="background-image: url('images/12.jpg');">
			<div class="inner ">
				<div class="image-holder">
					<img src="images/bg.jpg" style="height: 500px" alt="">
				</div>
				<form action="checkRegistration.php" method="post">
					<h3>Create Account</h3>
					<div class="form-group">
						<input type="text" name="fname" id="fname" placeholder="First Name" required="required" class="form-control">
						<input type="text" name="lname"  id="lname" placeholder="Last Name" required="required" class="form-control">
					</div>
					
					<div class="form-wrapper">
						<input type="text" name="email" id="mail" placeholder="Email Address" required="required" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select name="gender" id="gender"  required="required" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="password_1" required="required" id="pass" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" name="password_2"  required="required" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button  name="reg_user" class="bg-info" id="btnsubmit">Submit</button>
					<p style="margin-top: 20px; margin-left: 50px">Already have an account?<a href="login.php">Sign In</a></p>
					<h5 id="status"></h5>
				</form>
			</div>
		</div>
		
	</body>
</html>
