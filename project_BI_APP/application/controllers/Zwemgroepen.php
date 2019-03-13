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
            $this->load->model('Lessen/Lesgroep_model', 'Lesgroep_model');
            $this->load->helper('form');
        }

        public function zwemgroepenOphalen()
        {
            $data['zwemgroepen'] = $this->Lesgroep_model->getAllById();

            $data['titel'] = 'Overzicht zwemgroepen';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'overzicht_zwemgroepen');

            $this->template->load('main_master', $partials, $data);
        }

        public function zwemgroepOphalen($id)
        {

            $data['titel'] = 'Overzicht zwemgroep';

            $data['zwemgroep'] = $this->Lesgroep_model->get($id);

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'overzicht_zwemgroep');

            $this->template->load('main_master', $partials, $data);
        }


    }