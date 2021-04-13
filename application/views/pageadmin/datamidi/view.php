<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Data Midi</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>DATA TOKO</b>
									<hr>
									<div class="form-group">
										<label>Kode Toko</label>
										<input required type="text" id="kode" name="kode" class="form-control" placeholder="Kode Toko">
									</div>

									<div class="form-group">
										<label>Nama Toko</label>
										<input required type="text" id="nama" name="nama" class="form-control" placeholder="Nama Toko">
									</div>

									<div class="form-group">
										<label>Alamat Toko</label>
										<textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat Toko"></textarea>
									</div>

									<div class="form-group">
										<label>DC Midi</label>
										<select class="form-control select2" style="width: 100%;" name="dcmidi" id="dcmidi">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mydcmidi as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Titik Kordinat</label>
										<input type="text" id="titik_kordinat" name="titik_kordinat" class="form-control" placeholder="Titik Kordinat">
									</div>

									<div class="form-group">
										<label>Nomor Telp Toko</label>
										<input type="text" id="telp_toko" name="telp_toko" class="form-control" placeholder="Nomor Telp Toko">
									</div>

									<div class="form-group">
										<label>Nama Pejabat Toko</label>
										<input type="text" id="nama_pejabat_toko" name="nama_pejabat_toko" class="form-control" placeholder="Nama Pejabat Toko">
									</div>

									<div class="form-group">
										<label>Telp Pejabat Toko</label>
										<input type="text" id="telp_pejabat" name="telp_pejabat" class="form-control" placeholder="Telp Pejabat Toko">
									</div>

									<div class="form-group">
										<label>Nama IT Cabang</label>
										<input type="text" id="nama_it_cabang" name="nama_it_cabang" class="form-control" placeholder="Nama IT Cabang">
									</div>

									<div class="form-group">
										<label>Telp IT Cabang</label>
										<input type="text" id="telp_it_cabang" name="telp_it_cabang" class="form-control" placeholder="Telp IT Cabang">
									</div>

									<div class="form-group">
										<label>PIC Aktivasi</label>
										<input type="text" id="pic_aktivasi" name="pic_aktivasi" class="form-control" placeholder="PIC Aktivasi">
									</div>

									<div class="form-group">
										<label>Tanggal Aktivasi</label>
										<input type="date" id="tgl_aktivasi" name="tgl_aktivasi" class="form-control" placeholder="Serial Number">
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<b>PERANGKAT</b>
									<hr>

									<div class="form-group">
										<label>Media Koneksi</label>
										<select class="form-control select2" style="width: 100%;" name="media_koneksi" id="media_koneksi">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mymediakoneksi as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Jenis Perangkat</label>
										<select class="form-control select2" style="width: 100%;" name="jenis_perangkat" id="jenis_perangkat">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myjenisperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Type Perangkat</label>
										<input type="text" id="type_perangkat" name="type_perangkat" class="form-control" placeholder="Type Perangkat">
									</div>

									<div class="form-group">
										<label>Merek Perangkat</label>
										<select class="form-control select2" style="width: 100%;" name="merek_perangkat" id="merek_perangkat">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mymerekperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>MAC Address</label>
										<input type="text" id="macaddress" name="macaddress" class="form-control" placeholder="MAC Address">
									</div>

									<div class="form-group">
										<label>Serial Number</label>
										<input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="Serial Number">
									</div>

									<!-- <div class="form-group">
										<label>Nomor MSISDN 1</label>
										<input type="text" id="nomor_1" name="nomor_1" class="form-control" placeholder="NOMOR MSISDN 1">
									</div>

									<div class="form-group">
										<label>Nomor MSISDN 2</label>
										<input type="text" id="nomor_2" name="nomor_2" class="form-control" placeholder="NOMOR MSISDN 2">
									</div> -->

									<div class="form-group">
										<label>IMEI 1</label>
										<input type="text" id="imei_1" name="imei_1" class="form-control" placeholder="IMEI-GSM 1">
									</div>

									<div class="form-group">
										<label>IMEI 2</label>
										<input type="text" id="imei_2" name="imei_2" class="form-control" placeholder="IMEI-GSM 2">
									</div>

									<div class="form-group">
										<label>Vendor</label>
										<select class="form-control select2" style="width: 100%;" name="vendor" id="vendor">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myvendor as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>IP Address</label>
										<input type="text" id="e_ipaddress2" name="e_ipaddress2" class="form-control" placeholder="Ip Address">
									</div>

									<div class="form-group">
										<label>INET</label>
										<select class="form-control select2" style="width: 100%;" name="nomor_inet" id="nomor_inet">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myinet as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nomor_inet'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Kapasitas</label>
										<input type="text" id="kapasitas" name="kapasitas" class="form-control" placeholder="Kapasitas">
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
										<label>Dokumen</label>
										<input type="file" id="dokumen" name="dokumen" class="form-control">
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
							<h4 class="modal-title">Edit Data Midi</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>DATA TOKO</b>
									<hr>
									<div class="form-group">
										<label>Kode Toko</label>
										<input required type="hidden" id="e_id" name="e_id" class="form-control" placeholder="Kode Toko">
										<input required type="text" id="e_kode" name="e_kode" class="form-control" placeholder="Kode Toko">
									</div>

									<div class="form-group">
										<label>Nama Toko</label>
										<input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama Toko">
									</div>

									<div class="form-group">
										<label>Alamat Toko</label>
										<textarea type="text" id="e_alamat" name="e_alamat" class="form-control" placeholder="Alamat Toko"></textarea>
									</div>


									<div class="form-group">
										<label>DC Midi</label>
										<select class="form-control select2" style="width: 100%;" name="e_dcmidi" id="e_dcmidi">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mydcmidi as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Titik Kordinat</label>
										<input type="text" id="e_titik_kordinat" name="e_titik_kordinat" class="form-control" placeholder="Titik Kordinat">
									</div>

									<div class="form-group">
										<label>Nomor Telp Toko</label>
										<input type="text" id="e_telp_toko" name="e_telp_toko" class="form-control" placeholder="Nomor Telp Toko">
									</div>

									<div class="form-group">
										<label>Nama Pejabat Toko</label>
										<input type="text" id="e_nama_pejabat_toko" name="e_nama_pejabat_toko" class="form-control" placeholder="Nama Pejabat Toko">
									</div>

									<div class="form-group">
										<label>Telp Pejabat Toko</label>
										<input type="text" id="e_telp_pejabat" name="e_telp_pejabat" class="form-control" placeholder="Telp Pejabat Toko">
									</div>

									<div class="form-group">
										<label>Nama IT Cabang</label>
										<input type="text" id="e_nama_it_cabang" name="e_nama_it_cabang" class="form-control" placeholder="Nama IT Cabang">
									</div>

									<div class="form-group">
										<label>Telp IT Cabang</label>
										<input type="text" id="e_telp_it_cabang" name="e_telp_it_cabang" class="form-control" placeholder="Telp IT Cabang">
									</div>

									<div class="form-group">
										<label>PIC Aktivasi</label>
										<input type="text" id="e_pic_aktivasi" name="e_pic_aktivasi" class="form-control" placeholder="PIC Aktivasi">
									</div>

									<div class="form-group">
										<label>Tanggal Aktivasi</label>
										<input type="date" id="e_tgl_aktivasi" name="e_tgl_aktivasi" class="form-control" placeholder="Serial Number">
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<b>PERANGKAT</b>
									<hr>
									<div class="form-group">
										<label>Media Koneksi</label>
										<select class="form-control select2" style="width: 100%;" name="e_media_koneksi" id="e_media_koneksi">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mymediakoneksi as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Jenis Perangkat</label>
										<select class="form-control select2" style="width: 100%;" name="e_jenis_perangkat" id="e_jenis_perangkat">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myjenisperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Type Perangkat</label>
										<input type="text" id="e_type_perangkat" name="e_type_perangkat" class="form-control" placeholder="Type Perangkat">
									</div>

									<div class="form-group">
										<label>Merek Perangkat</label>
										<select class="form-control select2" style="width: 100%;" name="e_merek_perangkat" id="e_merek_perangkat">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mymerekperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>MAC Address</label>
										<input type="text" id="e_macaddress" name="e_macaddress" class="form-control" placeholder="MAC Address">
									</div>

									<div class="form-group">
										<label>Serial Number</label>
										<input type="text" id="e_serial_number" name="e_serial_number" class="form-control" placeholder="Serial Number">
									</div>

									<div class="form-group">
										<label>IMEI 1</label>
										<input type="text" id="e_imei_1" name="e_imei_1" class="form-control" placeholder="IMEI-GSM 1">
									</div>

									<div class="form-group">
										<label>IMEI 2</label>
										<input type="text" id="e_imei_2" name="e_imei_2" class="form-control" placeholder="IMEI-GSM 2">
									</div>

									<div class="form-group">
										<label>Vendor</label>
										<select class="form-control select2" style="width: 100%;" name="e_vendor" id="e_vendor">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myvendor as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>IP Address</label>
										<input  type="text" id="e_ipaddress" name="e_ipaddress" class="form-control" placeholder="IP Address">
									</div>

									<div class="form-group">
										<label>INET</label>
										<select class="form-control select2" style="width: 100%;" name="e_nomor_inet" id="e_nomor_inet">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myinet as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nomor_inet'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Kapasitas</label>
										<input type="text" id="e_kapasitas" name="e_kapasitas" class="form-control" placeholder="Kapasitas">
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
										<label>Dokumen</label>
										<input type="file" id="e_dokumen" name="e_dokumen" class="form-control">
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
							<h4 class="modal-title">Edit Data Midi</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card-body">
									<b>DATA TOKO</b>
									<hr>
									<div class="form-group">
										<label>Kode Toko</label>
										<input required type="hidden" id="e_id" name="e_id" class="form-control" placeholder="Kode Toko">
										<input readonly required type="text" id="e_kode2" name="e_kode2" class="form-control" placeholder="Kode Toko">
									</div>

									<div class="form-group">
										<label>Nama Toko</label>
										<input readonly required type="text" id="e_nama2" name="e_nama2" class="form-control" placeholder="Nama Toko">
									</div>

									<div class="form-group">
										<label>Alamat Toko</label>
										<textarea readonly type="text" id="e_alamat2" name="e_alamat2" class="form-control" placeholder="Alamat Toko"></textarea>
									</div>


									<div class="form-group">
										<label>DC Midi</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_dcmidi2" id="e_dcmidi2">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mydcmidi as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Titik Kordinat</label>
										<input readonly type="text" id="e_titik_kordinat2" name="e_titik_kordinat2" class="form-control" placeholder="Titik Kordinat">
									</div>

									<div class="form-group">
										<label>Nomor Telp Toko</label>
										<input readonly type="text" id="e_telp_toko2" name="e_telp_toko2" class="form-control" placeholder="Nomor Telp Toko">
									</div>

									<div class="form-group">
										<label>Nama Pejabat Toko</label>
										<input readonly type="text" id="e_nama_pejabat_toko2" name="e_nama_pejabat_toko2" class="form-control" placeholder="Nama Pejabat Toko">
									</div>

									<div class="form-group">
										<label>Telp Pejabat Toko</label>
										<input readonly type="text" id="e_telp_pejabat2" name="e_telp_pejabat2" class="form-control" placeholder="Telp Pejabat Toko">
									</div>

									<div class="form-group">
										<label>Nama IT Cabang</label>
										<input readonly type="text" id="e_nama_it_cabang2" name="e_nama_it_cabang2" class="form-control" placeholder="Nama IT Cabang">
									</div>

									<div class="form-group">
										<label>Telp IT Cabang</label>
										<input readonly type="text" id="e_telp_it_cabang2" name="e_telp_it_cabang2" class="form-control" placeholder="Telp IT Cabang">
									</div>

									<div class="form-group">
										<label>PIC Aktivasi</label>
										<input readonly type="text" id="e_pic_aktivasi2" name="e_pic_aktivasi2" class="form-control" placeholder="PIC Aktivasi">
									</div>

									<div class="form-group">
										<label>Tanggal Aktivasi</label>
										<input readonly type="date" id="e_tgl_aktivasi2" name="e_tgl_aktivasi2" class="form-control" placeholder="Serial Number">
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<b>PERANGKAT</b>
									<hr>
									<div class="form-group">
										<label>Media Koneksi</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_media_koneksi2" id="e_media_koneksi2">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mymediakoneksi as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Jenis Perangkat</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_jenis_perangkat2" id="e_jenis_perangkat2">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myjenisperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Type Perangkat</label>
										<input readonly type="text" id="e_type_perangkat2" name="e_type_perangkat2" class="form-control" placeholder="Type Perangkat">
									</div>

									<div class="form-group">
										<label>Merek Perangkat</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_merek_perangkat2" id="e_merek_perangkat2">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($mymerekperangkat as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>MAC Address</label>
										<input readonly type="text" id="e_macaddress2" name="e_macaddress2" class="form-control" placeholder="MAC Address">
									</div>

									<div class="form-group">
										<label>Serial Number</label>
										<input readonly type="text" id="e_serial_number2" name="e_serial_number2" class="form-control" placeholder="Serial Number">
									</div>

									<div class="form-group">
										<label>IMEI 1</label>
										<input readonly type="text" id="e_imei_12" name="e_imei_12" class="form-control" placeholder="IMEI-GSM 1">
									</div>

									<div class="form-group">
										<label>IMEI 2</label>
										<input readonly type="text" id="e_imei_22" name="e_imei_22" class="form-control" placeholder="IMEI-GSM 2">
									</div>

									<div class="form-group">
										<label>Vendor</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_vendor2" id="e_vendor2">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myvendor as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>IP Address</label>
										<input readonly type="text" id="e_ipaddress2" name="e_ipaddress2" class="form-control" placeholder="Ip Address">
									</div>

									<div class="form-group">
										<label>INET</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_nomor_inet2" id="e_nomor_inet2">
											<option selected="selected">-- Pilih --</option>
											<?php foreach ($myinet as $value) { ?>
												<option value=<?= $value['id'] ?>><?= $value['nomor_inet'] ?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-group">
										<label>Kapasitas</label>
										<input readonly type="text" id="e_kapasitas2" name="e_kapasitas2" class="form-control" placeholder="Kapasitas">
									</div>

									<div class="form-group">
										<label>Status</label>
										<select readonly class="form-control select2" style="width: 100%;" name="e_status2" id="e_status2">
											<option value="" selected="selected">-- Pilih --</option>
											<option value="1">-- Active --</option>
											<option value="0">-- Inactive --</option>
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

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar Data Midi</h3>
		</div>
		<br>
		<div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal"
			 class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Data Midi</button>
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
							Kode Toko
						</th>
						<th class="text-center">
							Nomor Toko
						</th>
						<th class="text-center">
							Alamat
						</th>
						<th class="text-center">
							DC Midi
						</th>
						<th class="text-center">
							Titik Kordinat
						</th>
						<th class="text-center">
							Nomor Telepon Toko
						</th>
						<th class="text-center">
							Nama Pejabat Toko
						</th>
						<th class="text-center">
							Telp Pejabat Toko
						</th>
						<th class="text-center">
							Nama IT Cabang
						</th>
						<th class="text-center">
							Telp IT Cabang
						</th>
						<th class="text-center">
							Tgl Aktivasi
						</th>
						<th class="text-center">
							PIC Aktivasi
						</th>
						<th class="text-center">
							Media Koneksi
						</th>
						<th class="text-center">
							Jenis Perangkat
						</th>
						<th class="text-center">
							Type Perangkat
						</th>
						<th class="text-center">
							Mac Address
						</th>
						<th class="text-center">
							Serial Number
						</th>
						<th class="text-center">
							IMEI GSM 1
						</th>
						<th class="text-center">
							IMEI GSM 2
						</th>
						<th class="text-center">
							Nama Vendor
						</th>
						<th class="text-center">
							IP Address
						</th>
						<th class="text-center">
							Nomor Inet
						</th>
						<th class="text-center">
							Kapasitas
						</th>
						<th class="text-center">
							Status
						</th>
						<th class="text-center">
							Dokumen
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
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/datamidi/simpan') ?>",
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
					url: "<?php echo base_url('administrator/datamidi/delete') ?>",
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
			url: '<?php echo site_url('administrator/datamidi/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				var status = '';
				for (i = 0; i < data.length; i++) {
					var foto = '';
					if (data[i].dokumen != null) {
						foto = '<td ><a href="<?php echo site_url('/assets/datamidi/') ?>' + data[i].dokumen + '"> <img style="width:80px; height: 60px;" src="<?php echo site_url('/assets/datamidi/') ?>' + data[i].dokumen + '""></a></td>'
					} else {
						foto = '<td class="text-left"> No Image</td>'
					} 
					if (data[i].status == 1 ) {
						status = '<td class="project-state"><span class="badge badge-success"> Active </span></td>'
					} else {
						status = '<td class="project-state"><span class="badge badge-danger"> Inactive </span></td>'
					}
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].kode + '</td>' +
						'<td class="text-left">' + data[i].nama + '</td>' +
						'<td class="text-left">' + data[i].alamat + '</td>' +
						'<td class="text-left">' + data[i].namadcmidi + '</td>' +
						'<td class="text-left">' + data[i].titik_kordinat + '</td>' +
						'<td class="text-left">' + data[i].telp_toko + '</td>' +
						'<td class="text-left">' + data[i].pejabat_toko + '</td>' +
						'<td class="text-left">' + data[i].telp_pejabat_toko + '</td>' +
						'<td class="text-left">' + data[i].nama_it_cabang + '</td>' +
						'<td class="text-left">' + data[i].telp_it_cabang + '</td>' +
						'<td class="text-left">' + data[i].tgl_aktivasi + '</td>' +
						'<td class="text-left">' + data[i].pic_aktivasi + '</td>' +
						'<td class="text-left">' + data[i].nama_media_koneksi + '</td>' +
						'<td class="text-left">' + data[i].nama_jenis_perangkat + '</td>' +
						'<td class="text-left">' + data[i].type_perangkat + '</td>' +
						'<td class="text-left">' + data[i].mac_address + '</td>' +
						'<td class="text-left">' + data[i].serial_number + '</td>' +
						'<td class="text-left">' + data[i].imei1 + '</td>' +
						'<td class="text-left">' + data[i].imei2 + '</td>' +
						'<td class="text-left">' + data[i].nama_vendor + '</td>' +
						'<td class="text-left">' + data[i].ipaddress + '</td>' +
						'<td class="text-left">' + data[i].nama_inet + '</td>' +
						'<td class="text-left">' + data[i].kapasitas + '</td>' +
						status+
						foto+
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
			url: "<?php echo base_url('administrator/datamidi/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].nama);
				$('#e_kode').val(data[0].kode);
				$('#e_alamat').val(data[0].alamat);
				$('#e_keterangan').val(data[0].keterangan);
				$('#e_titik_kordinat').val(data[0].titik_kordinat);
				$('#e_telp_toko').val(data[0].telp_toko);
				$('#e_nama_pejabat_toko').val(data[0].pejabat_toko);
				$('#e_telp_pejabat').val(data[0].telp_pejabat_toko);
				$('#e_nama_it_cabang').val(data[0].nama_it_cabang);
				$('#e_telp_it_cabang').val(data[0].telp_it_cabang);
				$('#e_pic_aktivasi').val(data[0].pic_aktivasi);
				$('#e_tgl_aktivasi').val(data[0].tgl_aktivasi);
				$('#e_media_koneksi').val(data[0].media_koneksi).select2();
				$('#e_jenis_perangkat').val(data[0].jenis_perangkat).select2();
				$('#e_merek_perangkat').val(data[0].merek_perangkat).select2();
				$('#e_keterangan').val(data[0].keterangan);
				$('#e_dcmidi').val(data[0].dcmidi).select2();
				$('#e_macaddress').val(data[0].mac_address);
				$('#e_serial_number').val(data[0].serial_number);
				$('#e_nomor_1').val(data[0].nomor_1);
				$('#e_nomor_2').val(data[0].nomor_2);
				$('#e_imei_1').val(data[0].imei1);
				$('#e_imei_2').val(data[0].imei2);
				$('#e_ipaddress').val(data[0].ipaddress);
				$('#e_vendor').val(data[0].vendor).select2();
				$('#e_nomor_inet').val(data[0].inet).select2();
				$('#e_status').val(data[0].status).select2();
				$('#e_type_perangkat').val(data[0].type_perangkat);
				$('#e_kapasitas').val(data[0].kapasitas);
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
			url: "<?php echo base_url('administrator/datamidi/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id2').val(data[0].id);
				$('#e_nama2').val(data[0].nama);
				$('#e_kode2').val(data[0].kode);
				$('#e_alamat2').val(data[0].alamat);
				$('#e_keterangan2').val(data[0].keterangan);
				$('#e_titik_kordinat2').val(data[0].titik_kordinat);
				$('#e_telp_toko2').val(data[0].telp_toko);
				$('#e_nama_pejabat_toko2').val(data[0].pejabat_toko);
				$('#e_telp_pejabat2').val(data[0].telp_pejabat_toko);
				$('#e_nama_it_cabang2').val(data[0].nama_it_cabang);
				$('#e_telp_it_cabang2').val(data[0].telp_it_cabang);
				$('#e_pic_aktivasi2').val(data[0].pic_aktivasi);
				$('#e_tgl_aktivasi2').val(data[0].tgl_aktivasi);
				$('#e_media_koneksi2').val(data[0].media_koneksi).select2();
				$('#e_jenis_perangkat2').val(data[0].jenis_perangkat).select2();
				$('#e_merek_perangkat2').val(data[0].merek_perangkat).select2();
				$('#e_keterangan2').val(data[0].keterangan);
				$('#e_dcmidi2').val(data[0].dcmidi).select2();
				$('#e_macaddress2').val(data[0].mac_address);
				$('#e_serial_number2').val(data[0].serial_number);
				$('#e_nomor_12').val(data[0].nomor_1);
				$('#e_nomor_22').val(data[0].nomor_2);
				$('#e_imei_12').val(data[0].imei1);
				$('#e_imei_22').val(data[0].imei2);
				$('#e_ipaddress2').val(data[0].ipaddress);
				$('#e_vendor2').val(data[0].vendor).select2();
				$('#e_nomor_inet2').val(data[0].inet).select2();
				$('#e_status2').val(data[0].status).select2();
				$('#e_type_perangkat2').val(data[0].type_perangkat);
				$('#e_kapasitas2').val(data[0].kapasitas);
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
					url: "<?php echo base_url('administrator/datamidi/update') ?>",
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
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
		});
	});
</script>
