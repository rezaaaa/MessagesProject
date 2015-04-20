<title>Bloggerzz - Login</title>

<form method="post">
	Username: <input type="text" name="user" required><br><br>
	Password: <input type="password" name="pass" required><br><br>
	<input type="submit" name="login" value="Submit"><br><br>
	
	<?php
		require_once('DAL.php');
		
		if(isset($_POST['login'])){
			$check = new check($_POST['user'], $_POST['pass']);
			$type = $check->checking();
			$strArray = explode('/',$type);
			if($strArray[0] == null){
				$t = "null";
			} else {
				$t = $strArray[0];
			}
			if($strArray[1] == 0){
				$i = 0;
			} else {
				$i = $strArray[1];
			}

			if($t == "admin" || $t =="regular"){
				//This will make admin link to messages;
				session_start();
				$_SESSION['id'] = $i;
				$_SESSION['type'] = $t;
				header('Location: check.php');
				
			} else { 
				echo "<br>Incorrect login Credentials..";
			} 
		}	
		
	?>
</form>

