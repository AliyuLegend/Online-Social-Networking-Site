<?php   
session_start();
error_reporting(0);
include('../include/DB.php'); // Including Database Connection
	if(isset($_POST['submit'])) {
		$ret=mysqli_query($bd, "SELECT * FROM admin WHERE username='".$_POST['username']."' and password='".$_POST['password']."'");
			$num=mysqli_fetch_array($ret);
				if($num>0) {	
					$extra="dashboard.php";
						$_SESSION['login']=$_POST['username'];
							header("location: $extra");
					}
								else {
									$_SESSION['errmsg']="Invalid username or password";
										$extra="index.php";
											header("location: $extra");
												exit();
													//echo "<script>alert('Invalid Details');</script>";
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
		<a class="navbar-brand mr-3" href="index.php"> <img src="../img/buk.jpg" width="auto" height="90"style="display: inline-block; padding:0px; alt="LOGO"></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false" >
                <span class="navbar-toggler-icon"></span>
					<span></span>
						<span></span>
							<span></span>
        </button>
								<span class="navbar-text"style="color:white;">
									Faculty of Computer Science and Information Technology<br>
									Dapartment of Computer Science<br>
									Bayero University Kano </span>        
							</span> 
		<div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
            <ul class="navbar-nav">
				<li class="nav-item">
					<a href="../index.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-home"style="color:white"></i> Home</a>
          </li>
			
				<li class="nav-item">
					<a href="../about-us.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-info-circle"style="color:white"></i> About Us</a>
          </li>
			
				<li class="nav-item">
					<a href="../contact-us.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-address-book"style="color:white"></i> Contact</a>
          </li>
		  
				<li class="nav-item">
					<a href="index.php" class="nav-link active-nav hover-underline-animation" style="color:white"><i class="fa fa-user"style="color:white"></i> Admin</a>
          </li>
            
				<li class="nav-item">
					<a class="nav-link" href=""></a>
          </li>
		  
		  </ul>
      </div>    
  </nav>
<!-- / Navbar -->

<h3 style="text-align:center; color:white; background-color:black;">Admin Login</h3>
	<div class="container">
		<div class="wrapper">
			<div class="row">
				<div class="float-left col-md-4 d-flex offset-md-1">
					<div class="d-flex justify-content-center align-items-center w-100 h-100">
						<span  class="m-3 p-1"><br>
							<h1 class="text-primary d-flex justify-content-center" style="font-size: 3rem">FCSITLink</h1>
								<img class="img-responsive fluid" src="../img/header-background.png" width="550" height="400" />
					</span>
				</div>
			</div>
<!-- Login Form Container -->
			<div class="float-right col-md-7 d-flex justify-content-end">
				<div id="login-center" class="row d-flex justify-content-end align-self-center w-100 ">
					<div class="card col-sm-8 ">
						<div class="card-body">
							<form  method="post" class = "align-items-right" >
								<h1 class="text-primary"> Sign In </h1>
									<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
										
										<div class="form-group">    
											<b><small class="text-muted"><b>Username</b></small></b>
												<input type="text" class="form-control" name="username" placeholder="Username" required>
									</div>
			
										<div class="input-group">
											<input type="password" name="password" id="password" class="form-control" placeholder="Password" data-toggle="password" required>
												<div class="input-group-append">
													<span class="input-group-text">
														<i class="fa fa-eye"></i>
											</span>
										</div>
									</div>
									<br>
										<button type="submit" class="btn btn-block btn-primary btn-sm" id="submit" name="submit">
											Submit <i class="fa fa-arrow-circle-right"></i>
								</button>				
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End Login Form Container -->
		</div>
	</div>
</div>


<!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">
	<div class="footer-copyright text-center py-3">Legend|© 2022 all rights reserved <!-- Copyright -->
</div><!-- Copyright -->

</footer>
<!-- End Footer -->

<!-- Boostrap Js -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Boostrap Js -->

<!--Show Hide Password-->
<script  src="bootstrap-show-password.js"></script>
	
	
	</body>
</html>