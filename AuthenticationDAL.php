<?php
	
	class check{
		//These are all of the private variables that will be used by class check...
		private	$Username, $Password, $ids;
		private $validUsername = 0, $validPassword = 0;
		
		//This is the constructor with username and password values supplied by Authentication.php for checking...
		public function __construct($username, $password){
			$this->Username = $username;
			$this->Password = $password;
		}
		
		//This is where credintials and user type will be checked...
		public function checking(){
			//This is the database connection....
			$con = mysqli_connect("localhost", "root", "", "blog") or die("not connecting");
			if(mysqli_connect_errno()){
				echo "<br><br>Failure in opening the database";
			} else {
				$sql = "SELECT username FROM users";
				$sql2 = "SELECT id FROM users";
				$result = $con->query($sql);
				$result2 = $con->query($sql2);
				
				//These will check if the username exist...
				while($row = $result->fetch_assoc()){
					$row2 = $result2->fetch_assoc();
					
					if($this->Username == $row["username"]){
						//This will store the ID number that corresponds to the username if it exist...
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
					
					//This will check for password if its correct or not by comparing the inputed password
					//and the password in the database with the corresponding ID number...
					if($this->Password == $row["password"]){
						$validPassword = 1;  
					}
				}
				
				if(@$validUsername ==1 && @$validPassword ==1){
					//This will chose the user type depending on the user ID...
					$flag = 0;
					$sql = "SELECT type FROM users WHERE id={$ids}";
					$result = $con->query($sql);
					$row = $result->fetch_assoc();
					//This will assign the type of user located in the database to the variable $type...
					$type = $row["type"];
					$id = $ids;
					
					return "{$type}/{$id}";
				} else {
					//This code is executed if the credintials are wrong...
					//return $type = "wrong";
					$type = null;
					$id = 0;
					
					return "{$type}/{$id}";
				}	
			}
			mysqli_close($con);
		}
	}
	
?>
