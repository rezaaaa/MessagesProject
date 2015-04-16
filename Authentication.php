<title>Bloggerzz - Login</title>

<form method="post">
	Username: <input type="text" name="user" required><br><br>
	Password: <input type="password" name="pass" required><br><br>
	<input type="submit" name="login" value="Submit"><br><br>
	
	<?php
		require_once('DAL.php');
		
		if(isset($_POST['login'])){
			$check = new check($_POST['user'], $_POST['pass']);
			echo $check->checking();
		} 
	?>
</form>
