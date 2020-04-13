<?php

$server="localhost";
$username="stigpk_incident_tracking";
$password="DI+1!TNfru=n";
$database="stigpk_incident_tracking";

$conn=new mysqli($server,$username,$password,$database);

if ($conn->connect_error) {
die("connection failed".$conn->connect_error);
}
else
{
    echo 'Successfull';
}



mysqli_query($conn,"CREATE TABLE `users` ( `user_id` int(255) NOT NULL, `user_name` varchar(255) NOT NULL, `password` varchar(255) NOT NULL, `image` varchar(255) NOT NULL, `email` varchar(50) NOT NULL, `user_role` text NOT NULL, `gender` varchar(255) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
mysqli_query($conn,"CREATE TABLE `category` ( `category_id` int(255) NOT NULL, `category_name` varchar(255) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
mysqli_query($conn,"	
CREATE TABLE `comment` ( `comment_id` int(255) NOT NULL, `report_id` int(255) NOT NULL, `user_id` int(255) NOT NULL, `comment_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6), `comment_text` varchar(5000) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
mysqli_query($conn,"CREATE TABLE `location` ( `report_id` int(255) NOT NULL, `latitude` varchar(255) NOT NULL, `longitude` varchar(255) NOT NULL, `loc_name` varchar(255) NOT NULL, `country_code` varchar(255) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
mysqli_query($conn,"CREATE TABLE `rate` ( `rate_id` int(255) NOT NULL, `report_id` int(255) NOT NULL, `user_id` int(255) NOT NULL, `artical_rate` int(255) NOT NULL, `user_rate` int(255) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
mysqli_query($conn,"CREATE TABLE `report` ( `report_id` int(255) NOT NULL, `category_id` int(255) NOT NULL, `user_id` int(255) NOT NULL, `report_desc` varchar(255) NOT NULL, `image` varchar(255) NOT NULL, `published` tinyint(1) NOT NULL, `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
mysqli_query($conn,"INSERT INTO `category`(`category_id`, `category_name`) VALUES (5,"Unlawful Activity"),(3,"Snatching Incident"),(2,"Road Construction"),(1,"Road Accident"),(7,"Other"),(4,"Environment Incident"),(6,"Danger Zone")");

?>





