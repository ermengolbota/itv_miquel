<?php
	if ($_POST) {
?>
		<form method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type='text' name='pass' required />
			<input type='submit' value='Envia' />
		</form>
<?php
	} else {
		// Password to be encrypted for a .htpasswd file
		$pass = $_POST['pass'];

		// Encrypt password
		$password = crypt($pass, base64_encode($pass));

	// Print encrypted password
	//echo $password;

		$file = fopen(".htpasswd", "w");
		$txt = "admin:$password";
		fwrite($file, "$text");
		fclose("$file");
	}
?>