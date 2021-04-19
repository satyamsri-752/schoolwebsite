<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/js/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		#header{
			height: 10%;
			width: 100%;
			top: 2%;
			background-color: black;
			position: fixed;
			color: white;
			left:0px;
		}
		#left_side{
			height: 75%;
			width: 15%;
			top: 10%;
			position: fixed;
		}
		#right_side{
			height: 75%;
			width: 80%;
			background-color: whitesmoke;
			position: fixed;
			left:17%;
			top: 21%;
			color: red;
			border: solid 1px black;
		}
		#top_span{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
	    #td{
	    	border: solid 1px black;
	    	padding: 2px;
	    	text-align: left;
	    	width: 200px;
	    }
    </style>
    <?php
        session_start(); 
        $connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"webschool");
     ?>
</head>
<body>
	<div id="header">
		<center><br><strong>Student Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Email: <?php echo $_SESSION['email'];?> &nbsp;&nbsp;&nbsp; Name: <?php echo $_SESSION['name'];?>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="logout.php">LogOut</a>
		</center>
	</div>
	<span id="top_span"><marquee>Note: This portal is open till April 2020 ...Students plz edit 
	your information if wrong.</marquee></span>
	<div id="left_side"><br><br><br><br><br>
		<form action='' method="post">
			<table>
				<tr>
					<td>
						<input type="submit" name="search_student" value="Search Student">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="edit_student" value="Edit Student">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="add_new_student" value="Add New Student">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="delete_student" value="Delete Student">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="show_teachers" value="Show Teachers">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="right_side"><br><br>
		<div id="demo">
			<?php
			if(isset($_POST['search_student'])){
				?>
				<center>
					<form action="" method="post">
						Enter Roll No:
						<input type="text" name="roll_no">
						<input type="submit" name="search_by_roll_no_for_search" value="Search">
					</form>
				</center>
				<?php
			}
			if(isset($_POST['search_by_roll_no_for_search'])){
				$query = "select * from students where roll_no = '$_POST[roll_no]'";
				$query_run = mysqli_query($connection,$query);
				while($row = mysqli_fetch_assoc($query_run)){
                     ?>
                     <table>
                     	<tr>
                     		<td><b>Roll No:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" value="<?php echo $row['roll_no']
                     			;?>" disabled>
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Name:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" value="<?php echo $row['name']
                     			;?>" disabled>
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Father's Name:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" value="<?php echo $row['father_name']
                     			;?>" disabled>
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Class:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" value="<?php echo $row['class']
                     			;?>" disabled>
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Mobile:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" value="<?php echo $row['mobile']
                     			;?>" disabled>
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Email:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" value="<?php echo $row['email']
                     			;?>" disabled>
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Password:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" value="<?php echo $row['password']
                     			;?>" disabled>
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Remark:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<textarea rows="3" cols="40" disabled=""><?php echo $row['remark'];?></textarea>
                     		</td>
                     	</tr>
                     </table>
                     <?php
				}
			}
			?>
			<?php
			if(isset($_POST['edit_student'])){
				?>
				<center>
					<form action="" method="post">
						Enter Roll No:
						<input type="text" name="roll_no">
						<input type="submit" name="search_by_roll_no_for_edit" value="Search">
					</form>
				</center>
				<?php
			}
			if(isset($_POST['search_by_roll_no_for_edit'])){
				$query = "select * from students where roll_no = '$_POST[roll_no]'";
				$query_run = mysqli_query($connection,$query);
				while($row = mysqli_fetch_assoc($query_run)){
                     ?>
                     <form action="admin_edit_student.php" method="post">
                     <table>
                     	<tr>
                     		<td><b>Roll No:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" name="roll_no" value="<?php echo $row['roll_no']
                     			;?>">
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Name:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" name="name" value="<?php echo $row['name']
                     			;?>">
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Father's Name:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" name="father_name" value="<?php echo $row['father_name']
                     			;?>">
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Class:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" name="class" value="<?php echo $row['class']
                     			;?>">
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Mobile:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" name="mobile" value="<?php echo $row['mobile']
                     			;?>">
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Email:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" name="email" value="<?php echo $row['email']
                     			;?>">
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Password:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<input type="text" name="password" value="<?php echo $row['password']
                     			;?>">
                     		</td>
                     	</tr>
                     	<tr>
                     		<td><b>Remark:&nbsp;&nbsp;&nbsp;</b></td>
                     		<td>
                     			<textarea rows="3" cols="40" name="remark"><?php echo 
                     			$row['remark'];?></textarea>
                     		</td>
                     	</tr><br><br>
                     	<tr>
                     		<td></td>
                     		<td><input type="submit" name="edit" value="Save"></td>
                     	</tr>
                     </table>
                 </form>
                     <?php
				}
			}
			?>
			<?php
			    if(isset($_POST['add_new_student'])){
			    	?>
			    	<center><h2>Fill the given details:</h2></center>
			    	<form action="add_student.php" method="post">
			    		<table>
			    			<tr>
			    				<td>Roll No:</td>
			    				<td>
			    					<input type="text" name="roll_no" required>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>Name:</td>
			    				<td>
			    					<input type="text" name="name" required>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>Father Name:</td>
			    				<td>
			    					<input type="text" name="father_name" required>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>Class:</td>
			    				<td>
			    					<input type="text" name="class" required>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>Mobile:</td>
			    				<td>
			    					<input type="text" name="mobile" required>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>Email:</td>
			    				<td>
			    					<input type="text" name="email" required>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>Password:</td>
			    				<td>
			    					<input type="text" name="password" required>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>Remark:</td>
			    				<td>
			    					<textarea rows="3" cols="40" name="remark">
			    					</textarea>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td></td>
			    				<td><input type="submit" name="add" value="Add Student">
			    				</td>
			    			</tr>	
			    		</table>
			    	</form>
			    	<?php
			    }
			?>

			<?php
			    if(isset($_POST['delete_student'])) {
			    	?>
			    	<center>
			    		<h5>Enter Roll No to Delete Student</h5>
			    		<form action="delete_student.php" method="post">
			    			Roll No:
			    			<input type="text" name="roll_no">
			    			<input type="submit" name="search_by_roll_no_for_delete" value="Delete Student">
			    		</form>
			    	</center>
			    	<?php
			    }
			?>

			<?php
			if(isset($_POST['show_teachers'])){
				?>
				<center>
					<h5>Teacher's Details</h5>
					<table style="border-collapse: collapse;border: 1px solid black;">
						<tr>
							<td id="id"><b>ID</b></td>
							<td id="id"><b>Name</b></td>
							<td id="id"><b>Mobile</b></td>
							<td id="id"><b>Courses</b></td>
							
						</tr>
					
				<?php
				     $connection = mysqli_connect("localhost","root","");
                     $db = mysqli_select_db($connection,"webschool");
                     $query = "select * from teachers";
                     $query_run = mysqli_query($connection,$query);
                     while($row = mysqli_fetch_assoc($query_run)){
                     	?>
                     	
                     			<tr>
                     				<td id="td"><?php echo $row['t_id'];?></td>
                     				<td id="td"><?php echo $row['name'];?></td>
                     				<td id="td"><?php echo $row['mobile'];?></td>
                     				<td id="td"><?php echo $row['courses'];?></td>
                     				
                     			</tr>
                     	
                     	<?php
                     }
			}
			?>
		</table>
	</center>
		</div>
	</div>
</body>
</html>