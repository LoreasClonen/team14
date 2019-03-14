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
            $this->load->model('Lessen/Inlogger_model', 'Inlogger_model');
            $this->load->helper('form');
        }

        public function meldAan()
        {
            $data['titel'] = 'Aanmelden';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (0), Mats Mertens (T), Shari Nuyts , Sebastiaan Reggers, Steven Van Gansberghe';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'inloggen/inloggen_form',
                'footer');

            $this->template->load('main_master', $partials, $data);
        }

        public function controleerAanmelden()
        {
            $email = $this->input->post('email');
            $wachtwoord = $this->input->post('wachtwoord');

            if ($this->authex->meldAan($email, $wachtwoord)) {
                redirect('Home/index');
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
            redirect('Home/index');
        }

        public function wachtwoordVergeten()
        {
            $data['titel'] = 'Uw wachtwoord herstellen';

            $data['gebruiker'] = $this->authex->getGebruikerInfo();

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'inloggen/wachtwoord_vergeten');

            $this->template->load('main_master', $partials, $data);
        }

        public function mailWachtwoordVergeten()
        {
            $email = $this->input->post('email');

//            if ($email = ...) {
            $ontvanger = $email;
            $onderwerp = "Nieuw wachtwoord";
            $inhoud = "U had een aangevraag om een nieuw wachtwoord in te stellen.\nVia deze link kan u een nieuw wachtwoord instellen: " . base_url() . "Inloggen/nieuwPaswoord?" . $ontvanger;
            $zender = "admin@kempenrust.be";
            $headers = "MIME-Version: 1.0" . "\r\n" . "Content-type: text/html;charset=UTF-8" . "\r\n" . "From: " . $zender . "\r\n";

            mail($ontvanger, $onderwerp, $inhoud, $headers);
//        }
//        else {
//            redirect('Inloggen/wachtwoordHerstellen');
//        }


        }

        public function nieuwPaswoord()
        {
            $data['titel'] = 'Nieuw wachtwoord ingeven';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
//            $data['email'] = $email;

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
