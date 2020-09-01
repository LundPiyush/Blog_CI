<?php
class Loginmodel extends CI_Model{
    public function isvalidate($username,$password){
        
        
        
        //Database Logic
        $q=$this->db->where(['username'=>$username,'password'=>$password])
                    ->get('users');
    //QUERY->select * from users where username=$username and password=$password
        
        if($q->num_rows()){
            return $q->row()->id;
            //It returns the id of the user ...row is a function which returns nliy the first row.The result is returned as object.
        }
        else{
            return false;
        }
    
}
    public function articlelist($limit,$offset)
        {   
        //$this->load->library('session'); yeh line likhne ki need nhi hai bcz session autload mein jake autload kara diya gaya hai
        $id=$this->session->userdata('id');
        $q=$this->db->select()->from('articles')->where(['user_id'=>$id])->limit($limit,$offset)->get();
     return $q->result();
        
     
        
        
    }
    
    public function add_articles($array){
        //$date=date("Y/m/d");
        
        return $this->db->insert('articles',$array);
    }
    
    public function adding_user($array){
        return $this->db->insert('users',$array);
        
}
    public function update_article($id,$array){
        return $this->db->where('id',$id)->update('articles',$array);
    }
    public function del_article($id){
        return $this->db->delete('articles',['id'=>$id]);
        //delete from articles where id =$id;
    }
    
    public function find_article($id){
        $q =$this->db->select(['article_title','article_body','id'])->where('id',$id)->get('articles');
        return $q->row();        
    }
    
    
    public function num_rows(){
        $id=$this->session->userdata('id');
        $q=$this->db->select()->from('articles')->where(['user_id'=>$id])->get();
     return $q->num_rows();

    }
public function all_articles_count(){
    $q=$this->db->select()->from('articles')->get();
    return $q->num_rows();
    
}
    public function all_articleList($limit,$offset){
        $q=$this->db->select()->from('articles')->limit($limit,$offset)->get();
        return $q->result();
        
    }
}
?>