<?php
class Main_c extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('users_m');
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
    }

    public function check_right()
    {
    	if( $this->session->userdata('description_right')=='admin'){
            redirect('admin_c');
        }
        if( $this->session->userdata('description_right')=='user'){
            redirect('client_c');
        }
    }

    

	public function index()
	{
		//print_r($this->session->all_userdata());  
    $this->check_right();
		$this->display_connection_form();
	}

	public function display_connection_form($data=null)
	{
		$this->load->view('head_v');
		$this->load->view('connection_form_v',$data);
		$this->load->view('footer_v');
	}


	public function validation_connection_form()
	{
		  $this->form_validation->set_rules('login','Mail','trim|required');
        $this->form_validation->set_rules('pass','Mot de passe','trim|required');

        $this->form_validation->set_error_delimiters('<span class="error">','</span>');  
        $data= array(
                'login'=>$this->input->post('login'),
                'pass'=>$this->input->post('pass')
            );


        if($this->form_validation->run() == False){   
            $this->display_connection_form($data);
        }
        else {
            $data_session=array();
            if(($data_session=$this->users_m->check_connection($data)) != False)                          // and valide ==1
               {
                   $this->session->set_userdata($data_session);
                   redirect('main_c');
               }
               else{
                   $data['erreur']=lang('error_login_form_message');
                   $this->display_connection_form($data);
               }
        }

	}

	public function logout()
	    {
	        $this->session->sess_destroy();
	        $this->index();
	    }

}
?>