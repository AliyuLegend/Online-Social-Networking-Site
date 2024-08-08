<?php
session_start();
 include('include/DB.php');
			$user=$_SESSION['login'];
			if (isset($_POST['liked'])) {
				$user_id=$_SESSION['login'];
				$post_id = $_POST['post_id'];
				$result = mysqli_query($bd, "SELECT * FROM post WHERE post_id=$post_id");
				$row = mysqli_fetch_array($result);
				$n = $row['likes'];
				
				mysqli_query($bd, "UPDATE post SET likes=$n+1 WHERE post_id=$post_id");
				$update=mysqli_query($bd,"INSERT INTO likes (user_id,post_id)VALUES ('$user_id','$post_id') ");
				//mysqli_query($bd, "INSERT INTO likes(user_id,post_id) VALUES(1,$post_id)");
				exit();	
				
				
			}
			
			if (isset($_POST['unliked'])) {
				$user_id=$_SESSION['login'];
				$post_id = $_POST['post_id'];
				$result = mysqli_query($bd, "SELECT * FROM post WHERE post_id=$post_id");
				$row = mysqli_fetch_array($result);
				$n = $row['likes'];
				
				//delete from likes before updating post
				mysqli_query($bd, "DELETE FROM likes WHERE post_id=$post_id AND user_id='".$_SESSION['login']."'");
				mysqli_query($bd, "UPDATE post SET likes=$n-1 WHERE post_id=$post_id");
				exit();	
			}
			


	?>