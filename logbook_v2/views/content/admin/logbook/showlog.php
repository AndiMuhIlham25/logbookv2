<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('logbook/viewlog/') ?>" class="btn icon btn-primary btn-sm me-2" type="button">
                <i class='bi bi-arrow-left'></i>
            </a><?= $title; ?>
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
                                <td>
                                    <!-- Tombol Detail -->
                                    <a href="<?= base_url('logbook/showdetail/logpegawai/' . $value->id . '/' . $noreg); ?>" class="btn icon btn-primary" type="button"><i class="bi bi-eye"></i> Detail Pekerjaan</a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>

</section>

<script>
    $(document).ready(function() {
        $('#tabellog').dataTable();
    });
</script>