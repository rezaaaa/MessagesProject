<?php
	class UserAdd{
		private $username, $password, $type;
		
		public function __construct($USERNAME, $PASSWORD, $TYPE){
			$this->username = $USERNAME;
			$this->password = password_hash($PASSWORD, PASSWORD_DEFAULT);
			$this->type = $TYPE;
		}
		
		public function Signup(){
			$con = mysqli_connect("localhost", "root", "", "blog");
			
			if(mysqli_connect_errno()){
				die("Database connection failed!");
			}
			else{
				$check = mysqli_query($con, "SELECT * FROM users WHERE username = '{$this->username}'");
				$checkrows = mysqli_num_rows($check);
				if($checkrows>0){
					echo "<br>An error in inserting has occurred.";
				}
				else{
					mysqli_query($con, "INSERT INTO users (username, password, type) VALUES ('{$this->username}','{$this->password}','{$this->type}')");
					echo "<br>Account Added.";
				}
			}
			mysqli_close($con);
		}
	}
?>
