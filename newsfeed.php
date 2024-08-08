<?php
session_start();
//error_reporting(0);
include("include/DB.php");   //Including Database Connection 
include("include/Time.php");  //Including Date time function 

if (!isset($_SESSION['login']) ||(trim ($_SESSION['login']) == '')) {
	header('location:index.php');
    exit();
	}

//Delete Post
if(isset($_GET['del'])) {
	mysqli_query($bd, "delete from post where post_id = '".$_GET['id']."'");
        $_SESSION['msg']="data deleted !!";
		  }	
//Fetching users 	
if(isset($_POST['submit'])) {
	$sql=mysqli_query($bd, "select * from users where username='".$_SESSION['login']."'");
		while($data=mysqli_fetch_array($sql)) {  
			}
}					
$user=$_SESSION['login'];
			

?>
<!DOCTYPE html>
<html lang="en">
		<?php include('header.php'); ?>
<style>
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

<body style="font-family: 'Poppins', sans-serif;">

 <!-- Navbar -->	  
 <nav class="navbar navbar-expand-lg  navbar-dark bg-primary navbar-fixed-top mb-3">
        <div class="container-fluid">
			<a class="navbar-brand mr-3" href="newsfeed.php"> <img src="img/buk.jpg" width="auto" class="rounded-circle mr-1" style="" height="70"style="display: inline-block; padding:0px; alt="LOGO"></a>
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
						<a href="" data-toggle="modal" data-target="#ModalExample" class="dropdown-item"><i class="fa fa-cog mr-2"style="color:green"></i> Manage Account</a>
							<a href="change-password.php" class="dropdown-item"><i class="fa fa-key"style="color:blue"></i> Change Passoword</a>
								<a href="logout.php" class="dropdown-item"><i class="fa fa-power-off mr-2"style="color:red"></i> Logout</a>
				</div>	
			</li>
		 </ul>
     </div>  
</nav>
<!--End Navbar -->

		
<section>
        <div id="main-container">
		<!--User Profile -->
			<div class="left-panel mt-1" >
				<a href="edit_profile.php" class="d-flex py-2 px-1 side-nav rounded" style="background-color:#eff8f8;">
					<div class="rounded-circle mr-1" style="width: 30px;height: 30px;top:-5px;left: -40px">
						<?php echo '<img height="200" class="image-fluid image-thumbnail rounded-circle" alt="" style="max-width: calc(100%);height: calc(100%);" src="'.$Profile_pic.'" />'; ?> </div>
							<span class="" style="width: 10px;height: 10px;top:-3px;left: -20px"></span>
								<span class="ml-3"><b>
									<h5 style="color:#13A8FE;">My Profile </h5>
					</b>
			 </span>
		</a>
	<hr>
<!--End Profile -->	
       
	<!--Faculty Updates -->
    <div class="alert-box">
        <span class="ml-3"><b>
			<span class="badge">Faculty Updates</span><br>
				<hr>
					<?php
						$sql=mysqli_query($bd, "select * from post_update ");
							while($row=mysqli_fetch_array($sql)) { ?>
								<p style="font-style: italic;"><?php echo $row['Content'];?></p> <?php } ?>
					</div>
				</b>
			</span>	
		</div>
	<!--/End Faculty Updates -->
	
	
  <!--Center Panel -->      
	<div class="center-panel py-3 px-1">
		<div class="container-fluid">
			<div class="col-md-12">
				<div class="card card-widget">
					<div class="card-body">
						<div class="container-fluid">
							<div class="d-flex w-100">
								<div class="rounded-circle mr-1" style="width: 30px;height: 30px;top:-5px;left: -40px">
					                  <?php echo '<img height="200" class="image-fluid image-thumbnail rounded-circle" alt="" style="max-width: calc(100%);height: calc(100%);" src="'.$Profile_pic.'" />'; ?>
				                </div>
									<button class="btn btn-default ml-4 text-left" type="button" style="width:calc(80%);border-radius: 50px !important;" data-toggle="modal" data-target="#exampleModal"><span>What's on your mind, <?php echo htmlentities($data['username']);?>?</span></button>
								</div>
							<hr>
							<div class="d-flex w-100 justify-content-center">
								<a href="javascript:void(0)" id="#" class="text-dark post-link px-3 py-1" style="border-radius: 50px !important;"><span style="color:green" class="fas fa-photo-video"></span> Photo/Video</a>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php } ?>	
	<?php
		include("include/DB.php");
			$query=mySQLi_query($bd,"SELECT * from post LEFT JOIN users on users.username = post.user_id order by post_id DESC");
				while($row=mysqli_fetch_array($query)){
					$posted_by = $row['f_name']." ".$row['oname'];
					$location = $row['post_image'];
					$Profile_pic = $row['Profile_pic'];
					$content=$row['content']; 
					$post_id = $row['post_id'];
					$time=$row['created'];	
	
					//$result =  mysqli_query($bd, "SELECT * FROM likes WHERE post_id = {$row['post_id']} ");
					//$liked = mysqli_num_rows($result);
					//$row = mysqli_fetch_array($liked);
					$comment = mysqli_query($bd, "SELECT * FROM comments WHERE post_id = {$row['post_id']} ");
					$commented = mysqli_num_rows($comment);
?>
<!--Post-->
	<div class="col-md-12">
		<div class="card card-widget post-card"  data-id="<?php echo $row['post_id'] ?>">
            <div class="card-header">
                <div class="user-block">
				  <?php echo '<img class="img-xs rounded-circle" alt="User Image" src="'.$Profile_pic.'"/>'; ?>
					<span class="username"><a href="#"><?php echo $posted_by ?></a></span>   
						<span class="description">Posted - <?php echo date("M d,Y h:i a",strtotime($row['created'])) ?></span>
                </div>
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
			<!--card body -->
              <div class="card-body">
                <!-- post body -->
					<p class="content-field"><?php echo $row['content'] ?></p>
						<img id="myImg" class="lightbox-items gallery__img img-fluid modal_image"src="<?php echo $row['post_image'] ?>"><br><br>
							<div class="desk">
								<!--Likes -->
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
               
														<!--Display Likes and Comments -->
															<span class="float-right text-muted counts" style="font-size:14px;">
																<!-- Displaying like count -->
																<span id="show_like<?php echo $row['post_id']; ?>"> <i class="fa fa-thumbs-up"></i>
																	<?php
																		$query3 = mysqli_query($bd, "SELECT * FROM likes WHERE post_id='".$row['post_id']."' ");
																		echo mysqli_num_rows($query3);
																	?>
																	</span> - <i class="fa fa-comment"></i>
																		<!--./Displaying Comments count -->
																		<span class="comment-count"> <?php echo number_format($commented)?></span> 
																</span>
																<!-- /.Displaying likes and comments  -->
															</div>
														</div>
											<!-- /.card-body -->
						
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
					<!-- End Comment form -->
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<!--Right Displayed user's full name -->
<?php 
	$sql=mysqli_query($bd, "select * from users where username='".$_SESSION['login']."'");
		while($data=mysqli_fetch_array($sql)) {  
			$Profile_pic=$data['Profile_pic'];
		?>

				<div class="float-right">
					<div class="right-top">
						<span class="d-flex text-dark side-nav rounded">	
							<span class="ml-1" style="font-size:25px;" ><b>
								<?php echo htmlentities($data['f_name'].' '.$data['oname']);?>
						</b>
					</span>
				</span>
					<div class="dashes">
                        <i class="fa fa-bars"></i>
                    </div>
               </div>
		<?php } ?>
    <hr>
<!--End Right Displayed user full name -->
	
<!--Display User friends -->	
	<div class="friend">
        <h2 style="text-align:left; font-size: 20px; font-weight: 10px; padding:5px;">Friends</h2>
           </div>
				<?php 	 
					$sql= mysqli_query($bd,"select users.username, users.f_name , users.oname , users.Profile_pic , friends.friend_id, friends.my_id   from users  , friends
						where friends.friend_id = '" . $_SESSION["login"] . "' and users.username = friends.my_id OR friends.my_id = '" . $_SESSION["login"] . "' and users.username = friends.friend_id  ");
							while($data=mysqli_fetch_array($sql)) {
		?>               
								<div class="friends">
									<div class="friend">
										<h2></h2>	
								</div>
											<div class="friends-1"  >
												<div class="friends-img">
													<img class="friends-img1" alt="" src= "<?php echo $data['Profile_pic'] ?>">
										</div>
														<div class="friends-name" style="text-align:left; font-size: 30px; font-weight: 10px;">
															<h6 class="name-11">
																<?php echo $data['username'];?>
																	</h6>
													</div> 
																	<div class="cicle">
																		<a href="conversation.php?f_id=<?php echo $data['username'];?>"> <i class="fa fa-envelope"></i></a>
															</div>	
													</div>
											</div>
									<?php } ?>
									<!--End Display User friends -->
								</div>
							</div>
					</section>
<!-- The Modal -->
<div id="myModal" class="modal2">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<!-- Modal -->	
<?php include('create_post.php'); ?>     <!--Post-->
<?php include('manage_account.php'); ?>  <!--Edit Profile-->


<script src = "jquery-3.1.1.js"></script>	
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a cap
var img = document.getElementsByClassName('modal_image');
for(var i=0; i<img.length; i++){
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img[i].addEventListener('click',function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
})
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

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
//Function to show Likes and Unlikes
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

</script>



<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>