<?php include 'functions.php';?>

<form action="index.php" method="post">
<input type="text" name="subject" required><br>
<textarea name="message" required></textarea>
<input type="submit" name="submit"></form>

<?php
		
		if(isset($_POST['submit'])){	
			$subject = $_POST['subject'];
			$message = $_POST['message'];
			
			addMessage($subject, $message);
			viewAll();
		}
		
?>
