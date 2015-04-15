<?php include 'functions.php';?>

<br><br>
<form action="index.php" method="post">
<b>Subject: <input type="text" name="subject"><br><br>
<b>Messages:<br><textarea cols="50" rows="4" name="comment"></textarea><br><br>
<input type="submit" name="submit"></form>

<?php
if(isset($_POST['submit']))
{	
	$subject = $_POST['subject'];
	$message = $_POST['comment'];
	addMessage($subject, $message);
	viewAll();
}
?>
