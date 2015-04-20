<?php include('DAL.php');?>
<?php
	if(isset($_POST['delete_id'])) {
		$delete_id = mysql_real_escape_string($_POST['delete_id']);
		$mess = new Message(null, null, null);
		$mess->deleteMessage($delete_id);
		header('Location: Message.php');
	}
?>
