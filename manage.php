<?php
error_reporting(0);
include("connect.php");
include("header.php");
//insering values to country state table
$query="select * from country";
$pointer=mysqli_query($conn,$query);
if(isset($_POST["submit"]))
{
$country=$_POST["country"];
$state=$_POST["state"];
$query="select * from country where country='$country'";
$data=mysqli_query($conn,$query);
$fetch=mysqli_fetch_assoc($data);
$id=$fetch["id"];
$cat=$fetch["country"];
$query1="INSERT INTO country_state values('','$id','$state','$cat')";
$data1=mysqli_query($conn,$query1);
if($data1)
{
$msg="Value Inserted!!";
}
}

?>
 <form class="col-md-6 col-md-offset-3 " action="manage.php" method="post">
    <p style="color:red;"><?php echo $msg;?></p>
            	
        <div class="form-group col-sm-12" >
            <label>Country</label>
            <select class="form-control" name="country">
            <option disabled="" selected="">Select Country</option>
						<?php 
						while($row=mysqli_fetch_assoc($pointer)){
							$country=$row["country"];
							?>
            			<option value="<?php echo $country;?>"><?php echo $country; ?></option>
						<?php }?>
            </select>
        </div>
        <div class="form-group col-sm-12">
            <label>State</label>
            <input type="text" class="form-control" name="state">
        </div>
            	
        <div class="col-md-12 text-center form-group" style="margin-top:5px;">
            
             <input type="submit"name="submit"  value="submit" class="btn btn-success">
        </div>
           
 </form>