<?php
session_start();
//error_reporting(0);
include("include/DB.php");

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
<?php } ?>	
<div class="d-flex w-100 h-100">
	<div class="center-panel py-1 px-2">
		<div class="container-fluid">
			<?php
				include("include/DB.php");
					$query=mySQLi_query($bd,"SELECT * from post LEFT JOIN users on users.username = post.user_id where post_id = '".$_GET['id']."' order by post_id DESC");
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
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
				
					<div class="card-body">
					<!-- post text -->
						<p class="content-field"><?php echo $row['content'] ?></p>
							<img class="lightbox-items gallery__img img-fluid"src="<?php echo $row['post_image'] ?>"><br><br>
				
								<?php 
									//Determine whether user has alerady like the post
									$result = mysqli_query($bd, "SELECT * FROM likes WHERE user_id='".$_SESSION['login']."' AND post_id=".$row['post_id']."");
									if (mysqli_num_rows($result) == 1) {?>
									<!--user aleady like post -->
									<button class="unlike btn btn-sm float-left" style="font-weight:bold;"  value="<?php echo $row['post_id'] ?>"><i class=""></i> UnLike</button>
									<?php } else  { ?>
									<!--user has not yet like post -->
									<button class="like btn btn-sm float-left" style="font-weight:bold;"  value="<?php echo $row['post_id'] ?>"><i class=""></i> Like </button>
									<?php } ?>
				
									<span class="float-right text-muted counts" style="font-size:14px;">
									<!-- Displaying like count -->
										<span id="show_like<?php echo $row['post_id']; ?>">
											<?php
												$query3 = mysqli_query($bd, "SELECT * FROM likes WHERE post_id='".$row['post_id']."' ");
												echo mysqli_num_rows($query3);
											?>
								</span>like -
											<!--./Displaying Comments count -->
												<span class="comment-count" ><?php echo number_format($commented) ?></span> comments 
						</span>
					</div>
			<!-- /.card-body -->
			
					<div class="card-footer card-comments ">
						<?php 
							include("include/DB.php");
								$query=mySQLi_query($bd,"SELECT * from comments INNER JOIN users on users.username = comments.user_id where post_id = {$row['post_id']} order by unix_timestamp(comments.date_created) asc ");
									while($crow=mysqli_fetch_assoc($query)) {
										$name = $crow['f_name']." ".$crow['oname'];
										$content_comment=$crow['content_comment'];
										$Profile_pic=$crow['Profile_pic'];
										$date_created=$crow['date_created'];
										?>
										<div class="card-comment">
										<!-- User image -->
											<img class="img-circle img-sm" src="<?php echo $crow['Profile_pic'] ?>" alt="User Image">
												<div class="comment-text py-0">
													<span class="username">
														<span class="uname"><?php echo $crow['f_name']." ".$crow['oname'] ?></span>
															<span class="text-muted float-right timestamp"><?php echo date("M d,Y h:i A",strtotime($crow['date_created'])) ?></span>
									</span><!-- /.username -->
																<span class="comment">
																	<p><?php echo str_replace("\n","<br/>",$crow['content_comment']) ?></p>
								</span>
							</div>
							<!-- /.comment-text -->
						</div>
					<?php } ?>  
					<!-- /.card-footer -->
				</div>
			
				<div class="card-footer">
					<form action="comment.php" method="post">
						<div class="textarea-container ">
							<input type="hidden" name="post_id" value="<?php echo $row['post_id'];?>">
								<textarea cols="30" rows="1" class="form-control comment-textfield" style="resize:none" placeholder="Press enter to post comment" name="content_comment"></textarea>
									<button name="post_comment" class="btn btn-primary" >Send</button>
							</div>
						</form>
					</div>
					<!-- /.card-footer -->
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</div>



<!-- Modal -->	

<?php include('create_post.php'); ?>
<?php include('manage_account.php'); ?>


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

</script>



<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>