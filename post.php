<?php include 'include/config.php';
session_start();
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

        if($upload){
            echo 'uploaded this file '.$name_file;
        }

        $sql="INSERT INTO report(category_id,report_desc,image,published)VALUES('$val','$des','$name_file','1')";
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
                        echo "succces";
                    }
                    else
                    {
                        echo " error hay: " . $sql2 . "<br>" . $conn->error;
                    }
            }
            else
            {
                echo " error in report: " . $sql . "<br>" . $conn->error;
            }



        }

        if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM report WHERE user_id=$id");

    header('location: home.php');
}


        ?>

   

   