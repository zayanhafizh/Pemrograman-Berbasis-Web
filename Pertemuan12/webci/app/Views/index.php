<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

	<link rel="icon" href="<?= base_url('img/logo.png') ?>" type="image/png">

	<!-- Bootstrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="bg-gray">
	<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
		<div>
			<div class="text-center mb-3">
				<img src="<?= base_url('img/logo.png') ?>" alt="Logo STIS" width="75">
			</div>
			<h3 class="text-center mb-3">Please sign in</h3>
			<?php if (session()->getFlashdata('msg')) : ?>
				<div class="alert alert-danger" role="alert">
					<?= session()->getFlashdata('msg') ?>
				</div>
			<?php endif; ?>
			<form action="/Home/signinAuth" method="POST" style="width: 300px;">
				<input type="text" name="username" class="form-control p-2" id="username" placeholder="Username" required>
				<input type="password" name="password" class="form-control p-2" id="password" placeholder="Password" required>
				<div class="form-check my-3">
					<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
					<label class="form-check-label" for="flexCheckDefault">
						Remember me
					</label>
				</div>
				<button class="p-2 btn btn-primary w-100">Sign in</button>
				<div class="mt-5 text-center">&copy; 2024 Politeknik Statistika STIS</div>
			</form>
		</div>
	</div>
</body>

</html>