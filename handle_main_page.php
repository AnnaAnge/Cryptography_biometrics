<html>
	<bodystyle="background-color:lightyellow">

	<h1 style="color:red"> Cryptography's page </h1>
		<?php
			if (isset($_REQUEST['register'])) {
				echo' 
				<h1> Register </h1>
				<form action="after_register.php" method="post">
				Name:<br>
  				<input type="text" name="name">
  				<br>
  				Surname:<br>
  				<input type="text" name="surname">
  				<br>
  				Email:<br>
  				<input type="text" name="email">
  				<br>
  				Username:<br>
  				<input type="text" name="username">
  				<br>
				Password:<br>
				<input type="text" name="password">
				<br>
				Confirm Password:<br>
				<input type="text" name="confirm_password">
				<br>
				Biometric scanned? :<br>
				<input type="radio" name="biometric" value="yes"> YES
				<input type="radio" name="biometric" value="no" checked> NO
				<br>
				<p>
				  	
				</p>
				<p> <input type="submit" name="register" value="submit" /> </p>

				</form>';

			} else if (isset($_REQUEST["log_in"])) {
				echo' 
				<h1> Log in </h1>
				<form action="after_log_in.php" method="post">
  				Username:<br>
  				<input type="text" name="username">
  				<br>
				Password:<br>
				<input type="text" name="password">
				<br>
				Biometric:<br>
				<input type="text" name="biometric">
				<br>
				<p>
				  	
				</p>
				<p> <input type="submit" name="log_in" value="submit" /> </p>

				</form>';
			}
 

		?>

	</body>



</html>