<?php
	// This function is used for checking the email if it has already registered or not
    function email_exists($email,$bd) {
		$row=mysqli_query($bd, "SELECT `email` FROM `users` WHERE `email`='$email' ");
		{
			if(mysqli_num_rows($row)==1) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	// This function is used for checking a Phone Number if it has already registered or not
	 function number_exists($number,$bd)
	{
		$row=mysqli_query($bd, "SELECT `number` FROM `users` WHERE `number`='$number' ");
		{
			if(mysqli_num_rows($row)) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	// This function is used for checking a phone number if it has already registered or no
	function username_exists($username,$bd)
	{
		$row=mysqli_query($bd, "SELECT `username` FROM `users` WHERE `username`='$username' ");
		{
			if(mysqli_num_rows($row)) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	// This function is used for checking a phone number if it has already registered or no
	function regnumber_exists($regnumber,$bd)
	{
		$row=mysqli_query($bd, "SELECT `regnumber` FROM `validate_regnumber` WHERE `regnumber`='$regnumber' ");
		{
			if(mysqli_num_rows($row)==1) 
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}
?>