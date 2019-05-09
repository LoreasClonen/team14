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

            $this->load->library('session');
        }


        public function toonSchool($id)
        {
            $this->session->set_flashdata('schoolId', $id);
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
        /**
         * @brief de functie aanwezighedenIngeven toont het formulier om het aantal leerlingen in te geven voor een bepaalde klas               van een bepaalde school
         * @post de schoolaanwezigheid_opnemen pagina wordt geladen
         */

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

        public function klasToevoegenPagina()
        {
            $schoolId = $this->session->flashdata('schoolId');
            $this->session->set_flashdata('schoolId', $schoolId);

            $data['school'] = $this->school_model->getById($schoolId);

            $data['titel'] = 'Klas toevoegen';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'scholen_beheren/klas_toevoegen_pagina',
                'footer' => 'main_footer');

            $this->template->load('card_master', $partials, $data);
        }

        public function klasToevoegen()
        {
            $schoolId = $this->session->flashdata('schoolId');

            $klas = new stdClass();
            $klas->klasnaam = $this->input->post("klasnaam");
            $klas->isGesubsidieerd = $this->input->post("isGesubsidieerd");
            $klas->schoolId = $schoolId;

            $this->klas_model->addKlas($klas);
            redirect('scholen/toonSchool/' . $schoolId);
        }

        /**
         * @brief functie haalAjaxOp_Klassen zorgt ervoor dat, na het kiezen van een school, de velden Aantal leerlingen, datum en              klassen van die bepaalde school geladen en ingevuld kunnen worden
         * @post de velden Aantal leerlingen, datum en klassen worden geladen en kunnen ingevuld worden
         */

        public function haalAjaxOp_Klassen()
        {
            $schoolId = $this->session->flashdata('schoolId');

            $data['klassen'] = $this->klas_model->getAllByNameWhereSchoolId($schoolId);

            $this->load->view('schoolaanwezigheid_opnemen/ajax_klassenLijst', $data);

        }

        /**
         * @brief de functie aanwezighedenBevestigen gaat de ingevulde data opslaan en doorsturen naar de database
         * @post de pagina wordt herladen en men kan opnieuw aanwezigheden ingeven voor een bepaalde school
         */

        public function aanwezighedenBevestigen()
        {
            $lesData = new stdClass();
            $lesData->klasId = $this->input->post("klasId");
            $lesData->leerlingenAantal = $this->input->post("leerlingenAantal");
            $lesData->datumLes = $this->input->post("datumLes");
            $lesData->prijsPerKind = 5;

            $this->les_model->addLes($lesData);

            redirect('Scholen/aanwezighedenIngeven');
        }

        public function haalAjaxOp_Klas()
        {
            $schoolId = $this->session->flashdata('schoolId');
            $this->session->set_flashdata('schoolId', $schoolId);

            $id = $this->input->get('id');

            $data["klas"] = $this->klas_model->getById($id);

            $this->load->view("scholen_beheren/ajax_klas", $data);
        }

        public function klasVerwijderen($id)
        {
            $schoolId = $this->session->flashdata('schoolId');
            $this->klas_model->delete($id);

            redirect('scholen/toonSchool/' . $schoolId);
        }

    }

