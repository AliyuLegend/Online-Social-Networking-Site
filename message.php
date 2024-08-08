<?php
session_start();
error_reporting(0);
include("include/DB.php");

if (!isset($_SESSION['login']) ||(trim ($_SESSION['login']) == '')) {
	header('location:index.php');
    exit();
	}

?>

<!DOCTYPE html>
<html lang="en">
		<?php include('header.php'); ?>

<style>
* {
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}

/* Styling the main container */
.container {
    width: 60%;
    margin: auto;
    margin-top: 2rem;
    letter-spacing: 0.5px;
    height: 80%;
	float:right;
}
.container2 {
    width: 40%;
    margin: auto;
    margin-top: 2rem;
    letter-spacing: 0.5px;

	
}
.chat {
	border: 1px solid #dedede;
	background-color: #f1f1f1;
	border-radius: 5px;
	padding: 10px;
}
.card{
			height: 420px;
			border-radius: 10px !important;
			background-color: rgba(47, 189, 233, 0.4) !important;
		}
@media(max-width: 576px){
	.contacts_card{
		margin-bottom: 15px !important;
	}
	}
img {
    width: 50px;
    vertical-align: middle;
    border-style: none;
    border-radius: 100%;
}

</style>
<body style="font-family: 'Poppins', sans-serif;">

<!-- Navbar -->	  
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary navbar-fixed-top mb-3">
	<div class="container-fluid">
		<a class="navbar-brand mr-3" href="message.php"> <img src="img/buk.jpg" width="auto" class="rounded-circle mr-1" style="" height="70"style="display: inline-block; padding:0px; alt="LOGO"></a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false" >
                <span class="navbar-toggler-icon"></span>
					<span></span>
					<span></span>
					<span></span>
            </button>
		<div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
            <ul class="navbar-nav">
				<li class="nav-item">
					<a href="newsfeed.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-home"style="color:white"></i> HOME</a>
          </li>
			
				<li class="nav-item">
					<a href="conversation.php" class="nav-link active-nav hover-underline-animation" style="color:white"><i class="fa fa-info-circle"style="color:white"></i> MESSAGES</a>
          </li>
			
				<li class="nav-item">
					<a href="all-users.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-address-book"style="color:white"></i> USERS</a>
          </li>
		</ul>
	  </div>
	  <ul class="navbar-nav">
		  <li class="nav-item dropdown">
			<?php 
				$sql=mysqli_query($bd, "select * from users where username='".$_SESSION['login']."'");
					while($data=mysqli_fetch_array($sql)) {  
						$Profile_pic=$data['Profile_pic'];
	?>
			 <a class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">		
                 <span>
						<div class="d-flex badge-pill align-items-center bg-gradient-primary p-1" style="background: #337cca47 linear-gradient(180deg,#268fff17,#007bff66) repeat-x!important;border:50px">
							<div class="rounded-circle mr-1" style="width: 25px;height: 25px;top:-5px;left: -40px">
								<?php echo '<img class="image-fluid image-thumbnail rounded-circle" alt="" style="max-width: calc(100%);height: calc(100%);" src="'.$Profile_pic.'" />'; ?>
					</div>
					<span style="color:white"><b><?php echo ucwords($data['f_name']) ?></b></span>
						<span class="fa fa-angle-down ml-2"></span>
					</div>
			</span>
        </a>
		   <div class="dropdown-menu hover-underline-animation" style="left: -2.7em;" aria-labelledby="navbarDropdownMenuLink">
                <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off mr-2"style="color:red"></i> Logout</a>
        </div>	
       </li>
	 </ul>
  </div>    
</nav>
<!--Navbar -->
<?php } ?>
 

<!-- Send message container -->
<div class="container2 justify-content-center">
	<div class="col-md-6 col-xl-10 chat"><div class="card mb-sm-6 mb-md-0 contacts_card">
		<form method="post" id="send_message" enctype="multipart/form-data" action="send-message.php">								
			<div class="form-group">
				<label for="exampleInputUser" style="display:block;text-align:center;color:red;font-weight:bold;margin:10px;">To:</label>
					<select name="friend_id" class="form-control" placeholder="Username" required>
						<option></option>
							<?php
								$me=$_SESSION['login'];
									$query = mysqli_query($bd, "select users.username, users.f_name , users.oname , users.Profile_pic , friends.friend_id, friends.my_id   from users  , friends
										where friends.friend_id = '" . $_SESSION["login"] . "' and users.username = friends.my_id OR friends.my_id = '" . $_SESSION["login"] . "' and users.username = friends.friend_id  ");
											while($row = mysqli_fetch_array($query)) {
												$friend_name = $row['f_name']." ".$row['oname'];
													$friend_image = $row['Profile_pic'];
														$id = $row['username'];
															?>
																<option value="<?php echo $id; ?>"><?php echo $friend_name; ?><?php ?></option>
														<?php } ?>
												</select>
                                        </div>
										<div class="form-group">
											<label for="exampleInputContent" style="display:block;text-align:center;color:red;font-weight:bold;margin:10px;">Content:</label>
												<textarea name="my_message" class="form-control" cols="90" rows="5" placeholder="Type your message..."></textarea>
                                          </div>
										 <div class="form-group">
											<label for="exampleInputUser" style="display:block;text-align:center;color:red;font-weight:bold;margin:10px;">Add Photo:</label>
												<input type="file" name="image" multiple="multiple" class="form-control"  accept="image/*,video/*">
										</div>
									<hr>
									<button type="submit" class="btn btn-primary btn-block" id="submit" name="submit">
										Send Message <i class="fa fa-arrow-circle-right"></i>
								</button>
                          </form>
					</div>
				</div>
			</div>
<!-- End Send message container -->
		<?php 
			$id=$_GET['f_id'];
			//$query = mysqli_query($bd, "SELECT * FROM message INNER JOIN users on message.sender_id = users.username where username='".$_SESSION['login']."' ");
		$		$query = mysqli_query($bd, "SELECT * FROM message INNER JOIN users ON  message.sender_id=users.username where `username`='$id'
					ORDER BY message.id ASC");
						while($data = mysqli_fetch_assoc($query)) {
	?>

<!--Display Message container -->
	<div class="container">		
    <!-- msg-header section starts -->
		<div class="msg-header">
			<div class="container1">
               <img src="<?php echo $data['Profile_pic'] ?>" class="msgimg">
					<span class="active ">
						Chat With <?php echo $data['username'];?>
                </span>
            </div>
        </div>
        <!-- End msg-header section -->
		<!-- Chat inbox  -->
        <div class="chat-page">
            <div class="msg-inbox">
                <div class="chats">
				<!-- Message container -->
                    <div class="msg-page">
						<?php 
							$user = $_SESSION['login'];
							$output = "";
							$id=$_GET['f_id'];
							$query = mysqli_query($bd,"SELECT * FROM message INNER JOIN users ON `username`='$id' WHERE message.reciever_id = users.username AND message.sender_id = '$user' OR  
							message.reciever_id = '$user' AND message.sender_id = users.username ORDER BY message.id ASC" );

							if(mysqli_num_rows($query) > 0){
								while($row = mysqli_fetch_assoc($query)){
									if($row['sender_id'] === $user){
										$output .= '<div class="outgoing-chats">
											<div class="outgoing-chats-img">
												<img src="">
													</div>
														<div class="outgoing-msg">
															<div class="outgoing-chats-msg">
																<p>'. $row['content'] .'</p>
																	<span class="time">'. $row['date_sended'] .'</span>
											</div>
										</div>
									</div>';
							}else{
								$output .= '<div class="received-chats">
									<div class="received-chats-img">
										<img src="'.$row['Profile_pic'].'" class="rounded-circle user_img alt="">
											</div>
												<div class="received-msg">
													<div class="received-msg-inbox">
														<p>'. $row['content'] .'</p>
															<span class="time">'. $row['date_sended'] .'</span><br>
											</div>
										</div>
									</div>     
							   ';
							}
						}
				}else{
					$output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }				echo $output;
									?>
							</div>				
						</div>
					</div>
				</div>
			</div>
<!--End Display Message container -->
	<?php } ?>

	
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>