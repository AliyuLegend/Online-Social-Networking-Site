<?php 
    // session_start();
	//error_reporting(0);
	include("include/DB.php");
	
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
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>L-Linked Network</title>
		
</head>

<body>

		<!-- Modal -->
<div class="modal fade" id="ModalExample" tabindex="-1" role="dialog" aria-labelledby="ModalExampleLabelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalExampleLabel">Manage Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="container-fluid">
			<?php 
				$sql=mysqli_query($bd, "select * from users where username='".$_SESSION['login']."'");
					while($data=mysqli_fetch_array($sql)) {  
	?>		
	<form action="" role="form" name="edit" method="post">
		<div class="col-lg-12">
			<div id="msg"></div>
				
				<b><small class="text-muted"><b>Name</b></small></b>
					<div class="row">
						<div class="form-group col-md-6">
							<input type="text" class="form-control" placeholder="First name" name='f_name' value="<?php echo htmlentities($data['f_name']);?>" >
						</div>																				
						<div class="form-group col-md-6">
							<input type="text" class="form-control" placeholder="Last name" name='oname' value="<?php echo htmlentities($data['oname']); ?>">
						</div>
					</div>
					
					<b><small class="text-muted"><b>Email</b></small></b>
					<div class="row">
						<div class="form-group col-md-12">
							<input type="email" class="form-control" placeholder="Email" name='email' value="<?php echo htmlentities($data['email']); ?>">
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
					
					<b><small class="text-muted"><b>Username</b></small></b>
					<div class="row">
						<div class="form-group col-md-12">
							<input type="text" class="form-control" placeholder="Username" name='username' value="<?php echo htmlentities($data['username']); ?>">
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
					
		
					<div class="modal-footer display py-1 px-1">
						<div class="d-block w-100">
							<button class="btn btn-block btn-primary btn-sm" type="submit" name="submit" >Update</button>
				</div>
			</div>
		<?php } ?>
	</form>
</div>
    </div>
		</div>
			</div>

	
	<script>
	function displayImgCover(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cover').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
</script>
</body>
</html>
		
     