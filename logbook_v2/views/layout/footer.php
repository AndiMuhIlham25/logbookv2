<footer>
  <div class="footer clearfix text-muted">
    <div class="float-start">
      <p>2023 &copy; UPT TIK Universitas Tadulako</p>
    </div>
  </div>
</footer>
</div>
</div>

<script>
    <?php
    if (isset($this->session->swetalert)) {
    ?>
        Swal.fire(<?= $this->session->swetalert ?>);
    <?php
    }
    ?>
</script>
<script src="<?= base_url(); ?>/assets/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>/assets/js/app.js"></script>
<!-- <script src="<?= base_url(); ?>/assets/extensions/jquery/jquery.min.js"></script> -->
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/pages/datatables.js"></script>

</body>

</html>