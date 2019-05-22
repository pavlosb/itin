<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');
        $siteLang = $ci->session->userdata('site_lang');
        if ($siteLang) {
            $ci->lang->load('itin',$siteLang);
            $ci->lang->load('ion_auth',$siteLang);
        } else {
            $ci->lang->load('itin','greek');
            $ci->lang->load('ion_auth','greek');
            
        }
    }
}