<?php
session_start();
//error_reporting(0);
include("../include/DB.php");   // Including Database Connection


if(isset($_POST["Import"])){
		
		echo $filename=$_FILES["file"]["tmp_name"];
		
		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	    
	          //It wiil insert a row to our validate_user table from our csv file`
	           $sql = "INSERT into validate_regnumber (`name`, `regnumber`, `department`) 
	            	values('$emapData[1]','$emapData[2]','$emapData[3]')";
	        
			//we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query($bd, $sql);
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"validate-users.php\"
						</script>";
				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"Students data has been successfully Imported.\");
						window.location = \"validate-users.php\"
					</script>";
	        
			 

			 //close of connection
			mysqli_close($bd); 
				
		 	
			
		 }
	}	 
?>		 