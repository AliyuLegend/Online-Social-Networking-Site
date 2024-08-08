<?php 
session_start();
include('include/DB.php'); 

//START OF ADD FRIEND
  if(isset($_POST["add"])) {
		$user_id=$_SESSION['login'];
		$reciever = $_POST['reciever'];
			$query = mysqli_query($bd, "SELECT username FROM users WHERE username = '" . $_SESSION["login"] . "'");
				if(mysqli_num_rows($query) > 0) {
					$_query = mysqli_query($bd, "SELECT * FROM friend_request WHERE sender = '" . $_SESSION["login"] . "' AND reciever = '$reciever'");
						if(mysqli_num_rows($_query) == 0) {			
							mysqli_query($bd, "INSERT INTO `friend_request`(`sender`, `reciever`) VALUES ('$user_id','$reciever')");
							
							echo "<script>
											alert('Request Sent Successfully');
											window.location.href='all-users.php';
											</script>";
						}
					} 
				}
//END OF ADD FRIEND

?>