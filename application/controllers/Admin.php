<?php
class Admin extends My_Controller{
    
    public function __construct(){
        parent::__construct();
        //..................nhi samjha yeh part...................
        //if(!($this->session->userdata('id'))){
          //  return redirect('login');}
    }
    
    
    
    
    
    public function index(){
        //Form validation
        //Step 1:Load the library
    $this->load->library('form_validation');
        
        //Step 2:Setting Validation Rules
    $this->form_validation->set_rules('uname','User Name','required|alpha');
    $this->form_validation->set_rules('pass','Password','required|max_length[12]');
    //error showing in red colour ke liye likha hai set_error_delimiters
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        //Step3:Check form_validation
        if($this->form_validation->run()){
            //input is a class which recieves the value from the form feild
            $uname=$this->input->post('uname');
            $pass=$this->input->post('pass');
             
            //loading the model
            $this->load->model('loginmodel');
            $id=$this->loginmodel->isvalidate($uname,$pass);
            if($id)
            //if is true if it get a positive no like 1,2,3.....    
            {
                //$this->load->library('session'); yeh line likhne ki need nhi hai bcz session autload mein jake autload kara diya gaya hai
                
                $this->session->set_userdata('id',$id);
                return redirect('admin/welcome');
                //this will call the welcome function in admin controller
            }
            else{
            $this->session->set_flashdata('Login_failure','invalid username or password');
                return redirect('login');

            }
        }
    else{
        $this->load->view('admin/login');
        }
    }
    
    
    
    
    
    public function welcome()
    {   
        
        $this->load->model('loginmodel');
        //pagination logic(refer pagination.txt file in blog folder)
        
        $this->load->library('pagination');
        $config=[
            'base_url'=>base_url('admin/welcome'),
            'per_page'=>2,
            'total_rows'=>$this->loginmodel->num_rows(),
            'full_tag_open'=>"<ul class='pagination'>",
            'full_tag_close'=>"</ul>",
            'next_tag_open' =>"<li>",
            'next_tag_close' =>"</li>",
            'prev_tag_open' =>"<li>",
            'prev_tag_close' =>"</li>",
            'num_tag_open' =>"<li>",
            'num_tag_close' =>"</li>",
            'cur_tag_open' =>"<li class='active'><a>",
            'cur_tag_close' =>"</a></li>"
        ];
        
        $this->pagination->initialize($config);
        
        
        $articles=$this->loginmodel->articlelist($config['per_page'],$this->uri->segment(3));
        // we are fetching all the articles from articlelist function and storing in $articles variable
     
        //['articles'=>$articles] this means we are passing the data of articles on dashboard page in the form of key-value pair
     
        $this->load->view('admin/dashboard',['articles'=>$articles]);
    }
    
    public function register(){
        
    $this->load->view('admin/register');
    }
    public function sendemail(){
    $this->form_validation->set_rules('username','User Name','required|alpha');
    $this->form_validation->set_rules('password','Password','required|max_length[12]');
        $this->form_validation->set_rules('firstname','First Name','required|alpha');
        $this->form_validation->set_rules('lastname','Last Name','required|alpha');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
        
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        if($this->form_validation->run()){
            $post=$this->input->post();
            $this->load->library('encrypt');
            $password=$this->encrypt->encode($this->input->post('password'));
            echo $password;
            exit();
            $this->load->model('loginmodel','add_user');
            if($this->add_user->adding_user($post)){
                $this->session->set_flashdata('user','User addded Successfully');
                $this->session->set_flashdata('user_class','alert-success');
                
            }
            else{
                $this->session->set_flashdata('user','User  not addded');
                $this->session->set_flashdata('user_class','alert-danger');
            }
            return redirect('users/register');
//            $this->load->library('email');
//            
//            $this->email->from(set_value('email'),set_value('fname'));
//
//            $this->email->to("piyushlund349@gmail.com");
//            $this->email->subject("Registration Greeting...");
//            $this->email->message("Thank  You for Registratiion");
//            $this->email->set_newline("\r\n");
//            $this->email->send();
//
//            if (!$this->email->send()) {
//                    show_error($this->email->print_debugger()); }
//            else {
//                    echo "Your e-mail has been sent!";
//                }
//        }
//        else{
//            $this->load->view('admin/register');
//        }

        }
        else{
            $this->load->view('admin/register.php');
        }
    }
        
public function addUser(){
        $this->load->view('admin/add_article');
        
    }

    public function userValidation(){
        $config=[
            'upload_path'=>'./upload/',
            'allowed_types'=>'gif|jpg|png',
        ];
        $this->load->library('upload',$config);
        
        //New type of validation(config files mein rules likhe hai) 
    if($this->form_validation->run('add_article_rules') && $this->upload->do_upload()){
            //new type of recieving the whole data from form tag
            //$this->input->post('title'); recieves one data at a time{first method}
            
            //second method -recieves whole data at a time
            
            $post=$this->input->post();
            $data=$this->upload->data();  //it gives info. regarding the file uploaded eg file name,file extc,size etc
        
            $image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
            $post['image_path']=$image_path;
        
            
            $this->load->model('loginmodel','useradd');
            if($this->useradd->add_articles($post)){
                $this->session->set_flashdata('msg','Inserted Successfully');
                $this->session->set_flashdata('msg_class','alert-success');

                
            }
            else{
                $this->session->set_flashdata('msg','Article not added plz try again!!');
                $this->session->set_flashdata('msg_class','alert-danger');
                

            }
            return redirect('admin/welcome');
            
    }
        else{
            $upload_error=$this->upload->display_errors();
            $this->load->view('admin/add_article',compact('upload_error'));
        //compact function convert the variable into array
        }
    }
    
    public function editarticle(){
        $id=$this->input->post('id');
        $this->load->model('loginmodel','editarticle');
        $rt=$this->editarticle->find_article($id);
        $this->load->view('admin/edit_article',['article'=>$rt]);
    }
    public function delarticle(){
        
        $id=$this->input->post('id');
        
        $this->load->model('loginmodel','delarticle');
            if($this->delarticle->del_article($id)){
                $this->session->set_flashdata('msg','Deleted Successfully');
                $this->session->set_flashdata('msg_class','alert-success');

                
            }
            else{
                $this->session->set_flashdata('msg','Article not deleted plz try again!!');
                $this->session->set_flashdata('msg_class','alert-danger');
                

            }
            return redirect('admin/welcome');

}
    
    
    public function updatearticle($article_id){

        //New type of validation(config files mein rules likhe hai) 
        if($this->form_validation->run('add_article_rules')){
            //new type of recieving the whole data from form tag
            //$this->input->post('title'); recieves one data at a time{first method}
            
            //second method -recieves whole data at a time
            
            $post=$this->input->post();
            //$article_id=$post['article_id'];
            //unset($article_id);

            $this->load->model('loginmodel','update_art');
            if($this->update_art->update_article($article_id,$post)){
                $this->session->set_flashdata('msg','Article Updated Successfully');
                $this->session->set_flashdata('msg_class','alert-success');

                
            }
            else{
                $this->session->set_flashdata('msg','Article not updated plz try again!!');
                $this->session->set_flashdata('msg_class','alert-danger');
                

            }
            return redirect('admin/welcome');
        }//outer if ends
        else{
            $this->load->view('admin/editarticle');
        }
    }
    
    
    
    
    public function logout(){
        $this->session->unset_userdata('id');
        return redirect('admin/index');
    }
}
?>