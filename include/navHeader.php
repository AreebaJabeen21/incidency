<?php include 'config.php';
session_start();
 
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
 ?>
<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/fontawesome/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/css/style.css">
		<link rel="stylesheet" type="text/css" href="vendor/css/simple-sidebar.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/mapStyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    
		

		<title>Incident Management System</title>
		<style>
			.report{
width: 150px;
height: 150px;
font-size: 30px;
background-color: red;
font-weight: bold;
position: fixed;
 margin: -50px -20px 50px 190px;
}
			
@media only screen and (max-width: 600px) {
  .report {
    position: relative;
    background-color: green;
    margin-top: -330em;
   width: 50px;
   height: 50px;
  }
}


		</style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOfoQEnSeEMhNmp8NI6ZZGulHloVCIZUA&libraries=places&callback=initAutocomplete"
         async defer></script>
	</head>
	<body>
		
		     
    <div class="d-flex" id="wrapper">

            <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="page-content-wrapper">




<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-info fixed-top" >
              <a class="navbar-brand" href="#demo" style="color: white ;font-size: 25px;font-weight: bolder;">
                <img src="images/1.png" alt="Logo" style="width:40px;">Incidency</a>
            
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

  
     
     
    </ul>
    <ul class="navbar-nav ">
              <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fa fa-home"></i>
          Home
          <span class="sr-only">(current)</span>
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">
          <i class="fa fa-phone-alt">
          </i>
          Contact
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-bell">
            <span class="badge badge-success">11</span>
          </i>
          Notifications
        </a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-question-circle">
          </i>
          Help
        </a>
      </li>
       <li class="nav-item dropdown" style="margin-bottom: 3px">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         
       <?php echo $_SESSION['username']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Setting</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item " href="home.php?logout='1'"><button>Log Out</button></a>
        </div>
      </li>
    </ul>
    
  </div>
</nav>

<br>

