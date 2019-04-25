<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * @property Template $template
     * @property Authex $authex
     * @property Klant_model $klant_model
     * @property Zwemniveau_model $zwemniveau_model
     * @property Beschikbaarheid_model $beschikbaarheid_model
     * @property Lesgroep_model $lesgroep_model
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
            $this->load->model('Lessen/Lesgroep_model', 'lesgroep_model');
            $this->load->model('Lessen/Beschikbaarheid_model', 'beschikbaarheid_model');
            $this->load->model('Lessen/Zwemniveau_model', 'zwemniveau_model');
            $this->load->helper('form');
        }

        public function zwemmerOphalen($id)
        {
            $zwemmer = $this->klant_model->getById($id);
            $data['zwemmer'] = $zwemmer;

            $data['titel'] = 'Overzicht zwemmer';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';

            $data['zwemniveau'] = $this->zwemniveau_model->getById($zwemmer->zwemniveauId);

            $zwemgroepen = $this->beschikbaarheid_model->getByKlantId($id);
            $groepsnamen = array();

            foreach ($zwemgroepen as $zwemgroep) {
                array_push($groepsnamen, $this->lesgroep_model->get($zwemgroep->lesgroepId));
            }
            $data['zwemgroep'] = $groepsnamen;

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemmers_beheren/overzicht_zwemmer',
                'footer' => 'main_footer');

            $this->template->load('zwemmers_beheren/zwemmers_master', $partials, $data);
        }

        /**
         * @brief Geeft een pagina weer die zwemmers oplijst in een tabel
         * @pre er bestaat een Zwemmer controller, een Klant model klasse met functie getAllByAchternaamWithLesgroepWithZwemniveauWhereActief
         * @post Er word een pagina weergegeven die alle zwemmers in een tabel weergeeft
         */
        public function zwemmersOphalen()
        {
            $data['zwemmers'] = $this->klant_model->getAllByAchternaamWithLesgroepWithZwemniveauWhereActief();

            $data['titel'] = 'Overzicht zwemmers';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemmers_beheren/overzicht_zwemmers',
                'footer' => 'main_footer');

            $this->template->load('zwemmers_beheren/zwemmers_master', $partials, $data);
        }


    }