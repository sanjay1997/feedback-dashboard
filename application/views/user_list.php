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
                                    <h5 class="m-b-10">Cluster User List</h5>
                                    <ul class="breadcrumb-title b-t-default p-t-10">
                                        <li class="breadcrumb-item">
                                            <a href="index.php"> <i class="fa fa-home"></i> </a>
                                        </li>
                                       <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Page-header end -->
                            
                            <!-- Page body start -->
                            <div class="page-body">
                                <div class="row">

                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mg-b-0">List Of Cluster User</h4>
                                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                                            </div>
                                            <!-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Hoverable Rows Table.. <a href="#">Learn more</a></p> -->
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="myTable" class="table table-hover table-bordered mb-0 text-md-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr.No</th>
                                                            <th>Name</th>
                                                            <th>Contact Number</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($list_of_cluster as $key => $row){ ?>
                                                        <tr>
                                                            <th scope="row"><?= $key+1; ?></th>
                                                            <td><?= $row['first_name'].' '.$row['last_name'] ?></td>
                                                            <td><?= $row['username'] ?></td>
                                                            <td>
                                                                <!-- <a class="btn btn-main waves-light waves-effect" data-target="#modaldemo1" data-toggle="modal" href="#">ReMapping</a> -->
                                                                <a class="btn btn-main waves-light waves-effect" href="<?= base_url('leads/list_of_iso/'.$row['id'] ); ?>">View ISO</a>

                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                        
                                                  
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
        


            <div class="modal" id="modaldemo1">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Re-Maping District</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
                            <form class="form-horizontal" >
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputName" placeholder="Mayur Shelar" disabled>
                                    </div>
                                    <div class="form-group">
                                        <select class="js-example-basic-multiple form-control" multiple="multiple">
                                            <option value="AL">Mumbai City district</option>
										   <option value="saab">Thane</option>
										   <option value="audi">Palghar</option>
										   <option selected value="bmw">Raigad</option>
										   <option value="porsche">Ratnagiri</option>
										   <option value="ferrari">Sindhudurg</option>
										   <option value="mitsubishi">Nandurbar</option>
										   <option value="mitsubishi">Ahmednagar</option>
										   <option value="mitsubishi">Jalgaon</option>
										   <option value="mitsubishi">Nandurbar</option>
										   <option value="mitsubishi">Nashik</option>
										</select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div> -->
                            </form>
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="button">Save changes</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
					</div>
				</div>
			</div>








        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<?php $this->load->view('include/script'); ?>
</body>

</html>
