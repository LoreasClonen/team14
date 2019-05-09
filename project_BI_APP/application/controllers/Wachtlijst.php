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
    /**
     * functie getWachtlijsten
     * @brief laad een pagina met het overzicht van de wachtlijsten voor elke groep
     * @pre er bestaat een Wachtlijst klasse
     * @post de pagina met de wachtlijsten wordt geladen
     */
    public function getWachtlijsten()
    {
        $data['titel'] = 'Wachtlijst';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (O), Steven Van Gansberghe';

        $data['zwemgroepen'] = $this->lesgroep_model->getAllById();
        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'overzicht_wachtlijst/overzicht_wachtlijst',
            'footer' => 'main_footer');

        $this->template->load('inlogger_master', $partials, $data);
    }

    /**
     * functie haalAjaxOp_Wachtlijst
     * @brief haalt een specifieke lijst van zwemmers op
     * @pre er bestaat een Wachtlijst klasse
     * @post toont de wachtlijst op de pagina
     */
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

    /**
     * functie haalAjaxOp_Plaatsen
     * @brief haalt de in beslag genomen plaatsen in de groep op
     * @pre er bestaat een Wachtlijst klasse
     * @post toont de in beslag genomen plaatsen op de pagina
     */
    public function haalAjaxOp_Plaatsen() {
        $zwemgroepId = $this->input->get('zwemgroepId');

        $data['zwemgroep'] = $this->lesgroep_model->get($zwemgroepId);
        $data['zwemmers'] = $this->beschikbaarheid_model->getAllByLesgroepIdWhereActief($zwemgroepId);

        $this->load->view('overzicht_wachtlijst/ajax_wachtlijstPlaatsen', $data);
    }

    /**
     * functie updateAjax_Wachtlijst
     * @brief update de wachtlijst
     * @pre er bestaat een Wachtlijst klasse
     * @post update de wachtlijsten op de pagina
     */
    public function updateAjax_Wachtlijst() {
        $zwemgroepId = $this->input->get('zwemgroepId');
        $klantId = $this->input->get('klantId');
        $statusId = $this->input->get('statusId');

        $this->beschikbaarheid_model->updateAllStatusId($klantId, $statusId);
        $this->beschikbaarheid_model->updateStatusId($zwemgroepId, $klantId, $statusId);
    }
}