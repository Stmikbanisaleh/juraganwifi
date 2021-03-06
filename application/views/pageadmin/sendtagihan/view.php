<section class="content">
	<div id="my-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Blast Tagihan Email</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Bulan</label>
								<input maxlength="2" max="12" min="1" required type="text" id="bulan" name="bulan" class="form-control" placeholder="Bulan">
							</div>

							<div class="form-group">
								<label>Tahun</label>
								<input required maxlength="4" maxlength="4" type="tahun" id="tahun" name="tahun" class="form-control" placeholder="Tahun">
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

	<div id="my-modal2" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah2">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Blast Tagihan Email</h4>

							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">

							<div class="form-group">
								<label>Bulan</label>
								<input maxlength="2" max="12" min="1" required type="text" id="bulan" name="bulan" class="form-control" placeholder="Bulan">
							</div>

							<div class="form-group">
								<label>Tahun</label>
								<input required maxlength="4" maxlength="4" type="tahun" id="tahun" name="tahun" class="form-control" placeholder="Tahun">
							</div>

							<div class="form-group">
								<label>Pelanggan 1</label>
								<select class="form-control select2" style="width: 100%;" name="pelanggan[0]" id="pelanggan[0]">
									<option value="" selected="selected">-- Pilih --</option>
									<?php foreach ($mypelanggan as $value) { ?>
										<option value=<?= $value['no_services'] ?>><?= $value['no_services'] .'-'.$value['name'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Pelanggan 2</label>
								<select class="form-control select2" style="width: 100%;" name="pelanggan[1]" id="pelanggan[1]">
									<option value="" selected="selected">-- Pilih --</option>
									<?php foreach ($mypelanggan as $value) { ?>
										<option value=<?= $value['no_services'] ?>><?= $value['no_services'] .'-'.$value['name'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Pelanggan 3</label>
								<select class="form-control select2" style="width: 100%;" name="pelanggan[2]" id="pelanggan[2]">
									<option value="" selected="selected">-- Pilih --</option>
									<?php foreach ($mypelanggan as $value) { ?>
										<option value=<?= $value['no_services'] ?>><?= $value['no_services'] .'-'.$value['name'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Pelanggan 4</label>
								<select class="form-control select2" style="width: 100%;" name="pelanggan[3]" id="pelanggan[3]">
									<option value="" selected="selected">-- Pilih --</option>
									<?php foreach ($mypelanggan as $value) { ?>
										<option value=<?= $value['no_services'] ?>><?= $value['no_services'] .'-'.$value['name'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Pelanggan 5</label>
								<select class="form-control select2" style="width: 100%;" name="pelanggan[4]" id="pelanggan[4]">
									<option value="" selected="selected">-- Pilih --</option>
									<?php foreach ($mypelanggan as $value) { ?>
										<option value=<?= $value['no_services'] ?>><?= $value['no_services'] .'-'.$value['name'] ?></option>
									<?php } ?>
								</select>
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
			<h3 class="card-title">Daftar Invoice</h3>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-2">
				<button href="#my-modal" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-envelope bigger-120"></a> Blast Tagihan Email</button>
			</div>
			<div class="col-sm-2">
				<button href="#my-modal2" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-envelope bigger-120"></a> Blast Email By Filter</button>
			</div>
		</div>

		<br>
		<div class="card-body p-0">
			<table id="table_id" class="table table-bordered table-hover projects">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th class="text-center">
							Nama Customer
						</th>
						<th class="text-center">
							No Telp
						</th>
						<th class="text-center">
							Total Tagihan
						</th>
						<th class="text-center">
							Status
						</th>
						<th class="text-center">
							Periode
						</th>
						<th class="text-center">
							Jatuh Tempo
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
	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/blast_email/generateTagihan') ?>",
					type: "POST",
					data: $('#formTambah').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah").reset();
							swalGenerateSuccess();
							show_data();
							$('#my-modal').modal('hide');
						} else {
							swalGenerateFailed();
						}
					}
				});
			}
		})
	}

	if ($("#formTambah2").length > 0) {
		$("#formTambah2").validate({
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/blast_email/generateTagihanByUser') ?>",
					type: "POST",
					data: $('#formTambah2').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah2").reset();
							swalGenerateSuccess();
							show_data();
							$('#my-modal2').modal('hide');
						} else {
							swalGenerateFailed();
						}
					}
				});
			}
		})
	}

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
					url: "<?php echo base_url('siswa/delete') ?>",
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

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('administrator/blast_email/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					var status = '';
					var wa = '';
					if (data[i].status == 1) {
						status = '<td class="project-state"><span class="badge badge-success">Lunas</span></td>'
					} else {
						status = '<td class="project-state"><span class="badge badge-warning">Menunggu Pembayaran</span></td>'
					}
					if (data[i].no_wa != null) {
						wa = '<td ><a target="_blank" href="https://api.whatsapp.com/send/?phone=' + data[i].no_wa + '">' + data[i].no_wa + '</td>'
					} else {
						wa = '<td class="text-left"> No Telp Tidak Tersedia</td>'
					}
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].name + '</td>' +
						wa +
						'<td class="text-right">' + ConvertFormatRupiah(data[i].total_tagihan, 'Rp.') + '</td>' +
						status +
						'<td class="text-right">' + data[i].month + '/' + data[i].year + '</td>' +
						'<td class="text-right">' + data[i].due_date + '</td>' +
						'</tr>';
					no++;
				}
				$("#table_id").dataTable().fnDestroy();
				var a = $('#show_data').html(html);
				//                    $('#mydata').dataTable();
				if (a) {
					$('#table_id').dataTable({
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

	$(document).ready(function() {
		show_data();
		$('.select2').select2();
		$('#table_id').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
		});
	});

	function ConvertFormatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>
