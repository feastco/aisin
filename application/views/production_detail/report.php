<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3>
		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
				<?php foreach ($all_production_detail as $detail): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $detail->no_fg ?></td>
						<td><?= $detail->nm_fg ?></td>
						<td><?= $detail->qty_production ?></td>
						<td><?= $detail->no_part ?></td>
						<td><?= $detail->nm_part ?></td>
						<td><?= $detail->qty_need ?></td>
						<td><?= $detail->date_production ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>