<?php 
include('include/DB.php');
session_start();


$user_id=$_SESSION['login'];

// Message content
if( isset($_POST['my_message']) && !empty($_POST['my_message']) ){
    $my_message=$_POST['my_message'];
	$friend_id  = $_POST['friend_id'];
		}else{
			$my_message="";
}

// Message Image
if ( isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name']) ) {
	$friend_id  = $_POST['friend_id'];
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

    move_uploaded_file($_FILES["image"]["tmp_name"],"upload/message_images/" . $_FILES["image"]["name"]);          
    $location="upload/message_images/" . $_FILES["image"]["name"];
}else{
    $location="";
}

// Save to database if there is content OR an image
// Will save both if both are present


if( !empty($my_message) || !empty($location) ){
    $query=mysqli_query($bd,"INSERT into message (sender_id,reciever_id,content,photo,date_sended)
	  VALUES ('$user_id','$friend_id','$my_message','$location',NOW())");

	if($query) {
					
					echo "<script>
						alert('Message Sent Successfully');
						window.location.href='newsfeed.php';
						</script>";

		
}

}

?>