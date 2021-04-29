<section class="content">
	<div id="modalEdit" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Status Tagihan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Nominal Bayar</label>
								<input required type="text" id="e_id" name="e_id">
								<input required type="text" id="e_nominal" name="e_nominal" class="form-control" placeholder="Nominal Bayar">
								<input required type="hidden" id="e_nominal_v" name="e_nominal_v" class="form-control" placeholder="Nominal Bayar">
								<script language="JavaScript">
									var rupiah3 = document.getElementById('e_nominal');
									rupiah3.addEventListener('keyup', function(e) {
										// tambahkan 'Rp.' pada saat form di ketik
										// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
										rup3 = this.value.replace(/\D/g, '');
										$('#e_nominal_v').val(rup3);
										rupiah3.value = formatRupiah3(this.value, 'Rp. ');
									});

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
								</script>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
							<i class="ace-icon fa fa-save"></i>
							Simpan
						</button>
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Batal
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<!-- Default box -->

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar Tagihan</h3>
		</div>
		<br>
		<br>
		<div class="card-body p-0">
			<table id="table_id" class="table table-bordered table-hover projects">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th class="text-center">
							No Invoice / Tagihan
						</th>
						<th class="text-center">
							No Pelanggan
						</th>
						<th class="text-center">
							Nama
						</th>
						<th class="text-center">
							Bulan
						</th>
						<th class="text-center">
							Tahun
						</th>
						<th class="text-center">
							Nominal Tagihan
						</th>
						<th class="text-center">
							Nominal Bayar
						</th>
						<th class="text-center">
							Metode Pembayaran
						</th>
						<th class="text-center">
							No Telp / WhatsApp
						</th>
						<th class="text-center">
							Status Pembayaran
						</th>
						<th class="text-center">
							Invoice
						</th>
						<th class="text-center">
							Action
						</th>
					</tr>
				</thead>
				<tbody id="show_data">
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</section>

<script type="text/javascript">
	$('#show_data').on('click', '.item_hapus', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/daftar_tagihanc/delete') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terhapus!',
							'Data sudah dihapus.',
							'success'
						)
					}
				});
			}
		})
	})

	$('#show_data').on('click', '.item_invoice', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda ingin mendownload Invoice ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Download!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/tagihan_logc/downloadTagihan') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Berhasil!',
							'Download Berhasil',
							'success'
						)
					}
				});
			}
		})
	})

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('administrator/daftar_tagihanc/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var level = <?= $this->session->userdata('level'); ?>;
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					var status = '';
					var hapus = '';
					var metode = '';
					if (data[i].no_wa != null) {
						status = '<td ><a target="_blank" href="https://api.whatsapp.com/send/?phone=' + data[i].no_wa + '">' + data[i].no_wa + '</td>'
					} else {
						status = '<td class="text-left"> No Telp Tidak Tersedia</td>'
					}
					if (data[i].metode_pembayaran != null) {
						metode = '<td class="text-left">' + data[i].metode_pembayaran + '</td>'
					} else {
						metode = '<td class="text-left">- </td>'
					}
					var tombol = '';
					if (data[i].status == '1') {
						tombol = '<td class="text-center">' +
							'   <button  class="btn btn-success btn-sm item_non"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-check"> </i>  Lunas </button>' +
							'</a> &nbsp' +
							'</td>'
					} else {
						tombol = '<td class="text-center">' +
							'   <button  class="btn btn-danger btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-times"> </i> Belum Lunas </button>' +
							'</button> &nbsp' +
							'</td>'
					}
					if(level == 1){
						hapus = '<td class="project-actions text-right">' +
						'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-trash"> </i>  Hapus </a>' +
						'</button> ' +
						'</td>' 
					} else {
						hapus = '<td class="project-actions text-right">' +
						'</td>' 
					}
					var invoice = '';

					invoice = '<td class="text-center">' +
						'   <a target=_blank href="<?= base_url() . 'administrator/tagihan_logc/downloadTagihan/?invoice=' ?>' + data[i].id + '" class="btn btn-success btn-sm"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-download"> </i> Download  </a>' +
						'</button> &nbsp' +
						'</td>'

					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].invoice + '</td>' +
						'<td class="text-left">' + data[i].no_services + '</td>' +
						'<td class="text-left">' + data[i].name + '</td>' +
						'<td class="text-left">' + data[i].month + '</td>' +
						'<td class="text-left">' + data[i].year + '</td>' +
						'<td class="text-left">' + data[i].Nominal + '</td>' +
						'<td class="text-left">' + data[i].Nominal_bayar + '</td>' +
						metode +
						status +
						tombol +
						invoice +
						hapus+
						'</td>' +
						'</tr>';
					no++;
				}
				$("#table_id").dataTable().fnDestroy();
				var a = $('#show_data').html(html);
				//                    $('#mydata').dataTable();
				if (a) {
					$('#table_id').dataTable({
						"dom": "Bfrtip",
						"buttons": [
							"excel"
						],
						"searching": true,
						"ordering": true,
						"responsive": true,
						"paging": true,
					});
				}
				/* END TABLETOOLS */
			}

		});
	}

	//get data for update record
	$('#show_data').on('click', '.item_edit', function() {
		document.getElementById("formEdit").reset();
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/daftar_tagihanc/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nominal').val(formatRupiah3(data[0].Nominal_bayar, 'Rp. '));
				$('#e_nominal_v').val(data[0].Nominal_bayar);
			}
		});
	});

	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/daftar_tagihanc/update') ?>",
					type: "POST",
					data: $('#formEdit').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_edit').html('<i class="ace-icon fa fa-save"></i>' +
							'Ubah');
						if (response == true) {
							document.getElementById("formEdit").reset();
							swalEditSuccess();
							show_data();
							$('#modalEdit').modal('hide');
						} else if (response == 400) {
							swalOverBudget();
						} else {
							swalEditFailed();
						}
					}
				});
			}
		})
	}

	$(document).ready(function() {
		show_data();
		$('#table_id').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
		});
	});
</script>
