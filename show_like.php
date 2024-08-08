<?php
	session_start();
	include("include/DB.php");
	
		
		
	if (isset($_POST['showlike'])){
		$post_id = $_POST['post_id'];
		$query2=mysqli_query($bd,"select * from `likes` where post_id='$post_id'");
		echo mysqli_num_rows($query2);	
	}
	
	
?>

		
		
	