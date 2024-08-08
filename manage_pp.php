<?php  
//session_start();
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
			window.location.href='edit_profile.php';
			</script>";
		}
	}
?>


	
<!DOCTYPE html>
<html lang="en">
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>L-Linked Network</title>
		
</head>

<body>

		<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	
	<div class="container-fluid">
		<form id="upload_image"  class="form-horizontal" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="form-group">
					<label for="" class="control-label">Profile Picture</label>
						<div class="custom-file">
							<input type="file" name="Profile_pic" class="custom-file-input" id="customFile" accept="image/*" onchange="displayImgProfile(this,$(this))">
								<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group d-flex justify-content-center rounded-circle">
					<?php echo '<img height="200" alt="" class="img-fluid img-thumbnail rounded-circle" id="profile" style="max-width: calc(50%)" src="'.$Profile_pic.'" />'; ?>
			</div>
		</div>
		<div class="modal-footer display py-1 px-1">
			<div class="d-block w-100">
				<button class="btn btn-block btn-primary btn-sm" type="submit" name="submit" >POST</button>
		</div>
	</div>
	</form>
</div>  
    </div>
		</div>
			</div>
				</div>


	
	<script>
	function displayImgProfile(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#profile').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
</script>
</body>
</html>