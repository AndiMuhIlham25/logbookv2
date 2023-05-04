<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table caption-top display" id="tabellog">
                    <caption>
                        <div style="text-align: right;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">Tambah Data</button>
                        </div>
                    </caption>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Pegawai</th>
                            <?php if ($this->session->userdata('role') != '2') { ?>
                                <th>Divisi</th>
                            <?php } ?>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($log as $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->desk ?></td>
                                <td><?= $value->date ?></td>
                                <td><?= $value->namaleng ?></td>
                                <?php if ($this->session->userdata('role') != '2') { ?>
                                    <td><?= $value->namadiv ?></td>
                                <?php } ?>
                                <td>
                                    <!-- Tombol Detail -->
                                    <a href="<?= base_url('logbook/showdetail/log/' . $value->id); ?>" class="btn icon btn-primary" type="button"><i class="bi bi-eye"></i></a>
                                    <?php if ($value->status == 0) { ?>
                                        <button class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                                    <?php } else { ?>
                                        <?php if (($this->session->userdata('noreg') == $value->noreg)) { ?>
                                            <!-- Tombol Edit -->
                                            <button id="<?= $value->id; ?>" noreg="<?= $value->noreg; ?>" nama="<?= $value->namaleng; ?>" team="<?= $value->team; ?>" desk="<?= $value->desk; ?>" req="<?= $value->req; ?>" fileupload="<?= $value->fileupload; ?>" status="<?= $value->status; ?>" class="btn icon btn-success editdata" type="button" data-bs-toggle="modal" data-bs-target="#editlog"><i class="bi bi-pencil-square"></i></button>
                                            <!-- Tombol Hapus -->
                                            <button id="<?= $value->id; ?>" noreg="<?= $value->noreg; ?>" nama="<?= $value->namaleng; ?>" fileupload="<?= $value->fileupload; ?>" class="btn icon btn-danger hapuslog" type="button" data-bs-toggle="modal" data-bs-target="#hapusdata"><i class="bi bi-trash"></i></button>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>

<!-- Modal Add -->
<div class="modal fade text-left" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Log Book</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="<?= base_url('logbook') ?>/adddata" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi <b style="color: red;">*</b></label>
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Deskripsi" oninvalid="this.setCustomValidity('Deskripsi Wajib Di Isi !!!')" oninput="setCustomValidity('')" required></textarea>
                            </div>
                        </div>
                        <?php if ($this->session->userdata('role') == 1) { ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="noreg">Pilih Pegawai <b style="color: red;">*</b></label>
                                    <select class="form-control" id="noreg" name="noreg" oninvalid="this.setCustomValidity('Pegawai Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                        <option value="">Select Pegawai</option>
                                        <?php foreach ($pegawai as $p) { ?>
                                            <option value="<?= $p->noreg; ?>"><?= $p->namaleng; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        <?php } elseif (($this->session->userdata('role') == 0) || ($this->session->userdata('role') == 2)) { ?>
                            <input type="text" class="form-control" name="noreg" id="noreg" value="<?= $this->session->userdata('noreg') ?>" hidden>
                        <?php } ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="req">Request</label>
                                <input type="text" class="form-control" name="req" id="req" placeholder="Request">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Pilih Status Pekerjaan <b style="color: red;">*</b></label>
                                <select class="form-control" id="status" name="status" oninvalid="this.setCustomValidity('Status Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Pending</option>
                                    <option value="2">On Progres</option>
                                    <option value="0">Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="team">Pilih Team</label>
                                <select class="form-control select" id="team" name="team[]" multiple style="width: 100%;">
                                    <option value="">Select Pegawai</option>
                                    <?php foreach ($team as $p) { ?>
                                        <option value="<?= $p->noreg; ?>"><?= $p->namaleng; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="req">Tanggal <b style="color: red;">*</b></label>
                                <input type="date" class="form-control" name="date" id="date" oninvalid="this.setCustomValidity('Tanggal Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="controls row">
                            <div class="entry col-sm-6">
                                <div class="form-group">
                                    <label>Dokumentasi/Gambar</label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input type="file" name="fileupload[]" class="form-control" id="preview_gambar" multiple="">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-add btn-primary btn-add">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit -->
<div class="modal fade text-left" id="editlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title editdatalog" id="myModalLabel33"></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="<?= base_url('logbook') ?>/updatedata" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi <b style="color: red;">*</b></label>
                                <textarea name="deskripsi" id="eddesk" cols="30" rows="10" class="form-control" placeholder="Deskripsi" oninvalid="this.setCustomValidity('Deskripsi Wajib Di Isi !!!')" oninput="setCustomValidity('')" required></textarea>
                                <input type="text" class="form-control" name="id" id="edid" hidden>
                                <!-- <input type="text" class="form-control" name="noreg" id="editnoreg"> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="req">Nama Pegawai</label>
                                <input type="text" class="form-control" id="ednama" readonly>
                            </div>
                            <div class="form-group">
                                <label for="req">Request</label>
                                <input type="text" class="form-control" name="req" id="edreq" placeholder="Request">
                            </div>
                            <div class="form-group">
                                <label for="team">Pilih Team</label>
                                <select class="form-control select" id="edteam" name="team[]" multiple style="width: 100%;">
                                    <option value="">Select Pegawai</option>
                                    <?php foreach ($team as $p) { ?>
                                        <option value="<?= $p->noreg; ?>"><?= $p->namaleng; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Pilih Status Pekerjaan <b style="color: red;">*</b></label>
                                <div id="hidestatus">
                                    <select class="form-control" id="edstatus" name="status" oninvalid="this.setCustomValidity('Status Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                        <option value="">Select Status</option>
                                        <option value="1">Pending</option>
                                        <option value="2">On Progres</option>
                                        <option value="0">Selesai</option>
                                    </select>
                                </div>
                                <div id="showstatus">
                                    <input type="text" class="form-control" id="formalitas" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Hapus -->
<div class="modal fade text-left" id="hapusdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title hapusname" id="myModalLabel33"></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('logbook') ?>/deletedata" method="POST">
                <div class="modal-body">
                    Hapus Log Pekerjaan <b id="hnama"></b> ?
                    <input type="text" class="form-control" name="id" id="hid" hidden>
                    <input type="text" class="form-control" name="noreg" id="hnoreg" hidden>
                    <input type="text" class="form-control" name="fileupload" id="hfileupload" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Detail -->
<div class="modal fade text-left" id="detaildata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title detailname" id="myModalLabel33"></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama">Nama Pegawai</label>
                    </div>
                    <div class="col-md-1">
                        <label for="nama">:</label>
                    </div>
                    <div class="col-md-7">
                        <label for="nama" id="dnama"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama">Nomor Registrasi</label>
                    </div>
                    <div class="col-md-1">
                        <label for="nama">:</label>
                    </div>
                    <div class="col-md-7">
                        <label for="noreg" id="dnoreg"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama">Divisi</label>
                    </div>
                    <div class="col-md-1">
                        <label for="nama">:</label>
                    </div>
                    <div class="col-md-7">
                        <label for="namadiv" id="dnamadiv"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama">Deskrisi</label>
                    </div>
                    <div class="col-md-1">
                        <label for="nama">:</label>
                    </div>
                    <div class="col-md-7">
                        <label for="desk" id="ddesk"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama">Request</label>
                    </div>
                    <div class="col-md-1">
                        <label for="nama">:</label>
                    </div>
                    <div class="col-md-7">
                        <label for="req" id="dreq"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama">Tanggal</label>
                    </div>
                    <div class="col-md-1">
                        <label for="nama">:</label>
                    </div>
                    <div class="col-md-7">
                        <label for="date" id="ddate"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama">Status</label>
                    </div>
                    <div class="col-md-1">
                        <label for="nama">:</label>
                    </div>
                    <div class="col-md-7">
                        <label for="status" id="dstatus"></label>
                    </div>
                </div>
                <div class="row mt-2" id="dokumentasi">
                    <hr>
                    <img src="" alt="dokumentasi" id="showimg">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    $(document).on('click', '.btn-add', function(e) {
        console.log('tesss');
        e.preventDefault();

        var controlForm = $('.controls:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove').addClass('btn-danger')
            .html('<span>-</span>');
    }).on('click', '.btn-remove', function(e) {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            var table = $('#tabellog').dataTable({
                colReorder: true,
                responsive: true
            });
        });
        $('#showstatus').hide();

        $("#team").select2({
            placeholder: " Silahkan Pilih"
        });
        $("#edteam").select2({
            placeholder: " Silahkan Pilih"
        });
    });
</script>

<script>
    // Js Detail Data
    $('.detaildatalog').click(function() {
        // Tangkap data
        var nama = $(this).attr('nama');
        var noreg = $(this).attr('noreg');
        var namadiv = $(this).attr('namadiv');
        var id = $(this).attr('id');
        var desk = $(this).attr('desk');
        var req = $(this).attr('req');
        var fileupload = $(this).attr('fileupload');
        var status = $(this).attr('status');
        var date = $(this).attr('date');
        var creat = $(this).attr('creat');

        // Lempar Data
        $('.detailname').text('Detail Log ' + nama);
        console.log(nama);
        console.log(noreg);
        $('#dnama').text(nama);
        $('#dnoreg').text(noreg);
        $('#dnamadiv').text(namadiv);
        $('#ddesk').text(desk);
        $('#dreq').text(req);
        if (fileupload == '') {
            $('#dokumentasi').hide();
        } else {
            $('#dokumentasi').show();
            $('#showimg').attr('src', '<?= base_url('assets/fileupload/') ?>' + fileupload);
        }
        if (status == '1') {
            $('#dstatus').text('Pending');
        } else if (status == '2') {
            $('#dstatus').text('Proses');
        } else if (status == '0') {
            $('#dstatus').text('Selesai');
        }
        $('#ddate').text(date);
    });

    // Js Edit Data
    $('.editdata').click(function() {
        // Tangkap data
        var id = $(this).attr('id');
        var noreg = $(this).attr('noreg');
        var nama = $(this).attr('nama');
        var desk = $(this).attr('desk');
        var req = $(this).attr('req');
        var fileupload = $(this).attr('fileupload');
        var status = $(this).attr('status');
        var date = $(this).attr('date');
        var creat = $(this).attr('creat');
        var team = $(this).attr('team');
        substr = team.split(",");

        // Lempar Data
        $('.editdatalog').text('Ubah Log ' + nama);
        $('#edid').val(id);
        $('#ednama').val(nama);
        // $('#editnoreg').val(noreg);
        $('#ednoreg').val(noreg);
        $('#eddesk').val(desk);
        $('#edreq').val(req);
        $('#edgambar_load').attr('src', '<?= base_url('assets/fileupload/') ?>' + fileupload);
        if (status == '0') {
            console.log(status);
            $('#formalitas').val('Selesai');
            $('#showstatus').show();
            $('#hidestatus').hide();
        } else {
            $('#edstatus').val(status);
            $('#showstatus').hide();
            $('#hidestatus').show();
        }
        $('#edteam').val(substr).trigger('change');
    });

    // Js Hapus Data
    $('.hapuslog').click(function() {
        // Tangkap data
        var id = $(this).attr('id');
        var noreg = $(this).attr('noreg');
        var nama = $(this).attr('nama');
        var fileupload = $(this).attr('fileupload');

        // Lempar Data
        $('.hapusname').text('Hapus Log Pekerjaan ' + nama);
        $('#hnama').text(nama);
        $('#hid').val(id);
        $('#hnoreg').val(noreg);
        $('#hfileupload').val(fileupload);
    });
</script>

<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.3.1/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>