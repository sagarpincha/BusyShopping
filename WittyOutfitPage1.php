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
			<div class = "modal-fade">
				<div class = "modal-dialog">
					<div class = "modal-content">
						<div class = "modal-header">
							<div class = "modal-title">
							</div>
							<div class = "modal-body">
								<form action = "WittyOutfitPage1.php" method = "POST">
									<?php
										if(session_status()==PHP_SESSION_NONE)
											session_start();
									?>
									<div class = "form-group">
										<label for = "email">Email:</label>
										<input type = "email" class = "form-control" name= "email">
									</div>
									<div class = "form-group">
										<label for = "password">Password:</label>
										<input type = "password" class = "form-control" name = "password">
									</div>
									<div class = "form-group">
										<input type = "submit" class = "btn btn-primary" value = "Log-In" name = "submit">
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

	$conn = mysqli_connect("localhost","root","","WittyOutfit");
	$email = "";
	$password = "";
	$_SESSION['success'] = "";
	$errors = array();
	if(isset($_POST['submit']))
	{	
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		
		if (empty($email)) { array_push($errors, "email is required"); }
		if (empty($password)) { array_push($errors, "password is required"); }
		header('location: http://localhost/sandbox/WittyOutfitPage3.php');
		
	}
	
	if (count($errors) == 0) {
			$password = ($password);
			$query = "SELECT Password FROM Register WHERE Email='$email'";
			$results = mysqli_query($conn, $query);
			$count=0;
			if (mysqli_num_rows($results) >0) {
				while($row = mysqli_fetch_assoc($results)){
					if($row['Password']==$password)
					{
						$count++;
						break;
					}
				}
				if($count==1)
				{
					session_destroy();
					session_start();
					$_SESSION['email'] = $email;
					$_SESSION['success'] = "You are now logged in";
					echo 'session status: '.session_status();
					//header('location: http://localhost/sandbox/WittyOutfitPage1.php');
				}
				else
				{
					array_push($errors,"Invalid password");
					foreach($errors as $e)
					echo $e;
				}	
			}
			else 
			{
				array_push($errors, "Wrong username");
			}
		}
?>
