<?php
	class UserAdd{
		private $username, $password, $type;
		
		public function __construct($USERNAME, $PASSWORD, $TYPE){
			$this->username = $USERNAME;
			$this->password = $PASSWORD;
			$this->type = $TYPE;
		}
		
		public function Signup(){
			$con = mysqli_connect("localhost", "root", "", "blog");
			
			if(mysqli_connect_errno()){
				die("Database connection failed!");
			}
			else{
				if(!mysqli_query($con, "INSERT INTO users (username, password, type) VALUES ('{$this->username}','{$this->password}','{$this->type}')")){
					echo "<br>Account Existed.";
				}
				else{
					echo "<br>Account Added.";
				}
			}
			mysqli_close($con);
		}
	}
?>
