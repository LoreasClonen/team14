<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property CI_Input $input
 * @property Authex $authex
 * @property Lesgroep_model $lesgroep_model
 * @property Zwemniveau_model $zwemniveau_model
 * @property Beschikbaarheid_model $beschikbaarheid_model
 */

class Zwemgroepen extends CI_Controller
{

    // +----------------------------------------------------------
    // | project app-bi
    // +----------------------------------------------------------
    // | 2 ITF - 2018-2019
    // +----------------------------------------------------------
    // | Inloggen controller
    // +----------------------------------------------------------
    // | Team 14
    // +----------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lessen/Lesgroep_model', 'lesgroep_model');
        $this->load->model('Lessen/Inlogger_model', 'inlogger_model');
        $this->load->model('Lessen/Beschikbaarheid_model', 'beschikbaarheid_model');
        $this->load->model('Lessen/Zwemniveau_model', 'zwemniveau_model');
        $this->load->helper('form');
        $this->load->helper('notation');
    }

    public function zwemgroepenOphalen()
    {
        $data['zwemgroepen'] = $this->lesgroep_model->getAllById();

        $data['titel'] = 'Overzicht zwemgroepen';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'zwemgroepen_beheren/overzicht_zwemgroepen',
            'footer' => 'main_footer');

        $this->template->load('zwemgroepen_beheren/zwemgroepen_master', $partials, $data);
    }

    public function getZwemgroep($id)
    {
        $data['titel'] = 'lesgroep';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts (T), Sebastiaan Reggers, Steven Van Gansberghe';

        $data['zwemgroep'] = $this->lesgroep_model->get($id);
        $data['inlogger'] = $this->lesgroep_model->getIdWithInlogger($id);
        $data['zwemniveau'] = $this->lesgroep_model->getIdWithZwemniveau($id);

        $data['beschikbaarheden'] = $this->beschikbaarheid_model->getByLesgroepIdWithKlant($id);


        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'zwemgroepen_beheren/overzicht_zwemgroep',
            'footer' => 'main_footer');

        $this->template->load('zwemgroepen_beheren/zwemgroepen_master', $partials, $data);
    }

    public function verwijderZwemgroep($id)
    {
        $this->lesgroep_model->delete($id);

        $data['zwemgroepen'] = $this->lesgroep_model->getAllById();

        $data['titel'] = 'Overzicht zwemgroepen';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'zwemgroepen_beheren/overzicht_zwemgroepen',
            'footer' => 'main_footer');

        $this->template->load('zwemgroepen_beheren/zwemgroepen_master', $partials, $data);
    }

    public function zwemgroepToevoegenLaden()
    {
        $data['titel'] = 'Zwemgroep Toevoegen';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['zwemniveaus'] = $this->zwemniveau_model->getAllById();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (T), Shari Nuyts, Sebastiaan Reggers (O), Steven Van Gansberghe';

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'zwemgroepen_beheren/zwemgroep_toevoegen',
            'footer' => 'main_footer');

        $this->template->load('zwemgroepen_beheren/zwemgroepen_master', $partials, $data);
    }

    public function addZwemgroep()
    {
        $zwemgroep = new stdClass();

        $zwemgroep->groepsnaam = $this->input->post('groepsnaam');
        $zwemgroep->weekdag = $this->input->post('weekdag');
        $zwemgroep->zwemniveauId = $this->input->post('zwemniveau');
        $zwemgroep->maxGrootte = $this->input->post('maxGrootte');
        $zwemgroep->beginuur = $this->input->post('beginuur');
        $zwemgroep->einduur = $this->input->post('einduur');
        $zwemgroep->inloggerId = $this->input->post('gebruiker');

        $this->lesgroep_model->insert($zwemgroep);

        redirect('Zwemgroepen/zwemgroepenOphalen');
    }

}