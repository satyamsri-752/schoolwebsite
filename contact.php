<?php
$con = mysqli_connect('localhost','root','');
if($con){
	echo "Connection Successful";
}
else{
	echo "No Connection";
}
mysqli_select_db($con,'webschool');
$query = "insert into contact values('','$_POST[user]','$_POST[email]','$_POST[mobile]','$_POST[comments]')";


  $query_run = mysqli_query($con,$query);


?>