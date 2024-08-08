<?php 
session_start();
error_reporting(0);
include("include/DB.php");

if (!isset($_SESSION['login']) ||(trim ($_SESSION['login']) == '')) {
	header('location:index.php');
    exit();
	}

	if(isset($_POST['submit'])) {
		$sql=mysqli_query($bd, "SELECT password FROM  users where password='".md5($_POST['cpass'])."' && username='".$_SESSION['login']."'");
			$num=mysqli_fetch_array($sql);
				if($num>0) {
					mysqli_query($bd, "update users set password='".md5($_POST['npass'])."' where username='".$_SESSION['login']."'");
						echo "<script>
								alert('Password Changed Successfully.');
								window.location.href='newsfeed.php';
								</script>";
							}
					else {
						$_SESSION['msg1']="Old Password not match !!";
						//exit();
				}
		}

?>

<!DOCTYPE html>
<html lang="en">
		<?php include('header.php'); ?>

<script type="text/javascript">
function valid() {
    if(document.chngpwd.cpass.value=="") {
        alert("Current Password Field is Empty !!");
        document.chngpwd.cpass.focus();
        return false;
    }
    else if(document.chngpwd.npass.value==""){
        alert("New Password Field is Empty !!");
        document.chngpwd.npass.focus();
        return false;
    }
    else if(document.chngpwd.cfpass.value==""){
        alert("Confirm Password Field is Empty !!");
        document.chngpwd.cfpass.focus();
        return false;
    }
    else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.chngpwd.cfpass.focus();
        return false;
    }
    return true;
    }
</script>

<body style="font-family: 'Poppins', sans-serif;">

<!-- Navbar -->	  
 <nav class="navbar navbar-expand-lg  navbar-dark bg-primary navbar-fixed-top mb-3">
        <div class="container-fluid">
			<a class="navbar-brand mr-3" href="change-password.php"> <img src="img/buk.jpg" width="auto" class="rounded-circle mr-1" style="" height="70"style="display: inline-block; padding:0px; alt="LOGO"></a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false" >
					<span class="navbar-toggler-icon"></span>
					<span></span>
					<span></span>
					<span></span>
            </button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="newsfeed.php" class="nav-link active-nav hover-underline-animation" style="color:white"><i class="fa fa-home"style="color:white"></i> HOME</a>
			</li>
			
					<li class="nav-item">
						<a href="all-users.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-info-circle"style="color:white"></i> FRIENDS</a>
			</li>
			
					<li class="nav-item">
						<a href="message.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-address-book"style="color:white"></i> MESSAGES</a>
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
					<div class="dropdown-menu hover-underline-animation" style="left: -4.3em;"  aria-labelledby="navbarDropdownMenuLink">
							<a href="change-password.php" class="dropdown-item"><i class="fa fa-key"style="color:blue"></i> Change Passoword</a>
								<a href="logout.php" class="dropdown-item"><i class="fa fa-power-off mr-2"style="color:red"></i> Logout</a>
				</div>	
			</li>
		 </ul>
     </div>  
</nav>
<!--End Navbar -->
	
	<?php } ?>	
	
	<!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single text-primary">Password</h1>
              <span class="color-text-a"> Change Your Password</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="newsfeed.php">Home</a>
                </li>
                <li class="breadcrumb-item active"aria-current="page">
                  Change Password
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
	
<!--Form container -->	
<div id="login-center" class="row justify-content-center align-self-center w-100">
	<div class="form-group  card col-md-5">
		<div class="card-body">
			<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
				<span style="color:red;"><?php echo $_SESSION['msg1']; ?><?php echo $_SESSION['msg1']="";?></span>
					<div class="col-lg-12">
						<b><small class="text-muted"><b>Current Password</b></small></b>
							<div class="row">
								<div class="form-group col-md-12">
									<input type="password" class="form-control" placeholder="Current Password" name='cpass' required>
						</div>																				
					</div>
					
						<b><small class="text-muted"><b>New Password</b></small></b>
							<div class="row">
								<div class="form-group col-md-12">
									<input type="password" class="form-control" placeholder="New Password" name='npass' required>
						</div>																				
					</div>
					
						<b><small class="text-muted"><b>Confirm Password</b></small></b>
							<div class="row">
								<div class="form-group col-md-12">
									<input type="password" class="form-control" placeholder="Confirm New Password" name='cfpass' required>
						</div>																				
					</div>
					
		
						<div class="modal-footer display py-1 px-1">
							<div class="d-block w-100">
								<button class="btn btn-block btn-primary btn-sm" type="submit" name="submit" >Send</button>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>	
<!--End form container -->	
	
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</body>
</html>	