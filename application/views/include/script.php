<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="<?= base_url(); ?>assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="<?= base_url(); ?>assets/pages/widget/amchart/serial.min.js"></script>
<!-- Chart js -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/chart.js/Chart.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="<?= base_url(); ?>assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<!-- <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.min.js"></script> -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/script.js"></script>
<script type="text/javascript " src="<?= base_url(); ?>assets/js/SmoothScroll.js"></script>
<script src="<?= base_url(); ?>assets/js/pcoded.min.js"></script>
<script src="<?= base_url(); ?>assets/js/vartical-demo.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- <script src="assets/js/select2.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<!-- select2 cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
        $('#myTable').DataTable();

        <?php if($this->session->flashdata('success_msg')){ ?>
        toastr.success('<?= $this->session->flashdata('success_msg'); ?>');
        <?php } ?>

        <?php if($this->session->flashdata('error_msg')){ ?>
            toastr.error('<?= $this->session->flashdata('error_msg'); ?>');
        <?php } ?>

        <?php if($this->session->flashdata('info_msg')){ ?>
            toastr.info('<?= $this->session->flashdata('info_msg'); ?>');
        <?php } ?>
    });
    
    
    function set_year_session(year){
        console.log(year);
        if(year !=''){
            $("#year_form").submit();
        }
    }
</script>
