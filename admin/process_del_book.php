<?php
require('includes/config.php');
		$bid = $_GET['sid'];
			$query="delete from book where b_id ='$sid'";
		
			mysqli_query($conn,$query) or die("can't Execute...");
			
			
			header("location:view_book.php");

?>