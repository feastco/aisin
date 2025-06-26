<?php $this->load->view('partials/head.php') ?>

<body>
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('ProductionDetail') ?>">
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
								'admin' => ['export'],
								'petugas' => []
							];
							?>
							<?php foreach ($tindakan[$role] as $tindak): ?>
								<?php if ($tindak == 'export'): ?>
									<a href="<?= base_url('ProductionDetail/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
								<?php endif ?>
							<?php endforeach ?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="card shadow">
								<div class="card-header"><strong>Detail Production</strong></div>
								<div class="card-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>No FG</th>
												<th>Nama FG</th>
												<th>Qty Produksi</th>
												<th>No Part</th>
												<th>Nama Part</th>
												<th>Qty Dibutuhkan</th>
												<th>Tanggal Produksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
											foreach ($all_production_detail as $detail) { ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $detail->no_fg ?></td>
													<td><?= $detail->nm_fg ?></td>
													<td><?= $detail->qty_production ?></td>
													<td><?= $detail->no_part ?></td>
													<td><?= $detail->nm_part ?></td>
													<td>
														<?php
														// Calculate qty_need from productionDetail by multiplying qty_production
														$calculated_qty_need = $detail->qty_need * $detail->qty_production;
														echo $calculated_qty_need;
														?>
													</td>
													<td><?= $detail->date_production ?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
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