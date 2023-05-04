<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('logbook/showlog/' . $noreg) ?>" class="btn icon btn-primary btn-sm me-2" type="button">
                <i class='bi bi-arrow-left'></i>
            </a><?= $title; ?>/Detail
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">Nomor Regis</div>
                <div class="col">: <?= $log->noreg; ?></div>
            </div>
            <div class="row">
                <div class="col">Nama Lengkap</div>
                <div class="col">: <?= $log->namaleng; ?></div>
            </div>
            <div class="row">
                <div class="col">Jabatan | Divisi</div>
                <div class="col">: Pegawai | <?= $log->namadiv; ?></div>
            </div>
            <hr>
            <div class="row">
                <div class="col">Deskripsi Pekerjaan</div>
                <div class="col">: <?= $log->desk; ?></div>
            </div>
            <div class="row">
                <div class="col">Request Pekerjaan</div>
                <div class="col">: <?= $log->req; ?></div>
            </div>
            <div class="row">
                <div class="col">Tanggal Pekerjaan</div>
                <div class="col">: <?= $log->date; ?></div>
            </div>
            <div class="row">
                <div class="col">Status Pekerjaan</div>
                <div class="col">
                    :
                    <?php if ($log->status == 1) {
                        echo "Pending";
                    } else if ($log->status == 2) {
                        echo "On Progress";
                    } else {
                        echo "Selesai";
                    } ?>
                </div>
            </div>
            <div class="row">
                <div class="col">Team</div>
                <div class="col">
                    <?php
                    $no = 1;
                    if ($team == null) {
                        echo "Tidak ada team";
                    } else {
                    foreach ($team as $value) { ?>
                        <?= $no++.'. '.$value->namaleng.'<br>' ?>
                    <?php } } ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">Dokumentasi Pekerjaan : </div>
            </div>
            <?php foreach ($img as $value) { ?>
                <div class="row mt-2">
                    <div class="col">
                        <?= $value; ?>
                        <?php $cut = explode('.', $value) ?>
                    </div>
                    <div class="col">
                        <?php if ($cut[1] == 'pdf') { ?>
                            <a class="btn btn-primary btn-sm" href="<?= base_url('logbook/readfile/' . $value); ?>" target="_blank">Buka File</a>
                        <?php } else if ($cut[1] == 'jpg' || $cut[1] == 'jpeg' || $cut[1] == 'png') { ?>
                            <button class="btn btn-primary btn-sm showimg" gambarnya="<?= $value; ?>" data-bs-toggle="modal" data-bs-target="#showfile">Tampilkan</button>
                        <?php } ?>
                        <a class="btn btn-primary btn-sm" href="<?= base_url('logbook/download/' . $value); ?>">Download</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</section>

<!-- Modal Dokumentasi -->
<div class="modal fade text-left" id="showfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Dokumentasi Pekerjaan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    $(document).ready(function() {
        $('.showimg').on('click', function() {
            let data = $(this).attr('gambarnya');
            console.log(data);
            $('.modal-body img').attr('src', '<?= base_url('assets/fileupload/') ?>' + data);
        });
    });
</script>