<footer>

</footer>
</div>
</div>



<script src="<?php echo base_url('aset/vol/assets/js/feather-icons/feather.min.js'); ?>"></script>
<script src="<?php echo base_url('aset/sb/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('aset/vol/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
<script src="<?php echo base_url('aset/vol/assets/js/app.js'); ?>"></script>

<script src="<?php echo base_url('aset/vol/assets/vendors/chartjs/Chart.min.js'); ?>"></script>
<script src="<?php echo base_url('aset/vol/assets/vendors/apexcharts/apexcharts.min.js'); ?>"></script>
<script src="<?php echo base_url('aset/vol/assets/js/pages/dashboard.js'); ?>"></script>

<script src="<?php echo base_url('aset/vol/assets/js/main.js'); ?>"></script>

<script src="<?php echo base_url('aset/font/js/all.min.js'); ?>"></script>

<script src="<?php echo base_url('aset/vol/assets/vendors/simple-datatables/simple-datatables.js'); ?>"></script>
<script src="<?php echo base_url('aset/vol/assets/js/vendors.js'); ?>"></script>

<script src="<?php echo base_url('aset/sb/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('aset/sb/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('aset/sb/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<script src="<?php echo base_url('aset/sb/js/sb-admin-2.min.js'); ?>"></script>
<script src="<?php echo base_url('aset/sb/vendor/chart.js/Chart.min.js'); ?>"></script>
<script src="<?php echo base_url('aset/sb/js/demo/chart-area-demo.js'); ?>"></script>
<script src="<?php echo base_url('aset/sb/js/demo/chart-pie-demo.js'); ?>"></script>


<script src="<?php echo base_url(); ?>assets_style/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets_style/assets/plugins/summernote/summernote-lite.js"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            cache: false
        });
        $('#search').keyup(function() {
            $('#result').html('');
            $('#state').val('');
            var searchField = $('#search').val();
            var expression = new RegExp(searchField, "i");
            $.getJSON('<?php echo base_url('transaksi/loaduser'); ?>', function(data) {
                $.each(data, function(key, value) {
                    if (value.anggota_id.search(expression) != -1 || value.user.search(expression) != -1) {
                        $('#result').append('<li class="list-group-item link-class"><img src="<?php echo base_url(); ?>assets_style/image/' + value.foto + '" height="40" width="40" class="img-thumbnail" /> ' + value.anggota_id + ' | <span class="text-muted">' + value.user + '</span></li>');
                    }
                });
            });
        });

        $('#result').on('click', 'li', function() {
            var click_text = $(this).text().split('|');
            $('#search').val($.trim(click_text[0]));
            $("#result").html('');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            cache: false
        });
        $('#search2').keyup(function() {
            $('#result2').html('');
            $('#state').val('');
            var searchField = $('#search2').val();
            var expression = new RegExp(searchField, "i");
            $.getJSON('<?php echo base_url('Transaksi/loadbuku'); ?>', function(data) {
                $.each(data, function(key, value) {
                    if (value.buku_id.search(expression) != -1 || value.title.search(expression) != -1) {
                        $('#result2').append('<li class="list-group-item link-class">' + value.buku_id + ' | <span class="text-muted">' + value.title + '</span> | <span class="text-muted">' + value.pengarang + '</span></li>');
                    }
                });
            });
        });

        $('#result2').on('click', 'li', function() {
            var click_text = $(this).text().split('|');
            $('#search2').val($.trim(click_text[0]));
            $("#result2").html('');
        });
    });
</script>


</body>

</html>