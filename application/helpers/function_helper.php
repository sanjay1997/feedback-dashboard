<?php

function p($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}


function check_ptp_kyc($dstb_id){
    $ci = & get_instance();
    $ci->load->database();

    $count = $ci->db->select('kyc_status')->where(['dstb_id'=>$dstb_id])->get('dstbkyc_tbl')->num_rows();
    if ($count > 0) {
        $kyc = $ci->db->select('kyc_status')->where(['dstb_id'=>$dstb_id])->get('dstbkyc_tbl')->row_array();
        if ($kyc['kyc_status'] == 1) {
            return 1;  
        }
        else if ($kyc['kyc_status'] == 2) {
            return 2;  
        } 
        else if ($kyc['kyc_status'] == 3) {
            return 3;  
        } 
    }else{
        return 0;
    }
}

function get_leads_value($status){
    $ci = & get_instance();
    $ci->load->database();
    $yearmonth = $ci->session->userdata('year_month');

    //$count = $ci->db->where(['user_id'=>$user_id,'status'=>$status])->get('lead_raw_tbl')->num_rows();
    $count = $ci->db->join('lead_mgmt_add','lead_mgmt_add.pr_id = lead_mgmt.pr_id')
    ->where(['created_by'=>2,'pr_status'=>$status])
    ->where('lead_mgmt_add.state_id !=',35)->where('lead_mgmt_add.state_id !=',30)->where('lead_mgmt_add.state_id !=',26)
    ->where('lead_mgmt_add.state_id !=',17)->where('lead_mgmt_add.state_id !=',16)->where('lead_mgmt_add.state_id !=',2)
    ->where('lead_mgmt_add.feedback',0)
    ->like('created_datatime',$yearmonth)->get('lead_mgmt')->num_rows();
    if ($count > 0) {
        return $count;
    } else {
        return 0;
    }
}

function get_south_leads_value($status){
    $ci = & get_instance();
    $ci->load->database();
    $yearmonth = $ci->session->userdata('year_month');

    //$count = $ci->db->where(['user_id'=>$user_id,'status'=>$status])->get('lead_raw_tbl')->num_rows();
    $count = $ci->db->join('lead_mgmt_add','lead_mgmt_add.pr_id = lead_mgmt.pr_id')
    ->where(['created_by'=>2,'pr_status'=>$status])
    ->where_in('lead_mgmt_add.state_id',[35,30,26,17,16,2])
    ->like('created_datatime',$yearmonth)->get('lead_mgmt')->num_rows();
    if ($count > 0) {
        return $count;
    } else {
        return 0;
    }
}



function get_feedback_count($call_type){
    $ci = & get_instance();
    $ci->load->database();
    $yearmonth = $ci->session->userdata('year_month');

    //$count = $ci->db->where(['user_id'=>$user_id,'status'=>$status])->get('lead_raw_tbl')->num_rows();
    $count = $ci->db->where('call_type',$call_type)->like('created_at',$yearmonth)->get('feedback_tbl')->num_rows();
    if ($count > 0) {
        return $count;
    } else {
        return 0;
    }
}
