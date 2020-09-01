<?php
class Login extends My_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('id')){
            return redirect('admin/welcome');
        }
        
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
                return redirect('../admin/welcome');
                //this will call the welcome function in admin controller
            }
            else{
                $this->session->set_flashdata('Login_failure','invalid username or password');
                redirect('login');
            }
        }
    else{
        $this->load->view('admin/login');
        }
}}
?>