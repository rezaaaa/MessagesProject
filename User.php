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
		
		include Authentication.php;
		public function viewUSER(){
			/*$this->userid = $_POST["id"];
			$this->userpass = $_POST["pass"];
			$this->userfname = $_POST["fname"];
			$this->userlname = $_POST["lname"];*/
			$this->userid = .$row["id"].;
			$this->userpass = .$row["pass"].;
			$this->userfname = .$row["fname"].;
			$this->userlname = .$row["lname"].;
					
			echo "USER INFORMATION<br><br>
			$this->userid<br>
			$this->userfname $this->userlname<br>";
			include Message.php;
			break;
		}
		
	}
?>
