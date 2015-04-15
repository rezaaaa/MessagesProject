<?php
	
	mysql_connect('localhost', 'root', '');
	mysql_select_db('blog');
	
		function addMessage($subject, $message){
			mysql_query("INSERT INTO messageTable VALUES('', '".$subject."', '".$message."')");
		}
		
		function viewAll(){
			$query = mysql_query("SELECT * FROM messageTable");
			while($post = mysql_fetch_array($query)){
				echo "Subject: ".$post[1]."<br>";
				echo "Message: ".$post[2]."<br><br>";
			}	
		}
	
?>
