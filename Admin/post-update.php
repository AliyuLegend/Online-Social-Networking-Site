<?php
session_start();
//error_reporting(0);
	include("../include/DB.php");

if (!isset($_SESSION['login']) ||(trim ($_SESSION['login']) == '')) {
	header('location:index.php');
    exit();
	}
	
	 if(isset($_POST['submit'])) {
		
		$Name=$_POST['Name'];
        $Email=$_POST['Email'];
		$Content = $_POST['Content'];
        
		
		$query=mysqli_query($bd, "insert into post_update(Name,Email,Content) values ('$Name','$Email','$Content')");
				if($query) {
					
					echo "<script>
						alert('Successfully Post Update.');
						window.location.href='dashboard.php';
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
            <a class="navbar-brand mr-3" href="post-update.php"> <img src="../img/buk.jpg" width="auto" class="rounded-circle mr-1" style="" height="70"style="display: inline-block; padding:0px; alt="LOGO"></a>
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
						<a href="manage-post.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-envelope"style="color:white"></i> Manage Post</a>
          </li>
		  
					<li class="nav-item">
						<a href="post-update.php" class="nav-link active-nav hover-underline-animation" style="color:white"><i class="fa fa-address-card"style="color:white"></i> Post Update</a>
          </li>
   
					<li class="nav-item">
						<a href="logout.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-power-off"style="color:red"></i> LOG OUT</a>
			</li>
		</ul>
    </div>    
</nav>
<!-- End Navbar -->
	
		    
	<section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single text-primary">Admin</h1>
              <span class="color-text-a"> Post Update</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="post-update.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Post Update
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

<!-- Form container -->
 <div id="login-center" class="row justify-content-center align-self-center w-100">
  	<div class="form-group  card col-md-5">
  		<div class="card-body">
            <form method="POST" action="post-update.php">
                 
				 <b><small class="text-muted"><b>Name</b></small></b>
					<div class="row">
						<div class="form-group col-md-12">
							<input type="text" class="form-control" placeholder="Enter Your Name" name='Name' >
						</div>
					</div>
					
				<b><small class="text-muted"><b>Email Address</b></small></b>
					<div class="row">
						<div class="form-group col-md-12">
							<input type="text" class="form-control" placeholder="Enter Your Email" name='Email' >
						</div>
					</div>
                   
				<b><small class="text-muted"><b>Message</b></small></b>
                    <div class="row">
						<div class="form-group col-md-12">
                        <textarea class="form-control" name="Content" cols="45" rows="8" placeholder="Message"></textarea>
                       </div>
                    </div>
					 
				<button class="btn btn-block btn-primary btn-sm" type="submit" name="submit" >Update</button>
		</div>
	</div>
</div>
	</form>
		</div>
			</div>
				</div>
<!--End Form container -->

<!--Boostrap Js -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- End Boostrap Js -->

</body>
</html>