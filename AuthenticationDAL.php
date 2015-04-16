<?php
	
	class check{
		
		private	$username, $password;
		private $ids;
		private $validUsername = 0, $validPassword = 0;
		private $IsValid = 0;
		
		public function __construct($username, $password){
			$this->username = $username;
			$this->password = $password;
		}
		
		public function checking(){
			if(mysqli_connect_errno()){
				echo "<br><br>Failure in opening the database";
			} else {
				$con = mysqli_connect("localhost", "root", "", "blog") or die("not connecting");
				$sql = "SELECT username FROM users";
				$sql2 = "SELECT id FROM users";
				$result = $con->query($sql);
				$result2 = $con->query($sql2);
				
				while($row = $result->fetch_assoc()){
					$row2 = $result2->fetch_assoc();
					
					if($this->username == $row["username"]){
						$ids = $row2["id"];
						$validUsername = 1;  
						break;
					}
				}
				
				if(@$validUsername == 0){
					//This will do nothing.....
				} else if($validUsername == 1){
					$sql = "SELECT password FROM users WHERE id ={$ids}";
					$result = $con->query($sql);
					$row = $result->fetch_assoc();
					
					if($this->password == $row["password"]){
						$validPassword = 1;  
					}
				}
				
				if(@$validUsername ==1 && @$validPassword ==1){
					return "Correct login Credentials..Username: {$this->username} and Password: {$this->password}";
					//this is where renz's code will determine if the user is admin or regular....
					
				} else {
					return "Incorrect login Credentials..Username: {$this->username} and Password: {$this->password}";
				}	
			}
			mysqli_close($con);
		}
	}
	
?>
