<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * @property Template $template
     * @property Authex $authex
     * @property Klant_model $klant_model
     * @property Zwemniveau_model $zwemniveau_model
     * @property Beschikbaarheid_model $beschikbaarheid_model
     */
    class Zwemmer extends CI_Controller
    {
        // +----------------------------------------------------------
        // | project app-bi
        // +----------------------------------------------------------
        // | 2 ITF - 2018-2019
        // +----------------------------------------------------------
        // | Zwemmer controller
        // +----------------------------------------------------------
        // | Team 14
        // +----------------------------------------------------------

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Lessen/Klant_model', 'klant_model');
            $this->load->helper('form');
        }

        public function zwemmerOphalen($id)
        {
            $data['zwemmer'] = $this->klant_model->getAllById();

            $data['titel'] = 'Overzicht zwemmer';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemmers_beheren/overzicht_zwemmer',
                'footer' => 'main_footer');

            $this->template->load('zwemmers_beheren/zwemmers_master', $partials, $data);
        }

        public function zwemmersOphalen()
        {
            $data['zwemmers'] = $this->klant_model->getAllByAchternaamWithLesgroepWithZwemniveau();

            $data['titel'] = 'Overzicht zwemmers';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemmers_beheren/overzicht_zwemmers',
                'footer' => 'main_footer');

            $this->template->load('zwemmers_beheren/zwemmers_master', $partials, $data);
        }


    }