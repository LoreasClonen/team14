<?php

/**
 * @class Wachtlijsten
 * @brief Controller-klasse voor wachtlijsten
 * @property Lesgroep_model $lesgroep_model
 * @property Beschikbaarheid_model $beschikbaarheid_model
 * @property CI_Input $input
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
        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'overzicht_wachtlijst/overzicht_wachtlijst',
            'footer' => 'main_footer');

        $this->template->load('overzicht_wachtlijst/wachtlijst_master', $partials, $data);
    }

    public function haalAjaxOp_Wachtlijst()
    {
        $zwemgroepId = $this->input->get('zwemgroepId');
        $statusId = $this->input->get('statusId');

        $data['wachtlijstId'] = $zwemgroepId.$statusId;

        $data['personenlijst'] = $this->beschikbaarheid_model->getByStatusIdLesgroepIdWithKlant($statusId, $zwemgroepId);
        switch ($statusId) {
            case 1:
                $data['wachtlijstTitel'] = "Geschikte kandidaten";
                break;
            case 2:
                $data['wachtlijstTitel'] = "Huidige zwemmers";
                break;
        }

        $this->load->view('overzicht_wachtlijst/ajax_wachtlijst', $data);
    }

    public function updateAjax_Wachtlijst() {
        $zwemgroepId = $this->input->get('zwemgroepId');
        $klantId = $this->input->get('klantId');
        $statusId = $this->input->get('statusId');

        $this->beschikbaarheid_model->updateStatusId($zwemgroepId, $klantId, $statusId);
    }
}