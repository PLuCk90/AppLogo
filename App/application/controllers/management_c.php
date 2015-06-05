<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class management_c extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string','random_password'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model('users_m');
        $this->users_m->check_language();
    }
    public function redirection()
    {
        if($this->session->userdata('activation_user')=="0")
        {
        redirect('main_c/display_activation_alert'); 
        }
    	if($this->session->userdata('description_right')!='management'){
        redirect('main_c');
        }
    }

    public function index()
    {
        $this->display_management_main();
    }

    public function display_management_main($data=null)
    {
        $this->redirection();
    	$this->load->view('head_v');
        $this->load->view('management/navMana_v');  
        $this->load->view('management/indexMana_v',$data);
        $this->load->view('admin/footerAdmin_v');
    }


    public function manage_my_account($id)
    {
        $this->redirection(); 
        $data=$this->users_m->getUserById($id);
        unset($data['password_user']);
        $this->display_accountUser($data); 
    }

    public function display_accountUser($data=null)
    {
        $this->load->view('head_v');
        $data['languages']=$this->users_m->getAllLanguages();
        $this->load->view('management/navMana_v');  
        $this->load->view('management/accountUser_v',$data);
        $this->load->view('admin/footerAdmin_v');
    }

    public function validation_accountUser()
        {

            //  print_r($this->input->post('pass'));
            $id=$this->input->post('id_user'); 
            $data= array(    
                    'mail_user'=>$this->input->post('mail_user'),
                    'phone_user'=>$this->input->post('phone_user'),
                    'password_user'=>$this->input->post('password_user'),
                    'id_language_user'=>$this->input->post('id_lang')
                ); 
 
            
            $this->form_validation->set_message('integer', lang('phone_validation_message'));
            $this->form_validation->set_rules('phone_user',lang('phone_label'),'trim|required|integer|exact_length[10]');
            $this->form_validation->set_rules('mail_user',lang('mail_label'),'trim|required|valid_email'); 
            $this->form_validation->set_rules('id_lang', lang('lang_label'), 'trim|callback_dropdown_check');
            $this->form_validation->set_rules('password_user', lang('password_label'), 'trim|min_length[4]|alpha_numeric');
            $this->form_validation->set_rules('confirm_password_user', lang('password_label'), 'trim|callback_password_check');

            $this->form_validation->set_error_delimiters('<span class="error fi-alert"> ','</span>');  

            if($this->form_validation->run() == False){
                $this->display_accountUser($data);
            } 
            else 
            {   
                if($data['password_user']==""){unset($data['password_user']);} 
                $this->users_m->updateUser($id,$data);  
                $check = array('id_user'=>$this->input->post('id_user'));
                print_r($check);
                $data_session=$this->users_m->check_user($check);
                print_r($data_session);
                $this->session->set_userdata($data_session);
                $this->users_m->check_language();
                redirect('management_c/index');
            }
                
        }

    public function password_check($str)
    {
        //print_r('password : ');var_dump($this->input->post('password_user'));
        //print_r('<br>confirm : ');var_dump($str);
        //print_r('<br>strcmp : ');print_r(strcmp($str,$this->input->post('password_user')));
        $this->form_validation->set_message('password_check', lang('password_match_message'));
        if (strcmp($str,$this->input->post('password_user')) != 0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;         
        }
    }
   }