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
					<td>No Part</td>
					<td>Qty Received</td>
					<td>Tanggal Terima</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_receiving_detail as $receiving_detail): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $receiving_detail->no_pkb ?></td>
						<td><?= $receiving_detail->no_part ?></td>
						<td><?= $receiving_detail->qty_received ?></td>
						<td><?= $receiving_detail->received_at ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>