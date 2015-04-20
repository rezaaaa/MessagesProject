<?php

class Database{

	private $db_host = "localhost";
	private $db_user = "root"; 
	private $db_pass = "";
	private $db_name = "OOP";

	private $con = false;
	private $result = array();
    private $myQuery = "";
    private $numResults = "";
	
	public function connect(){
		if(!$this->con){
			$myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);  
			if($myconn){
				$seldb = @mysql_select_db($this->db_name,$myconn); 
				if($seldb){
					$this->con = true;
					return true;  
				}else{
					array_push($this->result,mysql_error()); 
					return false;  
				}  
			}else{
				array_push($this->result,mysql_error());
				return false; 
			}  
		}else{  
			return true; 
		}  	
	}
	
	public function sql($sql){
		$query = @mysql_query($sql);
		$this->myQuery = $sql;
		if($query){
			$this->numResults = mysql_num_rows($query);
			for($i = 0; $i < $this->numResults; $i++){
				$r = mysql_fetch_array($query);
				$key = array_keys($r);
				for($x = 0; $x < count($key); $x++){
					if(!is_int($key[$x])){
						if(mysql_num_rows($query) >= 1){
							$this->result[$i][$key[$x]] = $r[$key[$x]];
						}else{
							$this->result = null;
						}
					}
				}
			}
			return true; 
		}else{
			array_push($this->result,mysql_error());
			return false; 
		}
	}
	
	public function insert($table,$params=array()){
		$sql='INSERT INTO `'.$table.'` (`'.implode('`, `',array_keys($params)).'`) VALUES ("' . implode('", "', $params) . '")';
		$this->myQuery = $sql;
		if($ins = @mysql_query($sql)){
			array_push($this->result,mysql_insert_id());
			return true;
		}else{
			array_push($this->result,mysql_error());
			return false; 
		}
	}
	
	public function delete($table,$where = null){
    if($where == null){
			$delete = 'DELETE '.$table; 
		}else{
			$delete = 'DELETE FROM '.$table.' WHERE '.$where;
		}
    if($del = @mysql_query($delete)){
			array_push($this->result,mysql_affected_rows());
			$this->myQuery = $delete;
			return true;
		}else{
			array_push($this->result,mysql_error());
      return false; 
		}
	}
	
	public function update($table,$params=array(),$where){
    $args=array();
		foreach($params as $field=>$value){
			$args[]=$field.'="'.$value.'"';
		}
		$sql='UPDATE '.$table.' SET '.implode(',',$args).' WHERE '.$where;
		$this->myQuery = $sql; 
    if($query = @mysql_query($sql)){
      array_push($this->result,mysql_affected_rows());
      return true; 
    }else{
      array_push($this->result,mysql_error());
      return false; 
    }
  }

	public function getResult(){
		$val = $this->result;
		$this->result = array();
		return $val;
	}
}

class Message{
	private $Subject;
	private $Message;
	public $User_ID;
	
	public function __construct($subject, $message, $user_id){
		$this->Subject = $subject;
		$this->Message = $message;
		$this->User_ID = $user_id;
	}
	
	public function addMessage(){
		$db = new Database();
		$db->connect();	
		$db->insert('messages',array('subject'=>$this->Subject,'message'=>$this->Message, 'userID'=>$this->User_ID));
		}
		
		public function viewMessage(){
		$db = new Database();
		$db->connect();
		$db->sql('SELECT * FROM messages ORDER BY messageID DESC');
		$res = $db->getResult();
		return $res;
		}
		
		public function deleteMessage($delete_id){
		$db = new Database();
		$db->connect();
		$db->delete("messages","messageID={$delete_id}"); 
		}
		
		public function updateMessage($subject, $message, $id){
		$db = new Database();
		$db->connect();	
		$db->update('messages',array('subject'=>"$subject",'message'=>"$message"),'messageID='.$id.''); 	
		}
} 

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
			$Connection = mysqli_connect("localhost", "root", "", "OOP") or die("Not Connecting");
			$sql = "SELECT * FROM users WHERE username = '{$this->Username}' and password = '{$this->Password}' LIMIT 1"; 
			$result = $Connection->query($sql);
			$row = $result->fetch_assoc();
			
			if (!empty($row)){ 
				$User = new User($row['id'], $row['username'], $row['password'],$row['type']);
				$UserInfo =  $User->returnUser();
				return $UserInfo;
			} else {
				$User = new User(0, null, null, null);
				$UserInfo =  $User->returnUser();
				return $UserInfo;
			}
			mysqli_close($Connection);
		}
	}
