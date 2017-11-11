<?php include 'templates/header_no_nav.php'; ?>

<div class="col-sm-12 col-md-6 offset-sm-0 offset-md-3">
	<div class="row no-gutters">
		<label for="email">Email:</label>
		<input type="text" class="form-control" id="email">
	</div>
	<div class="row no-gutters">
		<label for="password">Password:</label>
		<input type="password" class="form-control" id="password">
	</div>
	<div class="row no-gutters">
		<div class="col">
			<button id="login-button" type="button" class="btn btn-primary btn-block">Login</button>
		</div>
		<div class="col">
			<button id="register-button" type="button" class="btn btn-secondary btn-block">Register</button>
		</div>
	</div>
</div>

<?php include 'templates/footer.php'; ?>
