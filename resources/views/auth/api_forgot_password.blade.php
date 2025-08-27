<html>
    <head></head>
	<body>
		<h3>Please click below link for reset password.<h3><br>
		<a href="{{ route('password.reset', ['token' => $token, 'email' => $email]) }}" target="_blank">Click here</a>
	</body>
</html>