<?php include 'include/config.php'; 
include 'include/firstheader.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="vendor/css/style3.css">
	
	</head>
	<body>
		<div class="container-fluid" style="background-image: url('images/12.jpg'); min-height: 100vh;">
			
			<div class="row justify-content-center">
				
				<section class="col-12 col-sm-6 col-md-3">
					<form class="form-container" action="login.php" method="post">
						<h3> LOGIN</h3>
<hr>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" name="email"  required="required" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="Enter email">
				
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" name="password" required="required" id="exampleInputPassword1" placeholder="Password">
						</div>
					
						<button type="submit" name="submit" class="btn btn-block bg-info">Submit</button>
						<p class="ml-3 mt-2">Don't have an account<a href="registration.php">Signup</a></p>
					</form>
				</section>
			</div>
		</div>
	</body>
</html>
<?php
//************************Check Login****************************


  
 

if(isset($_POST["submit"])){  
  
if(!empty($_POST['email']) && !empty($_POST['password'])) {  
    $email=$_POST['email'];  
    $password=$_POST['password'];  
  
 
  
    $query=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");

    $numrows=mysqli_num_rows($query); 
    echo $numrows; 
       if($numrows>0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['email'];  
    $dbpassword=$row['password'];  
    }  
  
    if($email == $dbusername && $password == $dbpassword)  
    {  
    	$query2=mysqli_query($conn,"SELECT user_name FROM users WHERE email='$email'");
    	while ($row=mysqli_fetch_assoc($query2)) {
    		$username=$row['user_name'];
    	}

    session_start();  
      
      $_SESSION['username']=$username;  
  
    /* Redirect browser */  
            print '<script> window.location.assign("home.php")</script>';
  
    }  
    } else {  
    	print'<script>window.alert("Invalid username or password!");</script>';
    }  
  
}  
}  
?>

