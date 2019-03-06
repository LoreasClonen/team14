<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * @property Template $template
     * @property Authex $authex
     */
    class Home extends CI_Controller
    {
        // +----------------------------------------------------------
        // | project app-bi
        // +----------------------------------------------------------
        // | 2 ITF - 2018-2019
        // +----------------------------------------------------------
        // | Home controller
        // +----------------------------------------------------------
        // | Team 14
        // +----------------------------------------------------------

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Lessen/Inlogger_model');
            $this->load->helper('form');
        }

        public function index()
        {
            $data['titel'] = 'Zwembad informatie';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'main_menu'
                );

            $this->template->load('main_master', $partials, $data);
        }
        public function meldAan()
        {
            $data['titel'] = 'Aanmelden';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();

            $partials = array('hoofding' => 'main_header',

                'inhoud' => 'inloggen/inloggen_form',
                );

            $this->template->load('main_master', $partials, $data);
        }
        public function controleerAanmelden()
        {
            $email = $this->input->post('email');
            $wachtwoord = $this->input->post('wachtwoord');

            if ($this->authex->meldAan($email, $wachtwoord)) {
                redirect('home/indexInlogger');
            } else {
                redirect('home/toonFout');
            }
        }
        public function toonFout()
        {
            $data['titel'] = 'Fout';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();

            $partials = array('hoofding' => 'main_header',
                'inhoud' => '/inloggen/inloggen_fout'
                );

            $this->template->load('main_master', $partials, $data);
        }
        public function meldAf()
        {
            $this->authex->meldAf();
            redirect('home/index');
        }




    }
