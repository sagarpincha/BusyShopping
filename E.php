<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class = "container-fluid">
	<div class = "row">
		<div class = "col-md-12">
			<div class = "jumbotron text-center">
				<h2>WittyOutfit</h2>
			</div> 
		</div>
	</div>
	<div class = "row">
		<div class = "col-sm-3">
		</div>
		<div class = "col-sm-6">
			<div class = "modal-fade">
				<div class = "modal-dialog">
					<div class = "modal-content">
						<div class = "modal-header">
							<div class = "modal-title">
							</div>
							<div class = "modal-body">
								<form action = "E.php" method = "POST"> 
									<div class = "form-group">
										<label for="name">Name:</label>
										<input type = "text" class = "form-control" name = "name">
									</div>
									<div class = "form-group">
										<label for="mob">Mobile:</label>
										<input type = "text" class = "form-control" name = "mob">
									</div>
									<div class = "form-group">
										<label for="email">Email:</label>
										<input type = "text" class = "form-control" name = "email">
									</div>
									<div class = "form-group">
										<label for = "address">Address:</label>
										<input type = "address" class = "form-control" name = "address">
									</div>
									<div class = "form-group">
										<label for = "password">Password:</label>
										<input type = "password" class = "form-control" name = "password">
									</div>
									<div class = "form-group">
										<label for = "password">Confirm Password:</label>
										<input type = "password" class = "form-control" name= "cpassword">
									</div>
									<div>
										<input type = "submit"  value = "Sign-up" name = "sub">
											
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class = "col-sm-3">
		</div>
	</div>
</div>


<?php
	$conn = mysqli_connect('localhost', 'root', '', 'WittyOutfit');
		
		if(isset($_POST['sub']))
		{
			$name = $_POST['name'];
			$address = $_POST['address'];
			$email  = $_POST['email'];
			$mobile = $_POST['mobile'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			$query = "insert into Register (Name,Mobile,Email,Address,Password,ConfirmPassword) VALUES('$name','$mobile','$email','$address','$password','$cpassword')";
			mysqli_query($conn, $query);
			header('location: http://localhost/sandbox/WittyOutfitPage1.php');
			
		}

?>
