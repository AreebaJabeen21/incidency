<?php 
/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT report.report_desc as decription ,report.image as img,report.created_at as createdat,users.user_name as uname FROM report INNER JOIN users on report.user_id = users.user_id WHERE report.published=true";
	$result = mysqli_query($conn, $sql);

	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $posts;
}





// more functions to come here ...
?>