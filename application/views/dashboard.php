<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('include/head'); ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

  <body>
  <body>
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
        <?php $this->load->view('include/header'); ?>

    
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <?php $this->load->view('include/side-bar'); ?>

            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">

                            <div class="page-body">
                                <div class="row">
                                    <!-- order-card start -->
                                    <div class="col-md-6 col-xl-3">
                                        <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                                <h6 class="m-b-20">Won Leads</h6>
                                                <h2 class="text-center">
                                                    <i class="ti-stats-up f-left"></i>
                                                    <span id="won_count"></span></h2>
                                            </div>
                                        </div>
                                    </div>
                                    
                
                                    <div class="col-md-6 col-xl-3">
                                        <a href="<?= base_url('leads/un_response_leads'); ?>" title="Click to view details" >
                                        <div class="card bg-c-red2 order-card">
                                            <div class="card-block">
                                                <h6 class="m-b-20 "> Lost leads</h6>
                                                <h2 class="text-center">
                                                <i class="ti-stats-up red2-ti f-left"></i>
                                                    <span id="lost_count"></span>
                                                </h2>
                                                <!-- <p class="m-b-0">This Month<span class="f-right">213</span></p> -->
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <div class="col-md-6 col-xl-6">
                                        <table class="table table-bordered">
                                            <thead class="table-warning">
                                            <tr>
                                                <th>Report Date :   <input type="date" id="report_date"></th>
                                                <th>Won Leads : <span id="won_report_lead"></span></th>
                                                <th>Lost Leads : <span id="lost_report_lead"></span></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Connected</td>
                                                <td><span id="won_cnt"></span></td>
                                                <td><span id="lost_cnt"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Stand By</td>
                                                <td><span id="won_sb"></span></td>
                                                <td><span id="lost_sb"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Escalated</td>
                                                <td><span id="won_esca"></span></td>
                                                <td><span id="lost_esca"></span></td>
                                            </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>

                                </div>



                                <!-- Page-header start -->
                            <div class="page-header card">
                                <div class="card-block">
                                    <h5 class="m-b-10">Contacted Leads Export CSV</h5>
                                    
                                    <form action="<?= base_url(''); ?>" method="post">

                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>From Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" required>
                                            </div>

                                            <div class="col-md-2">
                                                <label>To Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" required>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Occupation</label>
                                                <select class="form-control form-control-sm search" id="occupation" name="occupation" required>
                                                    <option value="">Select Occupation</option>
                                                    <option value="architect">Architect</option>
                                                    <option value="builder">Builder</option>
                                                    <option value="building_contractor">Building Contractor</option>
                                                    <option value="consultant">Consultant</option>
                                                    <option value="dealer">Dealer</option>
                                                    <option value="electrical_contractor">Electrical Contractor</option>
                                                    <option value="electrician">Electrician</option>
                                                    <option value="house/property_owner">House/Property Owner</option>
                                                    <option value="interior_designer">Interior Designer</option>
                                                    <option value="property_developer">Property Developer</option>
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label> Zone </label><br>                
                                                <select name="zone" class="form-control" id="zone">
                                                    <option value="">Select Zone</option>
                                                    <option value="CZ1">CZ1</option>
                                                    <option value="CZ2">CZ2</option>
                                                    <option value="EZ">EZ</option>  
                                                    <option value="NCZ">NCZ</option>
                                                    <option value="NZ1">NZ1</option>
                                                    <option value="NZ2">NZ2</option>
                                                    <option value="SZ">SZ</option>
                                                    <option value="WZ">WZ</option>
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Regional Head</label>
                                                <select name="regional_id" class="form-control" id="regional_id">
                                                    <option value="">Select Regional Head</option>
                                                    <?php foreach($regional as $key => $row){?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['first_name'].' '.$row['last_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <input type="submit" class="btn btn-primary" value="Submit" style="margin-top:28px">
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <!-- Page-header end -->
                        

                            </div>
                            <!-- <form action="<?= base_url('leads/zone_upload'); ?>" method="post" enctype="multipart/form-data">
                                <input type="file" name="zone" required>
                                <input type="submit" value="submit">
                            </form> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('include/script'); ?>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
      $( "#calender" ).datepicker({
    });
    </script>

    <script>

    $("#report_date").change(function(){
        var report_date = $("#report_date").val();

        $.ajax({
            url: "<?= base_url('dashboard/get_report_data'); ?>",
            method: "post",
            data: {report_date:report_date},
            success:function(response){
                var result = JSON.parse(response);
                console.log(result);
                $('#won_report_lead').html(result['won']);
                $('#lost_report_lead').html(result['lost']);

                $('#won_cnt').html(result['won_cnt']);
                $('#won_sb').html(result['won_sb']);

                $('#lost_cnt').html(result['lost_cnt']);
                $('#lost_sb').html(result['lost_sb']);
                
                 $('#won_esca').html(result['won_esca']);
                $('#lost_esca').html(result['lost_esca']);
            }
        });
    });

    $(document).ready(function(){
        $('#won_count').html('Loading..');
        $('#lost_count').html('Loading..');
        $.ajax({
            url: "<?= base_url('dashboard/get_leads_value'); ?>",
            method: "GET",
            //data: {from_date:from_date,to_date:to_date},
            success:function(response){
                var result = JSON.parse(response);
                console.log(result);
                $('#won_count').html(result['won']);
                $('#lost_count').html(result['lost']);

            }
        });
    });
    
    </script>
</body>

</html>
