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
									<form action="<?= base_url('Receiving/proses_ubah/' . $all_receiving->id) ?>" method="POST" id="form-ubah">
										<div class="form-group">
											<label for="no_pkb"><strong>No PKB</strong></label>
											<input type="text" name="no_pkb" id="no_pkb" class="form-control" required value="<?= $all_receiving->no_pkb ?>">
										</div>
										<div class="form-group">
											<label for="received_at"><strong>Tanggal Penerimaan</strong></label>
											<input type="text" name="received_at" id="received_at" class="form-control datepicker" data-date-format="yyyy-mm-dd" data-date-today-highlight="true" required value="<?= $all_receiving->received_at ?>">
										</div>
										<hr>
										<?php foreach ($all_receiving->detail as $detail) { ?>
											<div class="form-group">
												<label for="no_part"><strong>No Part</strong></label>
												<select name="no_part[]" id="no_part-<?php echo $detail->id; ?>" class="form-control">
													<option value="">-- Pilih No Part --</option>
												</select>
											</div>
											<div class="form-group">
												<label for="qty_received"><strong>Qty Received</strong></label>
												<input type="number" name="qty_received[]" id="qty_received-<?php echo $detail->id; ?>" placeholder="Masukkan Qty Received" autocomplete="off" class="form-control" value="<?= $detail->qty_received ?>">
											</div>
										<?php } ?>
										<!-- Tambahkan tombol tambah baris
										<div class="col-md-6">
											<div class="card shadow">
												<div class="card-body">
													<button class="btn btn-primary" id="tambah-baris">Tambah Baris</button>
												</div>
											</div>
										</div> -->
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
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
	<script>
		$(document).ready(function() {
			// Kirim request AJAX untuk mengambil data no_part
			<?php foreach ($all_receiving->detail as $detail) { ?>
				$.ajax({
					type: 'GET',
					url: '<?= base_url('MasterPart/get_no_part') ?>',
					dataType: 'json',
					success: function(data) {
						// Looping data yang di-return
						$.each(data, function(key, value) {
							// Tambahkan opsi ke select box
							$('#no_part-<?php echo $detail->id; ?>').append('<option value="' + value.no_part + '">' + value.no_part + ' - ' + value.nm_part + '</option>');
							// Jika nilai no part sudah ada, maka pilih opsi tersebut
							if (value.no_part == '<?php echo $detail->no_part; ?>') {
								$('#no_part-<?php echo $detail->id; ?>').val(value.no_part);
							}
						});
					}
				});
			<?php } ?>



			// Tambahkanfungsi untuk menambah baris
			$('#tambah-baris').click(function() {
				$('#form-ubah').append(`
                <div class="form-group">
                    <label for="no_part"><strong>No Part</strong></label>
                    <select name="no_part[]" id="no_part" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="qty_received"><strong>Qty Received</strong></label>
                    <input type="number" name="qty_received[]" id="qty_received" placeholder="Masukkan Qty Received" autocomplete="off" class="form-control">
                </div>
            `);
				// Inisialisasi select box
				var selectNoPart = $('select[name="no_part[]"]:last');

				// Kirim request AJAX untuk mengambil data no_part
				$.ajax({
					type: 'GET',
					url: '<?= base_url('MasterPart/get_no_part') ?>',
					dataType: 'json',
					success: function(data) {
						// Looping data yang di-return
						$.each(data, function(key, value) {
							// Tambahkan opsi ke select box
							selectNoPart.append('<option value="' + value.no_part + '">' + value.no_part + ' - ' + value.nm_part + '</option>');
						});
					}
				});
			});

			// Edit existing data
			<?php foreach ($all_receiving->detail as $detail) { ?>
				$('#no_part-<?php echo $detail->id; ?>').val('<?php echo $detail->no_part; ?>');
				$('#qty_received-<?php echo $detail->id; ?>').val('<?php echo $detail->qty_received; ?>');
			<?php } ?>
		});
	</script>

</body>

</html>