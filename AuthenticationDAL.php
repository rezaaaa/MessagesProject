<?php
	class User{
		private $Id;
		private $Username;
		private $Password;
		private $Type;

		public function __construct($id, $username, $password, $type){
			$this->Id = $id;
			$this->Username = $username;
			$this->Password = $password;
			$this->Type = $type;
		}
		
		public function returnUser(){
			return "{$this->Id}/{$this->Username}/{$this->Password}/{$this->Type}";
		}
	}
	
	class UserDAL{
		private $Username;
		private $Password;
		
		public function __construct($username, $password){
			$this->Username = $username;
			$this->Password = $password;
		}
		
		public function AuthenticateUser(){
			$Connection = mysqli_connect("localhost", "root", "", "blog") or die("Not Connecting");
			$sql = "SELECT * FROM users WHERE username = '{$this->Username}' and password = '{$this->Password}' LIMIT 1"; 
			$result = $Connection->query($sql);
			$row = $result->fetch_assoc();
			
			if (!empty($row)){ 
				$User = new User($row['id'], $row['username'], $row['password'],$row['type']);
				$UserInfo =  $User->returnUser();
				return $UserInfo;
			} else {
				return null;
			}
			mysqli_close($Connection);
		}
		
		public function AddUser(){}
	}
?>
