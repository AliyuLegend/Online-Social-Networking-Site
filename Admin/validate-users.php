<?php
session_start();
//error_reporting(0);
include("../include/DB.php");   // Including Database Connection

if (!isset($_SESSION['login']) ||(trim ($_SESSION['login']) == '')) {
	header('location:index.php');
    exit();
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


<style>
.card-body {
	background-color: #f0eee3;
	font-size: 15px;
	font-family: tahoma;
	padding: 30px 25px;
    text-align:justify-content;
	font-family:Arial, Helvetica, sans-serif;
}

.form-group {
	background-color: #8be3e9b6;
}

</style>
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
						<a href="dashboard.php" class="nav-link active-nav hover-underline-animation" style="color:white"><i class="fa fa-home"style="color:white"></i> Home</a>
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
						<a href="post-update.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-address-card"style="color:white"></i> Post Update</a>
          </li>
   
					<li class="nav-item dropdown">
						<?php 
							$sql=mysqli_query($bd, "select * from admin where username='".$_SESSION['login']."'");
								while($data=mysqli_fetch_array($sql)) {  
					?>
					<a class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">				
						<span style="color:white"><b><?php echo ucwords($data['username']) ?></b></span>
							<span class="fa fa-angle-down ml-2"></span>
				</a>
		   
					<div class="dropdown-menu hover-underline-animation" aria-labelledby="navbarDropdownMenuLink">
						<a href="edit-profile.php" class="dropdown-item hover-underline-animation"><i class="fa fa-cog"style="color:green"></i> Manage Account</a>
							<a href="logout.php" class="dropdown-item hover-underline-animation"><i class="fa fa-power-off"style="color:red"></i> Logout</a>
				</div>
			</li>
		</ul>
    </div>    
</nav>
<!-- End Navbar -->
								<?php } ?>

<div id="login-center" class="row justify-content-center align-self-center w-100">
  	<div class="form-group  card col-md-5">
  		<div class="card-body">
				<form class="form-horizontal well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset class="border p-2">
						<legend style="color:blue;">Import CSV/Excel file</legend>
							<div class="mb-2">
								<div>
									<label for="formFileSm" class="form-label">CSV/Excel File:</label>
										<input type="file" name="file"  id="file" type="file">
							 </div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" id="submit" name="Import" class="btn btn-block btn-primary btn-sm">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		<div>
	</div>
</div>
</div>
	 
<!--Display Student Data on table -->
<div class="container-fluid">
	<!-- Content Header (Page header) -->
					<div class="content-header">
					  <div class="container-fluid">
						<div class="row mb-2">
						  <div class="col-sm-5">
						  </div><!-- /.col -->
						
						</div><!-- /.row -->
					  </div><!-- /.container-fluid -->
					</div>
					<!-- /.content-header -->
							
				<div class="row">
					<!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
												<th>Name</th>
												<th>Registration Number</th>
												<th>Department</th>
                                            </tr>
                                        </thead>
										<tbody style="color:#2012e9;">
                                       <?php
											$sql = "SELECT * FROM validate_regnumber ";
											$cnt=1;
											$result =  mysqli_query($bd, $sql);
											while($row = mysqli_fetch_array($result)) {
											?>
												<tr>
												<td><?php echo $cnt;?>.</td>
												<td><?php echo $row['name'];?></td>
												<td><?php echo $row['regnumber'];?></td>
												<td><?php echo $row['department'];?></td>
				</tr>							
				<?php 
                    $cnt=$cnt+1;
						 }?>
							</tbody>
									</table>
								</div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
</div>
<!-- End Display Student Data on table -->

				
<!--Boostrap Js -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- End Boostrap Js -->

</body>
</html>