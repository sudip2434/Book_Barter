<?php 
session_start();
require('includes/config.php');

	$q="select * from user";
	 $res=mysqli_query($conn,$q) or die("Can't Execute Query...");

	?>

<head>
		<?php
			include("includes/head.inc.php");
		?>
		<style>
			table{padding:5px;border:10px solid gray}
			td,th{padding:15px}
			
		</style>
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="menu">
		<?php
			include("includes/menu.inc.php");
		?>
	</div>
</div>
<div id="logo-wrap">
<div id="logo">
		<?php
			include("includes/logo.inc.php");
		?>
</div>
</div>
<!-- end header -->
<!-- start page -->

<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title"></h1>
			<div class="entry">
				
					<table border='1' WIDTH='100%'>
						<tr>
<td WIDTH='10%' style="color:darkgreen"><b><u>SR.NO</u></b></td>
<TD style="color:darkgreen" WIDTH='20%'><b><u>Name</u></b></TD>
<TD style="color:darkgreen" WIDTH='20%'><b><u>Gender</u></b></TD>
<TD style="color:darkgreen" WIDTH='25%'><b><u>Email</u></b></TD>
<TD style="color:darkgreen" WIDTH='25%'><b><u>Contact</u></b></TD>
<TD style="color:darkgreen" WIDTH='50%'><b><u>City</u></b></TD>
<TD style="color:darkgreen" WIDTH='25%'><b><u>DELETE</u></b></TD>				
							
						</tr>
						<?php
							$count=1;
							while($row=mysqli_fetch_assoc($res))
							{ $a=$row['b_id'];
								$q1="select * from user where user.u_id= (select u_id from book where b_id = '$a')";
									$res1=mysqli_query($conn,$q1) or die("Can't Execute Query...");
									$row1=mysqli_fetch_assoc($res1);
							
							echo '<tr>
										<td>'.$count.'
										<td>'.$row['u_unm'].'
										<td>'.$row['u_gender'].'
										<td>'.$row['u_email'].'
										<td>'.$row['u_contact'].'
										<td>'.$row['u_city'];
				
										
										
									echo 	'<td><a href="process_del_book.php?sid='.$row['b_id'].'"><img src="images/drop.png" ></a>
												
									
									</tr>';
									$count++;
							}
						?>

					</TABLE>
				
			</div>
			
		</div>
		
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->

</body>
</html>
