<?php 
        $sql=mysqli_query($bd, "select * from users where username='".$_SESSION['login']."'");
		while($data=mysqli_fetch_array($sql)) {  
		$Cover_pic=$data['Cover_pic'];
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
        <h5 class="modal-title" id="ModalExampleLabel">Edit Cover Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	
			<div class="container-fluid">
	<form action="" id="update-profile">
		<div class="row">
			<div class="form-group">
			<label for="" class="control-label">Cover Image</label>
				<div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="pp" accept="image/*" onchange="displayImgProfile(this,$(this))">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
			</div>
		</div>
		<div class="row">
			<div class="form-group d-flex justify-content-center rounded-circle">
				<?php echo '<img alt="" id="cover" class="img-fluid img-thumbnail" src="'.$Cover_pic.'" />'; ?>
			</div>
		</div>
		
	</form>
</div>

	  <div class="modal-footer display py-1 px-1">
		<div class="d-block w-100">
			<button class="btn btn-block btn-primary btn-sm" form="manage_post">Update</button>
	</div>
	</div>
	  
    </div>
  </div>
</div>

	<?php } ?>	
	
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