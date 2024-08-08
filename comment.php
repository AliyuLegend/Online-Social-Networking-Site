<?php
	session_start();
	//error_reporting(0);
	include("include/DB.php");
			
	if(isset($_POST['post_comment'])) {
		$user_id=$_SESSION['login'];
		$post_id=$_POST['post_id'];
		$content_comment=$_POST['content_comment'];
		$time=time();
				
		mySQLi_query($bd,"INSERT INTO `comments` (`user_id`, `post_id`, `content_comment`) VALUES ('".$_SESSION['login']."','$post_id','$content_comment')");
		
		echo "<script>window.location='newsfeed.php'</script>";
		}
				
	


?>