<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <div style="text-align: right;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladduser">Tambah Data</button>
            </div>
            <br>
            <table class="table" id="tabeluser">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Username</td>
                        <td>Akses</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($user as $u) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $u->namauser; ?></td>
                            <td><?= $u->username; ?></td>
                            <td>Administrator</td>
                            <td>
                                <?php if ($u->active == 1) { ?>
                                    <a type="button" href="<?= base_url('management_adm/nonaktif/') . $u->id ?>" class="btn btn-sm btn-primary">Aktif</a>
                                <?php } else if ($u->active == 0) { ?>
                                    <a type="button" href="<?= base_url('management_adm/aktif/') . $u->id ?>" class="btn btn-sm btn-danger">Tidak Aktif</a>
                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn icon btn-primary updateuser" id="<?= $u->id; ?>" username="<?= $u->username; ?>" password="<?= $u->password; ?>" nama="<?= $u->namauser; ?>" type="button" data-bs-toggle="modal" data-bs-target="#editdata"><i class="bi bi-arrow-clockwise"></i></button>
                                <!-- <button class="btn icon btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $u->id ?>"><i class="fa fa-trash-alt"></i></button> -->
                            </td>
                        </tr>
                    <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Tambah User -->
<div class="modal fade text-left" id="modaladduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah User </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('management_adm') ?>/add" method="POST">
                <div class="modal-body">
                    <label>Nama : </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <label>Username : </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <label>Password : </label>
                    <div class="form-group">
                        <input type="password" class="form-control showpasss" name="password" id="password" placeholder="Password" oninvalid="this.setCustomValidity('Password Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                        <input type="checkbox" class="form-checkbox">
                        <label>Tampilkan password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
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
                <h4 class="modal-title resetname" id="myModalLabel33"></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('management_adm') ?>/update" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nik">Username</label>
                                <input type="text" class="form-control" name="username" id="edusername" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                <input type="text" class="form-control" name="id" id="edid" hidden>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Password</label>
                                <input type="password" class="form-control showpass" name="password" id="edpassword" oninvalid="this.setCustomValidity('Password Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                <input type="checkbox" class="form-checkbox">
                                <label>Tampilkan password</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Reset</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- End Modal -->

<script>
    $(document).ready(function() {
        $('#tabeluser').DataTable();
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('.showpass').attr('type', 'text');
            } else {
                $('.showpass').attr('type', 'password');
            }
            if ($(this).is(':checked')) {
                $('.showpasss').attr('type', 'text');
            } else {
                $('.showpasss').attr('type', 'password');
            }
        });
    });

    // Js Edit Data
    $('.updateuser').click(function() {
        // Tangkap data
        var id = $(this).attr('id');
        var username = $(this).attr('username');
        var password = $(this).attr('password');
        var nama = $(this).attr('nama');

        // Lempar Data
        $('.resetname').text('Reset Password ' + nama);
        $('#edid').val(id);
        $('#edusername').val(username);
        $('#edpassword').val(password);
    });
</script>