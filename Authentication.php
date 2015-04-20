<title>Bloggerzz - Login</title>

<form method="post">
	Username: <input type="text" name="user" required><br><br>
	Password: <input type="password" name="pass" required><br><br>
	<input type="submit" name="login" value="Submit"><br><br>

	<?php
		require_once('DAL.php');
		
		if(isset($_POST['login'])){
			$check = new UserDAL($_POST['user'], $_POST['pass']);
			$type = $check->AuthenticateUser();
			$strArray = explode('/',$type);
			if($strArray[3] == null){
				$t = "null";
			} else {
				$t = $strArray[3];
			}
			if($strArray[0] == 0){
				$i = 0;
			} else {
				$i = $strArray[0];
			}

			if($t == "admin" || $t == "regular"){
				//This will make admin link to messages;
				echo "<br>You are an admin";
				session_start();
				$_SESSION['id'] = $i;
				$_SESSION['type'] = $t;
				header('Location: check.php');
				echo "Id: {$i}<br>Type{$t}";
				
			} else { 
				echo "<br>Incorrect login Credentials..";
			} 
			echo $type;
		}	
	?>
</form>

