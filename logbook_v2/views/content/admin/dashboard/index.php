<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-primary mb-2">
                                        <i class="fa fa-id-card"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Pegawai</h6>
                                    <h3 class="font-extrabold mb-0"><?= $pegawai ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-primary mb-2">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Divisi</h6>
                                    <h3 class="font-extrabold mb-0"><?= $divisi ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-primary mb-2">
                                        <i class="fa fa-book"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Log</h6>
                                    <h3 class="font-extrabold mb-0"><?= $log ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-primary mb-2">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total User</h6>
                                    <h3 class="font-extrabold mb-0"><?= $user; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="card">
        <div class="card-body px-4">
            <div class="row">
                <div class="col-md-9" style="text-align: justify;">
                <?php if ($this->session->userdata('noreg') != '') { ?>
                    <h2>Selamat Datang <?= $this->session->userdata('name'); ?></h2>
                    <?php } ?>
                    <p>Log Book Tik yaitu sebuah sistem yang dirancang untuk mencatat segalah aktifitas Pegawai yang ada di Lingkup TIK, pencatatan aktifitas dilakukan untuk memenuhi kegiatan ISO (International Organization for Standardization).</p>
                    <h2>Jangan Lupa Isi Log Book yah</h2>
                </div>
                <div class="col-md-3" style="text-align: center;">
                    <img src="<?= base_url(); ?>/assets/images/logo/welcome.svg" alt="Logo" width="90%">
                </div>
            </div>
        </div>
    </div>
</div>