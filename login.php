<?php
	include("config.php");
	include("Account.php");
	include("Constants.php");

	$account = new Account($con);

	include("register-handler.php");
	include("login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>

<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="login.js"></script>
	<script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
	<script>
		Weglot.initialize({
			api_key: 'wg_4339f2fe0bc7f04e01e1341abf2d2d942'
		});
	</script>
</head>

<body>
	<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>

	<nav class="navbar navbar-expand-md navbar-light shadow-lg mt-3 p-3 rounded">
		<a class="navbar-brand" href="index.php">BUILDAPC</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="nav">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="buildapc.php">Build a PC</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="buyapc.php">Buy a Pre-built PC</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="submission.php">Submit a Part</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="orders.php">Your Orders</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row" style="margin-top: 50px;">
			<div class="col-sm-6">
				<div id="loginContainer">
					<div id="inputContainer">
						<form id="loginForm" action="login.php" method="POST">
							<h2>Login to your account</h2>
							<p>
								<?php echo $account->getError(Constants::$loginFailed); ?>
								<label for="loginUsername">Username</label>
								<input id="loginUsername" name="loginUsername" type="text" placeholder="Your username"
									value="<?php getInputValue('loginUsername') ?>" required>
							</p>
							<p>
								<label for="loginPassword">Password</label>
								<input id="loginPassword" name="loginPassword" type="password"
									placeholder="Your password" required>
							</p>

							<button type="submit" name="loginButton">LOG IN</button>

							<div class="hasAccountText">
								<span id="hideLogin">Don't have an account yet? Signup here.</span>
							</div>

						</form>



						<form id="registerForm" action="login.php" method="POST">
							<h2>Create an account</h2>
							<p>
								<?php echo $account->getError(Constants::$usernameCharacters); ?>
								<?php echo $account->getError(Constants::$usernameTaken); ?>
								<label for="username">Username</label>
								<input id="username" name="username" type="text" placeholder="username"
									value="<?php getInputValue('username') ?>" required>
							</p>

							<p>
								<?php echo $account->getError(Constants::$firstNameCharacters); ?>
								<label for="firstName">First name</label>
								<input id="firstName" name="firstName" type="text" placeholder="John"
									value="<?php getInputValue('firstName') ?>" required>
							</p>

							<p>
								<?php echo $account->getError(Constants::$lastNameCharacters); ?>
								<label for="lastName">Last name</label>
								<input id="lastName" name="lastName" type="text" placeholder="Doe"
									value="<?php getInputValue('lastName') ?>" required>
							</p>

							<p>
								<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
								<?php echo $account->getError(Constants::$emailInvalid); ?>
								<?php echo $account->getError(Constants::$emailTaken); ?>
								<label for="email">Email</label>
								<input id="email" name="email" type="email" placeholder="JohnDoe@gmail.com"
									value="<?php getInputValue('email') ?>" required>
							</p>

							<p>
								<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
								<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
								<?php echo $account->getError(Constants::$passwordCharacters); ?>
								<label for="password">Password</label>
								<input id="password" name="password" type="password" placeholder="Your password"
									required>
							</p>

							<button type="submit" name="registerButton">SIGN UP</button>

							<div class="hasAccountText">
								<span id="hideRegister">Already have an account? Log in here.</span>
							</div>

						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<img src="images/login.png" alt="login_image">
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>