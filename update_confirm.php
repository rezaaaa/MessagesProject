<?php include('DAL.php');?>
<?php	
	if(isset($_POST['update_id'])) {
		$update_id = $_POST['update_id'];
		$update_sub = $_POST['update_sub'];
		$update_mes = $_POST['update_mes'];
?>
<form action="update_confirm.php" method="post">
	<b>Edit Subject: <input type="text" name="edit_subject" value="<?php echo $update_sub; ?>" required><br><br>
	<b>Edit Messages:<br><textarea cols="50" rows="5" name="edit_message" required><?php echo $update_mes; ?></textarea><br><br>
	<input type="hidden" name="edit_id" value="<?php echo $update_id; ?>">
	<input type="submit" name="edit_submit" value="EDIT">
</form>

<form action="Message.php" method="get">
	<input type="submit" value="BACK">
</form>

<?php
	}
	if(isset($_POST['edit_submit'])){	
		$id = $_POST['edit_id'];
		$subject = $_POST['edit_subject'];
		$message = $_POST['edit_message'];
		$mess = new Message(null, null, null);
		$mess->updateMessage($subject, $message, $id);
		header('Location: Message.php');
	}
?>
