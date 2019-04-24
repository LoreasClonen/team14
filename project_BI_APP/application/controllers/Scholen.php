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

            $data['titel'] = '';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = '';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => '',
                'footer' => 'main_footer');

            $this->template->load('', $partials, $data);
        }

        public function toonSchool($id)
        {
            $data['school'] = $this->school_model->getById($id);

            $data['titel'] = '';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = '';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => '',
                'footer' => 'main_footer');

            $this->template->load('', $partials, $data);
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

        public function toonKlassen($schoolId)
        {
            $data['klassen'] = $this->klas_model->getAllByNameWhereSchoolId($schoolId);

            $data['titel'] = 'Overzicht klassen';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'scholen_beheren/klassenoverzicht',
                'footer' => 'main_footer');

            $this->template->load('schoolaanwezigheid_opnemen/scholen_master', $partials, $data);
        }
    }



