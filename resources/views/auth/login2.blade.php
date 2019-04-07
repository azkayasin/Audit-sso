<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>myITS Client Sample App</title>
    <link rel="stylesheet" href="{{URL::asset('css/myits-button.css')}}">
</head>
<body>

	<h1>myITS SSO OpenID Connect Client Sample App</h1>
	<br>
	
	<?php 
		session_start();
   
		if (isset($_SESSION['userinfo'])) {
			
			$userinfo = $_SESSION['userinfo'];

			$picture = $userinfo->picture;
			?>
			<a href="{{ url('logout2/') }}">Logout</a>';
			<?php
			echo '<br>';
			echo '<img src="'. $picture .'" alt="user-picture" width="200" height="200">';
			echo '<br>';
			echo '<p>';
			var_dump($userinfo);
			echo '</p>';

		} else {
	?>
		<a href="{{ url('login2/') }}"><div class="myits-button">
	    <div class="myits-logo"></div>
	    <div class="myits-label">Masuk dengan myITS</div>
		</div></a>

		<br>
		<p> -- atau -- </p>
		<br>

		<div class="myits-button-dark" onclick="window.location='auth.php'">
			<div class="myits-logo"></div>
			<div class="myits-label">Masuk dengan myITS</div>
		</div>
	<?php
		}
	?>
	
</body>
</html>