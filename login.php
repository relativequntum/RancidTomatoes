<!-- 
This code will be to page that appears when the Login menu item is chosen  

This form will be absorbed by the controller  

Authors: Rick Mercer and Hassanain Jamal
-->
<h3>Login</h3>
<form action="controller.php" method="post">
	<div class="loginContainer">
		<div class="labels">Username&nbsp;</div>
		<div class="fields">
			<input type="text" value="" id="username" name="username" required>
		</div>

		<div class="labels">Password&nbsp;</div>
		<div class="fields">
			<input type="password" value="" id="password" name="password"
				required>
		</div>
		<div class="fields">
			<input type="submit" name="login" value="Login"> <br> <br>
			<?php
		      session_start ();
		      echo $_SESSION ['loginError'];
		?>
		</div>

	
	</div>
</form>