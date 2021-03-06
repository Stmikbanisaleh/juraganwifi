<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Data Inventori</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<div class="form-group">
										<label>Nama Inventori</label>
										<input required type="text" id="nama" name="nama" class="form-control" placeholder="Nama Inventori">
									</div>

									<div class="form-group">
										<label>Nomor Inventori</label>
										<input required type="text" id="nomor" name="nomor" class="form-control" placeholder="Nomor Inventori">
									</div>

									<div class="form-group">
										<label>Label Inventori</label>
										<input type="text" id="label" name="label" class="form-control" placeholder="Label Inventori">
									</div>

									<div class="form-group">
										<label>Kategori Inventori</label>
										<select class="form-control select2" style="width: 100%;" name="kategori" id="kategori">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mykategori as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Tanggal Pembelian</label>
										<input type="date" id="tglpembelian" name="tglpembelian" class="form-control" placeholder="Tanggal Pembelian"></input>
									</div>

									<div class="form-group">
										<label>Fungsi</label>
										<input type="text" id="fungsi" name="fungsi" class="form-control" placeholder="Fungsi"></input>
									</div>

									<div class="form-group">
										<label>Ukuran</label>
										<input type="text" id="ukuran" name="ukuran" class="form-control" placeholder="Ukuran"></input>
									</div>

									<div class="form-group">
										<label>Merk Perangkat</label>
										<select required class="form-control select2" style="width: 100%;" name="merek" id="merek">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mymerek as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Type</label>
										<input type="text" id="type" name="type" class="form-control" placeholder="Type"></input>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<div class="form-group">
										<label>Status Kepemilikan</label>
										<select class="form-control select2" style="width: 100%;" name="statuskepemilikan" id="statuskepemilikan">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mystatuskepemilikan as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Serial Number</label>
										<input type="text" id="serialnumber" name="serialnumber" class="form-control" placeholder="Serial Number">
									</div>

									<div class="form-group">
										<label>MAC Address</label>
										<input type="text" id="macaddress" name="macaddress" class="form-control" placeholder="MAC Address">
									</div>

									<div class="form-group">
										<label>Alokasi</label>
										<input type="text" id="alokasi" name="alokasi" class="form-control" placeholder="Alokasi">
									</div>

									<div class="form-group">
										<label>Penanggung Jawab</label>
										<input type="text" id="penanggungjawab" name="penanggungjawab" class="form-control" placeholder="Penanggung Jawab">
									</div>

									<div class="form-group">
										<label>File</label>
										<input type="file" id="foto" name="foto" class="form-control" placeholder="Penanggung Jawab">
									</div>

									<div class="form-group">
										<label>Keterangan</label>
										<textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
									</div>
								</div>
							</div>
						</div>
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
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Data Inventori</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<div class="form-group">
										<label>Nama Inventori</label>
										<input required type="hidden" id="e_id" name="e_id" class="form-control">
										<input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama Inventori">
									</div>

									<div class="form-group">
										<label>Nomor Inventori</label>
										<input required type="text" id="e_nomor" name="e_nomor" class="form-control" placeholder="Nomor Inventori">
									</div>

									<div class="form-group">
										<label>Label Inventori</label>
										<input type="text" id="e_label" name="e_label" class="form-control" placeholder="Label Inventori">
									</div>

									<div class="form-group">
										<label>Kategori Inventori</label>
										<select class="form-control select2" style="width: 100%;" name="e_kategori" id="e_kategori">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mykategori as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Tanggal Pembelian</label>
										<input type="date" id="e_tglpembelian" name="e_tglpembelian" class="form-control" placeholder="Tanggal Pembelian"></input>
									</div>

									<div class="form-group">
										<label>Fungsi</label>
										<input type="text" id="e_fungsi" name="e_fungsi" class="form-control" placeholder="Fungsi"></input>
									</div>

									<div class="form-group">
										<label>Ukuran</label>
										<input type="text" id="e_ukuran" name="e_ukuran" class="form-control" placeholder="Ukuran"></input>
									</div>

									<div class="form-group">
										<label>Merek Perangkat</label>
										<select required class="form-control select2" style="width: 100%;" name="e_merek" id="e_merek">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mymerek as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Type</label>
										<input type="text" id="e_type" name="e_type" class="form-control" placeholder="Type"></input>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<div class="form-group">
										<label>Status Kepemilikan</label>
										<select class="form-control select2" style="width: 100%;" name="e_statuskepemilikan" id="e_statuskepemilikan">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mystatuskepemilikan as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Serial Number</label>
										<input type="text" id="e_serialnumber" name="e_serialnumber" class="form-control" placeholder="Serial Number">
									</div>

									<div class="form-group">
										<label>MAC Address</label>
										<input type="text" id="e_macaddress" name="e_macaddress" class="form-control" placeholder="MAC Address">
									</div>

									<div class="form-group">
										<label>Alokasi</label>
										<input type="text" id="e_alokasi" name="e_alokasi" class="form-control" placeholder="Alokasi">
									</div>

									<div class="form-group">
										<label>Penanggung Jawab</label>
										<input type="text" id="e_penanggungjawab" name="e_penanggungjawab" class="form-control" placeholder="Penanggung Jawab">
									</div>

									<div class="form-group">
										<label>File</label>
										<input type="file" id="e_foto" name="e_foto" class="form-control" placeholder="Penanggung Jawab">
									</div>

									<div class="form-group">
										<label>Keterangan</label>
										<textarea type="text" id="e_keterangan" name="e_keterangan" class="form-control" placeholder="Keterangan"></textarea>
									</div>
								</div>
							</div>
						</div>
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
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit2">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Data Inventori</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<div class="form-group">
										<label>Nama Inventori</label>
										<input required type="hidden" id="e_id" name="e_id" class="form-control">
										<input readonly required type="text" id="e_nama2" name="e_nama2" class="form-control" placeholder="Nama Inventori">
									</div>

									<div class="form-group">
										<label>Nomor Inventori</label>
										<input readonly required type="text" id="e_nomor2" name="e_nomor2" class="form-control" placeholder="Nomor Inventori">
									</div>

									<div class="form-group">
										<label>Label Inventori</label>
										<input readonly type="text" id="e_label2" name="e_label2" class="form-control" placeholder="Label Inventori">
									</div>

									<div class="form-group">
										<label>Kategori Inventori</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_kategori2" id="e_kategori2">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mykategori as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Tanggal Pembelian</label>
										<input readonly type="date" id="e_tglpembelian2" name="e_tglpembelian2" class="form-control" placeholder="Tanggal Pembelian"></input>
									</div>

									<div class="form-group">
										<label>Fungsi</label>
										<input readonly type="text" id="e_fungsi2" name="e_fungsi2" class="form-control" placeholder="Fungsi"></input>
									</div>

									<div class="form-group">
										<label>Ukuran</label>
										<input readonly type="text" id="e_ukuran2" name="e_ukuran2" class="form-control" placeholder="Ukuran"></input>
									</div>

									<div class="form-group">
										<label>Merek Perangkat</label>
										<select readonly required class="form-control select2" style="width: 100%;" name="e_merek2" id="e_merek2">
											<option value="" selected="selected">-- Pilih --</option>
											<?php foreach ($mymerek as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Type</label>
										<input readonly type="text" id="e_type2" name="e_type2" class="form-control" placeholder="Type"></input>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<div class="form-group">
										<label>Status Kepemilikan</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_statuskepemilikan2" id="e_statuskepemilikan2">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mystatuskepemilikan as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Serial Number</label>
										<input readonly type="text" id="e_serialnumber2" name="e_serialnumber2" class="form-control" placeholder="Serial Number">
									</div>

									<div class="form-group">
										<label>MAC Address</label>
										<input readonly type="text" id="e_macaddress2" name="e_macaddress2" class="form-control" placeholder="MAC Address">
									</div>

									<div class="form-group">
										<label>Alokasi</label>
										<input readonly type="text" id="e_alokasi2" name="e_alokasi2" class="form-control" placeholder="Alokasi">
									</div>

									<div class="form-group">
										<label>Penanggung Jawab</label>
										<input readonly type="text" id="e_penanggungjawab2" name="e_penanggungjawab2" class="form-control" placeholder="Penanggung Jawab">
									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<textarea readonly type="text" id="e_keterangan2" name="e_keterangan2" class="form-control" placeholder="Keterangan"></textarea>
									</div>
								</div>
							</div>
						</div>
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

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar Data Inventori</h3>
		</div>
		<br>
		<?php
		$session = $this->session->userdata('level');
		if ($session == 1 || $session == 2 || $session == 3) { ?>
			<div class="col-sm-2">
				<button href="#modalTambah" id="modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Data Inventori</button>
			</div>
		<?php } ?>
		<br>
		<div class="card-body p-0">
			<table id="table_id" class="table table-bordered table-hover projects">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th class="text-center">
							Nama Inventori
						</th>
						<th class="text-center">
							Nomor Inventori
						</th>
						<th class="text-center">
							Nama Label
						</th>
						<th class="text-center">
							Tanggal Pembelian
						</th>
						<th class="text-center">
							Fungsi
						</th>
						<th class="text-center">
							Merk
						</th>
						<th class="text-center">
							Serial Number
						</th>
						<th class="text-center">
							Mac Address
						</th>
						<th class="text-center">
							Penanggung Jawab
						</th>
						<th class="text-center">
							Foto
						</th>
						<th style="width:18%" class="text-center">
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
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/datainventori/simpan') ?>",
					type: "POST",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
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
							}); // re-init to show default status
						} else if (response == 401) {
							swalIdDouble();
						} else {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
							$("select.select2").select2('data', {}); // clear out values selected
							$("select.select2").select2({
								allowClear: true
							}); // re-init to show default status
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
					url: "<?php echo base_url('administrator/datainventori/delete') ?>",
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
			url: '<?php echo site_url('administrator/datainventori/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var level = <?= $this->session->userdata('level'); ?>;
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					var foto = '';
					var button ='';
					if (data[i].foto != null) {
						foto = '<td ><a href="<?php echo site_url('/assets/inventori/') ?>' + data[i].foto + '"> <img style="width:80px; height: 60px;" src="<?php echo site_url('/assets/inventori/') ?>' + data[i].foto + '""></a></td>'
					} else {
						foto = '<td >Foto Tidak Tersedia</td>'
					}
					if (level == 1) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-info btn-sm item_edit2"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-search"> </i>  Preview </a>' +
							'</button> ' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-trash"> </i>  Hapus </a>' +
							'</button> ' +
							'</td>'
					} else if (level == 2) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-info btn-sm item_prev"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-search"> </i>  Preview </a>' +
							'</button> ' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-trash"> </i>  Hapus </a>' +
							'</button> ' +
							'</td>'
					} else if (level == 3) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-info btn-sm item_prev"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-search"> </i>  Preview </a>' +
							'</button> ' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-trash"> </i>  Hapus </a>' +
							'</button> ' +
							'</td>'
					} else if (level == 4) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-info btn-sm item_prev"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-search"> </i>  Preview </a>' +
							'</button> ' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'</td>'
					} else if (level == 5) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-info btn-sm item_prev"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-search"> </i>  Preview </a>' +
							'</button> &nbsp' +
							'</td>'
					}
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].nama + '</td>' +
						'<td class="text-left">' + data[i].nomor + '</td>' +
						'<td class="text-left">' + data[i].label + '</td>' +
						'<td class="text-left">' + data[i].tgl_pembelian + '</td>' +
						'<td class="text-left">' + data[i].fungsi + '</td>' +
						'<td class="text-left">' + data[i].nama_merek + '</td>' +
						'<td class="text-left">' + data[i].serial_number + '</td>' +
						'<td class="text-left">' + data[i].mac_address + '</td>' +
						'<td class="text-left">' + data[i].penanggung_jawab + '</td>' +
						foto +
						button +
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
			url: "<?php echo base_url('administrator/datainventori/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].nama);
				$('#e_nomor').val(data[0].nomor);
				$('#e_label').val(data[0].label);
				$('#e_keterangan').val(data[0].keterangan);
				$('#e_kategori').val(data[0].kategori).select2();
				$('#e_tglpembelian').val(data[0].tgl_pembelian);
				$('#e_fungsi').val(data[0].fungsi);
				$('#e_ukuran').val(data[0].ukuran);
				$('#e_merek').val(data[0].merek).select2();
				$('#e_type').val(data[0].type);
				$('#e_statuskepemilikan').val(data[0].status_kepemilikan).select2();
				$('#e_serialnumber').val(data[0].serial_number);
				$('#e_macaddress').val(data[0].mac_address);
				$('#e_alokasi').val(data[0].alokasi);
				$('#e_penanggungjawab').val(data[0].penanggung_jawab);
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
			url: "<?php echo base_url('administrator/datainventori/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id2').val(data[0].id);
				$('#e_nama2').val(data[0].nama);
				$('#e_nomor2').val(data[0].nomor);
				$('#e_label2').val(data[0].label);
				$('#e_keterangan2').val(data[0].keterangan);
				$('#e_kategori2').val(data[0].kategori).select2();
				$('#e_tglpembelian2').val(data[0].tgl_pembelian);
				$('#e_fungsi2').val(data[0].fungsi);
				$('#e_ukuran2').val(data[0].ukuran);
				$('#e_merek2').val(data[0].merek).select2();
				$('#e_type2').val(data[0].type);
				$('#e_statuskepemilikan2').val(data[0].status_kepemilikan).select2();
				$('#e_serialnumber2').val(data[0].serial_number);
				$('#e_macaddress2').val(data[0].mac_address);
				$('#e_alokasi2').val(data[0].alokasi);
				$('#e_penanggungjawab2').val(data[0].penanggung_jawab);
				$('#e_keterangan2').val(data[0].keterangan);

			}
		});
	});

	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/datainventori/update') ?>",
					type: "POST",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
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
							document.getElementById("formEdit").reset();
							swalEditSuccess();
							show_data();
							$('#modalEdit').modal('hide');
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
			"dom": "Bfrtip",
			"buttons": [
				"excel"
			],
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
		});
	});
</script>
