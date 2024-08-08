<?php  
session_start();
error_reporting(0);
include('include/DB.php');

if(isset($_POST['submit'])) {
		$file=$_FILES['Profile_pic']['name']; 
		$path = 'Admin/user-images/'; 
		$location = $path . $_FILES['Profile_pic']['name']; 
		
		$query=mysqli_query($bd, "Update users set Profile_pic='$location' where username='".$_SESSION['login']."'");
			if($query) {		
				move_uploaded_file($_FILES['Profile_pic']['tmp_name'], $location); 
					//	move_uploaded_file($_FILES['image']['tmp_name'], $move);
					//move_uploaded_file($_FILES['image']['tmp_name'],"$file");
					//echo "<script>alert('Profile Successfully Updated');</script>";
					//header('location:user-login.php');
			echo "<script>
					alert('Profile Successfully Updated');
					window.location.href='newsfeed.php';
					</script>";
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>L-Linked Network</title>
        <link rel="stylesheet" type="text/css" href="css/style2.css">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Font Awesome CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
    <div class="container">
        <a href="#" class="navbar-brand mr-3">L-Linked</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
				
                <a href="newsfeed.php" class="nav-item nav-link"><i class="fa fa-home"></i> HOME</a>
                <a href="#" class="nav-item nav-link"><i class="fa fa-photo"></i> PHOTOS</a>
                <a href="#" class="nav-item nav-link"><i class="fa fa-group"></i> FRIENDS</a>
				<a href="#" class="nav-item nav-link"><i class="fa fa-envelope"></i> MESSAGES</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="logout.php" class="nav-item nav-link"><i class="fa fa-home"></i> LOGOUT</a>
				
            </div>
        </div>
    </div>    
</nav>
			
		<div class="col-md-5">
		<h3>Change Your Profile Picture</h3>
					<form  id="upload_image"  class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Image:</label>
								<input type="file" name="Profile_pic" class="form-control" required>
						
								</div>
								<button type="submit" name="submit" class="btn btn-success">Upload</button>
						</form>
						</div>
					




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>