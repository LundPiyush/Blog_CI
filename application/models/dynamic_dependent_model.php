<?php
class dynamic_dependent_model extends CI_model{
    public function fetch_country(){
        //echo <pre>;
        $q=$this->db->order_by("country_name","ASC")->get("country");
        return $q->result();
        
    }
    public function fetch_state($country_id){
    
        $this->db->where('country_id',$country_id);
        $this->db->order_by('state_name','ASC');
        $query=$this->db->get('state');
        $output='<option value="">Select State</option>';
        foreach($query->result() as $row)
        {
        $output .= '<option value="'.$row->state_id.'">'.$row->state_name.'</option>';
       }
        return $output;
    }
function fetch_city($state_id)
 {
  $this->db->where('state_id', $state_id);
  $this->db->order_by('city_name', 'ASC');
  $query = $this->db->get('city');
  $output = '<option value="">Select City</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
  }
  return $output;
 }
}