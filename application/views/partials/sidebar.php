<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
		<div class="sidebar-brand-icon rotate-n-15 ">
			<i class="fas fa-industry"></i>
		</div>
		<div class="sidebar-brand-text mx-3">AISIN Indonesia</div>
	</a>

	<?php
	$aktif = isset($aktif) ? $aktif : ''; // Initialize $aktif variable
	if ($this->session->login['role'] == 'petugas'):
	?>
		<hr class="sidebar-divider my-0">
		<li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('dashboard') ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>
		<!-- Divider -->
		<hr class="sidebar-divider">
		<div class="sidebar-heading">
			Transaksi
		</div>
		<li class="nav-item <?= $aktif == 'Receiving' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('Receiving') ?>">
				<i class="fas fa-fw fa-file-invoice"></i>
				<span>Penerimaan</span></a>
		</li>
		<li class="nav-item <?= $aktif == 'ReceivingDetail' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('ReceivingDetail') ?>">
				<i class="fas fa-fw fa-file-invoice"></i>
				<span>Detail Penerimaan</span></a>
		</li>
	<?php endif; ?>

	<?php if ($this->session->login['role'] == 'admin'): ?>
		<!-- Heading -->
		<hr class="sidebar-divider">
		<li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?> ">
			<a class="nav-link" href="<?= base_url('dashboard') ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>
		<li class="nav-item <?= $aktif == 'Part' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('Part') ?>">
				<i class="fas fa-fw fa-wrench"></i>
				<span>Parts</span></a>
		</li>

		<hr class="sidebar-divider">
		<div class="sidebar-heading">
			Produksi
		</div>

		<li class="nav-item <?= $aktif == 'Production' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('Production') ?>">
				<i class="fas fa-fw fa-file-invoice"></i>
				<span>Produksi</span></a>
		</li>
		<li class="nav-item <?= $aktif == 'ProductionDetail' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('ProductionDetail') ?>">
				<i class="fas fa-fw fa-file-invoice"></i>
				<span>Detail Produksi</span></a>
		</li>

		<hr class="sidebar-divider">
		<div class="sidebar-heading">
			Transaksi
		</div>

		<li class="nav-item <?= $aktif == 'Receiving' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('Receiving') ?>">
				<i class="fas fa-fw fa-file-invoice"></i>
				<span>Penerimaan</span></a>
		</li>
		<li class="nav-item <?= $aktif == 'ReceivingDetail' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('ReceivingDetail') ?>">
				<i class="fas fa-fw fa-file-invoice"></i>
				<span>Detail Penerimaan</span></a>
		</li>

		<!-- Master Section -->
		<hr class="sidebar-divider">
		<div class="sidebar-heading">
			Master
		</div>

		<li class="nav-item <?= $aktif == 'MasterFG' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('MasterFG') ?>">
				<i class="fas fa-fw fa-box"></i>
				<span>Master Finish Good</span></a>
		</li>

		<li class="nav-item <?= $aktif == 'MasterPartNeed' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('MasterPartNeed') ?>">
				<i class="fas fa-fw fa-box"></i>
				<span>Master Part Need</span></a>
		</li>

		<li class="nav-item <?= $aktif == 'MasterPart' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('MasterPart') ?>">
				<i class="fas fa-fw fa-box"></i>
				<span>Master Part</span></a>
		</li>

		<!-- Pengaturan Section -->
		<hr class="sidebar-divider">
		<div class="sidebar-heading">
			Kelola
		</div>

		<li class="nav-item <?= $aktif == 'Product' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('Product') ?>">
				<i class="fas fa-fw fa-box"></i>
				<span>Kelola Product</span></a>
		</li>

		<li class="nav-item <?= $aktif == 'Contact' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('Contact') ?>">
				<i class="fas fa-fw fa-address-book"></i>
				<span>Kelola Contact</span></a>
		</li>

		<!-- Pengaturan Section -->
		<hr class="sidebar-divider">
		<div class="sidebar-heading">
			Pengaturan
		</div>

		<li class="nav-item <?= $aktif == 'pengguna' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('pengguna') ?>">
				<i class="fas fa-fw fa-users"></i>
				<span>Manajemen Admin</span></a>
		</li>

		<li class="nav-item <?= $aktif == 'petugas' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('petugas') ?>">
				<i class="fas fa-fw fa-users"></i>
				<span>Manajemen Petugas</span></a>
		</li>

	<?php endif; ?>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>