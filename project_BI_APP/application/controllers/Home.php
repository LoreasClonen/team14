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
        $this->load->model('Lessen/Inlogger_model', 'Inlogger_model');
        $this->load->helper('form');
        $this->load->model('Extras/Nieuwsbericht_model', 'nieuwsbericht_model');
        }

        public function index()
        {
            $data['titel'] = 'Zwembad informatie';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts (T), Sebastiaan Reggers, Steven Van Gansberghe';

            $data['nieuwsberichten'] = $this->nieuwsbericht_model->getAllById();

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'main_menu',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }




    }
