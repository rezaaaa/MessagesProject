<?php
	//include DAL.php;
	
	class users{
		public $userid;
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
		
		
		public function determineUSER($usertype){
			switch($usertype = $_POST["type"]){
				case "REGULAR":
					$this->userid = $_POST["id"];
					$this->userpass = $_POST["pass"];
					$this->userfname = $_POST["fname"];
					$this->userlname = $_POST["lname"];
					
					include Authentication.php;
					include DAL.php;
					break;
				case "ADMIN":
					$this->userid = $_POST["id"];
					$this->userpass = $_POST["pass"];
					$this->userfname = $_POST["fname"];
					$this->userlname = $_POST["lname"];
					
					include Aunthentication.php;
					include DAL.php;
					break;
				default:
					echo "Invalid user.";
			}
		}
		
	}
?>
