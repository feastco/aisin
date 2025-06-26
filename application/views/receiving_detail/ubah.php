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
							<a href="<?= base_url('Receiving') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
								<div class="card-body">
									<form action="<?= base_url('Receiving/proses_ubah/' . $all_receiving->id) ?>" id="form-ubah" method="POST">
										<div class="form-group">
											<label for="no_pkb"><strong>No PKB</strong></label>
											<input type="text" name="no_pkb" id="no_pkb" placeholder="Masukkan No PKB" autocomplete="off" class="form-control" required value="<?= $all_receiving->no_pkb ?>">
										</div>
										<div class="form-group">
											<label for="received_at"><strong>Tanggal Penerimaan</strong></label>
											<input type="text" name="received_at" id="received_at" class="form-control datepicker" required value="<?= $all_receiving->received_at ?>">
										</div>
										<hr>
										<div class="form-group">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
											<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
										</div>
									</form>
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
	<script>
		$(document).ready(function() {
			$('#received_at').datepicker({
				format: 'yyyy-mm-dd',
				todayHighlight: true,
				autoclose: true
			});
		});
	</script>
</body>

</html>