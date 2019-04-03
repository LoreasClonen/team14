<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property CI_Input $input
 * @property Authex $authex
 * @property School_model $school_model
 * @property Factuur_model factuur_model
 */
class Facturen extends CI_Controller
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
        $this->load->model('School/School_model', 'school_model');
        $this->load->model('School/Factuur_model', 'factuur_model');
        $this->load->helper('notation');
    }

    public function getScholen()
    {
        $data['scholen'] = $this->school_model->getAllBySchoolnaam();

        $data['titel'] = 'Overzicht scholen';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts (T), Sebastiaan Reggers, Steven Van Gansberghe';

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'facturen_beheren/overzicht_scholen',
            'footer' => 'main_footer');

        $this->template->load('facturen_beheren/facturen_master', $partials, $data);
    }

    public function getSchool($schoolId)
    {
        $data['titel'] = 'Facturen';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts (T), Sebastiaan Reggers, Steven Van Gansberghe';

        $data['school'] = $this->school_model->getById($schoolId);

        $data['facturen'] = $this->factuur_model->getBySchoolIdWithSchool($schoolId);

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'facturen_beheren/overzicht_facturen',
            'footer' => 'main_footer');

        $this->template->load('facturen_beheren/facturen_master', $partials, $data);
    }

    public function updateDatumBetaling($id, $schoolId, $datumBetaald)
    {
        $this->factuur_model->updateDatumBetaald($id, $datumBetaald);

        redirect('Facturen/getSchool/' . $schoolId);
    }

    public function deleteDatumBetaling($id, $schoolId)
    {
        $this->factuur_model->deleteDatumBetaald($id);

        redirect('Facturen/getSchool/' . $schoolId);
    }

}