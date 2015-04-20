<?php include('DAL.php');?>
<?php session_start(); ?>

<form action="Authentication.php" method="get">
	<input type="submit" value="LOGOUT">
</form>

<form action="Message.php" method="post">
	<b>Subject: <input type="text" name="subject" required><br><br>
	<b>Messages:<br><textarea cols="30" rows="5" name="message" required></textarea><br><br>
	<input type="submit" name="submit" value="SEND">
</form>

<br><br><br>

<?php

	$user_id = $_SESSION['id'];
	$user_type = $_SESSION['type'];

	if(isset($_POST['submit'])){	
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		
		$mess = new Message($subject, $message, $user_id);
		$mess->addMessage();
	}
	
	$mess = new Message(null, null, null);
	foreach($mess->viewMessage() as $output){
		echo "Subject: ".$output["subject"]."<br />";
		echo "&nbsp&nbsp&nbspMessage: ".$output["message"]; 
		
?> <br> <?php

if(($user_type == "regular" && $user_id == $output['userID'])  ||  ($user_type == "admin")){?>
	
<form action="update_confirm.php" method="post">
	<input type="hidden" name="update_id" value="<?php echo $output["messageID"]; ?>">
	<input type="hidden" name="update_sub" value="<?php echo $output["subject"]; ?>">
	<input type="hidden" name="update_mes" value="<?php echo $output["message"]; ?>">
	<input type="submit" value="EDIT">
</form>
			
<form action="delete_confirm.php" method="post">
	<input type="hidden" name="delete_id" value="<?php echo $output["messageID"]; ?>">
	<input type="submit" value="DELETE">
</form>
	
<?php }else{ ?>
<br>
<?php } } ?>
