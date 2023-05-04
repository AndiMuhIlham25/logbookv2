<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <?php if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 2)) { ?>
                <div style="text-align: right;">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">Tambah Data</button>
                </div>
                <br>
            <?php } elseif ($this->session->userdata('role') == 0) { ?>
            <?php } ?>
            <div class="table-responsive-sm">
                <table class="table" id="divisi">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Divisi</td>
                            <td>Keterangan</td>
                            <?php if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 2)) { ?>
                                <td>Action</td>
                            <?php } elseif ($this->session->userdata('role') == 0) { ?>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($divisi as $a) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $a->namadiv; ?></td>
                                <td><?= $a->keterangan; ?></td>
                                <?php if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 2)) { ?>
                                    <td>
                                        <button id="<?= $a->id; ?>" namadiv="<?= $a->namadiv; ?>" keterangan="<?= $a->keterangan; ?>" class="btn icon btn-primary editdivisi" type="button" data-bs-toggle="modal" data-bs-target="#editdata"><i class="bi bi-pencil-square"></i></button>
                                        <button id="<?= $a->id; ?>" namadiv="<?= $a->namadiv; ?>" class="btn icon btn-danger hapusdatadiv" type="button" data-bs-toggle="modal" data-bs-target="#hapusdata"><i class="bi bi-trash3-fill"></i></button>
                                    </td>
                                <?php } elseif ($this->session->userdata('role') == 0) { ?>
                                <?php } ?>
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
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Divisi</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('divisi') ?>/adddata" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="namadiv">Nama Divisi <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="namadiv" id="namadiv" placeholder="Nama Divisi" oninvalid="this.setCustomValidity('Nama Divisi Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
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
<div class="modal fade text-left" id="editdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title detailnamediv" id="myModalLabel33">Edit Divisi</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('divisi') ?>/updatedata" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="namadiv">Nama Divisi <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="namadiv" id="ednamadiv" oninvalid="this.setCustomValidity('Nama Divisi Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                <input type="text" class="form-control" name="id" id="edid" hidden>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" id="edketerangan">
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
            <form action="<?= base_url('divisi') ?>/deletedata" method="POST">
                <div class="modal-body">
                    Hapus Divisi <b id="hnamadiv"></b> ?
                    <input type="text" class="form-control" name="id" id="hid" hidden>
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

<script>
    $(document).ready(function() {
        $('#divisi').DataTable();
    });

    // Js Edit Data
    $('.editdivisi').click(function() {
        // Tangkap data
        var id = $(this).attr('id');
        var namadiv = $(this).attr('namadiv');
        var keterangan = $(this).attr('keterangan');

        // Lempar Data
        $('.detailnamediv').text('Ubah Divisi ' + namadiv);
        $('#edid').val(id);
        $('#ednamadiv').val(namadiv);
        $('#edketerangan').val(keterangan);
    });

    // Js Hapus Data
    $('.hapusdatadiv').click(function() {
        // Tangkap data
        var id = $(this).attr('id');
        var namadiv = $(this).attr('namadiv');

        // Lempar Data
        $('.hapusname').text('Hapus Divisi ' + namadiv);
        $('#hnamadiv').text(namadiv);
        $('#hid').val(id);
    });
</script>