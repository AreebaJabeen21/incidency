<?php include 'include/config.php'; 
 include 'include/header.php';  
 session_start();
 ?>
<link rel="stylesheet" type="text/css" href="vendor/css/content.css">
<br>
<style >
  .autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
      margin-top: -9px;

}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
<div class="container-fluid mt-5">
  <div class="row mt-3">
    <div class="col-md-8 md-post"  >
      <form action="home.php" method="post"  enctype="multipart/form-data">
        <div class="card bg-light ">
          <div class="card-header ">Create Post</div>
          <div class="card-body">
            <?php
              $username=$_SESSION['username'];
            $qu=mysqli_query($conn,"SELECT image FROM users where user_name='$username'");
            while ($row=mysqli_fetch_assoc($qu)) {?>
              
        
            <div class="media">
              <img src="<?php echo $row['image']; ?>" alt="John Doe" class="mr-3  mt-2 rounded-circle" style="width:60px; ">
                   
              <div class="media-body mt-2">
                <textarea type="text" class="form-control" id="input" name="description" placeholder="Enter Description Here.."  >
                </textarea>
                <br>
              <?php  } ?>
                <!-- Nav pills -->
                <ul class="nav nav-pills" role="tablist">
                  
                  <li class="nav-item btn-sm">
                    <a class="nav-link btn btn-sm btn-outline-info mr-1" data-toggle="pill" href="#list1">
                      <i class='fas fa-list'></i> &nbsp;Incident List
                    </a>
                  </li>
                  <li class="nav-item btn-sm">
                    <a class="nav-link btn btn-sm btn-outline-info mr-1" data-toggle="pill" href="#location1">
                      <i class='fas fa-search-location'></i> &nbsp;Add Incident Location
                    </a>
                  </li>
                  <li class="nav-item btn-sm">
                    <a class="nav-link btn btn-sm btn-outline-info mr-1" data-toggle="pill" href="#images1">
                      <i class='far fa-images'></i> &nbsp;Photos
                    </a>
                  </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <!--LIST TAB-->
                  <div id="list1" class="tab-pane fade siz p-3"><br>
                    <h6>Incident Categories</h6>
                    <!--CheckBox-->
                    <div class="form-check-inline siz-p mr-5">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="categ[]" value="1">Road Accident
                      </label>
                    </div>
                    <div class="form-check-inline siz-p mr-5">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="categ[]"  value="2">Vehicle Accident
                      </label>
                    </div>
                    <div class="form-check-inline siz-p ">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="categ[]"  value="3">Road Construction
                      </label>
                    </div>
                    <div class="form-check-inline siz-p mt-2 mr-4">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="categ[]" value="4">Snatching Incident
                      </label>
                    </div>
                    <div class="form-check-inline siz-p mt-2 mr-3">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="categ[]" value="5">Environmental Incident
                      </label>
                    </div>
                    <div class="form-check-inline siz-p mt-2">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="categ[]" value="6">Unlawful activity
                      </label>
                    </div>
                    <div class="form-check-inline siz-p mt-2">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="categ[]" value="7 ">Other
                      </label>
                    </div>
                  </div>
                  <!--LOCATION TAB-->
                  <div id="location1" class="tab-pane fade siz p-3"><br>
                    
                 
                    
                    <div class="btn-group">
                      <!--Location DropDown-->
                      <label for="loc" class="siz-f mr-2">Location: </label>
                   
                   
                      <!--Area DropDown-->
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOfoQEnSeEMhNmp8NI6ZZGulHloVCIZUA&libraries=places&callback=initAutocomplete"></script>
<form autocomplete="off" action="/action_page.php">
  <div class="autocomplete" style="width:300px;">
    <input id="myInput" type="text" name="myCountry" placeholder="Country">
  </div>

</form>



    
 


                    </div>
                    
                    <br><br>
                    
                  </div>
                  <!--IMAGES TAB-->
                  <div id="images1" class="tab-pane fade siz p-3"><br>
                    <h6>Incident Photo(s)</h6>
                    <p class="siz-p">Attachment</p>
                      <input class="btn btn-sm" type="file" name="img" multiple="multiple">
                    
                   
                  </div>
                </div>
                <button class="btn btn-sm btn-info float-right" onclick="GetLocation()" value="Get Location" name="post" id="btn-post">POST</button>
              </div>
            </div>
          </div>
        </div></form>
        
         <div ><img src="images/loader1.gif" id="loader" width="200" style="display: none;"></div>  
<div id="result">

<!--*********************************************************************************************************************************-->

        <!--fetch data into card-->
        <?php   $sql2 = "SELECT  report.report_id, report.report_desc as decription ,report.user_id  ,report.image as img,report.created_at as createdat,users.user_name as uname,users.image as uimg FROM report INNER JOIN users on report.user_id = users.user_id 
        WHERE report.published=true ORDER BY report_id DESC";
        $result = mysqli_query($conn, $sql2); ?>
      <?php while($row=mysqli_fetch_assoc($result)) {?>
        <div class="card bg-light mt-3">
          <div class="content">
            <div class="card-body">
              <div class="media p-2">
                <img src="<?php echo $row['uimg']; ?>" alt="John Doe" class="mr-3  rounded-circle" style="width:60px;">
                <div class="media-body ">
                    <div class="d-flex justify-content-between ">
                       <div> 
                           <h6 id="hname"><?php   echo $row['uname']; ?>
                           <br>
                           <small>
                           <?php  echo $row['createdat'];   ?>
                           </small>
                           </h6>
                        </div>
                         <div class="dropdown dropleft">
                            <button  type="button" class="btn btn-sm bg-light text-info  " data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                             <div class="dropdown-menu">
                               <ul class="list-group list-group-flush">
                                  <li class="list-group-item align-items-center " style="padding: 1px; "><a class="dropdown-item ellipsis-drp" data-toggle="modal" data-target="#report_modal" href="index.php?edit=<?php echo $row['report_id']; ?>">Edit</a></li>
                                  <?php $_SESSION['report_id']=$row['report_id']; 

                                  ?>
                                  <li class="list-group-item align-items-center "style="padding: 1px; "><a class="dropdown-item ellipsis-drp" 
                                    href="home.php?del=<?php echo $row['user_id'];  ?>">Delete</a></li>
                                 
                                </ul>
                               
                             
                             </div>
                          </div>
                          
                        
                     </div>
                 
                  <p id="ps"><?php echo $row['decription'] ?> </p>
                  <img src="<?php echo 'images/'.$row['img'] ?>" id="post-image" alt="hello">
                  <br>
                 </div>
              </div>
            </div>
                <?php
                     $q=mysqli_query($conn,"SELECT * from comment");
                     $count=mysqli_num_rows($q);
                    
                     ?>
                    <div class="d-flex justify-content-end ml-3 mr-3">
                      <div>
                        <p style="margin-right: 35px" class="rate"><i class="fas fa-thumbs-up" ></i> <span class="counter"> 3350+</span></p>
                     </div>
                     <div>
                        <p  data-toggle="modal" data-target="#commentsmodel" class="comment"><i class="fas fa-comments"></i> <?php  echo $count?>+</p>
                     </div>



                  </div>
              <div class="card-footer bg-light d-flex">

               
                  <button type="button" class="btn btn-sm btn-outline-info rate"  style="    margin-left: 2%;"><i class='fas fa-thumbs-up'></i> Agreed</button>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-sm btn-outline-info " data-toggle="modal" data-target="#exampleModalCenter" style="    margin-left: 2%;"><i class="fas fa-comments "></i> Comment</button>
            <p><?php 
            
           $_SESSION['report_id'] = $row['report_id']; 
           $report_id=$_SESSION['report_id'];
       

           ?></p>
            </div>
          </div>
        </div>



<!--edit Modal -->
<div class="modal fade" id="report_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="home.php">
     <textarea class="form-control" rows="5" name ="updatedes" ><?php  echo $row['decription']?></textarea>
     <br>
        <button type="submit" class="btn btn-primary float-right" name="update">Update</button>
</form>
      </div>       
    
    </div>
  </div>
</div>
   
<?php } ?>
<script >
  $(document ).ready
</script>




<!--Add comment Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" action="home.php" id="comment_form">
      
          <div class="form-group">
            <textarea class="form-control" placeholder="Add a Comment"  name="Comment" required="required" id="message-text"></textarea>
          </div>
           <button type="submit" class="btn btn-primary float-right" id="Insercomment" name="CommentPost">Comment</button>

        </form>

      </div>
     
    </div>
  </div>
</div>

<!--Show Comment Modal -->
        <!--comments-->

<div class="modal fade" id="commentsmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
       

$query=mysqli_query($conn,"SELECT users.user_name,comment.comment_date,comment.comment_text FROM comment INNER JOIN users on comment.user_id=users.user_id ");
while ($row=mysqli_fetch_assoc($query)) {?>
         
    
         <div id="display_comment">
           <div class="comment-list ">
             <div>
               <p class="comment-username"><?php echo $row['user_name'];?></p>
               <p class="comment-datetime "><?php echo $row['comment_date'];?></p>
               <p class="comment-data"><?php echo $row['comment_text'];?></p>
             </div>
           </div>
         </div>
            <?php } ?>




      
      </div>
     
    </div>
  </div>
</div>

<?php 

if ( isset($_POST['CommentPost']) ){
  $Comment=$_POST['Comment'];


        $username=$_SESSION['username'];
        $query=mysqli_query($conn,"SELECT user_id from users WHERE user_name='$username'");
        while($row=mysqli_fetch_assoc($query)){
          $uid=$row['user_id'];
        }
        $report_id=$_SESSION['report_id'];


        $sql="INSERT INTO comment (report_id, user_id,  comment_text) VALUES('$report_id','$uid','$Comment')";
        $result=mysqli_query($conn,$sql);
        if ($result==TRUE) {
            print '<script> window.location.assign("home.php")</script>';
          

        }

  
}
?>

<!--*********************************************************************************************************************************-->
</div>
        <!--End Middle Column -->
        <br>
        <p class="text-info text-center">No More Posts</p>
        <br>
      </div>
      
      
      <div class="col-md-2">
        <h6>Location of Incident On Map</h6>
        
        <input id="pac-input" class="controls form-control" type="text" placeholder="Search Box">
      <div class="map" style="width: 180%;
    height: 18%;">
        <iframe  src="https://maps.google.com/maps?q=Jinnah%20university&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="
    width: 100%;
    height: 100%;
"></iframe>
    </div>
        
      </div>
      
    </div> </div>

     

    
    <!-- /#page-content-wrapper -->
  </div>

  <?php include 'include/footer.php';?>
  <script type="text/javascript">
    <!--
        function GetLocation() {
            var geocoder = new google.maps.Geocoder();
            var address = document.getElementById("myInput").value;
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                 
    

                   <?php 
                   $lati='<script>var latitude = results[0].geometry.location.lat();</script>';                 
                   $longi='<script>var longitude = results[0].geometry.location.lat();</script>';                 

                   session_start();

       
                   $_SESSION['latitude'] = $lati;
                   $_SESSION['longitude'] = $longi;


                   ?>
                  
                } else {
                    alert("Request failed.")
                }
            });
        };
        //-->
    </script>


    <?php include 'include/config.php';
            if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $query1=mysqli_query($conn,"SELECT report_id FROM report WHERE user_id=$id");
    $numrows=mysqli_num_rows($query1); 
    
   if($numrows>0)  
    {  
       while($row=mysqli_fetch_assoc($query1))  
       {  
         $report_id=$row['report_id'];  
       }
       
       mysqli_query($conn,"DELETE FROM location WHERE report_id=$report_id");
       

            
              mysqli_query($conn,"DELETE FROM report WHERE user_id=$id");

            print '<script> window.location.assign("home.php")</script>';
            
           
    }
       
   

    
}

if ( isset($_POST['post']) ){
$lati=$_SESSION['latitude'];
$longi= $_SESSION['longitude'];
       $val=implode(',', $_POST['categ']);
        
        $des=$_POST['description'];
        $loc=$_POST['myCountry'];
        $name_file = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $local_image = "images/";
        $upload = move_uploaded_file($tmp_name,$local_image.$name_file);
        $username=$_SESSION['username'];
        $query4=mysqli_query($conn,"SELECT user_id from users WHERE user_name='$username'");
        while($row=mysqli_fetch_assoc($query4)){
          $uid=$row['user_id'];
        }
        $sql="INSERT INTO report(category_id,user_id,report_desc,image,published)VALUES('$val','$uid','$des','$name_file','1')";
        $result=mysqli_query($conn,$sql);
         if ($result === true)
            {
                $query3= mysqli_query($conn,"SELECT report_id FROM report WHERE report_desc='$des'");
                   while ($row=mysqli_fetch_assoc($query3)) 
                   {
                       $report_id=$row['report_id'];
                      
                   }

                    echo $report_id;
                     $sql2="INSERT INTO location( report_id,latitude, longitude, loc_name, country_code) VALUES ('$report_id','$lati',' $longi ','$loc','2')";
                    if ($conn->query($sql2) === TRUE)
                    {
                print'<script>window.alert("Successfully Post Created");</script>';
            print '<script> window.location.assign("home.php")</script>';

                    }
                    else
                    {
                print'<script>window.alert("Insert Location");</script>';
                    }
            }
            else
            {
                print'<script>window.alert("Failed to create post");</script>';
            }
            if($upload==false){
                print'<script>window.alert("Image not uploaded");</script>';
        }        }


if ( isset($_POST['update']) ){
$des=$_POST['updatedes'];
$id=$_SESSION['report_id'];

$sql=mysqli_query($conn,"UPDATE report SET report_desc='$des' where report_id='$id'");
if ($sql=TRUE) {
  
}
else{
                print'<script>window.alert("Not updated");</script>';

}

}


        ?>
        
