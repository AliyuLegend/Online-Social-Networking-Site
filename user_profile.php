<?php
session_start();
//error_reporting(0);
include("include/DB.php");

if (!isset($_SESSION['login']) ||(trim ($_SESSION['login']) == '')) {
	header('location:index.php');
    exit();
	}

	$id=$_GET['f_id'];
		$query="SELECT * FROM `users` WHERE `id`='$id'";
			$run=mysqli_query($bd,$query);
				$result=mysqli_fetch_array($run);
					$friend_id = $result['id'];

?>
<!DOCTYPE html>
<html lang="en">
		<?php include('header.php'); ?>
<style>
.cover-pic{
		width: 100%;
	    height: 100%;
	    object-fit: cover;
	}
	#profile-field{
		background: rgb(246,246,246);
		background: linear-gradient(0deg, rgba(246,246,246,1) 0%, rgba(132,185,238,1) 62%, rgba(0,151,255,1) 100%);
	}
	 
</style>

<body style="font-family: 'Poppins', sans-serif;">

<!-- Navbar -->	  
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary navbar-fixed-top mb-3">
    <div class="container-fluid">
		<a class="navbar-brand mr-3" href="all-users.php"> <img src="img/buk.jpg" width="auto" class="rounded-circle mr-1" style="" height="70"style="display: inline-block; padding:0px; alt="LOGO"></a>
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
					<a href="notification.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-info-circle"style="color:white"></i> FRIEND REQUEST</a>
          </li>
			
				<li class="nav-item">
					<a href="all-users.php" class="nav-link active-nav hover-underline-animation" style="color:white"><i class="fa fa-address-book"style="color:white"></i> USER PROFILE</a>
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
<?php } ?>
<!--/End of Nav bar -->

<?php 
    $sql=mysqli_query($bd, "select * from users where `id`='$id'");
		while($data=mysqli_fetch_array($sql)) {  
		$	$Profile_pic=$data['Profile_pic'];
				$Cover_pic=$data['Cover_pic'];
	?>
	
<!--Profile and Cover Picture -->	
<div class="row shadow-sm" id="profile-field">
	<div class="container">
		<div class="col-lg-10 offset-md-1" style="height:60vh">
			<div class="position-relative image-fluid w-100 mb-1" style="height:65%">
				<?php echo '<img alt="" class="gallery__image cover-pic img-fluid rounded-bottom" src="'.$result['Cover_pic'].'" />'; ?>
					<div class="position-absolute" style="top:85%;right:3%;z-index:1">
						<button data-toggle="modal" data-target="#ModalExample" class="btn btn-link btn-sm bg-dark" type="button" ><i class="fa fa-camera"></i> Edit Cover Photo</button>
				</div>
				<div class="w-100 d-flex justify-content-center position-absolute" style="top:50%">
					<span class="position-relative">
						<?php echo '<img height="200" alt="" class="img-fluid img-thumbnail rounded-circle" style="width:150px;height: 150px" src="'.$result['Profile_pic'].'" />'; ?>
							<a href="" data-toggle="modal" data-target="#exampleModal" id="edit_pp" class="text-dark position-absolute rounded-circle img-thumbnail d-flex justify-content-center align-items-center" style="top:75%;left:75%;width:25px;height: 25px"><i class="fa fa-camera rounded-circle"></i></a>
					</span>
				</div>
			</div>
			<div class="d-block w-100 py-2 px-1 text-center"><br>
				<h2 class="text-dark text-center"><b><?php echo ucwords($result['f_name'].' '.$data['oname']); ?></b></h2>
					<small class="text-muted"><?php echo $result['Status'] ?></small>
			</div>
		</div>
	</div>
</div>
<!--/End of Profile and Cover Picture -->	

<!--Start of User Information -->	
        <div class="d-none d-md-block col-md-3 col-xl-3 left-wrapper">
			<div class="card card-primary">
				<div class="card-header" style="background-color:#2661f5;">
	                <h3 class="card-title tx-11 font-weight-bold mb-0 text-uppercase" style="color:white; font-size:24px;">USER INFORMATION</h3>
	            </div>
                <div class="card-body">
                    <div class="mt-6">
						<label class="tx-11 font-weight-bold mb-0 text-uppercase">USERNAME: </label> <?php echo $result['username'];?>
							<p class="text-muted"></p>
                    </div>
					<div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">STATUS: </label> <?php echo $result['Status'];?>
							<p class="text-muted"></p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">GENDER:</label> <?php  echo $result['gender'];?>
							<p class="text-muted"></p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">EMAIL:</label> <?php echo $result['email'];?>
							<p class="text-muted"></p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">IMAGE:</label><br>
							<?php echo '<img height="200" width="200" src="'.$result['Profile_pic'].'" />'; ?>
                    </div>
				</div>
				<form method="post" action="send.php">
					<input type="hidden" name="reciever" value="<?php echo $result['username'];?>">
						<input type="submit" class="btn btn-primary btn-block" name="add" value="Send Request" />
					</form>
                </div>
            </div>
<!--End of User Information -->	
<?php } ?>
	
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>