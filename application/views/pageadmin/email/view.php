<section class="content">
    <div id="modalEdit" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" role="form" id="formEdit">
                    <div class="card card-info">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Konfigurasi Email</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Email</label>
                                <input required type="hidden" id="e_id" name="e_id">
                                <input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama Email">
                            </div>
                            <div class="form-group">
                                <label>Host Email</label>
                                <input required type="text" id="e_host" name="e_host" class="form-control" placeholder="Host Email">
                            </div>
                            <div class="form-group">
                                <label>Port Email</label>
                                <input required type="text" id="e_port" name="e_port" class="form-control" placeholder="465, 587">
                            </div>
                            <div class="form-group">
                                <label>Protocol</label>
                                <input required type="text" id="e_protocol" name="e_protocol" class="form-control" placeholder="Protocol SMTP">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input required type="text" id="e_password" name="e_password" class="form-control" placeholder="Password Email">
                            </div>
                            <div class="form-group">
                                <label>Set From</label>
                                <input required type="text" id="e_setfrom" name="e_setfrom" class="form-control" placeholder="Set From email">
                            </div>
                            <div class="form-group">
                                <label>Type Email</label>
                                <input required readonly type="text" id="e_type" name="e_type" class="form-control" placeholder="Type">
                            </div>
                            <div class="form-group">
                                <label>BCC Email</label>
                                <input required  type="text" id="e_bcc" name="e_bcc" class="form-control" placeholder="Type">
                            </div>
                            <div class="form-group">
                                <label>Footer 1</label>
                                <textarea type="text" id="e_footer" name="e_footer" class="form-control" placeholder="Footer 1"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Footer 2</label>
                                <textarea type="text" id="e_footer2" name="e_footer2" class="form-control" placeholder="Footer 2"></textarea>
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
            <h3 class="card-title">Konfigurasi Email</h3>
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
                            Nama Email
                        </th>
                        <th class="text-center">
                            Host Email
                        </th>
                        <th class="text-center">
                            Port
                        </th>
                        <th class="text-center">
                            Protocol
                        </th>
                        <th class="text-center">
                            Password
                        </th>
                        <th class="text-center">
                            Set From
                        </th>
                        <th class="text-center">
                            Type Email
                        </th>
                        <th class="text-center">
                            BCC
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
    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('administrator/email/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-left">' + no + '</td>' +
                        '<td class="text-left">' + data[i].email + '</td>' +
                        '<td class="text-left">' + data[i].host + '</td>' +
                        '<td class="text-left">' + data[i].port + '</td>' +
                        '<td class="text-left">' + data[i].protocol + '</td>' +
                        '<td class="text-left">' + data[i].password + '</td>' +
                        '<td class="text-left">' + data[i].setfrom + '</td>' +
                        '<td class="text-left">' + data[i].type + '</td>' +
                        '<td class="text-left">' + data[i].bcc + '</td>' +
                        '<td class="project-actions text-right">' +
                        '   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
                        '      <i class="fas fa-folder"> </i>  Edit </a>' +
                        '</button> &nbsp' +
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
            url: "<?php echo base_url('administrator/email/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].id);
                $('#e_nama').val(data[0].email);
                $('#e_host').val(data[0].host);
                $('#e_port').val(data[0].port);
                $('#e_protocol').val(data[0].protocol);
                $('#e_password').val(data[0].password);
                $('#e_setfrom').val(data[0].setfrom);
                $('#e_type').val(data[0].type);
                $('#e_bcc').val(data[0].bcc);
                $('#e_footer').val(data[0].footer);
                $('#e_footer2').val(data[0].footer2);
            }
        });
    });

    if ($("#formEdit").length > 0) {
        $("#formEdit").validate({
            submitHandler: function(form) {
                $('#btn_edit').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('administrator/email/update') ?>",
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
        $('#table_id').DataTable({
            "searching": true,
            "ordering": true,
            "responsive": true,
            "paging": true,
        });
    });
</script>