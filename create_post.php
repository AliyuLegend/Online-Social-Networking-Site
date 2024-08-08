<?php 
  //session_start();
   include('include/DB.php');
		
	?>
	
<!DOCTYPE html>
<html lang="en">
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>L-Linked Network</title>
		
<style>
	.column {
	  float: left;
	  width: 100%;
	  padding: 10px;
	}

	.column img,.column video {
	  margin-top: 12px;
	  max-width: 100%;
	  max-height: 20vh;
	}
	.c-row {
	  display: flex;
	  flex-wrap: wrap;
	  padding: 0 4px;
	}
</style>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>                                  
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="css/style..css">
</head>

<?php 
$sql=mysqli_query($bd, "select * from users where username='".$_SESSION['login']."'");
		while($data=mysqli_fetch_array($sql)) {  
		$Profile_pic=$data['Profile_pic'];
		?>
<body>


		<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
	<div class="modal-body">
		<div class="container-fluid">
			<form action="post.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="">
					<div class="d-flex w-100 align-items-center">
						<div class="rounded-circle mr-1" style="width: 40px;height: 40px;top:-5px;left: -40px">
							<?php echo '<img height="200" class="image-fluid image-thumbnail rounded-circle" alt="" style="max-width: calc(100%);height: calc(100%);" src="'.$Profile_pic.'" />'; ?>
				</div>
				<div class="ml-4 text-left" style="width:calc(80%)">
					<div><small><?php echo htmlentities($data['f_name'].' '.$data['oname']);?></small></div>
						<input type="hidden" name="type" value="">
	        </div>
		</div>
		<div class="form-group">
			<textarea name="content" id="content" cols="30" rows="2" class="form-control" placeholder="What's on your mind? <?php echo ucwords($data['username']);?>?" style="resize:none;border: none"></textarea>
		</div>
	
		<div class="c-row" id="">
			<div id="file-display" class="column">
				<input type="file" name="image" multiple="multiple" id="postF" onchange="displayUpload(this)" class="d-none" accept="image/*,video/*">
					<div class="card solid">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-center">
								<small>Add to Your Post</small>
					<span>
						<label for="postF" style="cursor: pointer;"><a class="rounded-circle"><i class="fa fa-photo-video text-success"></i></a></label>
					</span>
				</div>
			</div>
		</div>
	<div class="modal-footer display py-1 px-1">
		<div class="d-block w-100">
			<button class="btn btn-block btn-primary btn-sm" name="submit" value="UPLOAD">POST</button>
	</div>
</div>
	</form>
		</div>		
			<div class="imgF" style="display: none " id="img-clone">
				<span class="rem badge badge-primary" onclick="rem_func($(this))" style="cursor: pointer;"><i class="fa fa-times"></i></span>
		</div>
   </div>
</div>
	  </div>
		</div>
			</div>
				</div>

	<?php } ?>	

<script>
	
	$('[name="file[]"]').change(function(){
		displayUpload(this)
	})
	
    function displayUpload(input){
    	if (input.files) {
    			Object.keys(input.files).map(function(k){
    				var reader = new FileReader();
    				 var t = input.files[k].type;
				    	var _types = ['video/mp4','image/x-png','image/png','image/gif','image/jpeg','image/jpg'];
				    	if(_types.indexOf(t) == -1)
				    		return false;
				        reader.onload = function (e) {
				        	// $('#cimg').attr('src', e.target.result);

          				var bin = e.target.result;
          				var fname = input.files[k].name;
          				var imgF = document.getElementById('img-clone');
						  	imgF = imgF.cloneNode(true);
						  imgF.removeAttribute('id')
						  imgF.removeAttribute('style')
				        	if(t == "video/mp4"){
								var img = document.createElement("video");
								}else{
								var img = document.createElement("img");
								}
					          var fileinput = document.createElement("input");
					          var fileinputName = document.createElement("input");
					          fileinput.setAttribute('type','hidden')
					          fileinputName.setAttribute('type','hidden')
					          fileinput.setAttribute('name','img[]')
					          fileinputName.setAttribute('name','imgName[]')
					          fileinput.value = bin
					          fileinputName.value = fname
					          img.classList.add("imgDropped")
					          img.src = bin;
					          imgF.appendChild(fileinput);
					          imgF.appendChild(fileinputName);
					          imgF.appendChild(img);
					          document.querySelector('#file-display').appendChild(imgF)
				        }
		        reader.readAsDataURL(input.files[k]);
    			})
    			rem_func()
    }
    }
    	 
    function rem_func(_this){
			_this.closest('.imgF').remove()
			if($('#drop .imgF').length <= 0){
				$('#drop').append('<span id="dname" class="text-center">Drop Files Here <br> or <br> <label for="chooseFile"><strong>Choose File</strong></label></span>')
			}
	}
   
    
</script>

     
</body>
</html>