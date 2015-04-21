<html>
	<title>Sign Up Here!</title>
	<head></head>
	<body>
		<p>Create Account as Admin or Regular user: <br></p>
		<form method="post">
			Username: <input type="text" name="username" size="15" required>
			Password: <input type="password" name="password" size="15" required><br>
			You want to be: Admin <input type="radio" name="type" value="admin" required>
			Regular <input type="radio" name="type" value="regular" required><br>
			<input type="submit" name="signup" value="Register Me!">
		
			<?php
				require_once('SignupDAL.php');
		
				if(isset($_POST['signup'])){
					$UserAdd = new UserAdd($_POST['username'], $_POST['password'], $_POST['type']);
					$UserAdd->Signup(); 
				}
			?>
		</form>
	</body>
</html>
