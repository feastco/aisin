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
					<td>Nomor FG</td>
					<td>Nomor Part</td>
					<td>Quantity Need</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_part_need as $part_need): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $part_need->no_fg ?></td>
						<td><?= $part_need->no_part ?></td>
						<td><?= $part_need->qty_need ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>