<?php 
SESSION_START();
include("connect.php");
if(isset($_POST["submit1"]))
{
	$full=$_POST["fullname"];
	$email=$_POST["email"];
	$pass=md5($_POST["pass"]);
	$contact=$_POST["contact"];
	$age=$_POST["age"];
	$gender=$_POST["gender"];
	$country=$_POST["category"];
	$state=$_POST["subcat"];
	$address=$_POST["address"];
	$query="INSERT INTO register VALUES('','$full','$email','$pass','$contact','$age','$gender','$country','$state','$address','0')";
	$pointer=mysqli_query($conn,$query);
	if($pointer)
	{
		
		header("location:register.php?msg=1");
	}
	else
	{
		
		header("location:register.php?msg=0");
	}
}
?>