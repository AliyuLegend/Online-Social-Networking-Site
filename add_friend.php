 <?php
session_start();
include('include/DB.php'); 
	
	//ACCEPT FRIEND REQUEST
		if(isset($_GET["accept"])) {
			$myfriend=$_GET['accept'];
			$me= $_SESSION["login"];
				$query = mysqli_query($bd,"SELECT sender, reciever FROM `friend_request`  LEFT JOIN users ON friend_request.reciever = users.id AND friend_request.sender = users.username ");
				 if(mysqli_num_rows($query) > 0) {
					while($row = mysqli_fetch_array($query)) {   		
						mysqli_query($bd, "INSERT INTO friends(my_id,friend_id) VALUES('$me','$myfriend') ") or die(mysql_error());
							$query = mysqli_query($bd, "delete from friend_request WHERE reciever = '" . $_SESSION['login'] . "' AND sender = '" . $_GET["accept"] . "' ");
		
								echo "<script type=\"text/javascript\">
													alert(\"friend Added Successfully\");
													window.location='all-users.php';
												</script>";
									
	
							}
					}
			}
//END OF ACCEPT FRIEND REQUEST
  ?>
  
 