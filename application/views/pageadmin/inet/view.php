<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Data INET </h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Nama Operator</label>
								<select class="form-control select2" style="width: 100%;" name="nama" id="nama">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($myoperator as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Nomor PSTN</label>
								<input type="text" id="nomor_pstn" name="nomor_pstn" class="form-control" placeholder="Nomor PSTN"></input>
							</div>

							<div class="form-group">
								<label>Nomor INET</label>
								<input type="text" id="nomor_inet" name="nomor_inet" class="form-control" placeholder="Nomor INET"></input>
							</div>

							<div class="form-group">
								<label>Password INET</label>
								<input type="text" id="password_inet" name="password_inet" class="form-control" placeholder="Password INET"></input>
							</div>

							<div class="form-group">
								<label>Kapasitas</label>
								<input type="text" id="kapasitas" name="kapasitas" class="form-control" placeholder="Kapasitas"></input>
							</div>

							<div class="form-group">
								<label>Alokasi</label>
								<input type="text" id="alokasi" name="alokasi" class="form-control" placeholder="Alokasi"></input>
							</div>

							<div class="form-group">
								<label>Status</label>
								<select class="form-control select2" style="width: 100%;" name="status" id="status">
									<option value="" selected="selected">-- Pilih --</option>
									<option value="1">-- Active --</option>
									<option value="0">-- Inactive --</option>
								</select>
							</div>

							<div class="form-group">
								<label>Alamat</label>
								<textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Alamat"></textarea>
							</div>

							<div class="form-group">
								<label>Keterangan</label>
								<textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Keterangan"></textarea>
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
							<h4 class="modal-title">Edit Data INET</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Nama Operator</label>
								<select class="form-control select2" style="width: 100%;" name="e_nama" id="e_nama">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($myoperator as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Nomor PSTN</label>
								<input type="hidden" id="e_id" name="e_id" ></input>
								<input type="text" id="e_nomor_pstn" name="e_nomor_pstn" class="form-control" placeholder="Nomor PSTN"></input>
							</div>

							<div class="form-group">
								<label>Nomor INET</label>
								<input type="text" id="e_nomor_inet" name="e_nomor_inet" class="form-control" placeholder="Nomor INET"></input>
							</div>

							<div class="form-group">
								<label>Password INET</label>
								<input type="text" id="e_password_inet" name="e_password_inet" class="form-control" placeholder="Password INET"></input>
							</div>

							<div class="form-group">
								<label>Kapasitas</label>
								<input type="text" id="e_kapasitas" name="e_kapasitas" class="form-control" placeholder="Kapasitas"></input>
							</div>

							<div class="form-group">
								<label>Alokasi</label>
								<input type="text" id="e_alokasi" name="e_alokasi" class="form-control" placeholder="Alokasi"></input>
							</div>

							<div class="form-group">
								<label>Status</label>
								<select class="form-control select2" style="width: 100%;" name="e_status" id="e_status">
									<option value="" selected="selected">-- Pilih --</option>
									<option value="1">-- Active --</option>
									<option value="0">-- Inactive --</option>
								</select>
							</div>

							<div class="form-group">
								<label>Alamat</label>
								<textarea type="text" id="e_keterangan" name="e_keterangan" class="form-control" placeholder="Keterangan"></textarea>
							</div>

							<div class="form-group">
								<label>Keterangan</label>
								<textarea type="text" id="e_alamat" name="e_alamat" class="form-control" placeholder="Keterangan"></textarea>
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
			<h3 class="card-title">Daftar Pengguna INET</h3>
		</div>
		<br>
		<?php
		$session = $this->session->userdata('level');
		if ($session == 1 || $session == 2 || $session == 3) { ?>
		<div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary">
				<a class="ace-icon fa fa-plus bigger-120"></a> Add INET</button>
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
							Nama Operator
						</th>
						<th class="text-center">
							Nomor PSTN
						</th>
						<th class="text-center">
							Nomor INET
						</th>
						<th class="text-center">
							Password INET
						</th>
						<th class="text-center">
							Kapasitas
						</th>
						<th class="text-center">
							Alokasi
						</th>
						<th class="text-center">
							Status
						</th>
						<th class="text-center">
							Alamat
						</th>
						<th class="text-center">
							Keterangan
						</th>
						<th style="width: 16%" class="text-center">
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
					url: "<?php echo base_url('administrator/inet/simpan') ?>",
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
					url: "<?php echo base_url('administrator/inet/delete') ?>",
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
			url: '<?php echo site_url('administrator/inet/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				var level = <?= $this->session->userdata('level'); ?>;
				var button ='';
				for (i = 0; i < data.length; i++) {
					if (level == 1) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-trash"> </i>  Hapus </a>' +
							'</button> ' +
							'</td>'
					} else if (level == 2) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-trash"> </i>  Hapus </a>' +
							'</button> ' +
							'</td>'
					} else if (level == 3) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-trash"> </i>  Hapus </a>' +
							'</button> ' +
							'</td>'
					} else if (level == 4) {
						button = '<td class="project-actions text-right">' +
							'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-folder"> </i>  Edit </a>' +
							'</button> &nbsp' +
							'</td>'
					} else if (level == 5) {
						button = '<td class="project-actions text-right">' +
							'</td>'
					}
					var status = '';
					if (data[i].status == 1 ) {
						status = '<td class="project-state"><span class="badge badge-success"> Active </span></td>'
					} else {
						status = '<td class="project-state"><span class="badge badge-danger"> Inactive </span></td>'
					}
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].nama_operator + '</td>' +
						'<td class="text-left">' + data[i].nomor_pstn + '</td>' +
						'<td class="text-left">' + data[i].nomor_inet + '</td>' +
						'<td class="text-left">' + data[i].password_inet + '</td>' +
						'<td class="text-left">' + data[i].kapasitas + '</td>' +
						'<td class="text-left">' + data[i].alokasi + '</td>' +
						status+
						'<td class="text-left">' + data[i].keterangan + '</td>' +
						'<td class="text-left">' + data[i].alamat + '</td>' +
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
			url: "<?php echo base_url('administrator/inet/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].nama).select2();
				$('#e_keterangan').val(data[0].keterangan);
				$('#e_alamat').val(data[0].alamat);
				$('#e_nomor_pstn').val(data[0].nomor_pstn);
				$('#e_nomor_inet').val(data[0].nomor_inet);
				$('#e_password_inet').val(data[0].password_inet);
				$('#e_kapasitas').val(data[0].kapasitas);
				$('#e_alokasi').val(data[0].alokasi);
				$('#e_status').val(data[0].status).select2();

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
					url: "<?php echo base_url('administrator/inet/update') ?>",
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

</script>
