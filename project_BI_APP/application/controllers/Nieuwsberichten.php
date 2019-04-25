<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property CI_Input $input
 * @property Authex $authex
 * @property Inlogger_model $nieuwsbericht_model
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
        $this->load->model('Extras/Nieuwsbericht_model', 'nieuwsbericht_model');
        $this->load->helper('form');
        $this->load->helper('notation');
    }

    public function nieuwsberichtenOphalen()
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

    public function nieuwsberichtOphalen($id)
    {
        $data['titel'] = 'Gebruiker';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe';

        $data['inlogger'] = $this->inlogger_model->getById($id);

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'gebruikers_beheren/overzicht_gebruiker',
            'footer' => 'main_footer');

        $this->template->load('gebruikers_beheren/gebruikers_master', $partials, $data);
    }

    public function deleteNieuwsbericht($id)
    {
        $this->inlogger_model->delete($id);

        redirect('Gebruiker/getGebruikers');
    }

    public function updateNieuwsbericht()
    {
        $id = $this->input->post('id');

        $gebruikerData = new stdClass();

        $gebruikerData->voornaam = $this->input->post('voornaam');
        $gebruikerData->achternaam = $this->input->post('achternaam');
        $gebruikerData->email = $this->input->post('email');
        $gebruikerData->wachtwoord = $this->input->post('wachtwoord');
        $gebruikerData->telefoonnr = $this->input->post('telefoonnr');
        $gebruikerData->geboortedatum = $this->input->post('geboortedatum');
        $gebruikerData->straatnaam = $this->input->post('straatnaam');
        $gebruikerData->huisnummer = $this->input->post('huisnummer');
        $gebruikerData->postcode = $this->input->post('postcode');

        $this->inlogger_model->update($id, $gebruikerData);

        redirect('Gebruiker/getGebruikers');
    }

    public function insertNieuwsbericht()
    {
        $gebruikerData = new stdClass();

        $gebruikerData->actief = '0';
        $gebruikerData->isAdmin = '0';
        $gebruikerData->isZwemleraar = '1';

        $id = $this->inlogger_model->insert($gebruikerData);

        redirect('Gebruiker/getGebruiker/' . $id);
    }

}