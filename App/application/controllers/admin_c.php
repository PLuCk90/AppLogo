<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_c extends CI_Controller {
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
        //print_r($this->session->userdata('activation_user'));
        if($this->session->userdata('activation_user')=='0'){
        redirect('main_c/display_activation_alert'); 
        }
    	if($this->session->userdata('description_right')!='admin'){
        redirect('main_c');
        }
    }

    

    public function index()
    {
        $this->redirection();
        $this->display_admin_main();
        
    }

    public function display_admin_main($data=null)
    {
        $this->redirection();
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
        $data['users']=$this->users_m->getAllUsers();
        $data['languages']=$this->users_m->getAllLanguages();
        $data['sessions']=$this->users_m->getactiveSessions();
        //print_r($data['sessions']);
        $this->load->view('admin/navAdmin_v');  
        $this->load->view('admin/manageUsers_v',$data);
        $this->load->view('admin/footerAdmin_v');
    }

    public function createUser($data)
        {
            $this->redirection();
            $this->display_createUser();
        }

    public function display_createUser($data=null)
        {
            $this->load->view('head_v');
            $data['languages']=$this->users_m->getAllLanguages();
            $data['rightDropdown']=$this->users_m->getRightDropdown();
            $this->load->view('admin/navAdmin_v');  
            $this->load->view('admin/createUser_v',$data);
            $this->load->view('admin/footerAdmin_v');
        }

    public function validation_createUser($actUser=null)
        {
            if(isset($actUser))
            {
                $data = $this->session->userdata('data'); 
                $this->session->unset_userdata('data');
                unset($data['alert']);
                $data = array_merge($data,array('password_user'=>get_random_password(6,8,true,true,false)),array('activation_user'=>$actUser));
                $this->users_m->insertUser($data);
                $this->session->set_userdata(array('data'=>$data));
                redirect('admin_c/sendCreationMail/');
            }


            //print_r($this->input->post('pass'));
            $id=$this->input->post('id_user'); 
            $data= array(    
                    'name_user'=>$this->input->post('name_user'), 
                    'lastname_user'=>$this->input->post('lastname_user'),
                    'mail_user'=>$this->input->post('mail_user'),
                    'phone_user'=>$this->input->post('phone_user'),
                    'id_right_user'=>$this->input->post('id_right'),
                    'id_language_user'=>$this->input->post('id_lang')
                ); 
 
            $this->form_validation->set_rules('lastname_user',lang('lastname_label'),'trim|required|min_length[2]|max_length[12]');
            $this->form_validation->set_rules('name_user',lang('name_label'),'trim|required|min_length[2]|max_length[12]');
            $this->form_validation->set_message('integer', lang('phone_validation_message'));
            $this->form_validation->set_rules('phone_user',lang('phone_label'),'trim|required|integer|exact_length[10]');
            $this->form_validation->set_rules('mail_user',lang('mail_label'),'trim|required|valid_email');
            $this->form_validation->set_rules('id_right', lang('rights_label'), 'trim|callback_dropdown_check'); 
            $this->form_validation->set_rules('id_lang', lang('lang_label'), 'trim|callback_dropdown_check');

            $this->form_validation->set_error_delimiters('<span class="error fi-alert"> ','</span>');  

            if($this->form_validation->run() == False){
                $this->display_createUser($data);
            } 
            else 
            {
                $data = array_merge($data,array('alert'=>true));
                $this->session->set_userdata(array('data'=>$data));
                $this->display_createUser($data);
            }
            
        }

    public function display_alterUser($data=null)
    {
        $this->load->view('head_v');
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
                'lastname_user'=>$this->input->post('lastname_user'),
                'mail_user'=>$this->input->post('mail_user'),
                'phone_user'=>$this->input->post('phone_user'),
                'id_right_user'=>$this->input->post('id_right')
            ); 
        $this->form_validation->set_rules('lastname_user',lang('lastname_label'),'trim|required|min_length[2]|max_length[12]');
        $this->form_validation->set_rules('name_user',lang('name_label'),'trim|required|min_length[2]|max_length[12]');
        $this->form_validation->set_message('integer', lang('phone_validation_message'));
        $this->form_validation->set_rules('phone_user',lang('phone_label'),'trim|required|integer|exact_length[10]');
        $this->form_validation->set_rules('mail_user',lang('mail_label'),'trim|required|valid_email');
        $this->form_validation->set_rules('id_right', lang('rights_label'), 'trim|callback_dropdown_check'); 

        $this->form_validation->set_error_delimiters('<span class="error fi-alert"> ','</span>');  

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
        $this->users_m->check_language();  
        }
        $this->display_users();

    }

    public function activateUser($id,$state)
    {   
        
        //print_r('id : '.$id);
        //print_r('session_id : '.$this->session->userdata('id_user'));
        if($id == $this->session->userdata('id_user')){
        $array= array('activation_user'=>$state);
        //print_r('disbled : '.$this->session->userdata('activation_user') );
        $this->session->set_userdata($array); 
        }
        $data = array('activation_user'=>$state);
        $this->users_m->UpdateUser($id,$data);
        //redirect('admin_c/display_users');
    }

    public function sendCreationMail(){
        //print_r($this->session->all_userdata());
        $data = $this->session->userdata('data'); 
        //print_r($data);
        $lang = $this->users_m->getLanguageById($data['id_language_user']);
        $this->users_m->check_language($lang['description_language']);
        $this->email->from('no-reply@groupelogo.fr','Admin');
        $this->email->reply_to('no-reply@groupelogo.fr', 'no-reply');
        $this->email->to($data['mail_user']);
        $this->email->subject(lang('subject_mail_account_creation'));
        $this->email->message(lang('message_mail_account_creation_1').$data['name_user'].' '.$data['lastname_user'].lang('message_mail_account_creation_2').lang('message_mail_account_creation_3').$data['mail_user'].lang('message_mail_account_creation_4').$data['password_user'].lang('message_mail_account_creation_5'));                        
         

         // Sending Email
         $this->email->send();
         print_r($this->email->print_debugger()) ;
         $this->session->unset_userdata('data');
         redirect('admin_c/display_users/');

    }
    

}