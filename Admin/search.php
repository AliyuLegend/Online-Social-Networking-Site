<?php
session_start();
//error_reporting(0);
include("../include/DB.php");    // Including Database Connection

if (!isset($_SESSION['login']) ||(trim ($_SESSION['login']) == '')) {
	header('location:index.php');
    exit();
	}
	
$searchErr = '';
$Result='';
if(isset($_POST['save'])) {
    if(!empty($_POST['search'])) {
        $search = $_POST['search'];
			$sql=mysqli_query($bd, "select * from users where username like '%$search%' or email like '%$search%' ");
				$Result= mysqli_fetch_all($sql, MYSQLI_ASSOC);
					//$Result= $sql->fetch_all(MYSQLI_ASSOC);
		} 
					else {
						$searchErr = "Please enter the information";
			}  
	}
if(isset($_GET['del']))  {
	mysqli_query($bd, "delete from users where id = '".$_GET['id']."'");
        $_SESSION['msg']="data deleted !!";
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
            <a class="navbar-brand mr-3" href="search.php"> <img src="../img/buk.jpg" width="auto" class="rounded-circle mr-1" style="" height="70"style="display: inline-block; padding:0px; alt="LOGO"></a>
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
						<a href="post-update.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-address-card"style="color:white"></i> Post Update</a>
          </li>
   
					<li class="nav-item">
						<a href="search.php" class="nav-link active-nav hover-underline-animation" style="color:white"><i class="fa fa-search"style="color:green"></i> SEARCH USER</a>
           </li>
		   
					<li class="nav-item">
						<a href="logout.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-power-off"style="color:red"></i> LOG OUT</a>
			</li>
		</ul>
    </div>    
</nav>
<!-- End Navbar -->
		
	
	<!-- Intro Single  -->
	<section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single text-primary">Admin</h1>
              <span class="color-text-a"> Search User</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="post-update.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Search User
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
	
	<!-- Form container -->
	<div id="login-center" class="row justify-content-center align-self-center w-100">
  		<div class="form-group  card col-md-6">
  			<div class="card-body">
				<form  action="search.php" method="post">
					<fieldset class="border p-2"  style="color:blue;">
						
						<div class="form-group">
							<label for="Order Code"><b>Search User:</b></label>
				</div>
        
						<div class="form-group">
							<input type="text" class="form-control" name="search" placeholder="Search Here...">
				</div>
        
						<div class="form-group">
							<button type="submit" name="save" class="btn btn-block btn-primary btn-sm">Submit</button>
				</div>
			
						<div class="form-group">
							<span class="error" style="color:red;">* <?php echo $searchErr;?></span>
				</div>
		</fieldset>
    </form>
  </div>
 </div>
 </div>
 <!-- End Form container -->
    
<!-- Search Result container -->	
<h3 style="text-align:center; color:blue;"><u>Search Result</u></h3><br/>         
     <div class="row">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
                <div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered second" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Username</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone Number</th>
									<th> </th>			
                                </tr>
                          </thead>
					<tbody>
					<?php
						if(!$Result) {
							echo '<tr>No data found</tr>';
                 }
							else{
								foreach($Result as $key=>$value) {
                        ?>
								<tr>
									<td><?php echo $key+1;?></td>
									<td><?php echo $value['username'];?></td>
									<td><?php echo $value['f_name'];?></td>
									<td><?php echo $value['email'];?></td>
									<td><?php echo $value['number'];?></td>
									<td>
								<div>
							<a href="edit-user.php?id=<?php echo $value['id'];?>" tooltip-placement="top" tooltip="Edit" class="edit"><i class="fa fa-pencil-square"> Edit</i></a>
						<a href="manage-users.php?id=<?php echo $row['id']?> &del=delete" onClick="return confirm('Are you sure you want to delete?')" tooltip-placement="top" tooltip="Remove" class="edit";><i class="fa fa-trash "> Delete</i></a>
					</div>
				</div>
			</td>
         </tr>     
               <?php
                    }   
						}
							?>
										</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                    </div>
				<!--End Search result -->
				</div>
			</div>

<!--Boostrap Js -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- End Boostrap Js -->

	</body>
</html>
				