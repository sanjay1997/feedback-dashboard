<?php

class EscalatedModel extends CI_Model
{

//======================================================================================================
var $table = 'feedback_tbl';
var $column_order = array('lead_mgmt.srid',null); 
var $column_search = array('lead_mgmt.srid','lead_mgmt.pr_name','lead_mgmt.pr_contact'); 
var $order = array('feedback_tbl.id' => 'desc');
   
function get_escalated_leads(){
    $this->_get_escalated_leads_list_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
}

 private function _get_escalated_leads_list_query(){
   
    $yearmonth = $this->session->userdata('year_month');

    $this->db->select('lead_mgmt.*,lead_mgmt_add.*,states.name as state_name,district.name as distict_name');
    $this->db->join('lead_mgmt','lead_mgmt.pr_id = feedback_tbl.pr_id');
    $this->db->join('lead_mgmt_add','lead_mgmt_add.pr_id = lead_mgmt.pr_id');
    $this->db->join('states','states.id = lead_mgmt_add.state_id');
    $this->db->join('district','district.id = lead_mgmt_add.district');
    $this->db->where(['call_type'=>3]);
    //$this->db->where_in('lead_mgmt.pr_id',$new_pr_id);
    $this->db->like('created_at',$yearmonth);
    $this->db->from('feedback_tbl');
  
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

 function escalated_leads_count_filtered(){
      $this->_get_escalated_leads_list_query();
      $query = $this->db->get();
      return $query->num_rows();
  }

  public function escalated_leads_count_all(){
      $this->db->from($this->table);
      return $this->db->count_all_results();
  }
//======================================================================================================
}