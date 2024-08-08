<?php
	session_start();
	include("include/DB.php");
	
		
		
	if (isset($_POST['content_comment'])){
		$post_id = $_POST['post_id'];
		$content_comment = $_POST['content_comment'];
		$query2=mysqli_query($bd,"select * from `comments` where post_id='$post_id'");
		echo mysqli_num_rows($query2);	
	}
	
	
?>


