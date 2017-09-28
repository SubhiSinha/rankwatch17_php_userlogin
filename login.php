<?php
error_reporting(0);
include("connect.php");
include("header.php");
//login
if(isset($_POST["submit"]))
{
	$email=$_POST["email"];
	$pass=md5($_POST["pass"]);
	$query="SELECT * FROM register WHERE email='$email' and password='$pass'";
	$pointer=mysqli_query($conn,$query);
	if(mysqli_num_rows($pointer)==1)
	{
		$row1=mysqli_fetch_assoc($pointer);
		SESSION_START();
		$_SESSION["r_id"]=$row1["id"];
		header("location:details.php");
	}
}

?>
 
 <form class="col-md-6 col-md-offset-3 " action="login.php" method="post" style="margin-top:5%;">
          
            	
            	<div class="form-group col-md-12">
            		<label>Email</label>
            		<input type="email" class="form-control" name="email" id="email">
            	</div>
            	<div class="form-group col-md-12"  >
            		<label>Password</label>
            		<input type="text" name="pass" id="pass" class="form-control">
            	</div>
            	
 
            	<div class="col-md-12 text-center form-group" style="margin-top:5px;">
            	    <label></label> 
            		<input type="submit" name="submit"  value="submit" class="btn btn-success" onclick="myFunction()">
            	</div>
           
 </form>