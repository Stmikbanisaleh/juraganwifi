<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Data Voip</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>PELANGGAN</b>
									<hr>
									<div class="form-group">
										<label>Nomor Voip</label>
										<input required type="text" id="nomor" name="nomor" class="form-control" placeholder="Nomor Voip">
									</div>

									<div class="form-group">
										<label>Nama Pelanggan</label>
										<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Pelanggan"></input>
									</div>

									<div class="form-group">
										<label>Alamat Pelanggan</label>
										<textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
									</div>

									<div class="form-group">
										<label>Limit Pemakaian</label>
										<input type="text" id="limit" name="limit" class="form-control" placeholder="Limit Pemakaian"></input>
										<input type="hidden" id="limit_v" required name="limit_v" placeholder="total penerimaan" class="form-control" />
										<script language="JavaScript">
										var rupiah3 = document.getElementById('limit');
										rupiah3.addEventListener('keyup', function(e) {
											rup = this.value.replace(/\D/g, '');
											$('#limit_v').val(rup);
											rupiah3.value = formatRupiah2(this.value, 'Rp. ');
										});

										function formatRupiah2(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah3 = split[0].substr(0, sisa),
												ribuan = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan) {
												separator = sisa ? '.' : '';
												rupiah3 += separator + ribuan.join('.');
											}

											rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
											return prefix == undefined ? rupiah3 : (rupiah3 ? 'Rp. ' + rupiah3 : '');
										}
									</script>
									</div>

									<div class="form-group">
										<label>Nama Vendor</label>
										<select class="form-control select2" style="width: 100%;" name="vendor" id="vendor">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myvendor as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

								</div>
							</div>

							<div class="card-body">
								<b>PERANGKAT</b>
								<hr>
								<div class="form-group">
									<label>Media Koneksi</label>
									<select class="form-control select2" style="width: 100%;" name="media_koneksi" id="media_koneksi">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($mymediakoneksi as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Jenis Perangkat VOIP</label>
									<select class="form-control select2" style="width: 100%;" name="jenis_perangkat" id="jenis_perangkat">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($myjenisperangkat as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Merek Perangkat VOIP</label>
									<select class="form-control select2" style="width: 100%;" name="merek_perangkat" id="merek_perangkat">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($mymerekperangkat as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Status Kepemilikan Perangkat</label>
									<select class="form-control select2" style="width: 100%;" name="status_kepemilikan" id="status_kepemilikan">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($mystatuskepemilikanperangkat as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Serial Number</label>
									<input type="text" id="serialnumber" name="serialnumber" class="form-control" placeholder="Serial Number Perangkat"></input>
								</div>

								<div class="form-group">
									<label>Keterangan</label>
									<textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
								</div>

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

	<div id="modalEdit" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Data Voip</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>PELANGGAN</b>
									<hr>
									<div class="form-group">
										<label>Nomor Voip</label>
										<input required type="hidden" id="e_id" name="e_id" class="form-control" placeholder="Nomor Voip">
										<input required type="text" id="e_nomor" name="e_nomor" class="form-control" placeholder="Nomor Voip">
									</div>

									<div class="form-group">
										<label>Nama Pelanggan</label>
										<input type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama Pelanggan"></input>
									</div>

									<div class="form-group">
										<label>Alamat Pelanggan</label>
										<textarea type="text" id="e_alamat" name="e_alamat" class="form-control" placeholder="Alamat"></textarea>
									</div>

									<div class="form-group">
										<label>Limit Pemakaian</label>
										<input type="text" id="e_limit" name="e_limit" class="form-control" placeholder="Limit Pemakaian"></input>
										<input type="hidden" id="e_limit_v" required name="e_limit_v" placeholder="total penerimaan" class="form-control" />
										<script language="JavaScript">
										var rupiah = document.getElementById('e_limit');
										rupiah.addEventListener('keyup', function(e) {
											rup = this.value.replace(/\D/g, '');
											$('#e_limit_v').val(rup);
											rupiah.value = formatRupiah(this.value, 'Rp. ');
										});

										function formatRupiah(angka, prefix) {
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
									</div>

									<div class="form-group">
										<label>Nama Vendor</label>
										<select class="form-control select2" style="width: 100%;" name="e_vendor" id="e_vendor">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myvendor as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

								</div>
							</div>

							<div class="card-body">
								<b>PERANGKAT</b>
								<hr>
								<div class="form-group">
									<label>Media Koneksi</label>
									<select class="form-control select2" style="width: 100%;" name="e_media_koneksi" id="e_media_koneksi">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($mymediakoneksi as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Jenis Perangkat VOIP</label>
									<select class="form-control select2" style="width: 100%;" name="e_jenis_perangkat" id="e_jenis_perangkat">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($myjenisperangkat as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Merek Perangkat VOIP</label>
									<select class="form-control select2" style="width: 100%;" name="e_merek_perangkat" id="e_merek_perangkat">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($mymerekperangkat as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Status Kepemilikan Perangkat</label>
									<select class="form-control select2" style="width: 100%;" name="e_status_kepemilikan" id="e_status_kepemilikan">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($mystatuskepemilikanperangkat as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Serial Number</label>
									<input type="text" id="e_serialnumber" name="e_serialnumber" class="form-control" placeholder="Serial Number Perangkat"></input>
								</div>

								<div class="form-group">
									<label>Keterangan</label>
									<textarea type="text" id="e_keterangan" name="e_keterangan" class="form-control" placeholder="Keterangan"></textarea>
								</div>

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


	<div id="modalEdit2" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit2">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Data Voip</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>PELANGGAN</b>
									<hr>
									<div class="form-group">
										<label>Nomor Voip</label>
										<input required type="hidden" id="e_id2" name="e_id2" class="form-control" placeholder="Nomor Voip">
										<input readonly required type="text" id="e_nomor2" name="e_nomor2" class="form-control" placeholder="Nomor Voip">
									</div>

									<div class="form-group">
										<label>Nama Pelanggan</label>
										<input readonly type="text" id="e_nama2" name="e_nama2" class="form-control" placeholder="Nama Pelanggan"></input>
									</div>

									<div class="form-group">
										<label>Alamat Pelanggan</label>
										<textarea readonly type="text" id="e_alamat2" name="e_alamat2" class="form-control" placeholder="Alamat"></textarea>
									</div>

									<div class="form-group">
										<label>Limit Pemakaian</label>
										<input readonly type="text" id="e_limit2" name="e_limit2" class="form-control" placeholder="Limit Pemakaian"></input>
										<input type="hidden" id="e_limit_v2" required name="e_limit_v2" placeholder="total penerimaan" class="form-control" />
										<script language="JavaScript">
										var rupiah = document.getElementById('e_limit');
										rupiah.addEventListener('keyup', function(e) {
											rup = this.value.replace(/\D/g, '');
											$('#e_limit_v').val(rup);
											rupiah.value = formatRupiah(this.value, 'Rp. ');
										});

										function formatRupiah(angka, prefix) {
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
									</div>

									<div class="form-group">
										<label>Nama Vendor</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_vendor2" id="e_vendor2">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($myvendor as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

								</div>
							</div>

							<div class="card-body">
								<b>PERANGKAT</b>
								<hr>
								<div class="form-group">
									<label>Media Koneksi</label>
									<select readonly class="form-control select2" style="width: 100%;" name="e_media_koneksi2" id="e_media_koneksi2">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($mymediakoneksi as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Jenis Perangkat VOIP</label>
									<select readonly class="form-control select2" style="width: 100%;" name="e_jenis_perangkat2" id="e_jenis_perangkat2">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($myjenisperangkat as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Merek Perangkat VOIP</label>
									<select readonly class="form-control select2" style="width: 100%;" name="e_merek_perangkat2" id="e_merek_perangkat2">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($mymerekperangkat as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Status Kepemilikan Perangkat</label>
									<select readonly class="form-control select2" style="width: 100%;" name="e_status_kepemilikan2" id="e_status_kepemilikan2">
										<option value="" selected="selected">-- Pilih --</option>
										<?php foreach ($mystatuskepemilikanperangkat as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Serial Number</label>
									<input readonly type="text" id="e_serialnumber2" name="e_serialnumber2" class="form-control" placeholder="Serial Number Perangkat"></input>
								</div>

								<div class="form-group">
									<label>Keterangan</label>
									<textarea readonly type="text" id="e_keterangan2" name="e_keterangan2" class="form-control" placeholder="Keterangan"></textarea>
								</div>

							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
					
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Kembali
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<!-- Default box -->


	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar Data VOIP</h3>
		</div>
		<br>
		<div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Data VOIP</button>
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
							Nomor VOIP
						</th>
						<th class="text-center">
							Nama Pelanggan
						</th>
						<th class="text-center">
							Alamat
						</th>
						<th class="text-center">
							Limit Pemakaian
						</th>
						<th class="text-center">
							Nama Vendor
						</th>
						<th class="text-center">
							Status
						</th>
						<th class="text-center">
							Media Koneksi
						</th>
						<th class="text-center">
							Jenis Perangkat Voip
						</th>
						<th class="text-center">
							Merek Perangkat
						</th>
						<th class="text-center">
							Status Kepemilikan
						</th>
						<th class="text-center">
							Serial Number
						</th>
						<th class="text-center">
							Keterangan
						</th>
						<th style="width:16%" class="text-center">
							Actions
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
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				nama: {
					required: true
				},

				keterangan: {
					required: true
				},
			},
			messages: {

				nama: {
					required: "Wajib diisi!"
				},

				keterangan: {
					required: "Wajib diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/datavoip/simpan') ?>",
					type: "POST",
					data: $('#formTambah').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
							$("select.select2").select2('data', {}); // clear out values selected
							$("select.select2").select2({
								allowClear: true
							}); //
						} else if (response == 401) {
							swalIdDouble();
						} else {
							swalInputFailed("Data Duplicate");
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
					url: "<?php echo base_url('administrator/datavoip/delete') ?>",
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
			url: '<?php echo site_url('administrator/datavoip/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					if (data[i].status == '1') {
						status = '<td class="text-left">' +
							'   <button  class="btn btn-primary btn-sm item_non"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-check"> </i>  Aktif </button>' +
							'</a> &nbsp' +
							'</td>'
					} else {
						status = '<td class="text-left">' +
							'   <button  class="btn btn-danger btn-sm item_approve"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-times"> </i>  Non Aktif </button>' +
							'</button> &nbsp' +
							'</td>'
					}
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].nomor + '</td>' +
						'<td class="text-left">' + data[i].nama + '</td>' +
						'<td class="text-left">' + data[i].alamat + '</td>' +
						'<td class="text-left">' + data[i].Nominal + '</td>' +
						'<td class="text-left">' + data[i].nama_vendor + '</td>' +
						status+
						'<td class="text-left">' + data[i].nama_media_koneksi + '</td>' +
						'<td class="text-left">' + data[i].nama_jenis_perangkat + '</td>' +
						'<td class="text-left">' + data[i].nama_merek + '</td>' +
						'<td class="text-left">' + data[i].nama_kepemilikan + '</td>' +
						'<td class="text-left">' + data[i].serialnumber + '</td>' +
						'<td class="text-left">' + data[i].keterangan + '</td>' +
						'<td class="project-actions text-right">' +
						'   <button  class="btn btn-info btn-sm item_edit2"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-search"> </i>  Preview </a>' +
						'</button> ' +
						'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-folder"> </i>  Edit </a>' +
						'</button> &nbsp' +
						'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-trash"> </i>  Hapus </a>' +
						'</button> ' +
						'</td>' +
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
						"dom": "Bfrtip",
			"buttons": [
				"excel"
			],
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
			url: "<?php echo base_url('administrator/datavoip/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].nama);
				$('#e_nomor').val(data[0].nomor);
				$('#e_alamat').val(data[0].alamat);
				$('#e_vendor').val(data[0].vendor).select2();

				var a = ConvertFormatRupiah(data[0].limit_pemakaian, 'Rp. ');
				$('#e_limit').val(a);
				$('#e_limit_v').val(data[0].limit_pemakaian);

				$('#e_media_koneksi').val(data[0].media_koneksi).select2();
				$('#e_jenis_perangkat').val(data[0].jenis_perangkat).select2();
				$('#e_merek_perangkat').val(data[0].merek_perangkat).select2();
				$('#e_status_kepemilikan').val(data[0].status_kepemilikan_perangkat).select2();
				$('#e_serialnumber').val(data[0].serialnumber);
				$('#e_keterangan').val(data[0].keterangan);

			}
		});
	});

	//get data for update record
	$('#show_data').on('click', '.item_edit2', function() {
		document.getElementById("formEdit2").reset();
		var id = $(this).data('id');
		$('#modalEdit2').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/datavoip/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id2').val(data[0].id);
				$('#e_nama2').val(data[0].nama);
				$('#e_nomor2').val(data[0].nomor);
				$('#e_alamat2').val(data[0].alamat);
				$('#e_vendor2').val(data[0].vendor).select2();

				var a = ConvertFormatRupiah(data[0].limit_pemakaian, 'Rp. ');
				$('#e_limit2').val(a);
				$('#e_limit_v2').val(data[0].limit_pemakaian);

				$('#e_media_koneksi2').val(data[0].media_koneksi).select2();
				$('#e_jenis_perangkat2').val(data[0].jenis_perangkat).select2();
				$('#e_merek_perangkat2').val(data[0].merek_perangkat).select2();
				$('#e_status_kepemilikan2').val(data[0].status_kepemilikan_perangkat).select2();
				$('#e_serialnumber2').val(data[0].serialnumber);
				$('#e_keterangan2').val(data[0].keterangan);

			}
		});
	});

	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				e_nama: {
					required: true
				},

				e_keterangan: {
					required: true
				},

			},
			messages: {
				e_nama: {
					required: "Wajib diisi!"
				},

				e_keterangan: {
					required: "Wajib diisi!"
				},

			},
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/datavoip/update') ?>",
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
						} else if (response == 401) {
							swalIdDouble();
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
		$('.select2').select2();
		$('#table_id').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
			"dom": "Bfrtip",
			"buttons": [
				"excel"
			],
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

	$('#show_data').on('click', '.item_approve', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda mengubah status pelanggan menjadi aktif",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Aktifkan!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/datavoip/aktif') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terupdate!',
							'User Telah Aktif',
							'success'
						)
					}
				});
			}
		})
	})

	$('#show_data').on('click', '.item_non', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda mengubah status pelanggan menjadi aktif",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Non Aktifkan!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/datavoip/nonaktif') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terupdate!',
							'User Telah Non Aktif',
							'success'
						)
					}
				});
			}
		})
	})
</script>
