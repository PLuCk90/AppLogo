<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends CI_Model {

	public function check_connection($data)
	{
	        $sql = "SELECT u.id_user,u.name_user,u.lastname_user,u.mail_user,u.phone_user,r.description_right,l.description_language,u.activation_user FROM User u, Right_u r, Language l WHERE u.mail_user=\"".$data['login']."\"  AND u.password_user=\"".$data['pass']."\" AND u.id_right_user = r.id_right AND u.id_language_user = l.id_language;";
	        $query=$this->db->query($sql); 
	        if($query->num_rows()==1)
	        {
	            $row=$query->result_array();
	            $result=$row[0];
	            return $result;
	        }
	        else
	            return false;
    }

    public function check_language($lang=null)
    {
      $this->lang->is_loaded = array();
      $this->lang->language = array();
      $files = array('view','calendar','date','db','email','form_validation','ftp','imglib','migration','number','profiler','unit_test','upload');
      foreach ($files as $key => $file) {
        if(isset($lang))
        {
            $this->lang->load($file, $lang);  
        }
        else
        {
           $this->lang->load($file, $this->session->userdata('description_language') );   
        }
        
      }
      
    }

    public function getAllUsers()
    {
 	 $this->db->select('u.id_user,u.name_user,u.lastname_user,u.mail_user,u.password_user,u.phone_user,r.description_right,l.description_language,u.activation_user');
	 $this->db->from('User u, Right_u r, Language l');
	 $this->db->where('r.id_right = u.id_right_user AND u.id_language_user = l.id_language');

	$this->db->order_by('u.id_user', 'ASC');
	 $query = $this->db->get();
	 return $query->result(); 
    }

    public function getAllLanguages()
    {
     $this->db->select('id_language,description_language');
     $this->db->from('Language l');

     $this->db->order_by('description_language', 'ASC');
     $query = $this->db->get();
     return $query->result(); 
    }

    public function getLanguageById($id)
    {
     return $this->db->get_where('Language', array('id_language' => $id),1,0)->row_array();
    }

    public function getUserById($id)
    {
    	return $this->db->get_where('User', array('id_user' => $id),1,0)->row_array();
    }

    public function getRightDropdown()
    {
    	$result = $this->db->from("Right_u")->order_by('id_right')->get(); 
        $return = array(); 
        if($result->num_rows() > 0){ 
            $return['other'] = lang('rights_dropdown_header'); 
            foreach($result->result_array() as $row){ 
                $return[$row['id_right']] = $row['description_right']; 
            } 
        } 
        return $return;
    }

    public function insertUser($data)
    {
      return $this->db->insert("User",$data);
    }

    public function updateUser($id,$data)
    {
        $this->db->where("id_user", $id);
        $this->db->update("User", $data);
    }

    public function deleteUser($id)
    {
        $this->db->delete("User", array("id_user" => $id));
    }

    public function getActiveSessions()
    {
     $this->db->select('user_data,last_activity');
     $this->db->from('ci_sessions');
     $query = $this->db->get();
     $result = $this->check_valid_sessions($query->result());
     return $result; 
    }

    public function check_valid_sessions($sessions)
    {
        $this->load->library('session');
        $valid_sessions=array();
        foreach ($sessions as $key => $value) {
        $userdata = unserialize($value->user_data);
        $valid_time = $this->session->now - $value->last_activity;

        if($valid_time < $this->session->sess_expiration && $userdata!="")
        {
            //print_r($userdata['name_user'].$valid_time);
            $valid_sessions[$userdata['id_user']] = array('id_user' => $userdata['id_user'],'name_user' => $userdata['name_user'],'valid_time' => $valid_time);
            //print_r($valid_sessions);
        }  
        }
        return $valid_sessions;
    }

}