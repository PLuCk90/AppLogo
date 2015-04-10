<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_c extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model('users_m');
        $this->check_language();
    }

    public function redirection()
    {
    	if($this->session->userdata('description_right')!='admin'){
        redirect('main_c');
        }
    }

    public function check_language()
    {
      $this->lang->is_loaded = array();
      $this->lang->language = array();
      $files = array('view','calendar','date','db','email','form_validation','ftp','imglib','migration','number','profiler','unit_test','upload');
      foreach ($files as $key => $file) {
        $this->lang->load($file, $this->session->userdata('description_language') );  
      }
      
    }

    public function index()
    {
        $this->redirection();
        $this->display_admin_main();
        
    }

    public function display_admin_main($data=null)
    {
    	$this->load->view('head_v');
    	$data['title']="Panneau d'administration";
        $this->load->view('admin/navAdmin_v');  
        $this->load->view('admin/indexAdmin_v',$data);
        $this->load->view('admin/footerAdmin_v');
    }

    public function display_users($data=null)
    {
        $this->redirection();
        $this->load->view('head_v');
        $data['title']="Panneau d'administration";
        $data['users']=$this->users_m->getAllUsers();
        $data['languages']=$this->users_m->getAllLanguages();
        $data['sessions']=$this->users_m->getactiveSessions();
        //print_r($data['sessions']);
        $this->load->view('admin/navAdmin_v');  
        $this->load->view('admin/manageUsers_v',$data);
        $this->load->view('admin/footerAdmin_v');
    }

    public function display_alterUser($data=null)
    {
        $this->load->view('head_v');
        $data['title']="Panneau d'administration";
        $data['rightDropdown']=$this->users_m->getRightDropdown();
        $this->load->view('admin/navAdmin_v');  
        $this->load->view('admin/alterUser_v',$data);
        $this->load->view('admin/footerAdmin_v');
    }

    public function alterUser($id)
    {
        $this->redirection();
        $data=$this->users_m->getUserById($id);
        unset($data['password_user']);
        $this->display_alterUser($data);
    }

    public function validation_alterUser()
    {
        //print_r($this->input->post('pass'));
        $id=$this->input->post('id_user'); 
        $data= array(    
                'name_user'=>$this->input->post('name_user'), 
                'firstname_user'=>$this->input->post('firstname_user'),
                'mail_user'=>$this->input->post('mail_user'),
                'phone_user'=>$this->input->post('phone_user'),
                'id_right_user'=>$this->input->post('id_right')
            ); 
        $this->form_validation->set_rules('firstname_user',lang('firstname_label'),'trim|required|min_length[2]|max_length[12]');
        $this->form_validation->set_rules('name_user',lang('name_label'),'trim|required|min_length[2]|max_length[12]');
        $this->form_validation->set_message('integer', lang('phone_validation_message'));
        $this->form_validation->set_rules('phone_user',lang('phone_label'),'trim|required|integer|exact_length[10]');
        $this->form_validation->set_rules('mail_user',lang('mail_label'),'trim|required|valid_email');
        $this->form_validation->set_rules('id_right', lang('rights_label'), 'trim|callback_dropdown_check'); 

        $this->form_validation->set_error_delimiters('<span class="error">','</span>');  

        if($this->form_validation->run() == False){
            $this->display_alterUser($data);
        } 
        else 
        {     
            //if($donnees['pass']==''){unset($donnees['pass']);}
            $this->users_m->updateUser($id,$data);
            redirect('admin_c/display_users');
        }
    }
    
    public function dropdown_check($str)
    {
        $this->form_validation->set_message('dropdown_check', lang('dropdown_validation_message'));
        if ($str == NULL| $str == "other")
        {
            return FALSE;
        }
        else
        {
            return TRUE;         
        }
    }


    public function delUser($id)
    {
        $this->redirection();
        if(is_numeric($id))
        $this->users_m->deleteUser($id);
        redirect('/admin_c/display_users');
    }

    public function changeLanguage($id,$lang,$desc_lang)
    {
        $this->redirection();
        if(is_numeric($id))
        $data= array('id_language_user'=>$lang);
        $this->users_m->updateUser($id,$data);
        if($id == $this->session->userdata('id_user')){
        $array= array('description_language'=>$desc_lang);
        $this->session->set_userdata($array);
        $this->check_language();  
        }
        $this->display_users();

    }

    

}