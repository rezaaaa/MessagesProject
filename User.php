<?php
	//include DAL.php;
	
	class users{
		public $userid;
		public $username;
		public $userpass;
		public $usertype;
		public $userage;
		
		public function users(){
			echo "Users constractor invoked!";
		}
		
		public function getID(){
			return $this->userid;
		}
		
		public function getUSERNAME(){
			return $this->username;
		}
		
		public function getPASS(){
			return $this->userpass;
		}
		
		public function getTYPE(){
			return $this->usertype;
		}
		
		
		public function setID($ID){
			$this->userid = $ID;
		}
		
		public function setUSERNAME($USERNAME){
			$this->username = $USERNAME;
		}
		
		public function setPASS($PASS){
			$this->userpass = $PASS;
		}
		
		public function setTYPE($TYPE){
			$this->usertype = $TYPE;
		}
		
		
		public function determineUSER($userid, $usertype){
			include 'DAL.php';
			$this->userid = $row["id"];
			$this->username = $row["username"];
			$this->userpass = $row["pass"];
			$this->usertype = $row["type"];
			
			if($this->username == 1 && $this->usertype == "admin"){
				//ADMIN
				echo "USER INFORMATION<br><br>
				$this->userid<br>
				$this->username<br>
				$this->usertype<br>";
				
				//include DAL.php;
				include Message.php;
			}
			else{
				//REGULAR
				echo "USER INFORMATION<br><br>
				$this->userid<br>
				$this->username<br>
				$this->usertype<br>";
					
				//include DAL.php;
				include Message.php;
			}
		}
		
		public function authenticate(){
			include 'Authentication.php';
			determineUSER($userid, $usertype);
		}
		
	}
?>
