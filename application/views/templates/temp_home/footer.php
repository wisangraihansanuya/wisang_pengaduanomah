        <!--**********************************
            Footer start
        ***********************************-->

        <!-- <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div> -->
        <!--**********************************
            Footer end
        ***********************************-->
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <!--**********************************
        Scripts
    ***********************************-->
        <script src="<?= base_url('assets_home/') ?>plugins/common/common.min.js"></script>
        <script src="<?= base_url('assets_home/') ?>js/custom.min.js"></script>
        <script src="<?= base_url('assets_home/') ?>js/settings.js"></script>
        <script src="<?= base_url('assets_home/') ?>js/gleek.js"></script>
        <script src="<?= base_url('assets_home/') ?>js/styleSwitcher.js"></script>
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
        <!-- Chartjs -->
        <script src="<?= base_url('assets_home/') ?>plugins/chart.js/Chart.bundle.min.js"></script>
        <!-- Circle progress -->
        <script src="<?= base_url('assets_home/') ?>plugins/circle-progress/circle-progress.min.js"></script>
        <!-- Datamap -->
        <script src="<?= base_url('assets_home/') ?>plugins/d3v3/index.js"></script>
        <script src="<?= base_url('assets_home/') ?>plugins/topojson/topojson.min.js"></script>
        <script src="<?= base_url('assets_home/') ?>plugins/datamaps/datamaps.world.min.js"></script>
        <!-- Morrisjs -->
        <script src="<?= base_url('assets_home/') ?>plugins/raphael/raphael.min.js"></script>
        <script src="<?= base_url('assets_home/') ?>plugins/morris/morris.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $("#kategori").change(function() {
                    var url = "<?php echo site_url('C_login_masyarakat/get_sub_kategori'); ?>/" + $(this).val();
                    $('#sub_kategori').load(url);
                    return false;
                })
            });
        </script>
        <!-- Pignose Calender -->
        <script src="<?= base_url('assets_home/') ?>plugins/moment/moment.min.js"></script>
        <script src="<?= base_url('assets_home/') ?>plugins/pg-calendar/js/pignose.calendar.min.js"></script>
        <!-- ChartistJS -->
        <script src="<?= base_url('assets_home/') ?>plugins/chartist/js/chartist.min.js"></script>
        <script src="<?= base_url('assets_home/') ?>plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



        <script src="<?= base_url('assets_home/') ?>js/dashboard/dashboard-1.js"></script>

        </body>

        </html>