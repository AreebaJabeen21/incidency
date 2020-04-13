<?php include 'include/navHeader.php';
include 'include/config.php';
 ?>
    <div class="container">
        <br>
        <br>
        <br>
        <br>
    <div class="row m-y-2">
        <!-- edit form column -->
        <div class="col-lg-4 text-lg-center">
            <h2>Edit Profile</h2>
        </div>
        <div class="col-lg-8">
          
        </div>
        <div class="col-lg-8 push-lg-4 personal-info">
            <form action="editProfile.php" method="post">
  <div class="form-group">
                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                        <input class="form-control" type="text" value="" name="fname" />
  </div>
  <div class="form-group">
                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                        <input class="form-control" type="text" value="" name="lname" />
  </div>
  <div class="form-group ">
                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                        <input class="form-control" type="email" value="" name="mail" />
    </label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php
$uname=$_SESSION['username'];
$query=mysqli_query($conn,"SELECT * FROM users WHERE user_name='$uname'");
while ($row=mysqli_fetch_assoc($query)) {?>

           
        </div>
        <div class="col-lg-4 pull-lg-8 text-xs-center">
                <img src="<?php echo $row['image'];?>" class="m-x-auto img-fluid img-circle rounded-circle" alt="avatar"style="width: 200px;height: 200px"/>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
Edit Profile
</button>
               
        </div>
    </div>
</div>
 <?php   
}
?>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" action="editProfile.php" >
      
          <div class="form-group">
        <input type="file" name="img">
          </div>
           <button type="submit" class="btn btn-primary float-right" id="Insercomment" name="upload">Upload</button>

        </form>

      </div>
     
    </div>
  </div>
</div>


<?php 

if ( isset($_POST['upload']) ){
  $name_file = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $local_image = "images/";
        $upload = move_uploaded_file($tmp_name,$local_image.$name_file);
         $sql="UPDATE users SET image = '$name_file' WHERE user_name = '$uname'";
        $result=mysqli_query($conn,$sql);
  if ($result==TRUE) {
            print '<script> window.location.assign("editProfile.php")</script>';    
                }
        else{
echo "".$sql."".$conn->error;
        }

  
}
if (isset($_POST['submit'])) {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
      $username=$fname.' '.$lname;
    $mail=$_POST['mail'];
    $sql=mysqli_query($conn,"UPDATE users SET user_name ='$username',email='$mail' WHERE user_name='$uname' ");
     if ($sql==TRUE) {
            print '<script> window.location.assign("editProfile.php")</script>';
          

        }
}
?>

      
<?php 
include 'include/footer.php';
?>