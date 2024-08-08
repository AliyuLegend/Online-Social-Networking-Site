<?php 
session_start();
error_reporting(0);
include("include/DB.php");
include("function.php");


$msg=$msg1=$msg2='';
$email=''; $pass=''; $cpass='';
if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$password= md5($_POST['pass']);
        $cpassword=md5($_POST['cpass']);
			
			if(!email_exists($email,$bd)) {
				$msg="<div class='error'>***This  Email Does NOT Exists. </div>";
				}
			elseif (strlen($password)<3 AND strlen($password)>21) {
			$msg2="<div class='error'>***Password must between 4 and 20. </div>";
			}
			else {
			mysqli_query($bd, "update users set password='$password' where WHERE email='$email' ");
					echo "<script>
								alert('Your Password Changed Successfully.');
								window.location.href='index.php';
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
			<link href='css/style.css' rel='stylesheet' type='text/css'  media='all' />
			
			<!-- Boostrap -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
				 
			<!-- Font Awesome CSS -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
				
			<!-- Google Fonts -->
			<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

	<title>FCSITLink Network</title>
<style>
.login-form-head {
    text-align: center;
    background: #a6a0f8;
    padding: 20px;
}

.login-form-head h4 {
    letter-spacing: 0;
    text-transform: uppercase;
    font-weight: 600;
    margin-bottom: 7px;
    color: #fff;
}

.login-form-head p {
    color: #fff;
    font-size: 14px;
    line-height: 22px;
}

.login-form-body {
    padding: 30px;
}
.error {
	color: red;
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
					<a href="index.php" class="nav-link active-nav hover-underline-animation" style="color:white"><i class="fa fa-home"style="color:white"></i> Home</a>
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
<!-- / Navbar -->	

<!--Form container -->	
<div id="login-center" class="row justify-content-center align-self-center w-100">
	<div class="form-group  card col-md-5">
		<div class="login-form-head">
            <h4>Reset Password</h4>
                <p>Hey! Reset Your Password and comeback again</p>
        </div>
		<div class="card-body">
			<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
				<span style="color:red;"><?php echo $_SESSION['msg1']; ?><?php echo $_SESSION['msg1']="";?></span>
					<div class="col-lg-12">
						<b><small class="text-muted"><b>Email Address</b></small></b>
							<div class="row">
								<div class="form-group col-md-12">
									<input type="email" class="form-control" placeholder="Enter Your Email" name='email' required>
									<?php echo $msg;?>
						</div>																				
					</div>
					
						<b><small class="text-muted"><b>New Password</b></small></b>
							<div class="row">
								<div class="form-group col-md-12">
									<input type="password" class="form-control" placeholder="New Password" name='pass' required>
									<?php echo $msg2;?>
						</div>																				
					</div>
					
						<b><small class="text-muted"><b>Confirm Password</b></small></b>
							<div class="row">
								<div class="form-group col-md-12">
									<input type="password" class="form-control" placeholder="Confirm New Password" name='cpass' required>
						</div>																				
					</div>
					
		
						<div class="modal-footer display py-1 px-1">
							<div class="d-block w-100">
								<button class="btn btn-block btn-primary btn-sm" type="submit" name="submit" >Reset</button>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>	
<!--End form container -->	
<script type="text/javascript">
function valid() {
    if(document.chngpwd.pass.value=="") {
        alert("Password Field is Empty !!");
        document.chngpwd.pass.focus();
        return false;
    }
    else if(document.chngpwd.cpass.value==""){
        alert("Confirm Password Field is Empty !!");
        document.chngpwd.cpass.focus();
        return false;
    }
    else if(document.chngpwd.pass.value!= document.chngpwd.cpass.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.chngpwd.cpass.focus();
        return false;
    }
    return true;
    }
</script>
		
		
</body>
</html>