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
            $data['titel'] = 'Inloggen';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();

            $data['teamleden'] = 'Loreas Clonen (O), Mats Mertens (T), Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe';


            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'inloggen/inloggen_form',
                'footer' => 'main_footer');


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
            $data['teamleden'] = 'Loreas Clonen (O), Mats Mertens (T), Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe';


            $partials = array('hoofding' => 'main_header',
                'inhoud' => '/inloggen/inloggen_fout',
                'footer' => 'main_footer');

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
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';


            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'inloggen/wachtwoord_vergeten',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

        public function mailWachtwoordVergeten()
        {
            $data['titel'] = 'Inbox';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $email = $this->input->post('email');
            $data['gebruiker'] = $this->Inlogger_model->getByEmail($email);

            $partials = array('hoofding' => 'email_header',
                'inhoud' => 'inloggen/email_wachtwoord_vergeten',
                'footer' => 'main_footer');

            if ($this->Inlogger_model->emailBestaat($email)) {
                $this->template->load('main_master', $partials, $data);
            } else {
                redirect('Inloggen/toonFout');
            }
        }

        function inloggerBestaat($email)
        {
            $this->Inlogger_model->emailBestaat($email);
        }

        public function nieuwPaswoord()
        {
            $data['titel'] = 'Nieuw wachtwoord ingeven';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';


            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'nieuw_wachtwoord_form',
                'footer' => 'main_footer');

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
