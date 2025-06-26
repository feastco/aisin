<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('kasir') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
						</div>
					</div>
					<hr>
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
								<s$data aria-hidden="true">&times;</s$data['jumlah']=$this->M_master_part->jumlah();
									pan>
							</button>
						</div>
					<?php endif ?>

					<div class="row">

						<!-- Earnings (Monthly) Card Example -->
						<?php if ($this->session->login['role'] == 'admin') { ?>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Master Part</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $master_part ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-volleyball-ball"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Earnings (Monthly) Card Example -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Master Finish Good</div>
												<div class="row no-gutters align-items-center">
													<div class="col-auto">
														<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $master_fg ?></div>
													</div>
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-volleyball-ball"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Earnings (Monthly) Card Example -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-danger shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Receiving</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $receiving_detail ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-volleyball-ball"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Earnings (Monthly) Card Example -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Production</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $production_detail ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-volleyball-ball"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-danger shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Receiving</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $receiving_detail ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-volleyball-ball"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>

						<div class="row mt-4">
							<div class="col-md-6">
								<div class="card shadow">
									<div class="card-header"><strong>Profil Perusahaan</strong></div>
									<div class="card-body">
										<strong>Nama Perusahaan : </strong><br>
										<input type="text" value="PT.Aisin Indonesia" readonly class="form-control mt-2 mb-2">
										<strong>Nama Pemilik : </strong><br>
										<input type="text" value="Mr. PB Ariawan Purwonugroho
									" readonly class="form-control mt-2 mb-2">
										<strong>Alamat : </strong><br>
										<input type="text" value="Jl. Harapan VIII Lot LL No. 9-10, Kawasan Industri KIIC, Karawang,
									41361 Jawa Barat, Indonesia
									" readonly class="form-control mt-2 mb-2">
										<strong>Kontak : </strong><br>
										<input type="text" value="Tel. +62 267 864 3131
									" readonly class="form-control mt-2">
									</div>
								</div>
							</div>
							<div class="col-md-6 ">
								<div class="card shadow">
									<div class="card-header"><strong>User Sedang Login</strong></div>
									<div class="card-body">
										<strong>Nama : </strong><br>
										<input type="text" value="<?= $this->session->login['nama'] ?>" readonly class="form-control mt-2 mb-2">
										<strong>Username : </strong><br>
										<input type="text" value="<?= $this->session->login['username'] ?>" readonly class="form-control mt-2 mb-2">
										<strong>Role : </strong><br>
										<input type="text" value="<?= $this->session->login['role'] ?>" readonly class="form-control mt-2 mb-2">
										<strong>Jam Login : </strong><br>
										<input type="text" value="<?= $this->session->login['jam_masuk'] ?>" readonly class="form-control mt-2">
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<!-- load footer -->
				<?php $this->load->view('partials/footer.php') ?>
			</div>
		</div>
		<?php $this->load->view('partials/js.php') ?>
		<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
		<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
		<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>