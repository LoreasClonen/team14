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

    public function meldAan()
    {
        $usernmame = $this->input->post("username");
        $wachtwoord = $this->input->post("wachtwoord");
        $this->load->model("Inlogger_model");
        if($wachtwoord == $this->inlogger_model->getInloggerByName($usernmame)){
            $this->session->set_userdata('gebruikersnaam',$usernmame);
            $this->session->set_userdata('aangemeld',true);
        }
    }

    public function meldAf()
    {
        $this->session->unset_userdata('gebruikersnaam');
        $this->session->unset_userdata('aangemeld');
        redirect("../views/index.php");

    }
}
