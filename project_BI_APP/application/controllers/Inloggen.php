<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property Authex $authex
 */
class inloggen extends CI_Controller
{
    // +----------------------------------------------------------
    // | project app-bi
    // +----------------------------------------------------------
    // | 2 ITF - 2018-2019
    // +----------------------------------------------------------
    // | Inloggen controller
    // +----------------------------------------------------------
    // | Team 14
    // +----------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lessen/Inlogger_model');
        $this->load->helper('form');
    }
    public function meldAan()
    {
        $data['titel'] = 'Aanmelden';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = array('hoofding' => 'main_header',
                        'inhoud' => 'inloggen/inloggen_form');

        $this->template->load('main_master', $partials, $data);
    }

    public function controleerAanmelden()
    {
        $email = $this->input->post('email');
        $wachtwoord = $this->input->post('wachtwoord');

        if ($this->authex->meldAan($email, $wachtwoord)) {
            redirect('Inloggen/indexInlogger');
        } else {
            redirect('Inloggen/toonFout');
        }
    }

    public function toonFout()
    {
        $data['titel'] = 'Fout';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = array('hoofding' => 'main_header',
                            'inhoud' => '/inloggen/inloggen_fout');

        $this->template->load('main_master', $partials, $data);
    }

    public function meldAf()
    {
        $this->authex->meldAf();
        redirect('home/index');
    }

    public function wachtwoordVergeten()
    {
        $data['titel'] = 'Uw wachtwoord herstellen';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = array('hoofding' => 'main_header',
        'inhoud' => '/inloggen/wachtwoord_vergeten');

        $this->template->load('main_master', $partials, $data);
    }

    public function nieuwPaswoord()
    {
        $data['titel'] = 'Nieuw wachtwoord ingeven';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = array('hoofding' => 'main_header',
                            'inhoud' => 'nieuw_wachtwoord_form');

        $this->template->load('main_master', $partials, $data);
    }

    public function nieuwWachtwoord()
    {
        $poging1 = $this->input->post('poging1');
        $poging2 = $this->input->post('poging2');

        if ($this->authex->nieuwPaswoord($poging1, $poging2)) {
        redirect('home/nieuwWachtwoord');
        }
    }
}