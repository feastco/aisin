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
					<td>No</td>
					<td>No FG</td>
					<td>Quantity Production</td>
					<td>Date Production</td>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($all_production as $production): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $production->no_fg ?></td>
						<td><?= $production->qty_production ?></td>
						<td><?= $production->date_production ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>