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
									<form action="<?= base_url('Receiving/proses_tambah') ?>" id="form-tambah" method="POST">
										<div class="form-group">
											<label for="no_pkb"><strong>No PKB</strong></label>
											<input type="text" name="no_pkb" id="no_pkb" placeholder="Masukkan No PKB" autocomplete="off" class="form-control" required>
										</div>
										<div class="form-group">
											<label for="received_at"><strong>Tanggal Penerimaan</strong></label>
											<input type="text" name="received_at" id="received_at" class="form-control datepicker" data-date-format="yyyy-mm-dd" data-date-today-highlight="true" required>
										</div>
										<hr>
										<div id="detail-receiving">
											<div class="form-group">
												<label for="no_part"><strong>No Part</strong></label>
												<select name="no_part[]" id="no_part" class="form-control">
													<?php foreach ($all_part as $part) { ?>
														<option value="<?= $part->no_part ?>"><?= $part->no_part ?> - <?= $part->nm_part ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="form-group">
												<label for="qty_received"><strong>Qty Received</strong></label>
												<input type="number" name="qty_received[]" id="qty_received" placeholder="Masukkan Qty Received" autocomplete="off" class="form-control">
											</div>
										</div>
										<!-- Tambahkan tombol tambah baris -->
										<button class="btn btn-primary my-2" id="tambah-baris" type="button">Tambah Baris</button>
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
		$(document).ready(function() {
			$.ajax({
				type: 'GET',
				url: '<?= base_url('MasterPart/get_no_part') ?>',
				dataType: 'json',
				success: function(data) {
					$.each(data, function(key, value) {
						$('#no_part').append('<option value="' + value.no_part + '">' + value.no_part + ' - ' + value.nm_part + '</option>');
					});
				}
			});
			$('.datepicker').datepicker({
				format: 'yyyy-mm-dd',
				todayHighlight: true,
				autoclose: true
			});
			// Tambahkanfungsi untuk menambah baris
			$('#tambah-baris').click(function() {
				var selectHtml = '';
				var no_part = $('#no_part').html();
				var id = 'no_part_' + ($('#detail-receiving .form-group').length + 1);
				var html = '' +
					'<div class="form-group">' +
					'    <label for="no_part"><strong>No Part</strong></label>' +
					'    <select name="no_part[]" id="' + id + '" class="form-control">' +
					no_part +
					'    </select>' +
					'</div>' +
					'<div class="form-group">' +
					'    <label for="qty_received"><strong>Qty Received</strong></label>' +
					'    <input type="number" name="qty_received[]" id="qty_received" placeholder="Masukkan Qty Received" autocomplete="off" class="form-control">' +
					'</div>';

				$('#detail-receiving').append(html);
			});

			// Tambahkan funsi untuk reset form
			$("button[type='reset']").click(function() {
				$('#detail-receiving').html(
					'<div class="form-group">' +
					'    <label for="no_part"><strong>No Part</strong></label>' +
					'    <select name="no_part[]" id="no_part" class="form-control">' +
					$('#no_part').html() +
					'    </select>' +
					'</div>' +
					'<div class="form-group">' +
					'    <label for="qty_received"><strong>Qty Received</strong></label>' +
					'    <input type="number" name="qty_received[]" id="qty_received" placeholder="Masukkan Qty Received" autocomplete="off" class="form-control">' +
					'</div>'
				);
			});
		});
	</script>

</body>

</html>