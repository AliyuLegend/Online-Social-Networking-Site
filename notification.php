<?php
session_start();
//error_reporting(0);

include("include/DB.php");
	
if (!isset($_SESSION['login']) ||(trim ($_SESSION['login']) == '')) {
	header('location:index.php');
    exit();
	}

?>
<!DOCTYPE html>
<html lang="en">
		<?php include('header.php'); ?>

<body style="font-family: 'Poppins', sans-serif;">

<!-- Navbar -->	  
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary navbar-fixed-top mb-3">
    <div class="container-fluid">
		<a class="navbar-brand mr-3" href="notification.php"> <img src="img/buk.jpg" width="auto" class="rounded-circle mr-1" style="" height="70"style="display: inline-block; padding:0px; alt="LOGO"></a>
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
					<a href="all-users.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-info-circle"style="color:white"></i> ALL USERS</a>
          </li>
			
				<li class="nav-item">
					<a href="notification.php" class="nav-link active-nav hover-underline-animation" style="color:white"><i class="fa fa-address-book"style="color:white"></i> FRIEND REQUEST</a>
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
<!-- End Navbar -->				
<?php } ?>
				
<?php 
	$sql=mysqli_query($bd, "select * from users where username='".$_SESSION['login']."'");
		while($data=mysqli_fetch_array($sql)) {  
			$Profile_pic=$data['Profile_pic'];
				$friend_id = $data['id'];
	?>

				<div id="fb">
					<div id="fb-top">
						<p><b>Friend Requests</b></p>
					</div>
					<div id="fb-body">
						<?php
							$query = mysqli_query($bd,"SELECT sender, reciever FROM `friend_request` JOIN users ON friend_request.reciever = users.username where username='".$_SESSION['login']."'");
								if(mysqli_num_rows($query) > 0) {
									while($row = mysqli_fetch_array($query)) {   
										$_query = mysqli_query($bd,"SELECT * FROM users WHERE username = '" . $row["sender"] . "'");
											while($_row = mysqli_fetch_array($_query)) {
												echo '<img src="'.$_row['Profile_pic'].'" height="100" width="100" alt="Profile image" />
													<p id="info"><b>'.$_row['f_name'].' '.$_row['oname'].'</b> <br></p>
														<div id="button-block">
															<a href="add_friend.php?accept=' .$row['sender'].' " class="see_profileBtn">Accept Request</a><span>
																<a href="process.php?send='.$_row['id'].'" class="see_profileBtn">Delete Request</a><br></span>
													</div>';
												}
											}
										}  
								else {  
						    echo"<div class='myfriend_div1'>
						<br><br>	You do not have any pending request  </li>			
                  </div>";
				}
			mysqli_close($bd);
          ?>
		</div>
   </div>
<?php } ?>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>