<?php
session_start();
//error_reporting(0);
include("include/DB.php");

if (!isset($_SESSION['login']) ||(trim ($_SESSION['login']) == '')) {
	header('location:index.php');
    exit();
	}
	
	if(isset($_POST['submit'])) {
		$f_name=$_POST['f_name'];
		$oname = $_POST['oname'];
        $username=$_POST['username'];
		$email=$_POST['email'];
		//$password=md5($_POST['password']);
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$number=$_POST['number'];
		$address=$_POST['address'];
		$Profile_pic=$_POST['Profile_pic'];
		
		$sql=mysqli_query($bd, "select * from users where username='".$_SESSION['login']."'");
		while($data=mysqli_fetch_array($sql)) {  
	
	}
}	

?>
<!DOCTYPE html>
<html lang="en">
		<?php include('header.php'); ?>
 

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
					<a href="all-users.php" class="nav-link active-nav hover-underline-animation" style="color:white"><i class="fa fa-user"style="color:white"></i> ALL USERS </a>
          </li>
			
				<li class="nav-item">
					<a href="notification.php" class="nav-link hover-underline-animation" style="color:white"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <i class="fa fa-envelope"style="color:white"></i> FRIEND REQUEST</a>
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
 <!--End Navbar -->
<?php } ?>


<div class="container mt-3 mb-6">
	<div class="col-lg-9 mt-4 mt-lg-0">
		<div class="row">
			<div class="col-md-12">
				<div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
					<table class="table manage-candidates-top mb-0">
						<thead>
							<tr>
								<th style="font-size:150%;">All Users</th>
						</tr>
					</thead>
				<?php
				$result = mysqli_query($bd,"SELECT * FROM `users`  where username!='".$_SESSION['login']."'");
					while($row = mysqli_fetch_assoc($result)){ ?>
						<tbody>
							<tr class="candidates-list">
								<td class="title">
									<div class="thumb">
										<img class="img-fluid" src="<?php echo $row['Profile_pic'] ?>" /></div>
					</div>
	  
					<div class="candidate-list-details">
						<div class="candidate-list-info">
							<div class="candidate-list-title">
								<h5 class="mb-0"><a href="#"><?php echo $row['f_name'].' '.$row['oname'];?></a> </h5>
                    </div>
                    <div class="candidate-list-option">
                        <ul class="list-unstyled">
							<li><i class="fas fa-filter pr-1"></i><?php echo $row['Status'];?></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </td>
            <td>
             <ul class="list-unstyled mb-0 d-flex justify-content-end">
                <li><a href="user_profile.php?f_id=<?php echo $row['id'];?>" class="fcc-btn">See Profile</a></li> 
                </ul>
              </td>
            </tr>
	 <?php } ?>
          </tbody>
       </table>
     </div>
   </div>	
  </div>
</div>

  

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>