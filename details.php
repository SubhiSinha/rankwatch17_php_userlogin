<?php
error_reporting(0);
SESSION_START();
include("connect.php");
include("header.php");
$r_id=$_SESSION["r_id"];
	$query="SELECT * from register where id='$r_id'";
	$pointer=mysqli_query($conn,$query);
	


?>
 <p style="float:right;margin-right:2%;"><strong><a href="logout.php">Logout</a></strong></p>
 <table class="table" style="margin-top:7%;">
  <thead>
    <tr>
      <th style="text-align:center;">S.No</th>
      <th style="text-align:center;">Full Name</th>
      <th style="text-align:center;">Email</th>
      <th style="text-align:center;">Contact</th>
	  <th style="text-align:center;">Age</th>
	  <th style="text-align:center;">Gender</th>
	  <th style="text-align:center;">Country</th>
	  <th style="text-align:center;">State</th>
	  <th style="text-align:center;">Address</th>
      
    </tr>
  </thead>
  <?php 
   while($row=mysqli_fetch_array($pointer))
   {
	   $id=$row["id"];
	   $name=$row["fullname"];
	   $email=$row["email"];
	   $contact=$row["contact"];
	   $age=$row["age"];
	   $gender=$row["gender"];
	   $country1=$row["country"];
	   $state1=$row["state"];
	   $address=$row["address"];
	   $query1="SELECT * from country_state where id='$state1'";
	   $pointer1=mysqli_query($conn,$query1);
	   $data=mysqli_fetch_array($pointer1);
	   $state=$data["state"];
	   $query2="SELECT * from country where id='$country1'";
	   $pointer2=mysqli_query($conn,$query2);
	   $data=mysqli_fetch_array($pointer2);
	   $country=$data["country"];
  ?>
  <tbody>
    <tr>
      <td style="text-align:center;"><?php echo $id;?></td>
      <td style="text-align:center;"><?php echo $name;?></td>
      <td style="text-align:center;"><?php echo $email;?></td>
      <td style="text-align:center;"><?php echo $contact;?></td>
      <td style="text-align:center;"><?php echo $age;?></td>
      <td style="text-align:center;"><?php echo $gender;?></td>
      <td style="text-align:center;"><?php echo $country;?></td>
      <td style="text-align:center;"><?php echo $state;?></td>
	   <td style="text-align:center;"><?php echo $address;?></td>
    </tr>
   
  </tbody>
   <?php }?>
</table>
</body>
</html>