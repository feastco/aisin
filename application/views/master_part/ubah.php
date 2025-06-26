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
			<div id="content" data-url="<?= base_url('MasterPart') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('MasterPart') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
								<div class="card-body">
									<form action="<?= base_url('MasterPart/proses_ubah/' . $part->id) ?>" id="form-tambah" method="POST">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="no_part"><strong>No Part</strong></label>
												<input type="text" name="no_part" placeholder="Masukkan No Part" autocomplete="off" class="form-control" required value="<?= $part->no_part ?>">
											</div>
											<div class="form-group col-md-6">
												<label for="nm_part"><strong>Nama Part</strong></label>
												<input type="text" name="nm_part" placeholder="Masukkan Nama Part" autocomplete="off" class="form-control" required value="<?= $part->nm_part ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="min_stock"><strong>Min Stock</strong></label>
												<input type="number" name="min_stock" placeholder="Masukkan Min Stock" autocomplete="off" class="form-control" required value="<?= $part->min_stock ?>">
											</div>
											<div class="form-group col-md-6">
												<label for="max_stock"><strong>Max Stock</strong></label>
												<input type="number" name="max_stock" placeholder="Masukkan Max Stock" autocomplete="off" class="form-control" required value="<?= $part->max_stock ?>">
											</div>
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