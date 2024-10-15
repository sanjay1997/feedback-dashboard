<?php

class Auth extends CI_Controller
{
    public function __construct(){
        parent::__construct();
       $this->load->model('AuthModel');
    }
    
    public function index(){

        if($this->input->method() == 'post'){
        
                $email_id = $this->input->post('email_id');
                $password = $this->input->post('password');
                
                $login = $this->AuthModel->check_login($email_id,$password);

                if($login == 0){
						$this->session->set_flashdata('error_msg',' Invalid Password.');
                        return redirect(base_url());
        			    
                }elseif($login == 01) {
                    $this->session->set_flashdata('error_msg',' Your Username and Password is Inactive.');
                    return redirect(base_url());
                }
                elseif($login['status'] == 1){
                        //p($login);exit;

                        $logindata = [
                            'fb_id'        => $login['user_id'],
                            'fb_logged_in' => true,
                            'fb_fname'     => $login['name'],
                            'fb_email'     => $login['email'],
                            'fb_mobile'     => $login['mobile'],
                            'year_month'  => date('Y-m'),
                        ];
                        $this->session->set_userdata($logindata);

                        $this->session->set_flashdata('success_msg',' Logged in Successfully.');
                        return redirect(base_url('dashboard'));

                }elseif($login == 2){
                    $this->session->set_flashdata('error_msg',' Invalid Username / Mobile No.');
                    return redirect(base_url());
                }
        }

        if ($this->session->userdata('fb_logged_in') && $this->session->userdata('fb_id') && $this->session->userdata('fb_fname')) {
            //$this->session->set_flashdata('error_msg',' Please Login First !');
        	return redirect(base_url('dashboard'));
        }

        $this->load->view('login');
    }

    public function logout(){
        $userlogindata = ['fb_id','fb_logged_in','fb_fname','fb_lname'];
        $this->session->unset_userdata($userlogindata);
        $this->session->set_flashdata('success_msg',' You Have Successfully Log Out.');
        return redirect(base_url());
    }
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
