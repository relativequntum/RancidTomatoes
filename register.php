<!-- 
original author: Rick Mercer and Hassanain Jamal
modified: Jingyu Shi
-->
<link href="mymovie.css" type="text/css" rel="stylesheet" />
<link href="movie.css" type="text/css" rel="stylesheet" />
<h3>Register</h3>
<form action="controller.php" method="post">
	<div class="loginContainer">

		<div class="labels">Username&nbsp;</div>
		<div class="fields">
			<input type="text" id="username" name="username" required>
		</div>

		<div class="labels">Password&nbsp;</div>
		<div class="fields">
			<input type="password" id="password" name="password" required>
		</div>
		<?php 
		if (isset ( $_GET ['mode'] )) {
			if ($_GET ['mode'] === 'invalid')
				echo "<br>username already exist!";
		}
		?>
		<div class="fields">
			<input type="submit" name="register" value="Register">
		</div>
	</div>
</form>
