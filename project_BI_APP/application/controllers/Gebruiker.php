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
        $this->load->library('session');
        $this->load->library('form_validation');

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

        $this->template->load('admin_master', $partials, $data);
    }
    /**
     * @brief Laad een pagina de gekozen gebruiker zijn gegeven
     * @param id  van de gebruiker
     * @post de pagina met de gekozen gebruiker wordt geladen
     */
    public function getGebruiker($id)
    {
        $data['titel'] = 'Gebruiker';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe';
        $data['melding'] = $this->session->flashdata('melding');
        $data['error'] = $this->session->flashdata('error');

        $data['inlogger'] = $this->inlogger_model->getById($id);

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'gebruikers_beheren/overzicht_gebruiker',
            'footer' => 'main_footer');

        $this->template->load('admin_master', $partials, $data);
    }
    /**
     * @brief herlaad de pagina na de gebruikers activiteit aan te passen
     * @param id
     * @param gebruikersactief
     * @post de pagina met de gekozen school wordt geladen
     */

    public function updateGebruikerActiviteit($id, $gebruikerActief)
    {
        $this->inlogger_model->updateActief($id, $gebruikerActief);

        redirect('Gebruiker/getGebruikers');
    }

    /**
     * @brief herlaad de pagina met een overzicht van alle gebruikers na eentje te verwijderen
     * @param id
     * @post de pagina met alle gebruikers wordt geladen
     */
    public function deleteGebruiker($id)
    {
        $this->inlogger_model->delete($id);

        redirect('Gebruiker/getGebruikers');
    }
    /**
     * @brief Herlaad het overzicht met allle gebruikers na te updaten
     *
     * @post de pagina met het overzicht van alle gebruikers wordt geladen
     */

    public function updateGebruiker()
    {
        $id = $this->input->post('id');

        $gebruikerData = new stdClass();

        $gebruikerData->voornaam = $this->input->post('voornaam');
        $gebruikerData->achternaam = $this->input->post('achternaam');
        $gebruikerData->email = $this->input->post('email');
        $gebruikerData->telefoonnr = $this->input->post('telefoonnr');
        $gebruikerData->geboortedatum = $this->input->post('geboortedatum');
        $gebruikerData->straatnaam = $this->input->post('straatnaam');
        $gebruikerData->huisnummer = $this->input->post('huisnummer');
        $gebruikerData->postcode = $this->input->post('postcode');

        $gebruiker = new stdClass();
        $gebruiker->id = $this->input->post('id');
        $gebruiker->huidigeGebruikersId = $this->input->post('huidigeGebruikersId');

        $this->form_validation->set_rules('voornaam', 'Voornaam', 'trim|required|min_length[2]|max_length[20]');
        $this->form_validation->set_rules('achternaam', 'Achternaam', 'trim|required|min_length[2]|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('telefoonnr', 'Telefoonnr', 'trim|required|numeric|min_length[8]|max_length[15]');
        $this->form_validation->set_rules('geboortedatum', 'Geboortedatum', 'required');
        $this->form_validation->set_rules('straatnaam', 'Straatnaam', 'trim|required');
        $this->form_validation->set_rules('huisnummer', 'Huisnummer', 'trim|required|numeric|min_length[1]|max_length[4]');
        $this->form_validation->set_rules('postcode', 'Postcode', 'trim|required|numeric|min_length[4]|max_length[4]');

        $poging1 = $this->input->post('poging1');
        $poging2 = $this->input->post('poging2');

        if ($this->form_validation->run() == true) {
            $data['error'] = Null;

            if ($poging1 == $poging2 && $poging1 != NULL) {

                $wachtwoord = password_hash($poging1, PASSWORD_DEFAULT);

                $gebruikerData->wachtwoord = $wachtwoord;

                $this->inlogger_model->update($id, $gebruikerData);

                redirect('Gebruiker/getGebruikers');

            }

            else {

                $fout = "<div class='alert alert-danger' role='alert'>Uw wachtwoorden komen niet overeen of zijn nog leeg. Probeer het opnieuw.</div>";
                $this->session->set_flashdata('melding', $fout);

                if (!$gebruiker->id == $gebruiker->huidigeGebruikersId) {
                    redirect('Gebruiker/getGebruiker/' . $id);
                }
                else {
                    redirect('Gebruiker/toonMijnProfiel');
                }
            }

        }
        else {
            $validation = "<div class='alert alert-danger' role='alert'>Je vulde ongeldige gegevens in. Probeer het opnieuw.</div>";
            $this->session->set_flashdata('error', $validation);

            if (!$gebruiker->id == $gebruiker->huidigeGebruikersId) {
                redirect('Gebruiker/getGebruiker/' . $id);
            }
            else {
                redirect('Gebruiker/toonMijnProfiel');
            }

        }
    }

    /**
     * @brief Laad een pagina met het overzicht van de bepaalde gebruiker die net is toegevoegd
     *
     * @post de pagina met de gebruiker zijn overzicht wordt geladen
     */
    public function insertGebruiker()
    {
        $gebruikerData = new stdClass();

        $gebruikerData->actief = '0';
        $gebruikerData->isAdmin = '0';
        $gebruikerData->isZwemleraar = '1';

        $id = $this->inlogger_model->insert($gebruikerData);

        redirect('Gebruiker/getGebruiker/' . $id);
    }
    /**
     * @brief Laad een pagina met het profiel van de huidige aangemelde persoon
     *
     * @post de pagina met de aangemelde persoon zijn overzicht wordt geladen
     */
    public function toonMijnProfiel()
    {
        $data['titel'] = 'Gebruiker';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (T), Shari Nuyts, Sebastiaan Reggers (O), Steven Van Gansberghe';
        $data['melding'] = $this->session->flashdata('melding');
        $data['error'] = $this->session->flashdata('error');


        $inlogger = $this->authex->getGebruikerInfo();
        $inloggerId = $inlogger->id;

        $data['inlogger'] = $this->inlogger_model->getById($inloggerId);

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'gebruikers_beheren/overzicht_mijnProfiel',
            'footer' => 'main_footer');

        $this->template->load('admin_master', $partials, $data);
    }
}