<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Configuration EMAIL
| -------------------------------------------------------------------------
*/

         $config['mailtype'] = 'text';
         $config['smtp_port']='587';
         $config['smtp_timeout']='30';
         $config['charset']='utf-8';
         $config['protocol'] = 'smtp';
         $config['smtp_host'] = 'smtp.office365.com' ; 
         $config['smtp_user'] = 'no-reply@groupelogo.fr' ;
         $config['smtp_pass'] = 'Zoza7174';
         $config['smtp_crypto'] = 'tls';
         $config['mailpath'] = '/usr/sbin/sendmail';
         $config['wordwrap'] = TRUE;
         //$config['crlf']= "\n";
        //$config['newline'] = "\n";
        $config['send_multipart'] = FALSE;