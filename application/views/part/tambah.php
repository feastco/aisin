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
			<div id="content" data-url="<?= base_url('Part') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('Part') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
								<div class="card-body">
									<form action="<?= base_url('Part/proses_tambah') ?>" id="form-tambah" method="POST">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="no_part"><strong>No Part</strong></label>
												<select name="no_part" id="no_part" class="form-control" required>
													<option value="">Pilih No Part</option>
													<?php foreach ($all_master_part as $part): ?>
														<option value="<?= $part->no_part ?>" data-nm_part="<?= $part->nm_part ?>"><?= $part->no_part ?></option>
													<?php endforeach ?>
												</select>
											</div>


											<div class="form-group col-md-6">
												<input type="hidden" name="nm_part" id="nm_part" placeholder="Masukkan Nama Part" autocomplete="off" class="form-control" required readonly>
											</div>
										</div>
										<div class="form-group">
											<label for="stok"><strong>Stok</strong></label>
											<input type="number" name="stok" placeholder="Masukkan Stok" autocomplete="off" class="form-control" required>
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
			let no_part = $('#no_part').val();
			let selectedOption = $('#no_part option[value="' + no_part + '"]');
			let nm_part = selectedOption.attr('data-nm_part');

			$('#nama').val(nm_part);

			$('#no_part').change(function() {
				no_part = $(this).val();
				selectedOption = $('#no_part option[value="' + no_part + '"]');
				nm_part = selectedOption.attr('data-nm_part');
				$('#nama').val(nm_part);

				// tambahkan input hidden untuk menyimpan nilai nm_part
				$('#nm_part').val(nm_part);
			});
		});
	</script>




</body>

</html>