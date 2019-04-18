<?php if ( ! defined('BASEPATH')) exit('Direct access allowed');

class LanguageSwitcher extends CI_Controller
{
   public function __construct() {
       parent::__construct();
   }
   function switchLang($language = "") {
    $this->load->library('user_agent');
       $language = ($language != "") ? $language : "english";
       $this->session->set_userdata('site_lang', $language);
      // redirect($_SERVER['HTTP_REFERER']);
      //redirect($this->agent->referrer());

      echo $_SERVER['HTTP_REFERER'];
      echo $this->agent->referrer();
   }
}