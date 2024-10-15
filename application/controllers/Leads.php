<?php

class Leads extends Admin_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('WonModel');
        $this->load->model('SouthWonModel');

        $this->load->model('LostModel');
        $this->load->model('SouthLostModel');

        $this->load->model('ConnectedModel');
        $this->load->model('StandbyModel');
        $this->load->model('EscalatedModel');
    }

    public function index(){
        $data['regional'] = $this->db->select('users.id,first_name,last_name')
        ->join('users','users.id = reports_user_tbl.userid')
        ->where(['type'=>1,'reports_user_tbl.status'=>1])
        ->get('reports_user_tbl')->result_array();

        $data['nsm'] = $this->db->select('id,first_name,last_name')
        ->where_in('id',[311090,48123,114274])->get('users')->result_array();   

        $this->load->view('won_leads',$data);
    }
//====================================================================================================
    public function get_won_leads_list(){
		$won_data = $this->WonModel->get_won_leads_list();

		$data = array();
		$no = $_POST['start'];

		foreach ($won_data as $key => $val) {

                $zoneq = $this->db->select('zone')->where(['state_id'=>$val->state_id,'district_id'=>$val->district,'status'=>1])->get('zone_tbl')->row_array();
                if(!empty($zoneq)){
                    $zone = preg_replace('/\s+/', '',$zoneq['zone']);
                }
                else{
                    $zone = 'cz1';
                }    
                
                if(!empty($val->inside_sales_user_id)){
                    $agent = $this->db->select('name as agent_name')->where('user_id',$val->inside_sales_user_id)->get('userinsidesales_tbl')->row_array();
                    
                    $agent_name = $agent['agent_name'];
                }
                else{
                    $agent_name = 'NA';
                }
                
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $val->pr_id;
                $row[] = $val->pr_name;
                $row[] = $val->pr_contact;
                $row[] = $val->state_name;
                $row[] = $val->distict_name;
                $row[] = $val->occupation;
                $row[] = $val->pr_status;
                $row[] = $val->won_value;
                //$row[] = $val->created_datatime;
                //$row[] = $val->updated_on;
                $row[] = $agent_name;
                $action_string = '<button type="button" class="btn btn-primary btn-sm" onclick="get_lead_data('.$val->srid.','."'$val->pr_id'".','."'$zone'".')"> Map</button>';
                $row[]  = $action_string; 
                $data[] = $row;   
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->WonModel->won_leads_count_all(),
			"recordsFiltered" => $this->WonModel->won_leads_count_filtered(),
			"data" => $data,
		);

        //p($output);exit;
		echo json_encode($output);
    }

    public function south_won_leads(){
        $data['regional'] = $this->db->select('users.id,first_name,last_name')
        ->join('users','users.id = reports_user_tbl.userid')
        ->where(['type'=>1,'reports_user_tbl.status'=>1])
        ->get('reports_user_tbl')->result_array();

        $data['nsm'] = $this->db->select('id,first_name,last_name')
        ->where_in('id',[311090,48123,114274])->get('users')->result_array();
        $this->load->view('south_won_leads',$data);
    }

    public function get_south_won_leads(){
		$won_data = $this->SouthWonModel->get_south_won_leads();

		$data = array();
		$no = $_POST['start'];

		foreach ($won_data as $key => $val) {
                $zoneq = $this->db->select('zone')->where(['state_id'=>$val->state_id,'district_id'=>$val->district,'status'=>1])
                        ->get('zone_tbl')->row_array();
                if(!empty($zoneq)){
                    $zone = $zoneq['zone'];
                }
                else{
                    $zone = 'cz1';
                }  
                
                if(!empty($val->inside_sales_user_id)){
                    $agent = $this->db->select('name as agent_name')->where('user_id',$val->inside_sales_user_id)->get('userinsidesales_tbl')->row_array();
                    
                    $agent_name = $agent['agent_name'];
                }
                else{
                    $agent_name = 'NA';
                }
                
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $val->pr_id;
                $row[] = $val->pr_name;
                $row[] = $val->pr_contact;
                $row[] = $val->state_name;
                $row[] = $val->distict_name;
                $row[] = $val->occupation;
                $row[] = $val->pr_status;
                $row[] = $val->won_value;
                $row[] = $agent_name;
                //$row[] = $val->created_datatime;
                //$row[] = $val->updated_on;
                $action_string = '<button type="button" class="btn btn-primary btn-sm" onclick="get_lead_data('.$val->srid.','."'$val->pr_id'".','."'$zone'".')"> Map</button>';
                $row[]  = $action_string; 
                $data[] = $row;   
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->SouthWonModel->won_leads_count_all(),
			"recordsFiltered" => $this->SouthWonModel->won_leads_count_filtered(),
			"data" => $data,
		);

        //p($output);exit;
		echo json_encode($output);
    }
//========================================================================================================
    
    public function lost_leads(){
        $data['regional'] = $this->db->select('users.id,first_name,last_name')
        ->join('users','users.id = reports_user_tbl.userid')
        ->where(['type'=>1,'reports_user_tbl.status'=>1])
        ->get('reports_user_tbl')->result_array();

        $data['nsm'] = $this->db->select('id,first_name,last_name')
        ->where_in('id',[311090,48123,114274])->get('users')->result_array();
        $this->load->view('lost_leads',$data);
    }

    public function get_lost_leads_list(){
		$won_data = $this->LostModel->get_lost_leads_list();
        //p($won_data);exit;
		$data = array();
		$no = $_POST['start'];

		foreach ($won_data as $key => $val) {

            $zoneq = $this->db->select('zone')->where(['state_id'=>$val->state_id,'district_id'=>$val->district,'status'=>1])
                    ->get('zone_tbl')->row_array();
            if(!empty($zoneq)){
                $zone = $zoneq['zone'];
            }
            else{
                $zone = 'cz1';
            }
            
            if(!empty($val->inside_sales_user_id)){
                $agent = $this->db->select('name as agent_name')->where('user_id',$val->inside_sales_user_id)->get('userinsidesales_tbl')->row_array();
                
                $agent_name = $agent['agent_name'];
            }
            else{
                $agent_name = 'NA';
            }

			$no++;
			$row = array();
			$row[] = $no;
            $row[] = $val->pr_id;
			$row[] = $val->pr_name;
			$row[] = $val->pr_contact;
            $row[] = $val->state_name;
            $row[] = $val->distict_name;
            $row[] = $val->occupation;
            $row[] = $val->pr_status;
            $row[] = $agent_name;
			//$row[] = $val->created_datatime;
            //$row[] = $val->updated_on;
			
             $action_string = '<button type="button" class="btn btn-primary btn-sm" onclick="get_lead_data('.$val->srid.','."'$val->pr_id'".','."'$zone'".')"> Map</button>';

            $row[] = $action_string; 
			$data[] = $row;   
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->LostModel->lost_leads_count_all(),
			"recordsFiltered" => $this->LostModel->lost_leads_count_filtered(),
			"data" => $data,
		);

        //p($output);exit;
		echo json_encode($output);
    }
//============================================================================================================

public function south_lost_leads(){
    $data['regional'] = $this->db->select('users.id,first_name,last_name')
    ->join('users','users.id = reports_user_tbl.userid')
    ->where(['type'=>1,'reports_user_tbl.status'=>1])
    ->get('reports_user_tbl')->result_array();

    $data['nsm'] = $this->db->select('id,first_name,last_name')
    ->where_in('id',[311090,48123,114274])->get('users')->result_array();
    $this->load->view('south_lost_leads',$data);
}

public function get_south_lost_leads(){
    $won_data = $this->SouthLostModel->get_south_lost_leads();
    //p($won_data);exit;
    $data = array();
    $no = $_POST['start'];

    foreach ($won_data as $key => $val) {

        $zoneq = $this->db->select('zone')->where(['state_id'=>$val->state_id,'district_id'=>$val->district,'status'=>1])
                ->get('zone_tbl')->row_array();
        if(!empty($zoneq)){
            $zone = $zoneq['zone'];
        }
        else{
            $zone = 'cz1';
        }    
        
        if(!empty($val->inside_sales_user_id)){
                $agent = $this->db->select('name as agent_name')->where('user_id',$val->inside_sales_user_id)->get('userinsidesales_tbl')->row_array();
            
                $agent_name = $agent['agent_name'];
        }
        else{
            $agent_name = 'NA';
        }

        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $val->pr_id;
        $row[] = $val->pr_name;
        $row[] = $val->pr_contact;
        $row[] = $val->state_name;
        $row[] = $val->distict_name;
        $row[] = $val->occupation;
        $row[] = $val->pr_status;
        $row[] = $agent_name;
        //$row[] = $val->created_datatime;
        //$row[] = $val->updated_on;
        
         $action_string = '<button type="button" class="btn btn-primary btn-sm" onclick="get_lead_data('.$val->srid.','."'$val->pr_id'".','."'$zone'".')"> Map</button>';

        $row[] = $action_string; 
        $data[] = $row;   
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->SouthLostModel->lost_leads_count_all(),
        "recordsFiltered" => $this->SouthLostModel->lost_leads_count_filtered(),
        "data" => $data,
    );

    //p($output);exit;
    echo json_encode($output);
}


//================================================================================================================

    public function won_feedback_save(){

        if ($this->input->is_ajax_request()) {
            //p($_POST);exit;
            $data = [
                'sr_id' =>$this->input->post('sr_id'),
                'pr_id' =>$this->input->post('pr_id'),
                'question1' => $this->input->post('question1') != '' ? implode("|",$this->input->post('question1')) : '',
                'quest1_other' => $this->input->post('quest1_other'),
                'question2' => $this->input->post('question2') != '' ? implode("|",$this->input->post('question2')) : '',
                'quest2_other' => $this->input->post('quest2_other'),
                'question3' => $this->input->post('question3') != '' ? implode("|",$this->input->post('question3')) : '',
                'question4' => $this->input->post('question4'),
                'rate_product' => $this->input->post('rate_product'),
                'lead_type' =>1,
                'zone' =>$this->input->post('zone'),
                'call_type' =>$this->input->post('call_type'),
                'nsm_id' => $this->input->post('nsm_id') == "" ? '' : implode("|",$this->input->post('nsm_id')),
                'regional_id' => $this->input->post('regional_id') == "" ? '' : implode("|",$this->input->post('regional_id')),
                'fb_userid' => $this->session->userdata('fb_id'),          
            ];

            $result1 = $this->db->insert('feedback_tbl',$data);

            $result2 = $this->db->where('pr_id',$data['pr_id'])->update('lead_mgmt_add',['feedback'=>1]);

            if ($result1 && $result2) {
                echo 1;exit;
            }else{
                echo 0;exit;
            }
        }
        else{
            exit('No direct script access allowed');
        }
    }

    public function lost_feedback_save(){
        if ($this->input->is_ajax_request()) {
            $data = [
                'sr_id' =>$this->input->post('sr_id'),
                'pr_id' =>$this->input->post('pr_id'),
                'question1' => $this->input->post('question1'),
                'question2' => $this->input->post('question2'),
                'question3' => $this->input->post('question3') != '' ? implode("|",$this->input->post('question3')) : '',
                'quest3_other' => $this->input->post('quest3_other'),
                'question4' => $this->input->post('question4') != '' ? implode("|",$this->input->post('question4')) : '',
                'rate_product' => $this->input->post('rate_product'),
                'lost_value' => $this->input->post('question5'),
                'lead_type' =>2,
                'zone' =>$this->input->post('zone'),
                'call_type' =>$this->input->post('call_type'),
                'nsm_id' => $this->input->post('nsm_id') == "" ? '' : implode("|",$this->input->post('nsm_id')),
                'regional_id' => $this->input->post('regional_id') == "" ? '' : implode("|",$this->input->post('regional_id')),
                'fb_userid' => $this->session->userdata('fb_id'), 
            ];

            $result1 = $this->db->insert('feedback_tbl',$data);
            $result2 = $this->db->where('pr_id',$data['pr_id'])->update('lead_mgmt_add',['feedback'=>1]);

            if ($result1 && $result2) {
                echo 1;exit;
            }else{
                echo 0;exit;
            }
        }
        else{
            exit('No direct script access allowed');
        }
    }

//================================================================================================================

public function connected_leads(){
    $this->load->view('connected_leads');
}

public function get_connected_leads(){
    $cnt_data = $this->ConnectedModel->get_connected_leads();
    //p($cnt_data);exit;
    $data = array();
    $no = $_POST['start'];

    foreach ($cnt_data as $key => $val) {

        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $val->pr_id;
        $row[] = $val->pr_name;
        $row[] = $val->pr_contact;
        $row[] = $val->state_name;
        $row[] = $val->distict_name;
        $row[] = $val->occupation;
        $row[] = $val->pr_status;
        //$row[] = $val->created_datatime;
        //$row[] = $val->updated_on;
        
        //$action_string = '<button type="button" class="btn btn-primary btn-sm" onclick="get_lead_data('.$val->srid.','."'$val->pr_id'".')"> Map</button>';
        //$row[] = $action_string; 
        $data[] = $row;   
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->ConnectedModel->connected_leads_count_all(),
        "recordsFiltered" => $this->ConnectedModel->connected_leads_count_filtered(),
        "data" => $data,
    );

    //p($output);exit;
    echo json_encode($output);
  }

//}

public function standby_leads(){
    $this->load->view('standby_leads');
}

public function get_standby_leads(){
    $cnt_data = $this->StandbyModel->get_standby_leads();
    //p($cnt_data);exit;
    $data = array();
    $no = $_POST['start'];

    foreach ($cnt_data as $key => $val) {

        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $val->pr_id;
        $row[] = $val->pr_name;
        $row[] = $val->pr_contact;
        $row[] = $val->state_name;
        $row[] = $val->distict_name;
        $row[] = $val->occupation;
        $row[] = $val->pr_status;
        //$row[] = $val->created_datatime;
        //$row[] = $val->updated_on;
        
        //$action_string = '<button type="button" class="btn btn-primary btn-sm" onclick="get_lead_data('.$val->srid.','."'$val->pr_id'".')"> Map</button>';
        //$row[] = $action_string; 
        $data[] = $row;   
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->StandbyModel->connected_leads_count_all(),
        "recordsFiltered" => $this->StandbyModel->connected_leads_count_filtered(),
        "data" => $data,
    );

    //p($output);exit;
    echo json_encode($output);
}
//===================================================================================================================

   public function escalated_leads(){
    $this->load->view('escalated_leads');
   }


    public function get_escalated_leads(){
        $cnt_data = $this->EscalatedModel->get_escalated_leads();
        //p($cnt_data);exit;
        $data = array();
        $no = $_POST['start'];

        foreach ($cnt_data as $key => $val) {

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $val->pr_id;
            $row[] = $val->pr_name;
            $row[] = $val->pr_contact;
            $row[] = $val->state_name;
            $row[] = $val->distict_name;
            $row[] = $val->occupation;
            $row[] = $val->pr_status;
            //$row[] = $val->created_datatime;
            //$row[] = $val->updated_on;
            
            //$action_string = '<button type="button" class="btn btn-primary btn-sm" onclick="get_lead_data('.$val->srid.','."'$val->pr_id'".')"> Map</button>';
            //$row[] = $action_string; 
            $data[] = $row;   
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->EscalatedModel->escalated_leads_count_all(),
            "recordsFiltered" => $this->EscalatedModel->escalated_leads_count_filtered(),
            "data" => $data,
        );

        //p($output);exit;
        echo json_encode($output);
    }   

    public function zone_upload(){
        if($_FILES['zone']['name'] != ""){

            // $checkWrongStateData = $this->db->get('wrong_state_tbl')->result_array();
            // if(count($checkWrongStateData) > 0){
            //     $this->session->set_flashdata('error_msg','First Delete Wrong State Data then try to Import Lead Data.');
            //     redirect($this->input->post('admin/Leadmanagement/wrongstate'));
            // }
			
			$path = './uploads/';
			require_once APPPATH . "/third_party/PHPExcel.php";
			$config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls|csv';
			$config['remove_spaces'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			if(!$this->upload->do_upload('zone')){
				$error = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data' => $this->upload->data());
			}

			if (empty($error)) {
				if(!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                }else{
					$import_xls_file = 0;
				}

                $inputFileName = $path . $import_xls_file;
                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    
                    $flag = true;
                    foreach ($allDataInSheet as $value) {
                        if($flag){
                            $flag =false;
                            continue;
                        }
                        $inserdata['zone']  = $value['A'];

                        if ($value['B'] == 'Patna') {
                            $inserdata['district_id'] = 423;
                        }
                        else if($value['B'] == 'Agra'){
                            $inserdata['district_id'] = 466;
                        }
                        else if($value['B'] == 'Rampur'){
                            $inserdata['district_id'] = 383;
                        }
                        else if($value['B'] == 'Gonda'){
                            $inserdata['district_id'] = 373;
                        }
                        else if($value['B'] == 'Gonda'){
                            $inserdata['district_id'] = 373;
                        }
                        else if($value['B'] == 'Guna'){
                            $inserdata['district_id'] = 54;
                        }
                        else{
                            $disName = $this->db->select('id as district_id')->like('name',$value['B'])->get('district')->row_array();
                            if(!empty($disName)){
                                $inserdata['district_id'] = (int)$disName['district_id'];
                            }else{
                                $inserdata['district_id'] = $value['B'];
                            }
                        }

                        $stateName = $this->db->select('id as state_id')->like('name',$value['C'])->get('states')->row_array();
                        if(!empty($stateName)){
                            $inserdata['state_id'] = (int)$stateName['state_id'];
                        }else{
                            $inserdata['state_id'] = $value['C'];
                        }

                        // if(is_string($inserdata['state_id']) || is_string($inserdata['district_id'])){
                            
                        //     $inserdata['state_id'] = $value['B'];
                        //     $inserdata['district_id'] = $value['C'];
                            
                        //     $result = $this->db->insert('wrong_state_tbl',$inserdata);
                        // }else{
                        //     $result = $this->db->insert('lead_raw_tbl',$inserdata);
                        // }
                    
                        $result = $this->db->insert('zone_tbl',$inserdata);

                    }   
                    //$result = $this->db->insert_batch('service_staff_payment_tbl',$inserdata);
                        if($result){
                            $this->session->set_flashdata('success_msg','Data Imported Successfully.');
                            redirect('dashboard');
                        }else{
                            $this->session->set_flashdata('error_msg','Data Imported Successfully');
                            redirect('dashboard');
                        }  
                } catch (\Throwable $th) {
                    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME). '": '.$th->getMessage());
                }
			}else{
				echo $error['error'];
			}
		}
    }

   

}