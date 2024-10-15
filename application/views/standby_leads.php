<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('include/head'); ?>
</head>

  <body>
  <body>
	  <!-- <div class="fixed-button">
		<a href="https://codedthemes.com/item/gradient-able-admin-template" target="_blank" class="btn btn-md btn-primary">
			<i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
		</a>
	  </div> -->
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
                            <!-- Page-header start -->
                            <div class="page-header card">
                                <div class="card-block">
                                    <h5 class="m-b-10">Connected Leads</h5>
                                    <ul class="breadcrumb-title b-t-default p-t-10">
                                        <li class="breadcrumb-item">
                                            <a href="index.php"> <i class="fa fa-home"></i> </a>
                                        </li>
                                       <li class="breadcrumb-item"><a href="#">Connected Leads</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Page-header end -->
                            
                            <!-- Page body start -->
                            <div class="page-body">
                                <div class="row">

                                <div class="col-xl-12">
                                    <div class="card pt-4">
                                        <div class="fiter px-4 d-none">
                                            <form action="<?= base_url('leads/download_un_response_leads'); ?>" method="post">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <a href="<?= base_url('dashboard'); ?>" class="btn btn-main waves-light waves-effect">Back</a>
                                                    <a href="<?= base_url('leads/delay_leads_download'); ?>" class="btn btn-main waves-light waves-effect">Downlaod</a>
                                                </div>    
                                                
                                            </div>
                                            </form>
                                        </div>
                                        <hr>
                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between d-none">
                                                <!-- <h4 class="card-title mg-b-0" style="margin-right:600px">  Won Leads</h4> -->
                                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="cnt_leads" class="table table-hover table-bordered mb-0 text-md-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr.No</th>
                                                            <th>Project ID</th>
                                                            <th>Name</th>
                                                            <th>Contact Number</th>
                                                            <th>State</th>
                                                            <th>District</th>
                                                            <th>Occupation</th>
                                                            <th>Status</th>
                                                            <!-- <th>ISO Name</th>
                                                            <th>IS Agent</th>
                                                            <th>IS Mobile Number</th> -->
                                                            <!-- <th>Created Date</th>
                                                            <th>Responded Date</th> -->
                                                            <!-- <th>Action</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                   
                                </div>
                            </div>
                            <!-- Page body end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php $this->load->view('include/script'); ?>

<script>
    $(document).ready(function(){
        $("#cnt_leads").DataTable({
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "ajax":{
                "url": "<?= base_url('leads/get_standby_leads'); ?>",
                "type": "POST"
                },
                "columnDefs":[
                    {
                    "targets": [ -1 ],
                    "orderable": false, 
                    }
            ],
        });
    });
</script>

</body>

</html>
