<?php 
 session_start();
 error_reporting(0);
   include('include/DB.php');
		
	//$did=$_GET['id'];

if(isset($_POST['upload'])) {
			$file=$_FILES['post_image']['name']; 
			$image_tmp_name		= $_FILES['post_image']['tmp_name'];
			$content=$_POST['content']; 
			
			$path = 'upload/'; 
			$location = $path . $_FILES['post_image']['name']; 
			move_uploaded_file($_FILES['post_image']['tmp_name'], $location); 
			
			 if ((!($_FILES['post_image']['name']))) /* If there Is No file Selected*/ {
			$update = "UPDATE post SET content='$content' where post_id = '".$_GET['id']."'";
			
			} else /* If file is  Selected*/ {
			$update = "UPDATE post SET content='$content', post_image='$location' where post_id = '".$_GET['id']."'";

    }
			$run = mysqli_query($bd, $update);
			echo "<script>
					alert('Your Post Was Successfully Updated');
					window.location.href='newsfeed.php';
				</script>";
		}

$qry = mysqli_query($bd,$sql);

	$qry="SELECT * FROM `post` WHERE  post_id = '".$_GET['id']."'";
	$run=mysqli_query($bd,$qry);
	$reslt=mysqli_fetch_array($run);
?>

	
<!DOCTYPE html>
<html lang="en">
		<?php include('header.php'); ?>
		
		<style>
@import url("https://fonts.googleapis.com/css?family=Catamaran:900&display=swap");

body {
  font-family: 'Poppins', sans-serif;
  
}
	
	.center-panel{
		left: calc(25%);
		width: calc(50%);
		height: calc(100% - 4rem);
		overflow: auto;
		position: fixed;
	}
	.side-nav:hover,.post-link:hover{
		background: #00000026
	}
	.gallery__img {
	    width: 100%;
	    height: 100%;
	    object-fit: cover;
	}
	.gallery {
	    display: grid;
	    grid-template-columns: repeat(2, 50%);
	    grid-template-rows: repeat(2, 30vh);
	    grid-gap: 3px;
	    grid-row-gap: 3px;
	}
	.gallery__item{
		margin: 0
	}
	.textarea-container {
  position: relative;
}
.textarea-container textarea {
  width: 100%;
  height: 100%;
  box-sizing: border-box;
}
.textarea-container button {
  position: absolute;
  top: 0;
  right: 0;
}
.comment-text {
    font-size: 13px;
    line-height: 0px;
    color: #7a8192;
    display: block;
	text-align: left;
	padding: 2px 0px 0px;
   
}
.comment-text p {
    font-size: 15px;
    line-height: 18px;
    color: #7a8192;
    padding: 15px 20px 20px 20px;
	text-align: left;

}

.navbar-toggler {
  position: relative;

}

.navbar-toggler:focus,
.navbar-toggler:active {
  outline: 0;
}

.navbar-toggler span {
  display: block;
  background-color: #000000;
  height: 3px;
  width: 25px;
  margin-top: 4px;
  margin-bottom: 4px;
  transform: rotate(0deg);
  left: 0;
  opacity: 1;
}

.navbar-toggler span:nth-child(1),
.navbar-toggler span:nth-child(3) {
  transition: transform .35s ease-in-out;
}

.navbar-toggler:not(.collapsed) span:nth-child(1) {
  position: absolute;
  left: 12px;
  top: 10px;
  transform: rotate(135deg);
  opacity: 0.9;
}

.navbar-toggler:not(.collapsed) span:nth-child(2) {
  height: 12px;
  visibility: hidden;
  background-color: transparent;
}

.navbar-toggler:not(.collapsed) span:nth-child(3) {
  position: absolute;
  left: 12px;
  top: 10px;
  transform: rotate(-135deg);
  opacity: 0.9;
}
.dropdown a {
  color: #333;
  text-decoration: none;
  display: inline-block;

}

.dropdown a:after {
   content: "";
  display: block;
  margin: auto;
  height: 3px;
  width: 0;
  top: 5px;
  position: inline-block;
  background: transparent;
  transition: all 0.3s;
}

 .dropdown:hover > a::after {
   width: 100%;
  background: rgb(150, 220, 241);
} 
.dropdown-toggle {


}

  li {
  list-style-type: none;
  display: inline-block;
  margin: 3px 5px;

}

li > a {
  color: #333;
  text-decoration: none;
  display: inline-block;
  position: relative;
}

li > a::after {
  content: "";
  display: block;
  margin: auto;
  height: 3px;
  width: 0;
  top: 5px;
  background: transparent;
  transition: all 0.3s;
  
}

li > a:hover::after, li > a.active-nav::after {
  width: 100%;
  background: rgb(150, 220, 241);
}

nav ul li {
  display: inline-block;
}
nav ul li a {
  display: block;
  padding: 15px;
  text-decoration: none;
  color: #aaa;
  font-weight: 800;
  text-transform: uppercase;
  margin: 0 10px;
}
nav ul li a,
nav ul li a:after,
nav ul li a:before {
  transition: all .5s;
}
.like {
		background-color: #8be3e9b6;
		border: block;
		border-radius: 5px;
		text-align: center;
	}
	.unlike {
		background-color: #8be3e9b6;
		border: block;
		border-radius: 5px;
		text-align: center;
	}
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
	.form22 {
    display: inline-block;
}
</style>
		

<body>

<!-- Navbar -->	  
 <nav class="navbar navbar-expand-lg  navbar-dark bg-primary navbar-fixed-top mb-3">
        <div class="container-fluid">
			<a class="navbar-brand mr-3" href="index.php"> <img src="img/buk.jpg" width="auto" class="rounded-circle mr-1" style="" height="70"style="display: inline-block; padding:0px; alt="LOGO"></a>
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
			//session_start();
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

<div class="container">
	<div class="row">
		<div class="col-sm-9 mx-auto">
			<div id="login-center" class="row justify-content-center align-self-center w-100">
				<div class="card col-sm-7">
					<div class="card-body">
	
				
	<form id="upload_image"  class="form-horizontal" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
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
			<textarea name="content" id="content" cols="30" rows="2" class="form-control" <?php echo ucwords($data['username']);?> style="resize:none;border: none"><?php echo $reslt['content'];?></textarea>
		</div>
		

		<div class="c-row" id="">
			<div id="file-display" class="column">


		<input type="file"  name="post_image" multiple="multiple" id="postF" class="d-none" accept="image/*,video/*" onchange="displayImgProfile(this,$(this))">
		
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
		
		<div class="row">
			<div class="form-group d-flex justify-content-center rounded-circle">
				<img class="lightbox-items gallery__img img-fluid" src="<?php echo $reslt['post_image']; ?>"  id="profile">
				
			</div>
		</div>
		
<div class="modal-footer display py-1 px-1">
	<div class="d-block w-100">
		<button class="btn btn-block btn-primary btn-sm" name="upload" value="UPLOAD">POST</button>
	</div>
</div>
	
	</form>
						</div>
					</div>
				</div>
			</div>  
		</div>
</div>
</div>
</div>
	<?php } ?>	

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

 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>