<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>PT AISIN Indonesia - Login</title>

	<!-- Stylesheets -->
	<link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<style>
		body {

			/* background-color: #007bff; */
			background-color: #0056b3;
			/* Blue background */
			color: #fff;
			font-family: 'Nunito', sans-serif;
		}

		.container {
			margin-top: 5%;
			max-width: 500px;
		}

		.card {
			border-radius: 10px;
			overflow: hidden;
			background-color: #f8f9fa;
			/* Light background for card */
		}

		.card-header {
			background-color: #f0f0f0;
			/* Blue header */
			color: #fff;
			text-align: center;
			padding: 20px;
		}

		.form-control {
			border-radius: 5px;
			border: 1px solid #ced4da;
		}

		.form-control-user {
			text-align: center;
		}

		.btn-primary {
			background-color: #30c752;
			/* Green button */
			border-color: #30c752;
			border-radius: 5px;
		}

		.btn-primary:hover {
			background-color: #218838;
			/* Darker green on hover */
			border-color: #1e7e34;
		}

		.alert {
			margin-bottom: 20px;
		}

		select.form-control-user {
			text-align-last: center;
			padding: 10px;
			height: auto;
			line-height: normal;
		}

		@media (max-width: 576px) {
			.container {
				padding: 15px;
			}

			.card {
				margin-top: 10%;
			}

			.form-control-user {
				font-size: 14px;
				padding: 8px;
			}
		}

		/* Logo styling */
		.logo {
			width: 200px;
			/* Set width of the logo */
			height: auto;
			/* Maintain aspect ratio */
		}
	</style>
</head>

<body>

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-12">

				<div class="card o-hidden border-0 shadow-lg">
					<div class="card-header">
						<img src="<?= base_url('assets/images/aisin_logo2.png') ?>" alt="PT AISIN Indonesia Logo" class="logo">

						<!-- Correct logo path -->
						<h1 class="h4 text-dark">Manajemen PT AISIN Indonesia</h1>
					</div>
					<div class="card-body">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-3">
									<div class="text-center">
										<?php if ($this->session->flashdata('success')) : ?>
											<div class="alert alert-success alert-dismissible fade show" role="alert">
												<?= $this->session->flashdata('success') ?>
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
										<?php elseif ($this->session->flashdata('error')) : ?>
											<div class="alert alert-danger alert-dismissible fade show" role="alert">
												<?= $this->session->flashdata('error') ?>
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
										<?php endif ?>
									</div>
									<form class="user" method="POST" action="<?= base_url('login/proses_login') ?>">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="username" placeholder="Masukkan Username" autocomplete="off" required name="username" style="font-size: 16px;">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" id="password" placeholder="Masukkan Password" required name="password" style="font-size: 16px;">
										</div>
										<div class="form-group">
											<select name="role" id="role" class="form-control form-control-user" required style="font-size: 16px;">
												<option value="">Masuk Sebagai</option>
												<option value="petugas">Petugas</option>
												<option value="admin">Admin</option>
											</select>
										</div>
										<button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Scripts -->
	<script src="<?= base_url('sb-admin') ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/js/sb-admin-2.min.js"></script>

</body>

</html>