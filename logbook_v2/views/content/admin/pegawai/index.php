<?php if ($this->session->userdata('role') == 1) { ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <?= $title; ?>
            </div>
            <div class="card-body">
                <div style="text-align: right;">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">Tambah Data</button>
                </div>
                <br>
                <div class="table-responsive-sm">
                    <table class="table" id="penduduk">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>No Registrasi</td>
                                <td>Nama</td>
                                <td>Jabatan | Divisi</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pegawai as $a) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a->noreg; ?></td>
                                    <td><?= $a->namaleng; ?></td>
                                    <?php if ($a->jabatan == 0) { ?>
                                        <td>Pegawai | <?= $a->divisi; ?></td>
                                    <?php } else { ?>
                                        <td>Pimpinan</td>
                                    <?php } ?>
                                    <td>
                                        <!-- Tombol Detail -->
                                        <button namaleng="<?= $a->namaleng; ?>" noreg="<?= $a->noreg; ?>" nama="<?= $a->nama; ?>" jk="<?= $a->jk; ?>" alamat="<?= $a->alamat; ?>" divisi="<?= $a->divisi; ?>" nohp="<?= $a->nohp; ?>" status="<?= $a->status; ?>" class="btn icon btn-primary detaildatapegawai" type="button" data-bs-toggle="modal" data-bs-target="#detaildata"><i class="bi bi-eye"></i></button>
                                        <!-- Tombol Edit -->
                                        <button namaleng="<?= $a->namaleng; ?>" noreg="<?= $a->noreg; ?>" nama="<?= $a->nama; ?>" jk="<?= $a->jk; ?>" alamat="<?= $a->alamat; ?>" divisi="<?= $a->iddivisi; ?>" nohp="<?= $a->nohp; ?>" status="<?= $a->status; ?>" class="btn icon btn-success editdatapend" type="button" data-bs-toggle="modal" data-bs-target="#editdata"><i class="bi bi-pencil-square"></i></button>
                                        <!-- Tombol Hapus -->
                                        <button namaleng="<?= $a->namaleng; ?>" noreg="<?= $a->noreg; ?>" class="btn icon btn-danger hapusdatapegawai" type="button" data-bs-toggle="modal" data-bs-target="#hapusdata"><i class="bi bi-trash3-fill"></i></button>
                                        <!-- Tombol Reset Password -->
                                        <button namaleng="<?= $a->namaleng; ?>" noreg="<?= $a->noreg; ?>" username="<?= $a->username; ?>" password="<?= $a->password; ?>" class="btn icon btn-secondary resetpass" type="button" data-bs-toggle="modal" data-bs-target="#reset"><i class="bi bi-arrow-clockwise"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
<?php } elseif ($this->session->userdata('role') == 0) { ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <?= $title; ?>
            </div>
            <div class="card-body">
                <table class="table">
                <div style="text-align: right;">
                    <!-- Tombol Edit -->
                    <button namaleng="<?= $pegawai->namaleng; ?>" noreg="<?= $pegawai->noreg; ?>" nama="<?= $pegawai->nama; ?>" jk="<?= $pegawai->jk; ?>" alamat="<?= $pegawai->alamat; ?>" divisi="<?= $pegawai->iddivisi; ?>" nohp="<?= $pegawai->nohp; ?>" status="<?= $pegawai->status; ?>" class="btn icon btn-success editdatapend" type="button" data-bs-toggle="modal" data-bs-target="#editdata"><i class="bi bi-pencil-square"></i> Update Biodata</button>
                    <!-- Tombol Reset Password -->
                    <button namaleng="<?= $pegawai->namaleng; ?>" noreg="<?= $pegawai->noreg; ?>" username="<?= $pegawai->username; ?>" password="<?= $pegawai->password; ?>" class="btn icon btn-secondary resetpass" type="button" data-bs-toggle="modal" data-bs-target="#reset"><i class="bi bi-arrow-clockwise"></i> Reset Password</button>
                </div>
                <tbody>
                    <tr>
                        <td>Nomor Registrasi</td>
                        <td><?= $pegawai->noreg; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?= $pegawai->namaleng; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><?= $pegawai->nama; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <?php if ($pegawai->jk == 1) {
                                echo "Laki-Laki";
                            } else {
                                echo "Perempuan";
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?= $pegawai->alamat; ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Hp</td>
                        <td><?= $pegawai->nohp; ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan | Divisi</td>
                        <?php if ($pegawai->jabatan == 0) { ?>
                            <td>Pegawai | <?= $pegawai->divisi; ?></td>
                        <?php } else { ?>
                            <td>Pimpinan</td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <?php if ($pegawai->status == 1) {
                                echo "Aktif";
                            } else {
                                echo "Tidak Aktif";
                            } ?>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>

    </section>
<?php } elseif ($this->session->userdata('role') == 2) { ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <?= $title; ?>
            </div>
            <div class="card-body">
                <div id="hidetable">
                    <div style="text-align: right;">
                        <button type="button" class="btn btn-primary" id="btnshowagri" onclick="showagri()">Update Biodata</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">Tambah Data</button>
                    </div>
                    <br>
                    <div class="table-responsive-sm">
                        <table class="table" id="pegawai">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>No Registrasi</td>
                                    <td>Nama</td>
                                    <td>Jabatan | Divisi</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pegawai as $a) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $a->noreg; ?></td>
                                        <td><?= $a->namaleng; ?></td>
                                        <?php if ($a->jabatan == 0) { ?>
                                            <td>Pegawai | <?= $a->divisi; ?></td>
                                        <?php } else { ?>
                                            <td>Pimpinan</td>
                                        <?php } ?>
                                        <td>
                                            <!-- Tombol Detail -->
                                            <button namaleng="<?= $a->namaleng; ?>" noreg="<?= $a->noreg; ?>" nama="<?= $a->nama; ?>" jk="<?= $a->jk; ?>" alamat="<?= $a->alamat; ?>" divisi="<?= $a->divisi; ?>" nohp="<?= $a->nohp; ?>" status="<?= $a->status; ?>" class="btn icon btn-primary detaildatapegawai" type="button" data-bs-toggle="modal" data-bs-target="#detaildata"><i class="bi bi-eye"></i></button>
                                            <!-- Tombol Edit -->
                                            <button namaleng="<?= $a->namaleng; ?>" noreg="<?= $a->noreg; ?>" nama="<?= $a->nama; ?>" jk="<?= $a->jk; ?>" alamat="<?= $a->alamat; ?>" divisi="<?= $a->iddivisi; ?>" nohp="<?= $a->nohp; ?>" status="<?= $a->status; ?>" class="btn icon btn-success editdatapend" type="button" data-bs-toggle="modal" data-bs-target="#editdata"><i class="bi bi-pencil-square"></i></button>
                                            <!-- Tombol Hapus -->
                                            <button namaleng="<?= $a->namaleng; ?>" noreg="<?= $a->noreg; ?>" class="btn icon btn-danger hapusdatapegawai" type="button" data-bs-toggle="modal" data-bs-target="#hapusdata"><i class="bi bi-trash3-fill"></i></button>
                                            <!-- Tombol Reset Password -->
                                            <button namaleng="<?= $a->namaleng; ?>" noreg="<?= $a->noreg; ?>" username="<?= $a->username; ?>" password="<?= $a->password; ?>" class="btn icon btn-secondary resetpass" type="button" data-bs-toggle="modal" data-bs-target="#reset"><i class="bi bi-arrow-clockwise"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div id="hideagri">
                    <table class="table">
                        <div style="text-align: right;">
                            <button type="button" class="btn btn-primary" onclick="showtable()">Tampilkan Data Pegawai</button>
                            <!-- Tombol Edit -->
                            <button namaleng="<?= $pm->namaleng; ?>" noreg="<?= $pm->noreg; ?>" nama="<?= $pm->nama; ?>" jk="<?= $pm->jk; ?>" alamat="<?= $pm->alamat; ?>" nohp="<?= $pm->nohp; ?>" status="<?= $pm->status; ?>" class="btn icon btn-success editdatapend" type="button" data-bs-toggle="modal" data-bs-target="#editdatapm"><i class="bi bi-pencil-square"></i> Update Biodata</button>
                            <!-- Tombol Reset Password -->
                            <button namaleng="<?= $pm->namaleng; ?>" noreg="<?= $pm->noreg; ?>" username="<?= $pm->username; ?>" password="<?= $pm->password; ?>" class="btn icon btn-secondary resetpass" type="button" data-bs-toggle="modal" data-bs-target="#reset"><i class="bi bi-arrow-clockwise"></i> Reset Password</button>
                        </div>
                        <br>
                        <tbody>
                            <tr>
                                <td>Nomor Registrasi</td>
                                <td><?= $pm->noreg; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td><?= $pm->namaleng; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><?= $pm->nama; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    <?php if ($pm->jk == 1) {
                                        echo "Laki-Laki";
                                    } else {
                                        echo "Perempuan";
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?= $pm->alamat; ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Hp</td>
                                <td><?= $pm->nohp; ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan | Divisi</td>
                                <td>Pimpinan</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <?php if ($pm->status == 1) {
                                        echo "Aktif";
                                    } else {
                                        echo "Tidak Aktif";
                                    } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
<?php } ?>

<!-- Modal Add -->
<div class="modal fade text-left" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Data Pegawai</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pegawai') ?>/adddata" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="noregist">Nomor Registrasi <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="noregist" id="noregist" placeholder="Nomor Registrasi Pegawai" oninvalid="this.setCustomValidity('Nonor Regist Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="namaleng" id="namaleng" placeholder="Nama Lengkap" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Panggilan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Pilih Jenis Kelamin <b style="color: red;">*</b></label>
                                <select class="form-control" id="jk" name="jk" oninvalid="this.setCustomValidity('Jenis Kelamin Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Gender</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="0">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jabatan">Pilih Jabatan<b style="color: red;">*</b></label>
                                <select class="form-control" id="jabatan" name="jabatan" oninvalid="this.setCustomValidity('Jabatan Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Jabatan</option>
                                    <option value="1">Pimpinan</option>
                                    <option value="0">Pegawai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="hidedivisiagri">
                            <div class="form-group">
                                <label for="divisi">Pilih Divisi <b style="color: red;">*</b></label>
                                <select class="form-control" id="divisi" name="divisi" oninvalid="this.setCustomValidity('Divisi Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Divisi</option>
                                    <?php foreach ($divisi as $div) { ?>
                                        <option value="<?= $div->id; ?>"><?= $div->namadiv; ?></option>
                                        <option value="pimpinan" id="hidedivagri">Pimpinan</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Pilih Status Pegawai<b style="color: red;">*</b></label>
                                <select class="form-control" id="status" name="status" oninvalid="this.setCustomValidity('Status Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nohp">Nomor Hp <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="nohp" id="nohp" placeholder="Nomor HP" oninvalid="this.setCustomValidity('Nomor Hp Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" oninvalid="this.setCustomValidity('Alamat Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <label>Akun Pengguna</label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password <b style="color: red;">*</b></label>
                                <input type="password" class="form-control showpasss" name="password" id="password" placeholder="Password" oninvalid="this.setCustomValidity('Password Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                <input type="checkbox" class="form-checkbox">
                                <label>Tampilkan password</label>
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
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title detailnamepe" id="myModalLabel33"></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('pegawai') ?>/updatedata" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="noregist">Nomor Registrasi</label>
                                <input type="text" class="form-control" name="noregist" id="ednoregist" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaleng">Nama Lengkap <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="namaleng" id="ednamaleng" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="ednama" placeholder="Nama Panggilan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Pilih Jenis Kelamin <b style="color: red;">*</b></label>
                                <select class="form-control" id="edjk" name="jk" oninvalid="this.setCustomValidity('Jenis Kelamin Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Gender</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="0">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="alamat" id="edalamat" oninvalid="this.setCustomValidity('Alamat Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <?php if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 2)) { ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="divisi">Pilih Divisi <b style="color: red;">*</b></label>
                                    <select class="form-control" id="eddivisi" name="divisi" oninvalid="this.setCustomValidity('Divisi Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                        <option value="">Select Divisi</option>
                                        <?php foreach ($divisi as $div) { ?>
                                            <option value="<?= $div->id; ?>"><?= $div->namadiv; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        <?php } else { ?>
                            <input type="hidden" name="divisi" id="eddivisi" value="<?= $this->session->userdata('divisi'); ?>">
                        <?php } ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nohp">Nomor Hp <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="nohp" id="ednohp" oninvalid="this.setCustomValidity('Nomor Hp Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <?php if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 2)) { ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Pilih Status Pegawai<b style="color: red;">*</b></label>
                                    <select class="form-control" id="edstatus" name="status" oninvalid="this.setCustomValidity('Status Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                        <option value="">Select Status</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        <?php } else { ?>
                            <input type="hidden" name="status" id="edstatus" value="1">
                        <?php } ?>
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

<!-- Modal Edit Pimpinan -->
<div class="modal fade text-left" id="editdatapm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title detailnamepe" id="myModalLabel33"></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('pegawai') ?>/updatedata" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="noregist">Nomor Registrasi</label>
                                <input type="text" class="form-control" name="noregist" id="edpmnoregist" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaleng">Nama Lengkap <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="namaleng" id="edpmnamaleng" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="edpmnama" placeholder="Nama Panggilan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Pilih Jenis Kelamin <b style="color: red;">*</b></label>
                                <select class="form-control" id="edpmjk" name="jk" oninvalid="this.setCustomValidity('Jenis Kelamin Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Gender</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="0">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="alamat" id="edpmalamat" oninvalid="this.setCustomValidity('Alamat Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nohp">Nomor Hp <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="nohp" id="edpmnohp" oninvalid="this.setCustomValidity('Nomor Hp Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
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
            <form action="<?= base_url('pegawai') ?>/deletedata" method="POST">
                <div class="modal-body">
                    Hapus Data Pegawai Nomor Registrasi <b id="namenoreg"></b> ?
                    <input type="text" class="form-control" name="noreg" id="hnoreg" hidden>
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

<!-- Modal Reset -->
<div class="modal fade text-left" id="reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title resetname" id="myModalLabel33"></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('pegawai') ?>/reset" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="username">Username <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" name="username" id="reusername" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                <input type="text" class="form-control" name="noreg" id="renoreg" hidden>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Password <b style="color: red;">*</b></label>
                                <input type="password" class="form-control showpass" name="password" id="repassword" oninvalid="this.setCustomValidity('Password Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
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
                    <div class="col-md-5">Nomor Registrasi</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dnoreg"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Nama Lengkap</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dnamaleng"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Nama</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dnama"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Jenis Kelamin</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="djk"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Alamat</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dalamat"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Divisi</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="ddivisi"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Nomor Hp</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dnohp"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Status</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dstatus"></div>
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
    $(document).ready(function() {
        $('#pegawai').DataTable();
        $('#hidedivisiagri').hide();
        $('#hidedivagri').hide();
        $('#hideagri').hide();
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
        $('#jabatan').change(function() {
            var jabatan = $(this).val();
            console.log(jabatan);
            if (jabatan == '0') {
                $('#hidedivisiagri').show();
            } else {
                $('#hidedivisiagri').hide();
                $('#divisi').val('pimpinan');
            }
        });
    });

    function showagri() {
        $('#hideagri').show();
        $('#hidetable').hide();
    }

    function showtable() {
        $('#hideagri').hide();
        $('#hidetable').show();
    }

    // Js Edit Daata
    $('.editdatapend').click(function() {
        // Tangkap data
        var noreg = $(this).attr('noreg');
        var namaleng = $(this).attr('namaleng');
        var nama = $(this).attr('nama');
        var jk = $(this).attr('jk');
        var alamat = $(this).attr('alamat');
        var divisi = $(this).attr('divisi');
        var nohp = $(this).attr('nohp');
        var status = $(this).attr('status');

        // Lempar Data
        $('.detailnamepe').text('Ubah Data ' + namaleng);
        $('#ednoregist').val(noreg);
        $('#edpmnoregist').val(noreg);
        $('#ednamaleng').val(namaleng);
        $('#edpmnamaleng').val(namaleng);
        $('#ednama').val(nama);
        $('#edpmnama').val(nama);
        $('#edjk').val(jk);
        $('#edpmjk').val(jk);
        $('#edalamat').val(alamat);
        $('#edpmalamat').val(alamat);
        $('#eddivisi').val(divisi);
        $('#ednohp').val(nohp);
        $('#edpmnohp').val(nohp);
        $('#edstatus').val(status);
    });

    // Js reset password
    $('.resetpass').click(function() {
        // Tangkap data
        var noreg = $(this).attr('noreg');
        var username = $(this).attr('username');
        var password = $(this).attr('password');
        var namaleng = $(this).attr('namaleng');

        // Lempar Data
        $('.resetname').text('Reset Password ' + namaleng);
        $('#renoreg').val(noreg);
        $('#reusername').val(username);
        $('#repassword').val(password);
    });

    // Js Hapus Data
    $('.hapusdatapegawai').click(function() {
        // Tangkap data
        var noreg = $(this).attr('noreg');
        var namaleng = $(this).attr('namaleng');

        // Lempar Data
        $('.hapusname').text('Hapus Data ' + namaleng);
        $('#hnoreg').val(noreg);
        $('#namenoreg').text(noreg);
    });

    // Js Detail Data
    $('.detaildatapegawai').click(function() {
        // Tangkap data
        var noreg = $(this).attr('noreg');
        var namaleng = $(this).attr('namaleng');
        var nama = $(this).attr('nama');
        var jk = $(this).attr('jk');
        var alamat = $(this).attr('alamat');
        var divisi = $(this).attr('divisi');
        var nohp = $(this).attr('nohp');
        var status = $(this).attr('status');

        // Lempar Data
        $('.detailname').text('Detail Data ' + namaleng);
        $('#dnoreg').text(noreg);
        $('#dnamaleng').text(namaleng);
        $('#dnama').text(nama);
        if (jk == 1) {
            $('#djk').text('Laki - Laki');
        } else if (jk == 0) {
            $('#djk').text('Perempuan');
        }
        $('#dalamat').text(alamat);
        $('#ddivisi').text(divisi);
        $('#dnohp').text(nohp);
        if (status == 1) {
            $('#dstatus').text('Aktif');
        } else if (status == 0) {
            $('#dstatus').text('Tidak Aktif');
        }
    });
</script>