<?php 
include('include/config.php');

if(isset($_POST["action"]))
{
 $query = "SELECT  report.report_id, report.report_desc as decription ,report.user_id  ,report.image as img,report.created_at as createdat,users.user_name as uname,users.image as uimg FROM report INNER JOIN users on report.user_id = users.user_id 
        WHERE report.published=true ORDER BY report_id DESC";



 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '

<!--*********************************************************************************************************************************-->

        <!--fetch data into card-->
        <?php  
 
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
                                  <li class="list-group-item align-items-center " style="padding: 1px; "><a class="dropdown-item ellipsis-drp" href="#">Edit</a></li>
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
                    <div class="d-flex justify-content-end ml-3 mr-3">
                      <div>
                        <p style="margin-right: 35px" class="rate"><i class="fas fa-thumbs-up" ></i> <span class="counter"> 3350+</span></p>
                     </div>
                     <div>
                        <p  data-toggle="modal" data-target="#commentsmodel" class="comment"><i class="fas fa-comments"></i> 1586+</p>
                     </div>


                  </div>
              <div class="card-footer bg-light d-flex">

               
                  <button type="button" class="btn btn-sm btn-outline-info " style="    margin-left: 2%;"><i class='fas fa-thumbs-up'></i> Agreed</button>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-sm btn-outline-info " data-toggle="modal" data-target="#exampleModalCenter" style="    margin-left: 2%;"><i class="fas fa-comments "></i> Comment</button>
            <p><?php 
            
           $_SESSION['report_id'] = $row['report_id']; 
           $report_id=$_SESSION['report_id'];
           echo $report_id;
$query=mysqli_query($conn,"SELECT users.user_name,comment.comment_date,comment.comment_text FROM comment INNER JOIN users on comment.user_id=users.user_id where Comment.report_id='$report_id'");
           ?></p>
            </div>
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
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>
