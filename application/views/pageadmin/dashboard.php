			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<!-- =========================================================== -->
					<h5 class="mt-4 mb-2">Keseluruhan</h5>
					<div class="row">
						<div class="col-md-3 col-sm-6 col-12">
							<div class="info-box bg-gradient-info">
								<span class="info-box-icon"><i class="far fa-user"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Pelanggan RT / RW NET</span>
									<span class="info-box-number"><?= $customer
																	?> Pelanggan Aktif</span>

									<div class="progress">
										<div class="progress-bar" style="width: 100%"></div>
									</div>
									<span class="progress-description">
										<?= $customer2
										?> Pelanggan Tidak Aktif
									</span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-md-3 col-sm-6 col-12">
							<div class="info-box bg-gradient-success">
								<span class="info-box-icon"><i class="far fa-user"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Pelanggan VOIP</span>
									<span class="info-box-number"><?= $customer3
																	?> Pelanggan Aktif</span>

									<div class="progress">
										<div class="progress-bar" style="width: 100%"></div>
									</div>

								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-md-3 col-sm-6 col-12">
							<div class="info-box bg-gradient-warning">
								<span class="info-box-icon"><i class="fas fa-satellite-dish"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Pelanggan Inet</span>
									<span class="info-box-number"><?= $inet
																	?>Pelanggan Aktif</span>
									<div class="progress">
										<div class="progress-bar" style="width: 70%"></div>
									</div>
									<span class="progress-description">
										<?= $inet2
										?> Pelanggan Tidak Aktif
									</span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-md-3 col-sm-6 col-12">
							<div class="info-box bg-gradient-danger">
								<span class="info-box-icon"><i class="fas fa-warehouse"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Inventori</span>
									<span class="info-box-number"><?= $datainv ?> Items</span>

									<div class="progress">
										<div class="progress-bar" style="width: 70%"></div>
									</div>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->

					<div class="row">
						<div class="col-lg-6">
							<!-- /.card -->
							<div class="card">
								<div class="card-header border-0">
									<h3 class="card-title">Latest Payment</h3>
									<div class="card-tools">
										<a href="#" class="btn btn-tool btn-sm">
											<i class="fas fa-download"></i>
										</a>
										<a href="#" class="btn btn-tool btn-sm">
											<i class="fas fa-bars"></i>
										</a>
									</div>
								</div>
								<div class="card-body table-responsive p-0">
									<table class="table table-striped table-valign-middle">
										<thead>
											<tr>
												<th>Nama Pelanggan</th>
												<th>Layanan</th>
												<th>Metode Pembayaran</th>
												<th>Nominal Bayar</th>
												<th>Tgl Pembayaran</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											foreach($lastestpayment as $value) {
											?>
											<tr>
												<td>
													<?= $value['nama_pelanggan']; ?>
												</td>
												<td><?= $value['nama_layanan']?></td>
												<td>
													<?= $value['metode_pembayaran']; ?>
												</td>
												<td>
													<?= $value['nominal']; ?>
												</td>
												<td>
													<?= $value['tgl_pembayaran']; ?>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col-md-6 -->
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header border-0">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Total Pendapatan Per Tahun</h3>
										<a href="javascript:void(0);">View Report</a>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<span class="text-bold text-lg"><?= $totalpendapatan ?></span>
											<span>Total Pendapatan Per Tahun</span>
										</p>
									</div>
									<!-- /.d-flex -->

									<div class="position-relative mb-4">
										<canvas id="sales-chart" height="200"></canvas>
									</div>

									<div class="d-flex flex-row justify-content-end">
										<span class="mr-2">
											<i class="fas fa-square text-primary"></i> This year
										</span>
									</div>
								</div>
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col-md-6 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /.content -->
			<script>
				$(function() {
					'use strict'

					var ticksStyle = {
						fontColor: '#495057',
						fontStyle: 'bold'
					}

					var mode = 'index'
					var intersect = true

					var $salesChart = $('#sales-chart')
					var salesChart = new Chart($salesChart, {
						type: 'bar',
						data: {
							labels: <?php echo json_encode($bulan) ?>,
							datasets: [{
								backgroundColor: '#007bff',
								borderColor: '#007bff',
								data: <?php echo json_encode($harga) ?>
							}, ]
						},
						options: {
							maintainAspectRatio: false,
							tooltips: {
								mode: mode,
								intersect: intersect
							},
							hover: {
								mode: mode,
								intersect: intersect
							},
							legend: {
								display: false
							},
							scales: {
								yAxes: [{
									// display: false,
									gridLines: {
										display: true,
										lineWidth: '4px',
										color: 'rgba(0, 0, 0, .2)',
										zeroLineColor: 'transparent'
									},
									ticks: $.extend({
										beginAtZero: true,

										// Include a dollar sign in the ticks
										callback: function(value, index, values) {
											return formatRupiah3(value.toString(), 'Rp.')
										}
									}, ticksStyle)
								}],
								xAxes: [{
									display: true,
									gridLines: {
										display: false
									},
									ticks: ticksStyle
								}]
							}
						}
					})
					var separator = '';
					function formatRupiah3(angka, prefix) {
						var number_string = angka.replace(/[^,\d]/g, '').toString(),
							split = number_string.split(','),
							sisa = split[0].length % 3,
							rupiah3 = split[0].substr(0, sisa),
							ribuan3 = split[0].substr(sisa).match(/\d{3}/gi);

						// tambahkan titik jika yang di input sudah menjadi angka ribuan
						if (ribuan3) {
							separator = sisa ? '.' : '';
							rupiah3 += separator + ribuan3.join('.');
						}

						rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
						return prefix == undefined ? rupiah3 : (rupiah3 ? 'Rp. ' + rupiah3 : '');
					}

					var $visitorsChart = $('#visitors-chart')
					var visitorsChart = new Chart($visitorsChart, {
						data: {
							labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
							datasets: [{
									type: 'line',
									data: [100, 120, 170, 167, 180, 177, 160],
									backgroundColor: 'transparent',
									borderColor: '#007bff',
									pointBorderColor: '#007bff',
									pointBackgroundColor: '#007bff',
									fill: false
									// pointHoverBackgroundColor: '#007bff',
									// pointHoverBorderColor    : '#007bff'
								},
								{
									type: 'line',
									data: [60, 80, 70, 67, 80, 77, 100],
									backgroundColor: 'tansparent',
									borderColor: '#ced4da',
									pointBorderColor: '#ced4da',
									pointBackgroundColor: '#ced4da',
									fill: false
									// pointHoverBackgroundColor: '#ced4da',
									// pointHoverBorderColor    : '#ced4da'
								}
							]
						},
						options: {
							maintainAspectRatio: false,
							tooltips: {
								mode: mode,
								intersect: intersect
							},
							hover: {
								mode: mode,
								intersect: intersect
							},
							legend: {
								display: false
							},
							scales: {
								yAxes: [{
									// display: false,
									gridLines: {
										display: true,
										lineWidth: '4px',
										color: 'rgba(0, 0, 0, .2)',
										zeroLineColor: 'transparent'
									},
									ticks: $.extend({
										beginAtZero: true,
										suggestedMax: 200
									}, ticksStyle)
								}],
								xAxes: [{
									display: true,
									gridLines: {
										display: false
									},
									ticks: ticksStyle
								}]
							}
						}
					})
				})
			</script>