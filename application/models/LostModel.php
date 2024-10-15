<?php

class LostModel extends CI_Model
{

//======================================================================================================
var $table = 'lead_mgmt';
var $column_order = array('srid',null); 
var $column_search = array('srid','pr_name','pr_contact','won_value'); 
var $order = array('srid' => 'desc');
   
function get_lost_leads_list(){
    $this->_get_lost_leads_list_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
}

 private function _get_lost_leads_list_query(){
    //$this->db->select('*');
    //$this->db->where(['schmcode_m'=>$dstb_code,'type'=>1]);
    //$this->db->from('distributer_tbl');

    $yearmonth = $this->session->userdata('year_month');

    $this->db->select('lead_mgmt.*,lead_mgmt_add.*,states.name as state_name,district.name as distict_name');
    $this->db->join('lead_mgmt_add','lead_mgmt_add.pr_id = lead_mgmt.pr_id');
    $this->db->join('states','states.id = lead_mgmt_add.state_id');
    $this->db->join('district','district.id = lead_mgmt_add.district');
    $this->db->where(['created_by'=>2,'pr_status'=>'Lost']);
    $this->db->where('lead_mgmt_add.state_id !=',35)->where('lead_mgmt_add.state_id !=',30)->where('lead_mgmt_add.state_id !=',26);
    $this->db->where('lead_mgmt_add.state_id !=',17)->where('lead_mgmt_add.state_id !=',16)->where('lead_mgmt_add.state_id !=',2);
    $this->db->where('lead_mgmt_add.feedback',0);
    $this->db->like('created_datatime',$yearmonth);
    $this->db->from('lead_mgmt');
  
    $i = 0;
    foreach ($this->column_search as $data){
      
       if($_POST['search']['value']){
          if($i===0){
             $this->db->group_start();
             $this->db->like($data, $_POST['search']['value']);
          }
          else{
             $this->db->or_like($data, $_POST['search']['value']);
          }

          if(count($this->column_search) - 1 == $i) 
             $this->db->group_end(); 
       }
       $i++;
    }

    if(isset($_POST['order'])){

      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } 
    else if(isset($this->order)){
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
 }

 function lost_leads_count_filtered(){
      $this->_get_lost_leads_list_query();
      $query = $this->db->get();
      return $query->num_rows();
  }

  public function lost_leads_count_all(){
      $this->db->from($this->table);
      return $this->db->count_all_results();
  }
//======================================================================================================
}