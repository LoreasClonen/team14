<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * @property Template $template
     * @property Authex $authex
     * @property Lesgroep_model $lesgroep_model
     */

    class Zwemgroepen extends CI_Controller
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
            $this->load->model('Lessen/Lesgroep_model', 'lesgroep_model');
            $this->load->helper('form');
        }

        public function zwemgroepenOphalen()
        {
            $data['zwemgroepen'] = $this->lesgroep_model->getAllById();

            $data['titel'] = 'Overzicht zwemgroepen';
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemgroepen_beheren/overzicht_zwemgroepen');

            $this->template->load('zwemgroepen_beheren/zwemgroepen_master', $partials, $data);
        }

        public function getZwemgroepen()
        {
            $data['titel'] = 'lesgroep';

            $data['zwemgroepen'] = $this->lesgroep_model->getAllByIdWithInlogger();


            $partials = array('hoofding' => 'main_header',
            'inhoud' => 'zwemgroepen_beheren/overzicht_zwemgroep');

            $this->template->load('main_master', $partials, $data);
        }


    }