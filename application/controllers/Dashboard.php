<?php

class Dashboard extends Admin_Controller
{
    public function __construct(){
        parent::__construct();
       // $this->load->model('AuthModel');
    }
    
    public function index(){        
        // Total Numbers of Leads Count
        $fb_id = $this->session->userdata('fb_id');
        
        $data['regional'] = $this->db->select('users.id,first_name,last_name')
        ->join('users','users.id = reports_user_tbl.userid')
        ->where(['type'=>1,'reports_user_tbl.status'=>1])
        ->get('reports_user_tbl')->result_array();

        $this->load->view('dashboard',$data);
    }
 
    public function get_won_value(){
        if ($this->input->is_ajax_request()) {
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');

            $mgmt_id = $this->session->userdata('mgmt_user_id');

            $reports_user_data = $this->db->select('userid')->where(['userid'=>$mgmt_id,'status'=>1])->get('reports_user_tbl')->row_array();

            // Get Cluster Data
            $cluster_data = $this->db->select('childId')->where(['parentId'=>$reports_user_data['userid'],'status'=>'Active'])->get('parent_child_tbl')->result_array();

            //p($cluster_data);exit;

            $iso_array = [];
            foreach ($cluster_data as $key => $value) {
                $iso_id = $this->db->select('childId')->where(['parentId'=>$value['childId'],'status'=>'Active'])->get('parent_child_tbl')->result_array();
                $iso_arr = [];
                foreach ($iso_id as $key => $row1) {
                    array_push($iso_arr,$row1['childId']);
                }
                array_push($iso_array,$iso_arr);
            }

            $district_arr_3 = [];
            foreach ($iso_array as $key => $row2) {
                
                $district_arr_2 = [];
                foreach ($row2 as $key => $row3) {
                    $district = $this->db->select('userid,district')->where('userid',$row3)->get('fetch_isocode')->result_array();
                
                    $district_arr = [];
                    foreach ($district as $key => $row4) {
                        array_push($district_arr,$row4['district']);
                    }
                    
                // p($district_arr);exit;
                    array_push($district_arr_2,$district_arr);

                }
                //p($district_arr_2);exit;
                array_push($district_arr_3,$district_arr_2);
            }

            // Multidiamensional array to get single array
            $newArray = [];
            foreach ($district_arr_3 as $key => $subArray) {
                    foreach($subArray as $val){
                        $newArray[] = $val;
                    }
            }

            // Multidiamensional array to get single array
            $new_array_1 = [];
            foreach ($newArray as $key => $single_val) {
                //array_push($nea_array_1,$single_val);
                foreach($single_val as $val1){
                    $new_array_1[] = $val1;
                }
            }

            $won_value = $this->db->select_sum('won_value')->where_in('district',array_unique($new_array_1))
            ->join('lead_mgmt','lead_mgmt.pr_id = lead_mgmt_add.pr_id')
            ->where(['created_datatime >='=>$from_date.' '.'00:00:00', 'created_datatime <='=>$to_date.' '.'00:00:00','pr_status'=>'Won','created_by'=>2,] )
            ->get('lead_mgmt_add')->result_array();
            
           //p($this->db->last_query());exit;

            echo $won_value[0]['won_value'];exit;

        }else{
            exit('No direct script access allowed');
        }
    }

    public function get_leads_value(){
        if ($this->input->is_ajax_request()) {
            $yearmonth = $this->session->userdata('year_month');

            $data['won'] = $this->db->join('lead_mgmt_add','lead_mgmt_add.pr_id = lead_mgmt.pr_id')
                          ->where(['created_by'=>2,'pr_status'=>'Won'])
                          ->like('created_datatime',$yearmonth)->get('lead_mgmt')->num_rows();

            $data['lost'] = $this->db->join('lead_mgmt_add','lead_mgmt_add.pr_id = lead_mgmt.pr_id')
                            ->where(['created_by'=>2,'pr_status'=>'Lost'])
                            ->like('created_datatime',$yearmonth)->get('lead_mgmt')->num_rows();

            echo json_encode($data);exit;
        }
        else{
            exit('No direct script access allowed');
        }
    }

    public function get_report_data(){
        if ($this->input->is_ajax_request()) {
            $report_date = $this->input->post('report_date');

            $data['won'] = $this->db->where('lead_type',1)->like('created_at',$report_date)->get('feedback_tbl')->num_rows();
            $data['lost'] = $this->db->where('lead_type',2)->like('created_at',$report_date)->get('feedback_tbl')->num_rows();

            $data['won_cnt'] = $this->db->where(['lead_type'=>1,'call_type'=>1])->like('created_at',$report_date)->get('feedback_tbl')->num_rows();
            $data['won_sb'] = $this->db->where(['lead_type'=>1,'call_type'=>2])->like('created_at',$report_date)->get('feedback_tbl')->num_rows();

            $data['lost_cnt'] = $this->db->where(['lead_type'=>2,'call_type'=>1])->like('created_at',$report_date)->get('feedback_tbl')->num_rows();
            $data['lost_sb'] = $this->db->where(['lead_type'=>2,'call_type'=>2])->like('created_at',$report_date)->get('feedback_tbl')->num_rows();
            
            $data['won_esca'] = $this->db->where(['lead_type'=>1,'call_type'=>3])->like('created_at',$report_date)->get('feedback_tbl')->num_rows();
            $data['lost_esca'] = $this->db->where(['lead_type'=>2,'call_type'=>3])->like('created_at',$report_date)->get('feedback_tbl')->num_rows();
            
            echo json_encode($data);exit;
        }
        else{
            exit('No direct script access allowed');
        }
    }
    
    public function get_won_value_old(){
        if ($this->input->is_ajax_request()) {
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');

            $mgmt_id = $this->session->userdata('mgmt_user_id');

            $reports_user_data = $this->db->select('userid')->where(['userid'=>$mgmt_id,'status'=>1])->get('reports_user_tbl')->row_array();

            // Get Cluster Data
            $cluster_data = $this->db->select('childId')->where(['parentId'=>$reports_user_data['userid'],'status'=>'Active'])->get('parent_child_tbl')->result_array();

           // p($cluster_data);exit;

            // $iso_array = [];
            // foreach ($cluster_data as $key => $value) {
            //     $iso_id = $this->db->select('childId')->where(['parentId'=>$value['childId'],'status'=>'Active'])->get('parent_child_tbl')->result_array();
            //     $iso_arr = [];
            //     foreach ($iso_id as $key => $row1) {
            //         array_push($iso_arr,$row1['childId']);
            //     }
            //     array_push($iso_array,$iso_arr);
            // }

            // $district_arr_3 = [];
            // foreach ($iso_array as $key => $row2) {
                
            //     $district_arr_2 = [];
            //     foreach ($row2 as $key => $row3) {
            //         $district = $this->db->select('userid,district')->where('userid',$row3)->get('fetch_isocode')->result_array();
                
            //         $district_arr = [];
            //         foreach ($district as $key => $row4) {
            //             array_push($district_arr,$row4['district']);
            //         }
            //         array_push($district_arr_2,$district_arr);
            //     }
            //     array_push($district_arr_3,$district_arr_2);
            // }
            
            $iso_code_arr = [];
            foreach($cluster_data as $key => $row){
                $district = $this->db->select('userid,district')->where('userid',$row['childId'])->get('fetch_isocode')->result_array();
               
                    $district_arr = [];
                    foreach ($district as $key => $row2) {
                        //array_push($district_arr,$row2['userid'],$row2['district']);
                        array_push($district_arr,$row2['district']);
                    }
                               // p($district_arr);exit;
                   // array_push($iso_code_arr,[ ]);
                    array_push($iso_code_arr,['user_id'=>$row['childId'],'district' =>$district_arr]);
            }
            
           //p($iso_code_arr);exit;

            $won_arr = [];
            foreach($iso_code_arr as $key => $row){
                
                if(!empty($row['district'])){
                    $won_value = $this->db->select_sum('won_value')->where_in('district',array_unique($row['district']))
                    ->join('lead_mgmt','lead_mgmt.pr_id = lead_mgmt_add.pr_id')
                    ->where(['created_datatime >='=>$from_date.' '.'00:00:00', 'created_datatime <='=>$to_date.' '.'00:00:00'])
                    ->get('lead_mgmt_add')->result_array();
                    //p($this->db->last_query());exit;
                    
                    $users = $this->db->select('first_name,last_name')->where('id',$row['user_id'])->get('users')->row_array();
                    array_push($won_arr,['user_id'=> $row['user_id'],'fname'=>$users['first_name'],'lname'=>$users['last_name'],'district'=>array_unique($row['district']),'won_value'=>$won_value[0]['won_value']]);
                }
                else{
                    $users = $this->db->select('first_name,last_name')->where('id',$row['user_id'])->get('users')->row_array();
                    array_push($won_arr,['user_id'=> $row['user_id'],'fname'=>$users['first_name'],'lname'=>$users['last_name'],'district'=>0,'won_value'=>0 ]);
                }
            }
            //p($won_arr);exit;
            
            $output =  '<table class="table table-hover table-bordered mb-0 text-md-nowrap">';
            $output .=  '<thead>';
            $output .=  '<tr>';
            $output .=  '<th>Sr. No.</th>';
            $output .=  '<th>Cluster ID</th>';
            $output .=  '<th>Name</th>';
            //$output .=  '<th>District</th>';
            $output .=  '<th>Won Value</th>';
            $output .=  '</tr>';
            $output .=  '</thead>';
            
            foreach ($won_arr as $key => $row) {
                    $key2 = $key+1;
                    $output .=  '<tr>';
                    $output .= '<td>' . $key2 . '</td>';
                    $output .= '<td>' . $row['user_id']. '</td>';
                    $output .= '<td>' . $row['fname'].' '.$row['lname']. '</td>';
                    //$output .= '<td>' . $row['district']. '</td>';
                     $output .= '<td>' . $row['won_value']. '</td>';
                    $output .=  '</tr>';
            }
            $output .=  '</table>';
            echo $output;exit;
            

            
            


            // Multidiamensional array to get single array
            // $newArray = [];
            // foreach ($district_arr_3 as $key => $subArray) {
            //     foreach($subArray as $val){
            //         $newArray[] = $val;
            //     }
            // }

            // Multidiamensional array to get single array
            // $new_array_1 = [];
            // foreach ($newArray as $key => $single_val) {
            //     //array_push($nea_array_1,$single_val);
            //     foreach($single_val as $val1){
            //         $new_array_1[] = $val1;
            //     }
            // }

            // $won_value = $this->db->select_sum('won_value')->where_in('district',array_unique($new_array_1))
            // ->join('lead_mgmt','lead_mgmt.pr_id = lead_mgmt_add.pr_id')
            // ->where(['created_datatime >='=>$from_date.' '.'00:00:00', 'created_datatime <='=>$to_date.' '.'00:00:00'])
            // ->get('lead_mgmt_add')->result_array();
            
            // p($this->db->last_query());exit;

            // echo $won_value[0]['won_value'];exit;

        }else{
            exit('No direct script access allowed');
        }
    }
    
    public function set_session(){
        //p($_POST);exit;
        $logindata = [
            'year_month' => $this->input->post('year_month'),
        ];
        $result = $this->session->set_userdata($logindata);
        if (1) {
            $this->session->set_flashdata('success_msg', $logindata['year']. ' Year Month Successfully Set.');
            return redirect(base_url('dashboard'));
        }else{
            $this->session->set_flashdata('error_msg',' Something went Wrong.');
            return redirect(base_url('dashboard'));
        }
    }
    

    

}
