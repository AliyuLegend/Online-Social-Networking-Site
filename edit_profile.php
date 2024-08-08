<?php  
session_start();
//error_reporting(0);
include('include/DB.php');

if (!isset($_SESSION['login']) ||(trim ($_SESSION['login']) == '')) {
	header('location:index.php');
    exit();
	}

if(isset($_GET['del']))
		  {
		          mysqli_query($bd, "delete from post where post_id = '".$_GET['id']."'");
                  $_SESSION['msg']="data deleted !!";
		  }	
if(isset($_POST['submit2']))
		{
			
		
		$file=$_FILES['Cover_pic']['name']; 
		
		$path = 'Admin/cover-images/'; 
		$location = $path . $_FILES['Cover_pic']['name']; 
		
$query=mysqli_query($bd, "Update users set Cover_pic='$location' where username='".$_SESSION['login']."'");
if($query)
{		
		move_uploaded_file($_FILES['Cover_pic']['tmp_name'], $location); 
	//	move_uploaded_file($_FILES['image']['tmp_name'], $move);
	//move_uploaded_file($_FILES['image']['tmp_name'],"$file");
	//echo "<script>alert('Profile Successfully Updated');</script>";
	//header('location:user-login.php');
	echo "<script>
			alert('Cover Picture Successfully Updated');
			window.location.href='edit_profile.php';
			</script>";
}
}
		$user=$_SESSION['login'];

?>
<!DOCTYPE html>
<html lang="en">
		<?php include('header.php'); ?>

<style>
.cover-pic {
		width: 100%;
	    height: 100%;
	    object-fit: cover;
		position: cover;
	}
.like {
		background-color: #e3ebf885;
		border: none;
		border-radius: 5px;
		text-align: center;
		color:red;
	
	}
	.unlike {
		background-color: #e3ebf885;
		border: none;
		border-radius: 5px;
		text-align: center;
		color:blue;
	
	}
</style>

<body>

<!-- Navbar -->	  
 <nav class="navbar navbar-expand-lg  navbar-dark bg-primary navbar-fixed-top mb-3">
        <div class="container-fluid">
			<a class="navbar-brand mr-3" href="edit_profile.php"> <img src="img/buk.jpg" width="auto" class="rounded-circle mr-1" style="" height="70"style="display: inline-block; padding:0px; alt="LOGO"></a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false" >
					<span class="navbar-toggler-icon"></span>
					<span></span>
					<span></span>
					<span></span>
            </button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="newsfeed.php" class="nav-link active-nav hover-underline-animation" style="color:white"><i class="fa fa-home"style="color:white"></i> HOME</a>
			</li>
			
					<li class="nav-item">
						<a href="all-users.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-info-circle"style="color:white"></i> FRIENDS</a>
			</li>
			
					<li class="nav-item">
						<a href="message.php" class="nav-link hover-underline-animation" style="color:white"><i class="fa fa-address-book"style="color:white"></i> MESSAGES</a>
			</li>
		</ul>
	</div> 
		  <ul class="navbar-nav">
				<li class="nav-item dropdown">
					<?php 
						$sql=mysqli_query($bd, "select * from users where username='".$_SESSION['login']."'");
							while($data=mysqli_fetch_array($sql)) {  
								$Profile_pic=$data['Profile_pic'];
								$Cover_pic=$data['Cover_pic'];
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
					<div class="dropdown-menu hover-underline-animation" style="left: -4.3em;"  aria-labelledby="navbarDropdownMenuLink">
							<a href="change-password.php" class="dropdown-item"><i class="fa fa-key"style="color:blue"></i> Change Passoword</a>
								<a href="logout.php" class="dropdown-item"><i class="fa fa-power-off mr-2"style="color:red"></i> Logout</a>
				</div>	
			</li>
		 </ul>
     </div>  
</nav>
<!--End Navbar -->


<!--Cover picture -->
<div class="row shadow-sm" id="profile-field">
	<div class="container">
		<div class="col-lg-10 offset-md-1" style="height:60vh">
			<div class="position-relative image-fluid w-100 mb-1" style="height:65%">
				<?php echo '<img alt="" class="gallery__image cover-pic img-fluid rounded-bottom" src="'.$Cover_pic.'" />'; ?>
					<div class="position-absolute" style="top:85%;right:3%;z-index:1">
						<button data-toggle="modal" data-target="#ModalExample" class="btn btn-link btn-sm bg-dark" type="button" ><i class="fa fa-camera"></i> Edit Cover Photo</button>
				</div>
				<div class="w-100 d-flex justify-content-center position-absolute" style="top:50%">
					<span class="position-relative">
						<?php echo '<img height="200" alt="" class="img-fluid img-thumbnail rounded-circle" style="width:150px;height: 150px" src="'.$Profile_pic.'" />'; ?>
							<a href="" data-toggle="modal" data-target="#exampleModal" id="edit_pp" class="text-dark position-absolute rounded-circle img-thumbnail d-flex justify-content-center align-items-center" style="top:75%;left:75%;width:25px;height: 25px"><i class="fa fa-camera rounded-circle"></i></a>
					</span>
				</div>
			</div>
			<div class="d-block w-100 py-2 px-1 text-center"><br>
				<h2 class="text-dark text-center"><b><?php echo ucwords($data['f_name'].' '.$data['oname']); ?></b></h2>
					<small class="text-muted"><?php echo $data['Status'] ?></small>
			</div>
		</div>
	</div>
</div>
<!--End Cover picture -->


<div class="container py-2 px-1">
	<div class="col-lg-10 offset-md-1">
		<div class="row">
		<!--About User -->
			<div class="col-md-4">
				<div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">About Me</h3>
	              </div>
		              <!-- /.card-header -->
						<div class="card-body">
							<strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
								<p class="text-muted"><?php echo $data['address'] ?></p>
									<hr>
							<strong><i class="fas fa-calendar-day mr-1"></i> Date of Birth</strong>
								<p class="text-muted"><?php echo $data['dob'] ?></p>
									<hr>
							<strong><i class="fa fa-phone mr-1"></i> Phone Number</strong>
								<p class="text-muted"><?php echo $data['number'] ?></p>
									<hr>
							<strong><i class="far fa-user mr-1"></i> Gender</strong>
								<p class="text-muted"><?php echo $data['gender'] ?></p>
		              </div>
		              <!-- /.card-body -->
	            </div>
			</div>
			<!--End About User -->
<?php } ?>				



<!--Cover Pictur Modal-->
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
			<form id="cover_image"  class="form-horizontal" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group">
						<label for="" class="control-label">Cover Image</label>
							<div class="custom-file">
								<input type="file" name="Cover_pic" class="custom-file-input" id="customFile" accept="image/*" onchange="displayImgProfile(this,$(this))">
									<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group d-flex justify-content-center rounded-circle">
					<?php echo '<img height="200" alt="" class="img-fluid img-thumbnail rounded-circle" id="cover" style="max-width: calc(50%)" src="'.$Cover_pic.'" />'; ?>
			</div>
		</div>
		<div class="modal-footer display py-1 px-1">
			<div class="d-block w-100">
				<button class="btn btn-block btn-primary btn-sm" type="submit" name="submit2">Update</button>
		</div>
	</div> 
</form>
	</div>  
		</div>
			</div>
				</div>	
					</div>
<!--End Cover picture Modal -->
	
<!--User's Post -->

		<div class="col-md-8">
			<?php 
				include("include/DB.php");
					$query=mySQLi_query($bd,"SELECT * from post LEFT JOIN users on users.username = post.user_id where username='".$_SESSION['login']."' order by post_id DESC");
						while($row=mysqli_fetch_array($query)){
							$posted_by = $row['f_name']." ".$row['oname'];
							$location = $row['post_image'];
							$Profile_pic = $row['Profile_pic'];
							$content=$row['content']; 
							$post_id = $row['post_id'];
							$time=$row['created'];	
	
							$result =  mysqli_query($bd, "SELECT * FROM likes WHERE post_id = {$row['post_id']} ");
							$liked = mysqli_num_rows($result);
							//$row = mysqli_fetch_array($liked);
							$comment = mysqli_query($bd, "SELECT * FROM comments WHERE post_id = {$row['post_id']} ");
							$commented = mysqli_num_rows($comment);
						?>
			
		<div class="col-md-12">
			<div class="card card-widget post-card"  data-id="<?php echo $row['post_id'] ?>">
               <div class="card-header">
                <div class="user-block">
				  <?php echo '<img class="img-xs rounded-circle" alt="User Image" src="'.$Profile_pic.'"/>'; ?>
					<span class="username"><a href="#"><?php echo $posted_by ?></a></span>   
						<span class="description">Posted - <?php echo date("M d,Y h:i a",strtotime($row['created'])) ?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                	<?php if($_SESSION['login'] == $row['user_id']): ?>
						<div class="dropdown">
							<button type="button" class="btn btn-tool" data-toggle="dropdown" title="Manage">
								<i class="fa fa-ellipsis-v"></i>
	                  </button>
							<div class="dropdown-menu">
								<a class="dropdown-item"  href="edit_post.php?id=<?php echo $row['post_id'];?>">Edit</a>
									<a class="dropdown-item " href="newsfeed.php?id=<?php echo $row['post_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
	                  </div>
	             </div>
	        <?php endif; ?>
		  </div>
	</div>
			  
            <div class="card-body">
            <!-- post text -->
				<p class="content-field"><?php echo $row['content'] ?></p>
					<img class="lightbox-items  img-fluid"src="<?php echo $row['post_image'] ?>"><br><br>
						<div class="desk">
					
						<?php 
							//Determine whether user has alerady like the post
								$result = mysqli_query($bd, "SELECT * FROM likes WHERE user_id='".$_SESSION['login']."' AND post_id=".$row['post_id']."");
									if (mysqli_num_rows($result) > 0) {?>
										<!--user aleady like post -->
										<button class="unlike btn btn-sm float-left" style="font-weight:bold;" value="<?php echo $row['post_id'] ?>"><i class=""></i> UnLike</button>
										<?php } else  { ?>
											<!--user has not yet like post -->
											<button class="like btn btn-sm float-left" style="font-weight:bold;" value="<?php echo $row['post_id'] ?>"><i class=""></i> Like </button>
											<?php } ?>
				
												<span><a href="view-comment.php?id=<?php echo $row['post_id'];?>"><i class=" fa fa-comment"></i> </a></span>
				
												<!--Show Likes and Comments -->
												<span class="float-right text-muted counts" style="font-size:14px;">
												  <!-- Displaying like count -->
													<span id="show_like<?php echo $row['post_id']; ?>"> <i class="fa fa-thumbs-up"> </i>
														<?php
															$query3 = mysqli_query($bd, "SELECT * FROM likes WHERE post_id='".$row['post_id']."' ");
															echo mysqli_num_rows($query3);
														?>
												</span> -
															<!--./Displaying Comments count -->
															<span class="comment-count"> <?php echo number_format($commented)?> <i class="fa fa-comment"></i> </span> 
															</span>
											  <!-- /End Show Likes and Comments -->
											</div>
										</div>
										<!--Comment form -->
										 <div class="card-footer">
											<form action="comment.php" method="post">
											  <div class="textarea-container">
												<input type="hidden" name="post_id" value="<?php echo $row['post_id'];?>">
													<textarea cols="30" rows="1" class="form-control comment-textfield" style="resize:none" placeholder="Press enter to post comment" name="content_comment"></textarea>
														<button name="post_comment" class="btn btn-primary" >Send</button>
												</div>
											</form>
										</div>
										  <!-- /End Comment form -->
									</div>				
								</div>
							<?php } ?>	
						</div>		
					</div>
				</div>
			</div>


<!-- Profile Picture Modal Connection -->
<?php include('manage_pp.php'); ?>

<script src = "jquery-3.1.1.js"></script>
<script>
	
	$('.edit_post').click(function(){
		uni_modal.show-content;
		//uni_modal("<center><b>Edit Post</b></center></center>","create_post.php?id="+$(this).attr('data-id'))
	})
	$('.content-field').each(function(){
		var dom = $(this)[0]
		var divHeight = dom.offsetHeight
		if(divHeight > 117){
			$(this).addClass('truncate-5')
			$(this).parent().children('.show-content').removeClass('d-none')
		}
	})
	$('.show-content').click(function(){
		var txt = $(this).text()
		if(txt == "Show More"){
			$(this).parent().children('.content-field').removeClass('truncate-5')
			$(this).text("Show Less")
		}else{
			$(this).parent().children('.content-field').addClass('truncate-5')
			$(this).text("Show More")
		}
	})
	$('.lightbox-items').click(function(e){
		e.preventDefault()
		uni_modal("","view_attach.php?id="+$(this).attr('data-id'),"large")
	})
	$('.view_more').click(function(e){
		e.preventDefault()
		uni_modal("","view_attach.php?id="+$(this).attr('data-id'),"large")
		
	})
	
	//lIKE AND UNLIKE REQUEST	
	$(document).ready(function() {
		//when user clicks on like
		$(document).on('click', '.like', function(){
			var post_id=$(this).val();
			var $this = $(this);
			$this.toggleClass('like');
			if($this.hasClass('like')){
				$this.text('Like').css({ 'color': 'red', 'font-weight': 'bold' });
			} else {
				$this.text('Unlike').css({ 'color': 'blue', 'font-weight': 'bold' });
				$this.addClass("unlike"); 
			}
			
			$.ajax({
					url: 'like.php',
					type: 'post',
					//async: false,
					data: {
						liked: 1,
						post_id: post_id,
						
					},
					success:function() {
						showLike(post_id);
						
					}
			});
				
		});
		
		//when user clicks on unlike
			$(document).on('click', '.unlike', function(){
			var post_id=$(this).val();
			var $this = $(this);
			$this.toggleClass('unlike');
			if($this.hasClass('unlike')){
				$this.text('Unlike').css({ 'color': 'blue', 'font-weight': 'bold' });
			} else {
				$this.text('Like').css({ 'color': 'red', 'font-weight': 'bold' });
				$this.addClass("like"); 
			}
			$.ajax({
					url: 'like.php',
					type: 'post',
					//async: false,
					data: {
						unliked: 1,
						post_id: post_id,
						
					},
					success:function() {
						showLike(post_id);
					}
			});
				
		});
		
	});
//	Function to show Likes and Unlikes
function showLike(post_id){
		$.ajax({
			url: 'show_like.php',
			type: 'POST',
			//async: false,
			data:{
				post_id: post_id,
				showlike: 1
			},
			success:function(response) {
					$('#show_like'+post_id).html(response);
			}
		});
	}	

function myFunction() {
    var element = document.body;
    element.classList.toggle("dark-mode");
}
</script>



<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>