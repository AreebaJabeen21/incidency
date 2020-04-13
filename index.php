<?php include 'include/config.php'; ?>
<?php include 'include/headerHome.php';
 
?>
<br>
<div class="container-fluid mt-5">
	
	<div class="row mt-3" style="    margin-bottom: 18%; margin-left: 0.3%">
		<!-- <iframe class=" col-sm-12" src="https://maps.google.com/maps?q=north%20nazimabad&t=&z=13&ie=UTF8&iwloc=&output=embed" height="480"></iframe> -->
		 <input id="pac-input" class="controls form-control" type="text" placeholder="Search Box">
    	<div class="map" >
        <iframe  src="https://maps.google.com/maps?q=Jinnah%20university&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="
    width: 100%;
    height: 100%;
"></iframe> 
      </div>

	</div>
	<br>
	<br>
	<br>
	<br>
	<br>

	<div class="row">
			<div class="col-md-8 md-post"  >
			
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
                        
                          
                        
                     </div>
                 
                  <p id="ps"><?php echo $row['decription'] ?> </p>
                  <img src="<?php echo 'images/'.$row['img'] ?>" id="post-image" alt="hello">
                  <br>
                 </div>
              </div>
            </div>
                    <div class="d-flex justify-content-end ml-3 mr-3">
                      <div>
                        <p style="margin-right: 35px" class="rate"><i class="fas fa-thumbs-up" ></i> <span class="counter"> 3350+</span></p>
                     </div>
                     <div>
                        <p  data-toggle="modal" data-target="#commentsmodel" class="comment"><i class="fas fa-comments"></i> 1586+</p>
                     </div>


                  </div>

               
              
            <p><?php 
            
           $_SESSION['report_id'] = $row['report_id']; 
           $report_id=$_SESSION['report_id'];
          
$query=mysqli_query($conn,"SELECT users.user_name,comment.comment_date,comment.comment_text FROM comment INNER JOIN users on comment.user_id=users.user_id where Comment.report_id='$report_id'");
           ?></p>
            
          </div>
        </div>
   
<?php } ?>






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
         $report_id=$_SESSION['report_id'];


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
      		<div class="col-md-4">
			
			
<a href="login.php" class="float">
<i class="fas fa-plus  my-float"></i>
</a>
		</div>
		
		
		
	</div> </div>
	
	<!-- /#page-content-wrapper -->
</div>
</div>
<?php include 'include/footer.php';?>
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



  

   ?>