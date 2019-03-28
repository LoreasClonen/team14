<?php

/**
 * @class Wachtlijsten
 * @brief Controller-klasse voor wachtlijsten
 *
 * Controller klasse met alle methodes die gebruikt worden voor alles wat te maken heeft met inloggers, zwemlessen en klanten
 */
class Wachtlijsten extends CI_Controller
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

    public function index($groepId)
    {
        $groep = $this->lesgroep_model->get($groepId);

        $data['titel'] = 'Overzicht wachtlijst ' . $groep->groepsnaam;
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen (O), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe';

        $data['groep'] = $groep;
        $data['wachtend'] = $this->beschikbaarheid_model->
        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'overzicht_wachtlijst/overzicht_wachtlijst',
            'footer' => 'main_footer');

        $this->template->load('overzicht_zwemfeestjes/zwemfeestjes_master', $partials, $data);
    }
}