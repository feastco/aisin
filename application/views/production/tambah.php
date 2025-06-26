<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('Production') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('Production') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
								<div class="card-body">
									<form action="<?= base_url('Production/proses_tambah') ?>" id="form-tambah" method="POST">
										<!-- <div class="form-group">
											<label for="no_fg"><strong>No FG</strong></label>
											<input type="text" name="no_fg" id="no_fg" placeholder="Masukkan No FG" autocomplete="off" class="form-control" required>
										</div> -->
										<div id="detail-production">
											<div class="form-group">
												<label for="no_fg"><strong>No FG</strong></label>
												<select name="no_fg" id="no_fg" class="form-control" required>
													<option value="" selected disabled>Pilih No FG</option>
													<?php foreach ($all_no_fg as $fg): ?>
														<option value="<?= $fg->no_fg ?>"><?= $fg->no_fg ?> - <?= $fg->nm_fg ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group">
												<label for="qty_production"><strong>Qty Production</strong></label>
												<input type="number" name="qty_production" id="qty_production" placeholder="Masukkan Qty Produksi" autocomplete="off" class="form-control" required>
											</div>
											<div class="form-group">
												<label for="date_production"><strong>Tanggal Produksi</strong></label>
												<input type="date" name="date_production" id="date_production" class="form-control datepicker" placeholder="Pilih Tanggal" required>
											</div>
											<hr>
										</div>
										<div class="form-group my-2">
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
	<script>
		// $(document).ready(function() {
		// 	$.ajax({
		// 		type: 'GET',
		// 		url: '<?= base_url('MasterPart/get_no_part') ?>',
		// 		dataType: 'json',
		// 		success: function(data) {
		// 			$.each(data, function(key, value) {
		// 				$('#no_part').append('<option value="' + value.no_part + '">' + value.no_part + ' - ' + value.nm_part + '</option>');
		// 			});
		// 		}
		// 	});
			// $('.datepicker').datepicker({
			// 	format: 'yyyy-mm-dd',
			// 	todayHighlight: true,
			// 	autoclose: true
			// });
		// });
	</script>
</body>

</html>