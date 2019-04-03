<?php

/**
 * @class Wachtlijsten
 * @brief Controller-klasse voor wachtlijsten
 * @property Lesgroep_model $lesgroep_model
 *
 * Controller klasse met alle methodes die gebruikt worden voor alles wat te maken heeft met inloggers, zwemlessen en klanten
 */
class Wachtlijst extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lessen/Lesgroep_model', 'lesgroep_model');
        $this->load->model('Lessen/Beschikbaarheid_model', 'beschikbaarheid_model');
        $this->load->model('Lessen/Lesgroep_model', 'lesgroep_model');
        $this->load->model('Lessen/Status_model', 'status_model');
        $this->load->helper('form');
    }

    public function getWachtlijsten()
    {
        $data['titel'] = 'Wachtlijst';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (O), Steven Van Gansberghe';

        $data['zwemgroepen'] = $this->lesgroep_model->getAllById();
        $data['wachtend'] = $this->beschikbaarheid_model->
        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'overzicht_wachtlijst/overzicht_wachtlijst',
            'footer' => 'main_footer');

        $this->template->load('overzicht_zwemfeestjes/zwemfeestjes_master', $partials, $data);
    }
}