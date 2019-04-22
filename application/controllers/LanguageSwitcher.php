<?php if ( ! defined('BASEPATH')) exit('Direct access allowed');

class LanguageSwitcher extends CI_Controller
{
   public function __construct() {
       parent::__construct();
   }
   function switchLang($language = "") {
    $this->load->library('user_agent');
       $language = ($language != "") ? $language : "greek";
       $this->session->set_userdata('site_lang', $language);
       if (isset($_SERVER['HTTP_REFERER'])) {
      redirect($_SERVER['HTTP_REFERER']);
       } else {
        redirect(base_url());  
       }
      //redirect($this->agent->referrer());
      
   }
}