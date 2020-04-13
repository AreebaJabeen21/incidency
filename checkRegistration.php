<?php 
  // connect to database
include 'include/config.php';


 

  // variable declaration
  $fname = "";
  $lname = "";
  $username = "";
  $email    = "";
  $gender = "";
  $errors = array(); 
  $_SESSION['success'] = "";
$bool=true;


  // REGISTER USER
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    // receive all input values from the form
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $username=$fname.' '.$lname;
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

     $sql=mysqli_query($conn,"select * from users");
     while ($row=mysqli_fetch_assoc($sql)) 
     {
        $tbuser=$row['email'];
        if ($email==$tbuser)
         {
          print'<script >window.alert("User name already taken");</script>';
          $bool=false;
         } 
    }

    if ($bool) 
    {
       $password = $password_1;
       $query = "INSERT INTO users(user_name, password,image,email, user_role, gender) VALUES ('$username','$password','images/ava.png', '$email','user','$gender')";
       mysqli_query($conn,$query);
       $_SESSION['username'] = $username;
       $_SESSION['success'] = "You are now logged in";
            print '<script> window.location.assign("home.php")</script>';
       
    }



  }


 
?>
