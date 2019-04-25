<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * @property Template $template
     * @property CI_Input $input
     * @property Authex $authex
     * @property Factuur_model $factuur_model
     * @property Klas_model $klas_model
     * @property Les_model $les_model
     * @property School_model $school_model
     */
    class Scholen extends CI_Controller
    {
        // +----------------------------------------------------------
        // | project app-bi
        // +----------------------------------------------------------
        // | 2 ITF - 2018-2019
        // +----------------------------------------------------------
        // | Scholen controller
        // +----------------------------------------------------------
        // | Team 14
        // +----------------------------------------------------------

        public function __construct()
        {
            parent::__construct();
            $this->load->model('School/Factuur_model', 'factuur_model');
            $this->load->model('School/Klas_model', 'klas_model');
            $this->load->model('School/Les_model', 'les_model');
            $this->load->model('School/School_model', 'school_model');
            $this->load->helper('form');
            $this->load->helper('notation');
        }

        public function toonScholen()
        {
            $data['scholen'] = $this->school_model->getAllBySchoolnaam();

            $data['titel'] = 'Overzicht Scholen';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = '';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'scholen_beheren/overzicht_scholen',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

        public function toonSchool($id)
        {
            $data['klassen'] = $this->klas_model->getAllByNameWhereSchoolId($id);
            $data['school'] = $this->school_model->getById($id);

            $data['titel'] = 'Overzicht school';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = '';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'scholen_beheren/overzicht_klassen',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

        public function aanwezighedenIngeven()
        {
            $data['titel'] = 'Schoolaanwezigheden opnemen';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';

            $data['scholen'] = $this->school_model->getAllBySchoolnaam();


            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'schoolaanwezigheid_opnemen/schoolaanwezigheid_opnemen',
                'footer' => 'main_footer');

            $this->template->load('schoolaanwezigheid_opnemen/scholen_master', $partials, $data);
        }

        public function getScholen()
        {
            $data['scholen'] = $this->school_model->getAllBySchoolnaam();

            $data['titel'] = 'Overzicht scholen';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts (T), Sebastiaan Reggers, Steven Van Gansberghe';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'scholen_beheren/overzicht_School',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

        public function klasToevoegenPagina($schoolId)
        {
            $data['school'] = $this->school_model->getById($schoolId);

            $data['titel'] = 'Klas toevoegen';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'scholen_beheren/klas_toevoegen_pagina',
                'footer' => 'main_footer');

            $this->template->load('scholen_beheren/klas_master', $partials, $data);
        }

        public function haalAjaxOp_Klassen()

        {
            $schoolId = $this->input->get('schoolId');


            $data['klassen'] = $this->klas_model->getAllByNameWhereSchoolId($schoolId);

            $this->load->view('schoolaanwezigheid_opnemen/ajax_klassenLijst', $data);

        }

        public function aanwezighedenBevestigen()
        {
            $lesData = new stdClass();
            $lesData->klasId = $this->input->post("klasId");
            $lesData->leerlingenAantal = $this->input->post("leerlingenAantal");
            $lesData->datumLes = $this->input->post("datumLes");
            $lesData->prijsPerKind = 5;

            $this->les_model->addLes($lesData);

            redirect('Scholen/getScholen');
        }
    }



