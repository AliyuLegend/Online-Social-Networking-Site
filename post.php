<?php
include('include/DB.php');
session_start();

$user=$_SESSION['login'];
$time=time();

// Content
if( isset($_POST['content']) && !empty($_POST['content']) ){
    $content=$_POST['content'];
		}else{
			$content="";
}

// Image
if ( isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name']) ) {
    $file=$_FILES['image']['tmp_name'];
    $image = $_FILES["image"] ["name"];
    $image_name= addslashes($_FILES['image']['name']);
    $size = $_FILES["image"] ["size"];
    $error = $_FILES["image"] ["error"];

    if ($error > 0){
        die("Error uploading file! Code $error.");
    }
    if($size > 10000000){ //conditions for the file
        die("Format is not allowed or file size is too big!");
    }

    move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);          
    $location="upload/" . $_FILES["image"]["name"];
}else{
    $location="";
}

// Save to database if there is content OR an image
// Will save both if both are present

if( !empty($content) || !empty($location) ){
    $update=mysqli_query($bd,"INSERT INTO post (user_id,post_image,content)
    VALUES ('$user','$location','$content') ") or die (mySQL_error());

    // Redirect to home
    header('location:newsfeed.php');
}
?>