<?php  

 $msg=$msg2=$msg3=$msg4=$msg5='';
 $email=$number=$username='';
include('include/DB.php'); 
include('function.php');

    if(isset($_POST['submit'])) {
		
        $f_name=$_POST['f_name'];
        $oname = $_POST['oname'];
        $username=$_POST['username'];
        $password= md5($_POST['password']);
        $confirm_password=md5($_POST['cpassword']);
        $number=$_POST['number'];
		$email=$_POST['email'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
		$regnumber=$_POST['regnumber'];
		
		if (strlen($password) < 3 AND strlen($password) > 21) {
	 		$msg="<div class='error'>Password Length must be between 4 and 20.  </div>";	
	 	}
        elseif($password != $confirm_password) {
            $msg="<div class='error'>***Password Does Not Matched </div>";
        }
		elseif (email_exists($email,$bd)) {
	 		$msg2="<div class='error'>*** This E-Mail Already Exists. </div>";	
	 	}
		
		elseif (number_exists($number,$bd)) {
			$msg4="<div class='error'>*** This Number Already Exists by another User. </div>";
		}
		elseif (username_exists($username,$bd)) {
			$msg3="<div class='error'>*** This Username Already Exists by another User. </div>";
		}
		elseif (regnumber_exists($regnumber,$bd)) {
			$msg5="<div class='error'>*** Sorry! Registration number does not Exist in the Faculty.</div>";
		}
		else {
			$query=mysqli_query($bd, "insert into users(f_name,oname,username,regnumber,password,number,email,gender,dob,address) values ('$f_name','$oname','$regnumber','$username','$password','$number','$email','$gender','$dob','$address')");
				if($query) {
					
					echo "<script>
						alert('Successfully Registered. You can login now');
						window.location.href='index.php';
						</script>";
				}
			}
		}
?>

<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			 
			 <!-- Boostrap -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
				 
			<!-- Google Fonts -->
			<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
			<!--CSS-->
			<link href='css/style.css' rel='stylesheet' type='text/css'  media='all' />
				
			<!-- Font Awesome CSS -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		
    <title>FCSITLink Network</title>
<style>
	.error {
		color:red;
	}
	</style>
</head>
<body style="font-family: 'Poppins', sans-serif;">

<!-- Navbar -->	  
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary navbar-fixed-top mb-3">
    <div class="container-fluid">
		<a class="navbar-brand mr-3" href="index.php"> <img src="img/buk.jpg" width="auto" height="90"style="display: inline-block; padding:0px; alt="LOGO"></a>
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
					<a href="index.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-home"style="color:white"></i> Home</a>
          </li>
			
				<li class="nav-item">
					<a href="about-us.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-info-circle"style="color:white"></i> About Us</a>
          </li>
			
				<li class="nav-item">
					<a href="contact-us.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-address-book"style="color:white"></i> Contact</a>
          </li>
		  
				<li class="nav-item">
					<a href="Admin/index.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-user"style="color:white"></i> Admin</a>
          </li>
            
		  
				<li class="nav-item">
					<a class="nav-link" href=""></a>
          </li>
		  
		  </ul>
      </div>    
  </nav>
<!-- End Navbar -->
      
	  
       <!-- User Registration Form -->	
			<div id="login-center" class="row justify-content-center align-self-center w-100">
				<div class="form-group  card col-md-5">
				
					<div class="card-body">
					<h3 style="text-align:center;" class="text-primary">Sign Up</h3>
						<form action="" role="form" name="edit" method="post">
							<div class="col-lg-12">
								<div id="msg"></div>
									
									<b><small class="text-muted"><b>Name</b></small></b>
										<div class="row">
											<div class="form-group col-md-6">
												<input type="text" class="form-control" name="f_name" placeholder="First Name" required>
								</div>																				
										<div class="form-group col-md-6">
											<input type="text" class="form-control" name="oname" placeholder="Other Names" required>
							</div>
						</div>
								
								<b><small class="text-muted"><b>Registration Number</b></small></b>
										<div class="row">
											<div class="form-group col-md-12">
												<input type="text" class="form-control" name="regnumber" placeholder="Registration Number" required>																				
													 <small class="text-muted font-italic">(e.g. CST/18/COM/00182)</small>
														<?php echo $msg5; ?>
							</div>
						</div>
									
									
									<b><small class="text-muted"><b>Username</b></small></b>
										<div class="row">
											<div class="form-group col-md-12">
												<input type="text" class="form-control" name="username" placeholder="Username" required>
													<?php echo $msg3; ?>
							</div>
						</div>
									
									<b><small class="text-muted"><b>Password</b></small></b>
										<div class="row">
											<div class="form-group col-md-6">
												<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>																				
										<div class="form-group col-md-6">
											<input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" >
												<?php echo $msg; ?>
							</div>
						</div>
						
									<b><small class="text-muted"><b>Phone Number</b></small></b>
										<div class="row">
											<div class="form-group col-md-12">
												<input type="text" class="form-control" name="number" placeholder="Phone Number" required>
													<?php echo $msg4; ?>
							</div>
						</div>
								
									<b><small class="text-muted"><b>Email</b></small></b>
										<div class="row">
											<div class="form-group col-md-12">
												<input type="email" class="form-control" name="email" placeholder="Email Address" required>
													<?php echo $msg2; ?>
							</div>
						</div>
					
									<b><small class="text-muted"><b>Gender</b></small></b>
										<div class="row">
											<div class="form-group col-md-6">
												<div class="d-flex w-100 justify-content-between p-1 border rounded align-items center">
													<label for="gfemale">Female</label>
														<div class="form-check d-flex w-100 justify-content-end">
															<input class="form-check-input" type="radio" checked="" id="gfemale" name="gender" value="Female">
								</div>
							</div>
			            </div>
											<div class="form-group col-md-6">
												<div class="d-flex w-100 justify-content-between p-1 border rounded align-items center">
													<label for="gmale">Male</label>
														<div class="form-check d-flex w-100 justify-content-end">
															<input class="form-check-input" type="radio" id="gmale" name="gender" value="Male">
									</div>
								</div>
							</div>
						</div>
										
									<b><small class="text-muted"><b>Date of Birth</b></small></b>
										<div class="row">
											<div class="form-group col-md-12">
												<input type="date" class="form-control" name="dob" placeholder="Birthday" required>
							</div>
						</div>
							
									<b><small class="text-muted"><b>Contact Address</b></small></b>
										<div class="row">
											<div class="form-group col-md-12">
												<input type="text" class="form-control" name="address" placeholder="Contact Address" required>
							</div>
						</div>
					
									<div class="form-actions">
										<p>
											Already Have an Account?
												<a href="index.php">
													Sign In
											</a>
										</p>
									</div>
									
									<button type="submit" class="btn btn-primary btn-block" id="submit" name="submit">
										Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
						</form>
					</div>
				</div>
			</div>	
<!-- End User regisrtation Form -->


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>