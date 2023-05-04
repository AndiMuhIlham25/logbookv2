<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table" id="pegawai">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>No Registrasi</td>
                            <td>Nama</td>
                            <td>Jabatan | Divisi</td>
                            <td>No Hp</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pegawai as $a) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <a href="<?= base_url('logbook/showlog/' . $a->noreg); ?>" class="btn icon btn-outline-primary btn-sm"><?= $a->noreg; ?></a>
                                </td>
                                <td><?= $a->namaleng; ?></td>
                                <?php if ($a->jabatan == 0) { ?>
                                    <td>Pegawai | <?= $a->divisi; ?></td>
                                <?php } else { ?>
                                    <td>Pimpinan</td>
                                <?php } ?>
                                <td><?= $a->nohp; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

</section>

<script>
    $(document).ready(function() {
        $('#pegawai').dataTable();
    });
</script>