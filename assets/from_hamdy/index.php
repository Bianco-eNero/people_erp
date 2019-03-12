<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>ODOO</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<link rel="stylesheet" href="css/arabic.css" type="text/css" />
		<script type="text/javascript" src="code.js"></script>
	</head>
	<body>
		<section class="login-box">
			<header>
				<figure>
					<img src="img/company_logo.png" />
				</figure>
			</header>
			<main class="main">
				<form method="post" action="menu">
					<fieldset class="email">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" placeholder="Email" />
					</fieldset>
					<fieldset class="password">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" placeholder="Password" />
					</fieldset>
					<fieldset class="login">
						<input type="submit" name="login" value="Log in" />
						<p class="question">Don't have an account?</p>
					</fieldset>
				</form>
			</main>
			<footer class="footer">
				<h3>Powered by Odoo</h3>
			</footer>
		</section>
	</body>
</html>
