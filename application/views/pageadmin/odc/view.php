<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add ODC</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Kode ODC</label>
								<input required type="text" id="nama" name="nama" class="form-control" placeholder="Kode ODC">
							</div>

							<div class="form-group">
								<label>Wilayah ODC</label>
								<select class="form-control select2" style="width: 100%;" name="wilayah" id="wilayah">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($mywilayah as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] . '- Kode Wilayah[' . $value['kode_wilayah'] . ']' ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Nomor Port OLT</label>
								<input type="number" id="olt" name="olt" class="form-control" placeholder="Nomor PORT OLT"></input>
							</div>

							<div class="form-group">
								<label>Warna Tube FO</label>
								<input type="text" id="fo" name="fo" class="form-control" placeholder="Warna Tube FO"></input>
							</div>

							<div class="form-group">
								<label>Nomor Tiang</label>
								<input type="text" id="nomor_tiang" name="nomor_tiang" class="form-control" placeholder="Nomor Tiang">
							</div>

							<div class="form-group">
								<label>Titik Kordinat</label>
								<input type="text" id="kordinat" name="kordinat" class="form-control" placeholder="Titik Kordinat"></input>
							</div>

							<div class="form-group">
								<label>Jumlah Port</label>
								<input type="number" id="jumlah_port" name="jumlah_port" class="form-control" placeholder="Jumlah Port"></input>
							</div>

							<div class="form-group">
								<label>Upload Dokumen</label>
								<input type="file" id="dokumen" name="dokumen" class="form-control" placeholder=""></input>
							</div>

							<div class="form-group">
								<label>Keterangan</label>
								<textarea type="text" id="Keterangan" name="Keterangan" class="form-control" placeholder="Keterangan"></textarea>
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
							<h4 class="modal-title">Edit ODC</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Kode ODC</label>
								<input type="hidden" id="e_id" name="e_id" class="form-control" placeholder="Kode ODC">
								<input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Kode ODC">
							</div>

							<div class="form-group">
								<label>Wilayah ODC</label>
								<select class="form-control select2" style="width: 100%;" name="e_wilayah" id="e_wilayah">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($mywilayah as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] . '- Kode Wilayah[' . $value['kode_wilayah'] . ']' ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Nomor Port OLT</label>
								<input type="number" id="e_olt" name="e_olt" class="form-control" placeholder="Nomor PORT OLT"></input>
							</div>

							<div class="form-group">
								<label>Warna Tube FO</label>
								<input type="text" id="e_fo" name="e_fo" class="form-control" placeholder="Warna Tube FO"></input>
							</div>

							<div class="form-group">
								<label>Nomor Tiang</label>
								<input type="text" id="e_nomor_tiang" name="e_nomor_tiang" class="form-control" placeholder="Nomor Tiang">
							</div>

							<div class="form-group">
								<label>Titik Kordinat</label>
								<input type="text" id="e_kordinat" name="e_kordinat" class="form-control" placeholder="Titik Kordinat"></input>
							</div>

							<div class="form-group">
								<label>Jumlah Port</label>
								<input type="number" id="e_jumlah_port" name="e_jumlah_port" class="form-control" placeholder="Jumlah Port"></input>
							</div>


							

							<div class="form-group">
								<label>Upload Dokumen</label>
								<input type="file" id="e_dokumen" name="e_dokumen" class="form-control" placeholder=""></input>
							</div>

							<div class="form-group">
								<label>Keterangan</label>
								<textarea type="text" id="e_Keterangan" name="e_Keterangan" class="form-control" placeholder="Keterangan"></textarea>
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
			<h3 class="card-title">Daftar ODC</h3>
		</div>
		<br>
		<div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add ODC</button>
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
							KODE ODC
						</th>
						<th class="text-center">
							Wilayah ODC
						</th>
						<th class="text-center">
							Nomor Tiang
						</th>
						<th class="text-center">
							Titik Kordinat
						</th>
						<th class="text-center">
							Jumlah PORT
						</th>
						<th class="text-center">
							Port OLT
						</th>
						<th class="text-center">
							Warna Tube FO
						</th>
						<th class="text-center">
							Document
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

				alamat: {
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

				alamat: {
					required: "Wajib diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/odc/simpan') ?>",
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
							}); //
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
							}); //

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
					url: "<?php echo base_url('administrator/odc/delete') ?>",
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
			url: '<?php echo site_url('administrator/odc/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					var foto = '';
					if (data[i].dokumen != null) {
						foto = '<td ><a href="<?php echo site_url('/assets/odc/') ?>' + data[i].dokumen + '"> <img style="width:80px; height: 60px;" src="<?php echo site_url('/assets/odc/') ?>' + data[i].dokumen + '""></a></td>'
					} else {
						foto = '<td class="text-left"> No Image</td>'
					}
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].kode + '</td>' +
						'<td class="text-left">' + data[i].nama_wilayah + '</td>' +
						'<td class="text-left">' + data[i].nomor_tiang + '</td>' +
						'<td class="text-left">' + data[i].titik_kordinat + '</td>' +
						'<td class="text-left">' + data[i].jumlah_port + '</td>' +
						'<td class="text-left">' + data[i].olt + '</td>' +
						'<td class="text-left">' + data[i].fo + '</td>' +
						foto+
						'<td class="text-left">' + data[i].keterangan + '</td>' +
						'<td class="project-actions text-right">' +
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
			url: "<?php echo base_url('administrator/odc/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].kode);
				$('#e_wilayah').val(data[0].wilayah).select2();
				$('#e_nomor_tiang').val(data[0].nomor_tiang);
				$('#e_kordinat').val(data[0].titik_kordinat);
				$('#e_jumlah_port').val(data[0].jumlah_port);
				$('#e_olt').val(data[0].olt);
				$('#e_fo').val(data[0].fo);
				$('#e_Keterangan').val(data[0].keterangan);
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

				e_alamat: {
					required: true
				},
			},
			messages: {
				e_nama: {
					required: "Nama Operator harus diisi!"
				},

				e_keterangan: {
					required: "Keterangan harus diisi!"
				},

				e_alamat: {
					required: "Alamat harus diisi!"
				},

			},
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/odc/update') ?>",
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
		$('#table_id').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
		});
	});
</script>
