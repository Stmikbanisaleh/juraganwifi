<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Vendor</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Nama Vendor</label>
								<input required type="text" id="nama" name="nama" class="form-control" placeholder="Nama Vendor">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
							</div>
							<div class="form-group">
								<label>Telephone</label>
								<input required type="text" id="telp" name="telp" class="form-control" placeholder="Telephone">
							</div>
							<div class="form-group">
								<label>Jenis Layanan Vendor</label>
								<select class="form-control select2" style="width: 100%;" name="layanan" id="layanan">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($myvendor as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Nama PIC</label>
								<input required type="text" id="nmpic" name="nmpic" class="form-control" placeholder="Nama PIC Vendor">
							</div>
							<div class="form-group">
								<label>Telp PIC Vendor</label>
								<input required type="text" id="telppic" name="telppic" class="form-control" placeholder="Telp PIC Vendor">
							</div>
							<div class="form-group">
								<label>Email PIC Vendor</label>
								<input type="email" id="emailpic" name="emailpic" class="form-control" placeholder="Email PIC Vendor">
							</div>
							<div class="form-group">
								<label>Alamat Website</label>
								<input type="text" id="website" name="website" class="form-control" placeholder="Alamat Website">
							</div>
							<div class="form-group">
								<label>Nomor NPWP</label>
								<input type="text" id="npwp" name="npwp" class="form-control" placeholder="Nomor NPWP">
							</div>
							<div class="form-group">
								<label>Upload NPWP</label>
								<input type="file" id="filenpwp" name="filenpwp" class="form-control" placeholder="Nomor NPWP">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_simpan" class="btn btn-sm btn-success pull-left">
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
							<h4 class="modal-title">Edit Vendor</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Nama Vendor</label>
								<input required type="hidden" id="e_id" name="e_id" >
								<input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama Vendor">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea type="text" id="e_alamat" name="e_alamat" class="form-control" placeholder="Alamat"></textarea>
							</div>
							<div class="form-group">
								<label>Telephone</label>
								<input required type="text" id="e_telp" name="e_telp" class="form-control" placeholder="Telephone">
							</div>
							<div class="form-group">
								<label>Jenis Layanan Vendor</label>
								<select class="form-control select2" style="width: 100%;" name="e_layanan" id="e_layanan">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($myvendor as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Nama PIC Vendor</label>
								<input required type="text" id="e_nmpic" name="e_nmpic" class="form-control" placeholder="Nama PIC Vendor">
							</div>
							<div class="form-group">
								<label>Telp PIC Vendor</label>
								<input required type="text" id="e_telppic" name="e_telppic" class="form-control" placeholder="Telp PIC Vendor">
							</div>
							<div class="form-group">
								<label>Email PIC Vendor</label>
								<input type="email" id="e_emailpic" name="e_emailpic" class="form-control" placeholder="Email PIC Vendor">
							</div>
							<div class="form-group">
								<label>Alamat Website</label>
								<input type="text" id="e_website" name="e_website" class="form-control" placeholder="Alamat Website">
							</div>
							<div class="form-group">
								<label>Nomor NPWP</label>
								<input type="text" id="e_npwp" name="e_npwp" class="form-control" placeholder="Nomor NPWP">
							</div>
							<div class="form-group">
								<label>Upload NPWP</label>
								<input type="file" id="e_filenpwp" name="e_filenpwp" class="form-control" placeholder="Nomor NPWP">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<textarea type="text" id="e_keterangan" name="e_keterangan" class="form-control" placeholder="Keterangan"></textarea>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_edit" class="btn btn-sm btn-success pull-left">
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



	<div id="modalEdit2" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit2">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Vendor</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Nama Vendor</label>
								<input required type="hidden" id="e_id" name="e_id" >
								<input readonly required type="text" id="e_nama2" name="e_nama2" class="form-control" placeholder="Nama Vendor">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea readonly type="text" id="e_alamat2" name="e_alamat2" class="form-control" placeholder="Alamat"></textarea>
							</div>
							<div class="form-group">
								<label>Telephone</label>
								<input readonly  required type="text" id="e_telp2" name="e_telp2" class="form-control" placeholder="Telephone">
							</div>
							<div class="form-group">
								<label>Jenis Layanan Vendor</label>
								<select class="form-control select2" readonly style="width: 100%;" name="e_layanan2" id="e_layanan2">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($myvendor as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Nama PIC Vendor</label>
								<input readonly required type="text" id="e_nmpic2" name="e_nmpic2" class="form-control" placeholder="Nama PIC Vendor">
							</div>
							<div class="form-group">
								<label>Telp PIC Vendor</label>
								<input readonly required type="text" id="e_telppic2" name="e_telppic2" class="form-control" placeholder="Telp PIC Vendor">
							</div>
							<div class="form-group">
								<label>Email PIC Vendor</label>
								<input readonly type="email" id="e_emailpic2" name="e_emailpic2" class="form-control" placeholder="Email PIC Vendor">
							</div>
							<div class="form-group">
								<label>Alamat Website</label>
								<input readonly type="text" id="e_website2" name="e_website2" class="form-control" placeholder="Alamat Website">
							</div>
							<div class="form-group">
								<label>Nomor NPWP</label>
								<input readonly type="text" id="e_npwp2" name="e_npwp2" class="form-control" placeholder="Nomor NPWP">
							</div>
						
							<div class="form-group">
								<label>Keterangan</label>
								<textarea readonly type="text" id="e_keterangan2" name="e_keterangan2" class="form-control" placeholder="Keterangan"></textarea>
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
			<h3 class="card-title">Daftar Vendor</h3>
		</div>
		<br>
		<?php
		$session = $this->session->userdata('level');
		if ($session == 1 || $session == 2 || $session == 3) { ?>
		<div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Vendor</button>
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
							Nama Vendor
						</th>
						<th class="text-center">
							Alamat
						</th>
						<th class="text-center">
							Telp
						</th>
						<th class="text-center">
							PIC
						</th>
						<th class="text-center">
							Telp PIC
						</th>
						<th class="text-center">
							Email 
						</th>
						<th class="text-center">
							Website 
						</th>
						<th class="text-center">
							Nomor NPWP 
						</th>
						<th class="text-center">
							File NPWP 
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
					required: "Nama Jenis IP harus diisi!"
				},

				keterangan: {
					required: "Keterangan harus diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/datavendor/simpan') ?>",
					type: "POST",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function(response) {
						console.log(response);
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah").reset();
						
							show_data();
							$('#modalTambah').modal('hide');
							$("select.select2").select2('data', {}); // clear out values selected
							$("select.select2").select2({
								allowClear: true
							}); //
						} else if (response == 401) {
							swalIdDouble();
						} else {
							swalInputSuccess();
							$('#modalTambah').modal('hide');
							document.getElementById("formTambah").reset();
							show_data();
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
					url: "<?php echo base_url('administrator/datavendor/delete') ?>",
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
			url: '<?php echo site_url('administrator/datavendor/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var level = <?= $this->session->userdata('level'); ?>;
				var button ='';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					if (level == 1) {
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
						'<td class="text-left">' + data[i].alamat + '</td>' +
						'<td class="text-left">' + data[i].telp + '</td>' +
						'<td class="text-left">' + data[i].pic_vendor + '</td>' +
						'<td class="text-left">' + data[i].telp_pic + '</td>' +
						'<td class="text-left">' + data[i].email + '</td>' +
						'<td class="text-left">' + data[i].website + '</td>' +
						'<td class="text-left">' + data[i].npwp + '</td>' +
						'<td class="text-left">' +
						'   <a href="<?php echo base_url().'assets/vendor/npwp/'?>'+data[i].file_npwp+'" target="_blank" class="btn btn-success btn-sm"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-download"> </i>  Download </a>' +
						'</a> &nbsp' +
						 '</td>' +
						'<td class="text-left">' + data[i].keterangan + '</td>' +
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
			url: "<?php echo base_url('administrator/datavendor/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_alamat').val(data[0].alamat);
				$('#e_nama').val(data[0].nama);
				$('#e_keterangan').val(data[0].keterangan);
				$('#e_npwp').val(data[0].npwp);
				$('#e_website').val(data[0].website);
				$('#e_layanan').val(data[0].jenis_layanan).select2();
				$('#e_telppic').val(data[0].telp_pic);
				$('#e_emailpic').val(data[0].email);
				$('#e_nmpic').val(data[0].pic_vendor);
				$('#e_telp').val(data[0].telp);
			}
		});
	});

	//get data for update record
	$('#show_data').on('click', '.item_prev', function() {
		document.getElementById("formEdit2").reset();
		var id = $(this).data('id');
		$('#modalEdit2').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/datavendor/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id2').val(data[0].id);
				$('#e_alamat2').val(data[0].alamat);
				$('#e_nama2').val(data[0].nama);
				$('#e_keterangan2').val(data[0].keterangan);
				$('#e_npwp2').val(data[0].npwp);
				$('#e_website2').val(data[0].website);
				$('#e_layanan2').val(data[0].jenis_layanan).select2();
				$('#e_telppic2').val(data[0].telp_pic);
				$('#e_emailpic2').val(data[0].email);
				$('#e_nmpic2').val(data[0].pic_vendor);
				$('#e_telp2').val(data[0].telp);
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
					url: "<?php echo base_url('administrator/datavendor/update') ?>",
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
		$('.select2').select2();
		show_data();
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
