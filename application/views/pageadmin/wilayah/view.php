<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Wilayah </h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>DATA WILAYAH</b>
									<hr>
									<div class="form-group">
										<label>Kode Wilayah</label>
										<input required type="text" id="kode" name="kode" class="form-control" placeholder="Kode Wilayah">
									</div>
									<div class="form-group">
										<label>Nama Wilayah</label>
										<input required type="text" id="nama" name="nama" class="form-control" placeholder="Nama Wilayah">
									</div>
									<div class="form-group">
										<label>Alamat Wilayah</label>
										<textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat Wilayah"></textarea>
									</div>
									<div class="form-group">
										<label>Nomor MOU</label>
										<input type="text" id="mou" name="mou" class="form-control" placeholder="Nomor MOU"></input>
									</div>
									<div class="form-group">
										<label>Titik Kordinat</label>
										<input type="text" id="kordinat" name="kordinat" class="form-control" placeholder="Titik Kordinat"></input>
									</div>
									<div class="form-group">
										<label>Nama PIC Wilayah</label>
										<input type="text" id="pic" name="pic" class="form-control" placeholder="Nama PIC Wilayah"></input>
									</div>
									<div class="form-group">
										<label>Jumlah Kepala Keluarga</label>
										<input type="number" id="jumlahkepalakeluarga" name="jumlahkepalakeluarga" class="form-control" placeholder="Jumlah Kepala Keluarga"></input>
									</div>
									<div class="form-group">
										<label>Nama Ketua RW</label>
										<input type="text" id="rw" name="rw" class="form-control" placeholder="Nama Ketua RW"></input>
									</div>
									<div class="form-group">
										<label>Telp Ketua RW</label>
										<input type="text" id="telprw" name="telprw" class="form-control" placeholder="Telp Ketua RW"></input>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<b>PERANGKAT</b>
									<hr>
									<div class="form-group">
										<label>Jumlah Tiang Mandiri</label>
										<input type="number" id="tiangmandiri" name="tiangmandiri" class="form-control" placeholder="Jumlah Tiang Mandiri">
									</div>
									<div class="form-group">
										<label>Jumlah Tiang Non Mandiri</label>
										<input type="number" id="tiangnonmandiri" name="tiangnonmandiri" class="form-control" placeholder="Jumlah Tiang Non Mandiri">
									</div>
									<div class="form-group">
										<label>Jumlah ODC</label>
										<input type="number" id="odc" name="odc" class="form-control" placeholder="Jumlah ODC"></input>
									</div>
									<div class="form-group">
										<label>Jumlah ODP</label>
										<input type="number" id="odp" name="odp" class="form-control" placeholder="Jumlah ODP"></input>
									</div>
									<div class="form-group">
										<label>Status Kepemilikan Listrik</label>
										<select class="form-control select2" style="width: 100%;" name="status_listrik" id="status_listrik">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mykepemilikanlistrik as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>ID Pelanggan PLN</label>
										<input type="number" id="idpelangganpln" name="idpelangganpln" class="form-control" placeholder="ID Pelanggan PLN"></input>
									</div>
									<div class="form-group">
										<label>Jenis Pembayaran Listrik</label>
										<select class="form-control select2" style="width: 100%;" name="jenis_pembayaran_listrik" id="jenis_pembayaran_listrik">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myjenispembayaranlistrik as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
									</div>
									<div class="form-group">
										<label>Upload Dokumen</label>
										<input type="file" id="dokumen" name="dokumen" class="form-control" placeholder="dokumen"></input>
									</div>
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
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Data Wilayah</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>DATA WILAYAH</b>
									<hr>
									<div class="form-group">
										<label>Kode Wilayah</label>
										<input required type="hidden" id="e_id" name="e_id" class="form-control" placeholder="Kode Wilayah">
										<input required type="text" id="e_kode" name="e_kode" class="form-control" placeholder="Kode Wilayah">
									</div>
									<div class="form-group">
										<label>Nama WIlayah</label>
										<input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama Wilayah">
									</div>
									<div class="form-group">
										<label>Alamat Wilayah</label>
										<textarea type="text" id="e_alamat" name="e_alamat" class="form-control" placeholder="Alamat Wilayah"></textarea>
									</div>
									<div class="form-group">
										<label>Nomor MOU</label>
										<input type="text" id="e_mou" name="e_mou" class="form-control" placeholder="Nomor MOU"></input>
									</div>
									<div class="form-group">
										<label>Titik Kordinat</label>
										<input type="text" id="e_kordinat" name="e_kordinat" class="form-control" placeholder="Titik Kordinat"></input>
									</div>
									<div class="form-group">
										<label>Nama PIC Wilayah</label>
										<input type="text" id="e_pic" name="e_pic" class="form-control" placeholder="Nama PIC Wilayah"></input>
									</div>
									<div class="form-group">
										<label>Jumlah Kepala Keluarga</label>
										<input type="number" id="e_jumlahkepalakeluarga" name="e_jumlahkepalakeluarga" class="form-control" placeholder="Jumlah Kepala Keluarga"></input>
									</div>
									<div class="form-group">
										<label>Nama Ketua RW</label>
										<input type="text" id="e_rw" name="e_rw" class="form-control" placeholder="Nama Ketua RW"></input>
									</div>
									<div class="form-group">
										<label>Telp Ketua RW</label>
										<input type="text" id="e_telprw" name="e_telprw" class="form-control" placeholder="Telp Ketua RW"></input>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<b>PERANGKAT</b>
									<hr>
									<div class="form-group">
										<label>Jumlah Tiang Mandiri</label>
										<input type="number" id="e_tiangmandiri" name="e_tiangmandiri" class="form-control" placeholder="Jumlah Tiang Mandiri">
									</div>
									<div class="form-group">
										<label>Jumlah Tiang Non Mandiri</label>
										<input type="number" id="e_tiangnonmandiri" name="e_tiangnonmandiri" class="form-control" placeholder="Jumlah Tiang Non Mandiri">
									</div>
									<div class="form-group">
										<label>Jumlah ODC</label>
										<input type="number" id="e_odc" name="e_odc" class="form-control" placeholder="Jumlah ODC"></input>
									</div>
									<div class="form-group">
										<label>Jumlah ODP</label>
										<input type="number" id="e_odp" name="e_odp" class="form-control" placeholder="Jumlah ODP"></input>
									</div>
									<div class="form-group">
										<label>Status Kepemilikan Listrik</label>
										<select class="form-control select2" style="width: 100%;" name="e_status_listrik" id="e_status_listrik">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mykepemilikanlistrik as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>ID Pelanggan PLN</label>
										<input type="number" id="e_idpelangganpln" name="e_idpelangganpln" class="form-control" placeholder="ID Pelanggan PLN"></input>
									</div>
									<div class="form-group">
										<label>Jenis Pembayaran Listrik</label>
										<select class="form-control select2" style="width: 100%;" name="e_jenis_pembayaran_listrik" id="e_jenis_pembayaran_listrik">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myjenispembayaranlistrik as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<textarea type="text" id="e_keterangan" name="e_keterangan" class="form-control" placeholder="Keterangan"></textarea>
									</div>
									<div class="form-group">
										<label>Upload Dokumen</label>
										<input type="file" id="e_dokumen" name="e_dokumen" class="form-control" placeholder="dokumen"></input>
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


	<div id="modalEdit2" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit2">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Data Wilayah</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>DATA WILAYAH</b>
									<hr>
									<div class="form-group">
										<label>Kode Wilayah</label>
										<input readonly required type="hidden" id="e_id" name="e_id" class="form-control" placeholder="Kode Wilayah">
										<input readonly required type="text" id="e_kode2" name="e_kode2" class="form-control" placeholder="Kode Wilayah">
									</div>
									<div class="form-group">
										<label>Nama WIlayah</label>
										<input readonly required type="text" id="e_nama2" name="e_nama2" class="form-control" placeholder="Nama Wilayah">
									</div>
									<div class="form-group">
										<label>Alamat Wilayah</label>
										<textarea  readonly type="text" id="e_alamat2" name="e_alamat2" class="form-control" placeholder="Alamat Wilayah"></textarea>
									</div>
									<div class="form-group">
										<label>Nomor MOU</label>
										<input readonly type="text" id="e_mou2" name="e_mou2" class="form-control" placeholder="Nomor MOU"></input>
									</div>
									<div class="form-group">
										<label>Titik Kordinat</label>
										<input readonly type="text" id="e_kordinat2" name="e_kordinat2" class="form-control" placeholder="Titik Kordinat"></input>
									</div>
									<div class="form-group">
										<label>Nama PIC Wilayah</label>
										<input readonly type="text" id="e_pic2" name="e_pic2" class="form-control" placeholder="Nama PIC Wilayah"></input>
									</div>
									<div class="form-group">
										<label>Jumlah Kepala Keluarga</label>
										<input readonly type="number" id="e_jumlahkepalakeluarga2" name="e_jumlahkepalakeluarga2" class="form-control" placeholder="Jumlah Kepala Keluarga"></input>
									</div>
									<div class="form-group">
										<label>Nama Ketua RW</label>
										<input readonly type="text" id="e_rw2" name="e_rw2" class="form-control" placeholder="Nama Ketua RW"></input>
									</div>
									<div class="form-group">
										<label>Telp Ketua RW</label>
										<input readonly type="text" id="e_telprw2" name="e_telprw2" class="form-control" placeholder="Telp Ketua RW"></input>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<b>PERANGKAT</b>
									<hr>
									<div class="form-group">
										<label>Jumlah Tiang Mandiri</label>
										<input readonly type="number" id="e_tiangmandiri2" name="e_tiangmandiri2" class="form-control" placeholder="Jumlah Tiang Mandiri">
									</div>
									<div class="form-group">
										<label>Jumlah Tiang Non Mandiri</label>
										<input readonly type="number" id="e_tiangnonmandiri2" name="e_tiangnonmandiri2" class="form-control" placeholder="Jumlah Tiang Non Mandiri">
									</div>
									<div class="form-group">
										<label>Jumlah ODC</label>
										<input readonly type="number" id="e_odc2" name="e_odc2" class="form-control" placeholder="Jumlah ODC"></input>
									</div>
									<div class="form-group">
										<label>Jumlah ODP</label>
										<input readonly type="number" id="e_odp2" name="e_odp2" class="form-control" placeholder="Jumlah ODP"></input>
									</div>
									<div class="form-group">
										<label>Status Kepemilikan Listrik</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_status_listrik2" id="e_status_listrik2">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mykepemilikanlistrik as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>ID Pelanggan PLN</label>
										<input readonly type="number" id="e_idpelangganpln2" name="e_idpelangganpln2" class="form-control" placeholder="ID Pelanggan PLN"></input>
									</div>
									<div class="form-group">
										<label>Jenis Pembayaran Listrik</label>
										<select  readonly class="form-control select2" style="width: 100%;" name="e_jenis_pembayaran_listrik2" id="e_jenis_pembayaran_listrik2">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myjenispembayaranlistrik as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
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


	<!-- Default box -->

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar Wilayah</h3>
		</div>
		<br>
		<?php
		$session = $this->session->userdata('level');
		if ($session == 1 || $session == 2 || $session == 3) { ?>
		<div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Wilayah</button>
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
							Kode Wilayah
						</th>
						<th class="text-center">
							Nama Wilayah
						</th>
						<th class="text-center">
							Alamat Wilayah
						</th>
						<th class="text-center">
							Nomor MOU
						</th>
						<th class="text-center">
							Titik Kordinat
						</th>
						<th class="text-center">
							Jumlah Tiang Mandiri
						</th>
						<th class="text-center">
							Jumlah Tiang Non Mandiri
						</th>
						<th class="text-center">
							Jumlah ODC
						</th>
						<th class="text-center">
							Jumlah ODP
						</th>
						<th class="text-center">
							Jumlah Kepala Keluarga
						</th>
						<th class="text-center">
							Status Kepemilikan Listrik
						</th>
						<th class="text-center">
							ID Pelanggan PLN
						</th>
						<th class="text-center">
							Jenis Pembayaran Listrik
						</th>
						<th class="text-center">
							PIC Wilayah
						</th>
						<th class="text-center">
							Nama Ketua RW
						</th>
						<th class="text-center">
							Telp Ketua RW
						</th>
						<th class="text-center">
							Telp Ketua RW
						</th>
						<th class="text-center">
							Document File
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
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/wilayah/simpan') ?>",
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
					url: "<?php echo base_url('administrator/wilayah/delete') ?>",
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
			url: '<?php echo site_url('administrator/wilayah/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var level = <?= $this->session->userdata('level'); ?>;
				var button ='';
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
					var doc = '';
					if(data[i].dokumen_mou != null || data[i].dokumen_mou != ""  ){
						doc = '<td ><a href="<?php echo site_url('/assets/wilayah/') ?>' + data[i].dokumen_mou + '"> <img style="width:80px; height: 60px;" src="<?php echo site_url('/assets/wilayah/') ?>' + data[i].dokumen_mou + '""></a></td>'
					} else {
						doc = '<td class="text-left"> Dokumen tidak Tersedia</td>'
					}
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].kode_wilayah + '</td>' +
						'<td class="text-left">' + data[i].nama + '</td>' +
						'<td class="text-left">' + data[i].alamat + '</td>' +
						'<td class="text-left">' + data[i].nomor_mou + '</td>' +
						'<td class="text-left">' + data[i].titik_kordinat + '</td>' +
						'<td class="text-left">' + data[i].jumlah_tiang_mandiri + '</td>' +
						'<td class="text-left">' + data[i].jumlah_tiang_non + '</td>' +
						'<td class="text-left">' + data[i].jumlah_odc + '</td>' +
						'<td class="text-left">' + data[i].jumlah_odp + '</td>' +
						'<td class="text-left">' + data[i].jumlah_kk + '</td>' +
						'<td class="text-left">' + data[i].status_kepemilikan_listrik + '</td>' +
						'<td class="text-left">' + data[i].id_pelanggan_pln + '</td>' +
						'<td class="text-left">' + data[i].jenis_pembayaran_listrik + '</td>' +
						'<td class="text-left">' + data[i].pic_wilayah + '</td>' +
						'<td class="text-left">' + data[i].nama_ketua_rw + '</td>' +
						'<td class="text-left">' + data[i].telp_ketua_rw + '</td>' +
						'<td class="text-left">' + data[i].keterangan + '</td>' +
						doc+
					button +
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
			url: "<?php echo base_url('administrator/wilayah/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].nama);
				$('#e_kode').val(data[0].kode_wilayah);
				$('#e_alamat').val(data[0].alamat);
				$('#e_mou').val(data[0].nomor_mou);
				$('#e_kordinat').val(data[0].titik_kordinat);
				$('#e_pic').val(data[0].pic_wilayah);
				$('#e_jumlahkepalakeluarga').val(data[0].jumlah_kk);
				$('#e_rw').val(data[0].nama_ketua_rw);
				$('#e_telprw').val(data[0].telp_ketua_rw);
				$('#e_tiangmandiri').val(data[0].jumlah_tiang_mandiri);
				$('#e_tiangnonmandiri').val(data[0].jumlah_tiang_non);
				$('#e_odc').val(data[0].jumlah_odc);
				$('#e_odp').val(data[0].jumlah_odp);
				$('#e_status_listrik').val(data[0].status_kepemilikan_listrik).select2();
				$('#e_idpelangganpln').val(data[0].id_pelanggan_pln);
				$('#e_jenis_pembayaran_listrik').val(data[0].jenis_pembayaran_listrik).select2();
				$('#e_keterangan').val(data[0].keterangan);
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
			url: "<?php echo base_url('administrator/wilayah/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id2').val(data[0].id);
				$('#e_nama2').val(data[0].nama);
				$('#e_kode2').val(data[0].kode_wilayah);
				$('#e_alamat2').val(data[0].alamat);
				$('#e_mou2').val(data[0].nomor_mou);
				$('#e_kordinat2').val(data[0].titik_kordinat);
				$('#e_pic2').val(data[0].pic_wilayah);
				$('#e_jumlahkepalakeluarga2').val(data[0].jumlah_kk);
				$('#e_rw2').val(data[0].nama_ketua_rw);
				$('#e_telprw2').val(data[0].telp_ketua_rw);
				$('#e_tiangmandiri2').val(data[0].jumlah_tiang_mandiri);
				$('#e_tiangnonmandiri2').val(data[0].jumlah_tiang_non);
				$('#e_odc2').val(data[0].jumlah_odc);
				$('#e_odp2').val(data[0].jumlah_odp);
				$('#e_status_listrik2').val(data[0].status_kepemilikan_listrik).select2();
				$('#e_idpelangganpln2').val(data[0].id_pelanggan_pln);
				$('#e_jenis_pembayaran_listrik2').val(data[0].jenis_pembayaran_listrik).select2();
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
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/wilayah/update') ?>",
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
