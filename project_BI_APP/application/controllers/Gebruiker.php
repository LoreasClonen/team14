<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property CI_Input $input
 * @property Authex $authex
 * @property Inlogger_model $inlogger_model
 * @property Lesgroep_model $lesgroep_model
 */

class Gebruiker extends CI_Controller
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
        $this->load->model('Lessen/Inlogger_model', 'inlogger_model');
        $this->load->model('Lessen/Lesgroep_model', 'lesgroep_model');
        $this->load->helper('form');
        $this->load->helper('notation');
    }

    public function getGebruikers()
    {
        $data['inloggers'] = $this->inlogger_model->getAllByAchternaam();

        $data['titel'] = 'Overzicht gebruikers';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe';

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'gebruikers_beheren/overzicht_gebruikers',
            'footer' => 'main_footer');

        $this->template->load('gebruikers_beheren/gebruikers_master', $partials, $data);
    }

    public function getGebruiker($id)
    {
        $data['titel'] = 'Gebruiker';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (T), Shari Nuyts, Sebastiaan Reggers (O), Steven Van Gansberghe';

        $data['inlogger'] = $this->inlogger_model->getById($id);

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'gebruikers_beheren/overzicht_gebruiker',
            'footer' => 'main_footer');

        $this->template->load('gebruikers_beheren/gebruikers_master', $partials, $data);
    }

    public function updateGebruikerActiviteit($id, $gebruikerActief)
    {
        $this->inlogger_model->updateActief($id, $gebruikerActief);

        redirect('Gebruiker/getGebruikers');
    }

    public function deleteGebruiker($InloggerId, $zwemfeestId)
    {
        $this->lesgroep_model->delete($InloggerId);
        $this->inlogger_model->delete($zwemfeestId);

        redirect('Gebruiker/getGebruikers' . $zwemfeestId);
    }

    public function updateGebruiker()
    {
        $zwemfeestId = $this->input->post('zwemfeestId');

        $zwemfeestData = new stdClass();

        $zwemfeestData->voornaam = $this->input->post('voornaam');
        $zwemfeestData->achternaam = $this->input->post('achternaam');
        $zwemfeestData->email = $this->input->post('email');
        $zwemfeestData->telefoonnr = $this->input->post('telefoonnr');
        $zwemfeestData->geboortedatum = $this->input->post('gerecht');
        $zwemfeestData->straatnaam = $this->input->post('opmerkingen');
        $zwemfeestData->huisnummer = $this->input->post('gerecht');
        $zwemfeestData->postcode = $this->input->post('opmerkingen');

        $this->inlogger_model->update($zwemfeestId, $zwemfeestData);

        redirect('Gebruiker/getGebruikers');
    }

}