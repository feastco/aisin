<?php $this->load->view('partials/head.php') ?>

<body>
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('ReceivingDetail') ?>">
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
									<a href="<?= base_url('ReceivingDetail/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
								<!-- <?php elseif ($tindak == 'tambah'): ?>
									<a href="<?= base_url('Receiving/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
								<?php endif ?> -->
							<?php endforeach ?>
						</div>
						<!-- <div class="float-right">
							<a href="<?= base_url('ReceivingDetail') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div> -->
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="card shadow">
								<div class="card-header"><strong>Detail Receiving</strong></div>
								<div class="card-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>No PKB</th>
												<th>No Part</th>
												<th>Qty Received</th>
												<th>Tanggal Penerimaan</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
											foreach ($all_receiving_detail as $detail) { ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $detail->no_pkb ?></td>
													<td><?= $detail->no_part ?></td>
													<td><?= $detail->qty_received ?></td>
													<td><?= $detail->received_at ?></td>
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