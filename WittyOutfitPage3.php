
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class = "container-fluid">
	<div class = "row">
		<div class = "col-sm-12">
			<div class = "jumbotron text-center">
				<h2>WittyOutfit</h2>
			</div>
		</div>
	</div>
	<div class = "row">
		<div class = "col-sm-3">
		</div>
		<div class = "col-sm-6">
			<?php
			
				$name = "";
				$email = "";
				$address = "";
				$mobile = "";
				$password = "";
				$cpassword = "";
				
				$conn = mysqli_connect("localhost","root","","WittyOutfit");
				// for displaying the details
				if($conn->connect_error){
					die("Conncetion Failed: ".$conn->connc=ect_error);
				}
				
				$sql = "select * from Register where Name = '$name'";
				$res = $conn->query($sql);
				
				if($res->num_rows > 0)
				{
					while($row = $res->fetch_assoc()){
						echo "Name:".$row['Name']."<br>"."Mobile:".$row['Mobile']."<br>"."Email:".$row['Email']."<br>"."Address:".$row['Address']."<br>";
				
				}
			}
				else
				{
					echo "No Data";
				}
				
				// for updating the data
				if($conn->connect_error){
					die("Conncetion Failed: ".$conn->conncect_error);
				}
				
				$sql = "update Register set Name = '$name',Mobile = '$mobile' , Email = '$email' ,Address = '$address',Password = '$password', ConfirmPassword = '$cpassword' where email = '$email'";
				if(mysqli_query($conn,$sql))
				{
					echo "Record Updated";
				}
				else
				{
					echo "Error updating record :" . mysql_error($conn);
				}
				mysqli_close($conn);

			?>
		</div>
		<div class = "col-sm-3">
		</div>
	</div>
</div>
