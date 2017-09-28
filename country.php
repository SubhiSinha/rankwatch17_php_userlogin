 <?php 
error_reporting(0);
include("connect.php");
include("header.php");
//Inserting country name to country table
if(isset($_POST["submit"]))
{
$country=$_POST["country"];
$sql="select * from country where country='$country'";
$pointer=mysqli_query($conn,$sql);
if(mysqli_num_rows($pointer)!==1)
{
$query="INSERT INTO country(id,country)VALUES('','$country')";
$data=mysqli_query($conn,$query);
if($data)
{
$msg="* value inserted successfully";
}
}
else
{
	$msg="* country already exist";
}
}
 ?>
<form action="country.php" class="form-horizontal col-md-10 col-md-offset-1" role="form"  method="post" style=" margin-top:5%;">
           
    <p style="color:red;"><?php echo $msg;?></p>
    <div class="form-group col-md-6 col-md-offset-6">
    <label>Country Name</label>
    <input type="text" class="form-control" name="country" id="country" placeholder="" required/>
    </div>
     
            
<div class="form-group col-md-4">
<input type="submit" name="submit" class="btn btn-success" value="Submit" style="margin-top:7%;">
</div>
</form>