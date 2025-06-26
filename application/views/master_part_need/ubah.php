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
			<div id="content" data-url="<?= base_url('MasterPartNeed') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('MasterPartNeed') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
								<div class="card-body">
									<form action="<?= base_url('MasterPartNeed/proses_ubah/' . $part_need->id) ?>" id="form-tambah" method="POST">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="no_fg"><strong>No FG</strong></label>
												<select name="no_fg" class="form-control" required>
													<option value="<?= $part_need->no_fg ?>"><?= $part_need->no_fg ?></option>
													<?php foreach ($all_fg as $fg): ?>
														<option value="<?= $fg->no_fg ?>"><?= $fg->no_fg ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<div class="form-group col-md-6">
												<label for="no_part"><strong>No Part</strong></label>
												<select name="no_part" class="form-control" required>
													<option value="<?= $part_need->no_part ?>"><?= $part_need->no_part ?></option>
													<?php foreach ($all_part as $part): ?>
														<option value="<?= $part->no_part ?>"><?= $part->no_part ?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="qty_need"><strong>Quantity Need</strong></label>
											<input type="number" name="qty_need" placeholder="Masukkan Quantity Need" autocomplete="off" class="form-control" required value="<?= $part_need->qty_need ?>">
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
</body>

</html>