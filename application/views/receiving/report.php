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
					<td>No PKB</td>
					<td>Tanggal Terima</td>
					<td>Tanggal Update</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_receiving as $receiving): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $receiving->no_pkb ?></td>
						<td><?= $receiving->received_at ?></td>
						<td><?= $receiving->update_at ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>