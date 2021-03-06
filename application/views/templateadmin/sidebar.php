  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
  	<!-- Brand Logo -->
  	<a href="<?php echo base_url() . 'dashboard/index' ?>" class="brand-link">
  		<img src="<?= base_url() ?>assets/atas.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  		<span class="brand-text font-weight-light">Dashboard</span>
  	</a>

  	<!-- Sidebar -->
  	<div class="sidebar">
  		<!-- Sidebar user panel (optional) -->
  		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  			<div class="image">
  				<img src="<?= base_url() ?>assets/bawah.png" class="img-circle elevation-2" alt="User Image">
  			</div>
  			<div class="info">
  				<a href="#" class="d-block"><?= $this->session->userdata('name'); ?></a>
  			</div>
  		</div>

  		<!-- Sidebar Menu -->
  		<nav class="mt-2">
  			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  				<li class="nav-item has-treeview menu-open">
  					<a href="<?php echo base_url() . 'dashboard/index' ?>" class="nav-link active">
  						<i class="nav-icon fas fa-tachometer-alt"></i>
  						<p>
  							Dashboard
  						</p>
  					</a>
  				</li>
  				<?php
					$session = $this->session->userdata('level');
					?>
  				<li class="nav-header">CUSTOMER RT/RW NET</li>

  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . 'administrator/customer'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-users"></i>
  						<p>
  							Pelanggan RT/RW Net
  							<i class="fas fa-angle-left right"></i>
  						</p>
  					</a>
  					<?php
						if ($session == 1 || $session == 2 || $session == 3 || $session == 4 || $session == 5) {
						?>
  						<ul class="nav nav-treeview">
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/customer'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Daftar Pelanggan RT/RW Net</p>
  								</a>
  							</li>
  						<?php } ?>
  						<?php
							if ($session == 1 || $session == 2) {
							?>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/services'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Layanan Per Pelanggan</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/daftar_tagihan'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Daftar Tagihan</p>
  								</a>
  							</li>


  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/tagihan_log'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Generate Tagihan</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/blast_email'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Blast Email Tagihan</p>
  								</a>
  							</li>
  						<?php } ?>
  						</ul>
  				</li>
  				<li class="nav-header">CUSTOMER CORPORATE</li>
  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . 'administrator/customer'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-users"></i>
  						<p>
  							Pelanggan Corporate
  							<i class="fas fa-angle-left right"></i>
  						</p>
  					</a>

  					<ul class="nav nav-treeview">
  						<?php
							if ($session == 1 || $session == 2 || $session == 3 || $session == 4 || $session == 5) {
							?>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/corporate'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Daftar Pelanggan</p>
  								</a>
  							</li>
  						<?php } ?>
  						<?php
							if ($session == 1 || $session == 2) {
							?>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/services2'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Layanan Per Pelanggan</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/daftar_tagihanc'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Daftar Tagihan</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/tagihan_logc'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Generate Tagihan</p>
  								</a>
  							</li>
  						<?php } ?>
  					</ul>
  				</li>
  				<?php
					if ($session == 1 || $session == 2 || $session == 3) {
					?>
  					<li class="nav-item has-treeview">
  						<a href="<?php echo base_url() . 'administrator/datavoip'; ?>" class="nav-link">
  							<i class="nav-icon fas fa-users"></i>
  							<p>
  								Daftar Pelanggan VOIP
  							</p>
  						</a>
  					</li>
  				<?php } ?>
  				<?php
					if ($session == 1 || $session == 2 || $session == 3) {
					?>
  					<li class="nav-header">MASTER</li>
  					<li class="nav-item has-treeview">
  						<a href="#" class="nav-link">
  							<i class="nav-icon fas fa-chart-pie"></i>
  							<p>
  								Master Data
  								<i class="right fas fa-angle-left"></i>
  							</p>
  						</a>
  						<ul class="nav nav-treeview">
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/agama'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Agama</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/bank'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Bank</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/jenis_identitas'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Jenis Identitas</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/jenis_ipaddress'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Jenis IP</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/jenis_pelanggan'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Jenis Pelanggan</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/jenis_perangkat'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Jenis Perangkat</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/layanan'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Jenis Layanan</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/jenis_pembayaran'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Jenis Pembayaran</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/jenis_tempat'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Jenis Tempat</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/jenis_kepemilikan_perangkat'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Kepemilikan Perangkat</p>
  								</a>
  							</li>

  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/jenis_kepemilikan'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Kepemilikan Tempat</p>
  								</a>
  							</li>

  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/media_koneksi'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Media Koneksi</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/merek_perangkat'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Merek Perangkat</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/metode_pembayaran'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Metode Pembayaran</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/odc'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master ODC</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/odp'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master ODP</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/operator'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Operator</p>
  								</a>
  							</li>

  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/pendidikan_terakhir'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Pendidikan</p>
  								</a>
  							</li>

  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/status_sdm'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Status SDM</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/type_ipaddress'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Type IP Address</p>
  								</a>
  							</li>

  						</ul>
  					</li>
  				<?php } ?>
  				<?php
					if ($session == 1 || $session == 2 || $session == 3 || $session == 5) {
					?>
  					<li class="nav-header">WILAYAH</li>
  					<li class="nav-item has-treeview">
  						<a href="#" class="nav-link">
  							<i class="nav-icon fas fa-map-signs"></i>
  							<p>
  								DATA WILAYAH
  								<i class="right fas fa-angle-left"></i>
  							</p>
  						</a>
  						<ul class="nav nav-treeview">
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/wilayah'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Data Wilayah</p>
  								</a>
  							</li>
  						</ul>
  					</li>
  				<?php } ?>
  				<li class="nav-header">GSM</li>
  				<li class="nav-item has-treeview">
  					<a href="#" class="nav-link">
  						<i class="nav-icon fas fa-mobile-alt"></i>
  						<p>
  							DATA GSM
  							<i class="right fas fa-angle-left"></i>
  						</p>
  					</a>
  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/quota'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Quota</p>
  							</a>
  						</li>
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/penggunagsm'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Data Pengguna GSM</p>
  							</a>
  						</li>

  					</ul>
  				</li>

  				<li class="nav-header">VENDOR</li>
  				<li class="nav-item has-treeview">
  					<a href="#" class="nav-link">
  						<i class="nav-icon fas fa-satellite-dish"></i>
  						<p>
  							DATA VENDOR
  							<i class="right fas fa-angle-left"></i>
  						</p>
  					</a>
  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/datavendor'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Data Vendor</p>
  							</a>
  						</li>
  						<?php
							if ($session == 1 || $session == 2 || $session == 3) {
							?>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/vendor'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Master Layanan Vendor</p>
  								</a>
  							</li>
  						<?php } ?>
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/inet'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Data Pengguna INET</p>
  							</a>
  						</li>

  					</ul>
  				</li>
  				<li class="nav-header">ALFAMIDI</li>
  				<li class="nav-item has-treeview">
  					<a href="#" class="nav-link">
  						<i class="nav-icon fas fa-store-alt"></i>
  						<p>
  							DATA MIDI
  							<i class="right fas fa-angle-left"></i>
  						</p>
  					</a>
  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/dcmidi'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Store DC MIDI</p>
  							</a>
  						</li>
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/datamidi'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Store AlfaMidi</p>
  							</a>
  						</li>

  					</ul>
  				</li>
  				<li class="nav-header">INVENTORI</li>
  				<li class="nav-item has-treeview">
  					<a href="#" class="nav-link">
  						<i class="nav-icon fas fa-warehouse"></i>
  						<p>
  							Inventori
  							<i class="fas fa-angle-left right"></i>
  						</p>
  					</a>
  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/datainventori'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Data Inventori</p>
  							</a>
  						</li>
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/kategori_inventori'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Kategori Inventori</p>
  							</a>
  						</li>
  					</ul>
  				</li>

  				<?php
					if ($session == 1) {
					?>
  					<li class="nav-header">PENGATURAN</li>
  					<li class="nav-item has-treeview">
  						<a href="#" class="nav-link">
  							<i class="nav-icon fas fa-cogs"></i>
  							<p>
  								Konfigurasi
  								<i class="fas fa-angle-left right"></i>
  							</p>
  						</a>
  						<ul class="nav nav-treeview">
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/user'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Daftar User</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/email'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p> Email </p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/template_invoice'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p> Template Invoice </p>
  								</a>
  							</li>
  						</ul>
  					</li>
  				<?php } ?>
  				<?php
					if ($session == 1 || $session == 2) {
					?>
  					<li class="nav-header">LAPORAN</li>
  					<li class="nav-item has-treeview">
  						<a href="#" class="nav-link">
  							<i class="nav-icon fas fa-book"></i>
  							<p>
  								Jenis Laporan
  								<i class="fas fa-angle-left right"></i>
  							</p>
  						</a>
  						<ul class="nav nav-treeview">

  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/laporanpembayaran'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Pembayaran Retail</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/laporantagihan'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Tagihan Retail</p>
  								</a>
  							</li>

  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/laporanpembayaranc'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Pembayaran Corporate</p>
  								</a>
  							</li>
  							<li class="nav-item">
  								<a href="<?php echo base_url() . 'administrator/laporantagihanc'; ?>" class="nav-link">
  									<i class="far fa-circle nav-icon"></i>
  									<p>Tagihan Corporate</p>
  								</a>
  							</li>

  						</ul>
  					</li>
  				<?php } ?>
  			</ul>
  		</nav>
  		<!-- /.sidebar-menu -->
  	</div>
  	<!-- /.sidebar -->
  </aside>
