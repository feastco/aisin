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
									<form action="<?= base_url('Part/proses_ubah/' . $all_part->id) ?>" id="form-ubah" method="POST">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="no_part"><strong>No Part</strong></label>
												<select name="no_part" id="no_part" class="form-control" required>
													<?php foreach ($all_master_part as $master_part): ?>
														<option value="<?= $master_part->no_part ?>" <?= ($master_part->no_part == $all_part->no_part) ? 'selected' : '' ?> data-nm_part="<?= $master_part->nm_part ?>"><?= $master_part->no_part ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<div class="form-group col-md-6">
												<label for="nm_part"><strong>Nama Part</strong></label>
												<input type="text" name="nm_part" id="nm_part" placeholder="Masukkan Nama Part" autocomplete="off" class="form-control" required readonly>
											</div>
										</div>
										<div class="form-group">
											<label for="stok"><strong>Stok</strong></label>
											<input type="number" name="stok" placeholder="Masukkan Stok" autocomplete="off" class="form-control" required value="<?= $all_part->stok ?>">
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
			$('#nm_part').val('<?= $all_part->nm_part ?>');

			$('#no_part').change(function() {
				let selectedOption = $(this).find('option:selected');
				let nm_part = selectedOption.attr('data-nm_part');
				$('#nm_part').val(nm_part);
			});
		});
	</script>
</body>

</html>