<?php session_start();

require('includes/config.php');
$a = $_SESSION['unm'];
$q="select u_id from user where user.u_unm='$a'";
$res=mysqli_query($conn,$q) or die("Can't Execute Query...");
$row=mysqli_fetch_assoc($res);
$u_id=$row['u_id'];
echo $u_id;
	if(!empty($_POST))
	{
		if(empty($_FILES['img']['name']))
		$msg[] = "Please provide a file";
	
		if($_FILES['img']['error']>0)
		$msg[] = "Error uploading file";
		
				
		if(!(strtoupper(substr($_FILES['img']['name'],-4))==".JPG" || strtoupper(substr($_FILES['img']['name'],-5))==".JPEG"|| strtoupper(substr($_FILES['img']['name'],-4))==".GIF"))
			$msg[] = "wrong file  type";
			
		if(file_exists("../upload_image/".$_FILES['img']['name']))
			$msg[] = "File already uploaded. Please do not updated with same name";

		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
			move_uploaded_file($_FILES['img']['tmp_name'],"upload_image/".$_FILES['img']['name']);
			$b_img = "upload_image/".$_FILES['img']['name'];	
			
			$b_nm=$_POST['name'];
			$b_cat=$_POST['cat'];
			$b_desc=$_POST['description'];
			$b_edition=$_POST['edition'];
			$b_publisher=$_POST['publisher'];			
			$b_pages=$_POST['pages'];
			$b_date=$_POST['date'];
			
			
		
			
			$query="insert into book(b_nm,b_subcat,b_desc,b_edition,b_publisher,b_page,b_date,b_img,u_id)
			values('$b_nm','$b_cat','$b_desc','$b_edition','$b_publisher',$b_pages,$b_date,'$b_img','$u_id')";
			
			mysqli_query($conn,$query) or die($query."Can't Connect to Query...");
			header("location:addbook.php");
		
		}
	}
	else
	{
		header("location:index.php");
	}
?>
	
	