<?php 
session_start();
//error_reporting(0);
include("../include/DB.php");    // Including Database Connection
if (!isset($_SESSION['login']) ||(trim ($_SESSION['login']) == '')) {
	header('location:index.php');
    exit();
	}
	
	
$did=intval($_GET['id']);
    if(isset($_POST['submit'])) {
        $f_name=$_POST['f_name'];
        $oname = $_POST['oname'];
        $username=$_POST['username'];
        //$password= md5($_POST['password']);
        //$confirm_password=md5($_POST['cpassword']);
        $number=$_POST['number'];
		$email=$_POST['email'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
		$Religious=$_POST['Religious'];
		$Status=$_POST['Status'];
		
		$sql=mysqli_query($bd, "Update users set f_name='$f_name',oname='$oname',username='$username',number='$number',email='$email',gender='$gender',dob='$dob',address='$address', Religious='$Religious',Status='$Status'  where username='".$_SESSION['login']."'");
			if($sql) {		
					echo "<script>
						alert('Profile Successfully Updated!');
						window.location.href='newsfeed.php';
						</script>";
				}
			}
	?>


<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			
			<!--CSS-->
			<link href='../css/style.css' rel='stylesheet' type='text/css'  media='all' />
			
			<!-- Boostrap -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
				 
			<!-- Font Awesome CSS -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
				
			<!-- Google Fonts -->
			<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

	<title>FCSITLink Network</title>

</head>

<body style="font-family: 'Poppins', sans-serif;">
 
 <!-- Navbar -->	  
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary navbar-fixed-top mb-3">
     <div class="container-fluid">
            <a class="navbar-brand mr-3" href="dashboard.php"> <img src="../img/buk.jpg" width="auto" class="rounded-circle mr-1" style="" height="70"style="display: inline-block; padding:0px; alt="LOGO"></a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false" >
					<span class="navbar-toggler-icon"></span>
						<span></span>
							<span></span>
								<span></span>
            </button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="dashboard.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-home"style="color:white"></i> Home</a>
          </li>
			
					<li class="nav-item dropdown">
						<a class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">				
						<span style="color:white"><b>Users</b></span>
							<span class="fa fa-angle-down ml-2"></span>
				</a>
		   
					<div class="dropdown-menu hover-underline-animation" aria-labelledby="navbarDropdownMenuLink">
						<a href="manage-users.php" class="dropdown-item hover-underline-animation"><i class="fa fa-book"style="color:blue"></i> Manage Users</a>
							<a href="validate-users.php" class="dropdown-item hover-underline-animation"><i class="fa fa-child"style="color:red"></i> Validate Users</a>
				</div>
			</li>
			
					<li class="nav-item">
						<a href="manage-post.php" class="nav-link  hover-underline-animation" style="color:white"><i class="fa fa-envelope"style="color:white"></i> Manage Post</a>
          </li>
		  
					<li class="nav-item">
						<a href="post-update.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-address-card"style="color:white"></i> Post Update</a>
          </li>
   
					<li class="nav-item">
						<a href="logout.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-power-off"style="color:red"></i> LOG OUT</a>
			</li>
		</ul>
    </div>    
</nav>
<!-- End Navbar -->
	
	<!-- Intro Single -->	    
	<section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single text-primary">Admin</h1>
              <span class="color-text-a"> User Details</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="manage-users.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  User Details
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
	
	<?php 
        $sql=mysqli_query($bd, "select * from users where id='$did'");
			while($data=mysqli_fetch_array($sql)) {  
	?>
	
<!--Form container -->
<div id="login-center" class="row justify-content-center align-self-center w-100">
  	<div class="form-group  card col-md-6">
		<div class="card-body">
			<form action="" role="form" name="edit" method="post">
				<div id="msg"></div>
					
					<b><small class="text-muted"><b>Name</b></small></b>
						<div class="row">
							<div class="form-group col-md-6">
								<input type="text" class="form-control"  required="required" name="f_name" value="<?php echo htmlentities($data['f_name']);?>" >
					</div>																				
						<div class="form-group col-md-6">
							<input type="text" class="form-control" placeholder="Last name" name='oname' value="<?php echo htmlentities($data['oname']); ?>">
						</div>
					</div>
					
					<b><small class="text-muted"><b>Email and Username</b></small></b>
						<div class="row">
							<div class="form-group col-md-6">
								<input type="email" class="form-control" placeholder="Email" name='email' value="<?php echo htmlentities($data['email']); ?>">
					</div>
						<div class="form-group col-md-6">
							<input type="text" class="form-control" placeholder="Username" name='username' value="<?php echo htmlentities($data['username']); ?>">
						</div>
					</div>
					
					<b><small class="text-muted"><b>Birthday</b></small></b>
						<div class="row">
							<div class="form-group col-md-6">
							<input type="date" class="form-control" placeholder="Birthday" name='dob' value="<?php echo htmlentities($data['dob']); ?>">
						</div>
					<div class="form-group col-md-6">
							<input type="text" class="form-control" placeholder="Phone Number" name='number' value="<?php echo htmlentities($data['number']); ?>">
						</div>
					</div>
					
					<b><small class="text-muted"><b>Gender</b></small></b>
						<div class="row">
							<div class="form-group col-md-4">
								<div class="d-flex w-100 justify-content-between p-1 border rounded align-items center">
									<label for="gfemale">Female</label>
										<div class="form-check d-flex w-100 justify-content-end">
											<input class="form-check-input" type="radio" checked="" id="gfemale" name="gender" value="Female" <?php echo htmlentities($data['gender']) == "Female" ? "checked" : '' ?>>
					            </div>
							</div>
			            </div>
			            <div class="form-group col-md-4">
							<div class="d-flex w-100 justify-content-between p-1 border rounded align-items center">
								<label for="gmale">Male</label>
									<div class="form-check d-flex w-100 justify-content-end">
										<input class="form-check-input" type="radio" id="gmale" name="gender" value="Male"  <?php echo htmlentities($data['gender']) == "Male" ? "checked" : '' ?>>
					            </div>
							</div>
			            </div>
					</div>
					
					<b><small class="text-muted"><b>Address</b></small></b>
						<div class="row">
							<div class="form-group col-md-12">
								<input type="text" class="form-control" placeholder="Contact Address" name='address' value="<?php echo htmlentities($data['address']); ?>">
						</div>
					</div>
					
					<b><small class="text-muted"><b>Religious and Status</b></small></b>
						<div class="row">
							<div class="form-group col-md-6">
								<input type="text" class="form-control" placeholder="Religious" name='Religious' value="<?php echo htmlentities($data['Religious']);?>" >
					</div>																				
						<div class="form-group col-md-6">
							<input type="text" class="form-control" placeholder="Status" name='Status' value="<?php echo htmlentities($data['Status']); ?>">
						</div>
					</div>
					<?php } ?>
		
					<button class="btn btn-block btn-primary btn-sm" type="submit" name="submit" >Update</button>

			</form>
		</div>
	</div>
</div>
<!--End form container -->	

<!--Boostrap Js -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- End Boostrap Js -->
</body>
</html>