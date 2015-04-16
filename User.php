<?php
	//include DAL.php;
	
	class users{
		public $userid;
		public $username;
		public $userpass;
		public $usertype;
		public $userfname;
		public $userlname;
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
		
		public function getFNAME(){
			return $this->userfname;
		}
		
		public function getLNAME(){
			return $this->userlname;
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
		
		public function setFNAME($FNAME){
			$this->userfname = $FNAME;
		}
		
		public function setLNAME($LNAME){
			$this->userlname = $LNAME;
		}
		
		//include 'Authentication.php';
		public function determineUSER($userid, $usertype){
			$this->userid = .$row["id"].;
			$this->username = .$row["username"].;
			$this->userpass = .$row["pass"].;
			$this->userfname = .$row["fname"].;
			$this->userlname = .$row["lname"].;
			$this->usertype = .$row["type"].;
			
			if($this->username == 1 && $this->usertype == "admin"){
				echo "USER INFORMATION<br><br>
				$this->userid<br>
				$this->username<br>
				$this->userfname $this->userlname<br>
				$this->usertype<br>";
					
				include DAL.php;
				include Message.php;
			}
			else{
				$this->userid = .$row["id"].;
				$this->username = .$row["username"].;
				$this->userpass = .$row["pass"].;
				$this->userfname = .$row["fname"].;
				$this->userlname = .$row["lname"].;
				$this->usertype = .$row["type"].;
							
				echo "USER INFORMATION<br><br>
				$this->userid<br>
				$this->username<br>
				$this->userfname $this->userlname<br>
				$this->usertype<br>";
					
				include DAL.php;
				include Message.php;
			}
		}
		
	}
?>
