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
                                    <h5 class="m-b-10">South Won Leads</h5>
                                    <ul class="breadcrumb-title b-t-default p-t-10">
                                        <li class="breadcrumb-item">
                                            <a href="index.php"> <i class="fa fa-home"></i> </a>
                                        </li>
                                       <li class="breadcrumb-item"><a href="#">South Won Leads</a></li>
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
                                                <table id="won_lead_list" class="table table-hover table-bordered mb-0 text-md-nowrap">
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
                                                            <th>Won Value</th>
                                                            <th>IS Agent Name</th>
                                                            <!-- <th>ISO Name</th>
                                                            <th>IS Agent</th>
                                                            <th>IS Mobile Number</th> -->
                                                            <!-- <th>Created Date</th>
                                                            <th>Responded Date</th> -->
                                                            <th>Action</th>
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

<!-- //======================================================================================================== -->

<!-- The Modal -->
<div class="modal" id="leadModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Won Leads Feedback Question</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="Modalhide()">X</button>
      </div>

      <form id="wonleadsform">
      <!-- Modal body -->
      <div class="modal-body">
            <div class="row">
                
                <div class="col-md-12 mb-3">    
                    <lable>1. Other suggestions if any</label><br>
                    <input type="text" id="question4" name="question4" class="form-control" placeholder="Enter your answer">
                </div>
                
                <div class="col-md-12 mb-3">
                    
                    <input type="hidden" id="sr_id" name="sr_id">
                    <input type="hidden" id="pr_id" name="pr_id">

                    <lable>2. What did you like most about the product? <span class="text-danger">*</span></label><br>
                    <input type="checkbox" id="Aesthestics/ Design" name="question1[]" value="Aesthestics/ Design">
                    <label for="Aesthestics/ Design"> Aesthestics/ Design</label><br>

                    <input type="checkbox" id="Sales executive experience" name="question1[]" value="Sales executive experience">
                    <label for="Sales executive experience"> Sales executive experience</label><br>
                    
                    <input type="checkbox" id="Timely delivery of products" name="question1[]" value="Timely delivery of products">
                    <label for="Timely delivery of products"> Timely delivery of products </label><br>

                    <input type="checkbox" id="ques1_other_cb" name="question1[]" value="Other" onclick="ques1othercb()">
                    <label for="ques1_other_cb" onclick="ques1othercb()"> Other </label>
                    <input type="text" class="form-control" placeholder="Enter Other Here" name="quest1_other" id="quest1_other">

                </div>

                <div class="col-md-12 mb-3">
                    <lable>3. What could be improved? <span class="text-danger">*</span></label><br>
                    <input type="checkbox" id="Aesthestics/ Design" name="question2[]" value="Price">
                    <label for="Price"> Price</label><br>

                    <input type="checkbox" id="Sales executive experience q2" name="question2[]" value="Sales executive experience">
                    <label for="Sales executive experience q2"> Sales executive experience</label><br>
                    
                    <input type="checkbox" id="Availability of material" name="question2[]" value="Availability of material">
                    <label for="Availability of material"> Availability of material </label><br>

                    <input type="checkbox" id="ques2_other_cb" name="question2[]" value="Other" onclick="ques2othercb()">
                    <label for="ques2_other_cb" onclick="ques2othercb()"> Other </label>
                    <input type="text" class="form-control" placeholder="Enter Other Here" name="quest2_other" id="quest2_other">
                </div>

                <div class="col-md-12 mb-3">
                    <lable>4. If given the choice again today, would you still buy our product? <span class="text-danger">*</span></label><br>
                    <input type="checkbox" id="Yes" name="question3[]" value="Yes">
                    <label for="Yes"> Yes</label><br>

                    <input type="checkbox" id="No" name="question3[]" value="No">
                    <label for="No"> No</label><br>
                    
                    <input type="checkbox" id="Maybe" name="question3[]" value="Maybe">
                    <label for="Maybe"> Maybe </label><br>

                    <input type="checkbox" id="NA" name="question3[]" value="NA">
                    <label for="NA"> NA </label><br>
                </div>

                <div class="col-md-12 mb-3">
                    <lable>5. Overall, how would you rate our product?</label><br>
                    <select name="rate_product" class="form-control">
                        <option value="">Select Product Rate</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                     <label>6. Regional Zone <span class="text-danger">*</span></label><br>                
                     <select name="zone" class="form-control" id="zone" required>
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


                <div class="col-md-12 mb-3">
                     <label>7. Call Type <span class="text-danger">*</span></label><br>                
                     <select name="call_type" class="form-control" id="call_type" required>
                        <option value="">Select Call Type</option>
                        <option value="1">Connected Leads</option>
                        <option value="2">Standby Leads</option>
                        <option value="3">Escalated Leads</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3 nsm_id">
                     <label>8. NSM </label><br>                
                     <select name="nsm_id[]" class="form-control js-example-basic-multiple" id="nsm_id" multiple="multiple">
                        <option value="">Select NSM Head</option>
                        <?php foreach($nsm as $key => $row){?>
                        <option value="<?= $row['id'] ?>"><?= $row['first_name'].' '.$row['last_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-12 mb-3 regional_id">
                     <label>9. Regional Head </label><br>                
                     <select name="regional_id[]" class="form-control js-example-basic-multiple" id="regional_id" multiple="multiple">
                        <option value="">Select Regional Head</option>
                        <?php foreach($regional as $key => $row){?>
                        <option value="<?= $row['id'] ?>"><?= $row['first_name'].' '.$row['last_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
       <button type="button" id="BtnSubmitWon" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" onclick="Modalhide()" data-bs-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>

<?php $this->load->view('include/script'); ?>

<script>
    $(document).ready(function(){
        $("#quest1_other,#quest2_other").hide();
        $(".nsm_id,.regional_id").hide();

        $("#won_lead_list").DataTable({
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "ajax":{
                "url": "<?= base_url('leads/get_south_won_leads'); ?>",
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

    function get_lead_data(lead_id,pr_id,zone){
        console.log(lead_id);
        console.log(pr_id);
        $("#sr_id").val(lead_id);
        $("#pr_id").val(pr_id);
        $("#zone").val(zone);

        $("#leadModal").modal('show');
    }

    function Modalhide(){
        $("#leadModal").modal('hide');
    }

    function ques1othercb(){
        if($('#ques1_other_cb').prop('checked')) {
            $("#quest1_other").show();
        }else{
            $("#quest1_other").hide();
        }
    }

    function ques2othercb(){
        if($('#ques2_other_cb').prop('checked')) {
            $("#quest2_other").show();
        }else{
            $("#quest2_other").hide();
        }
    }

    $("#BtnSubmitWon").click(function(){
        $("#BtnSubmitWon").hide();

        //=====================================================================    
       const question1 = document.getElementsByName("question1[]");
       const q1minreq = 1;
       let q1count = 0;

       for (var i = 0; i < question1.length; i++) {
        if (question1[i].checked) {
            q1count++;
        }
       }

       if (q1count < q1minreq) {
            toastr.error('Question 1 is required.');
            $("#BtnSubmitWon").show();
            return false;
        }
    //===================================================================== 
       const question2 = document.getElementsByName("question2[]");
       const q2minreq = 1;
       let q2count = 0;

       for (var i = 0; i < question2.length; i++) {
        if (question2[i].checked) {
            q2count++;
        }
       }

       if (q2count < q2minreq) {
            toastr.error('Question 2 is required.');
            $("#BtnSubmitWon").show();
            return false;
        }
    //===================================================================== 

    const question3 = document.getElementsByName("question3[]");
       const q3minreq = 1;
       let q3count = 0;

       for (var i = 0; i < question3.length; i++) {
        if (question3[i].checked) {
            q3count++;
        }
       }

       if (q3count < q3minreq) {
            toastr.error('Question 3 is required.');
            $("#BtnSubmitWon").show();
            return false;
        }
    //=====================================================================
    var zone = $("#zone").val();
    if (zone == "") {
        toastr.error('Zone is required !');
        $("#BtnSubmitWon").show();
        return false;
    }
    //========================================================================
        var call_type = $("#call_type").val();
        if (call_type == "") {
            toastr.error('Call type is required !');
            $("#BtnSubmitWon").show();
            return false;
        }

        var data = $("#wonleadsform").serialize();
        // console.log(data);
        $.ajax({
            url: "<?= base_url('leads/won_feedback_save'); ?>",
            method: "POST",
            data: data,
            success:function(res){
                console.log(res);
                //return false;
                //var result = JSON.parse(response);
                if (res == 1) {
                    toastr.success('Won Leads Feedback Successfully Save.');
                    $("#leadModal").modal('hide');
                    //$("#wonleadsform").reset();
                    $('#wonleadsform').trigger("reset");
                    location.reload();
                }else{
                    toastr.error('Something weent wrong.');
                }
                $("#BtnSubmitWon").show();  
            }
        });
    });

    $("#call_type").change(function(){
        var call_type = $("#call_type").val();
        if(call_type == 3){
            $(".nsm_id,.regional_id").show();
        }else{
            $(".nsm_id,.regional_id").hide();
        }
    });
   
</script>

</body>

</html>
