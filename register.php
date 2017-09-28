<?php
error_reporting(0);
include("connect.php");
include("header.php");
$query="select * from country";
$pointer=mysqli_query($conn,$query);
//dynamic dependent dropdown
$query1 = "SELECT id,country FROM country";
$result1 = mysqli_query($conn,$query1);

while($row1= mysqli_fetch_assoc($result1)){

$country[] = array("id" => $row1['id'], "val" => $row1['country']);
  }
$query1 = "SELECT id,country_id,state FROM country_state";
$result1 =  mysqli_query($conn,$query1);

while($row1 = mysqli_fetch_assoc($result1)){
$state[$row1['country_id']][] = array("id" => $row1['id'], "val" => $row1['state']);
  }

$jsonCountry = json_encode($country);
$jsonState = json_encode($state);

?>
<!--script for dynamic dependent dropdown-->
 <script src="jQuery-2.1.4.min.js"></script>
 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <script type='text/javascript'>
    <?php
        echo "var country = $jsonCountry; \n";
        echo "var state = $jsonState; \n";
    ?>
    function loadCountry(){
        var select = document.getElementById("country");
        select.onchange = updateState;
        for(var i = 0; i < country.length; i++){
          select.options[i] = new Option(country[i].val,country[i].id);          
        }
      }
    function updateState(){
        var cs = this;
       var state1 = this.value;
        var subcatSelect = document.getElementById("state");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < state[state1].length; i++){
         subcatSelect.options[i] = new Option(state[state1][i].val,state[state1][i].id);
        }
      }
    </script>
	<!--End dynamic dropdown script-->
	<!--Form Validation Script-->
	<script type="text/javascript">
	function myFunction()
	{
	    var x,text;
		x=document.getElementById("contact").value;
		var u=document.getElementById("fullname").value;
		var e=document.getElementById("email").value;
		var p=document.getElementById("pass").value;
		var a=document.getElementById("age").value;
		var ad=document.getElementById("address").value;
		//var c=document.getElementById("country").value;
		//var s=document.getElementById("state").value;
		if(isNaN(x) || x.length<10)
		{
			text="Enter Valid Contact Number";
		}
		if(!isNaN(u) || u=="")
		{
			text="Enter Username in characters";
		}
		var atpos=e.indexOf("@");

        var dotpos=e.lastIndexOf(".");

        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=e.length)

        {
            text="Enter Valid Email Address";
		}
		if(p.length<6)
		{
			text="Enter Password of length 6";
		}
		if(a=="")
		{
			text="Enter age in numbers";
		}
		
		if(ad=="")
		{
			text="Enter address";
		}
		
		
		document.getElementById("demo").innerHTML=text;
	}
</script>
<!--End form validation-->
 <form class="col-md-6 col-md-offset-3 " action="register1.php" method="post" style="margin-top:5%;">
          	<p style="color:red;"><?php 
			
			if($_GET['msg']==1)
			{
				echo"Value inserted successfully";
			}
				?></p>
            	<p style="color:red;" id="demo"></p>
            	<div class="form-group col-md-6"  >
            		<label>Full Name</label>
            		<input type="text" name="fullname" id="fullname" class="form-control">
            	</div>
            	<div class="form-group col-md-6">
            		<label>Email</label>
            		<input type="email" class="form-control" name="email" id="email">
            	</div>
            	<div class="form-group col-md-6"  >
            		<label>Password</label>
            		<input type="text" name="pass" id="pass" class="form-control">
            	</div>
            	<div class="form-group col-md-6">
            		<label>Contact</label>
            		<input type="number" class="form-control" name="contact" id="contact">
            	</div>
					<div class="form-group col-md-6"  >
            		<label>Age</label>
            		<input type="number" name="age" id="age" class="form-control">
            	</div>
				<div class="form-group col-md-6"  >
            		<label>Gender</label>
            		<select name="gender" class="form-control" id="gender" required>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					</select>
            	</div>
				<div class="form-group col-sm-6">
            		<label>Country</label>
            		<body onload='loadCountry()'  >
                    <select class="form-control" name="category"  id='country' onload='loadCountry()'>
                   <option value="" id="" selected disabled="">Please Select Country</option>
                      </select>
            	</div>
            	<div class="form-group col-sm-6">
            		<label>State</label>
            		 <select id='state' onload='loadCountry()'  class="form-control" name="subcat" style="" required>
            		
                    <option value="" id="0" selected disabled="">please select Category</option>
                     </select>
            	</div>
				<div class="form-group col-md-12"  >
            		<label>Address</label>
            		<textarea name="address" id="address" class="form-control"></textarea>
            	</div>
 
            	<div class="col-md-12 text-center form-group" style="margin-top:5px;">
            	        <label></label> 
            		<input type="submit" name="submit1"  value="submit" class="btn btn-success" onclick="myFunction()">
            	</div>
           
          </form>
