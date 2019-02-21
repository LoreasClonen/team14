<?php


class Sessies Extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index(){
        if($this->session->has_userdata('aangemeld'))
        {
            $data['aangemeld'] = true;
            $data['gebruikersnaam'] = $this->session->userdata('gebruikersnaam');

        } else{
            $data['aangemeld'] = false;
        }

        $data['titel'] = 'sessies';
        $partials = array('hoofding' => 'main_header' , 'inhoud' => 'sessies_toon', 'voetnoot' => 'main_footer');
        $this->template->load('main_master', $partials, $data);

    }
    public function meldAan(){

    }
}