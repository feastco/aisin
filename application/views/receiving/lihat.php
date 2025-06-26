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
			<div id="content" data-url="<?= base_url('Receiving') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
						</div>
						<div class="float-right">
							<?php
							$role = $this->session->login['role'];
							$tindakan = [
								'admin' => ['export', 'tambah'],
								'petugas' => ['tambah']
							];
							?>
							<?php foreach ($tindakan[$role] as $tindak): ?>
								<?php if ($tindak == 'export'): ?>
									<a href="<?= base_url('Receiving/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
								<?php elseif ($tindak == 'tambah'): ?>
									<a href="<?= base_url('Receiving/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
								<?php endif ?>
							<?php endforeach ?>
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
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif ?>
					<div class="card shadow">
						<div class="card-header"><strong>Daftar Receiving</strong></div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>No PKB</th>
											<th>Tanggal Penerimaan</th>
											<?php if ($this->session->login['role'] == 'admin'): ?>
												<th>Aksi</th>
											<?php endif ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($all_receiving as $a => $receiving): ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $receiving->no_pkb ?></td>
												<td><?= $receiving->received_at ?></td>
												<?php if ($this->session->login['role'] == 'admin'): ?>
													<td>
														<a href="<?= base_url('Receiving/ubah/' . $receiving->id) ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
														<a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('Receiving/hapus/' . $receiving->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
													</td>
												<?php endif ?>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
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