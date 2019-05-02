<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property CI_Input $input
 * @property Authex $authex
 * @property Nieuwsbericht_model $nieuwsbericht_model
 */

class Nieuwsberichten extends CI_Controller
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
        $data['nieuwsberichten'] = $this->nieuwsbericht_model->getAllById();

        $data['titel'] = 'Overzicht nieuwsberichten';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens (O), Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe';

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'nieuwsberichten_beheren/overzicht_nieuwsberichten',
            'footer' => 'main_footer');

        $this->template->load('main_master', $partials, $data);
    }

    public function nieuwsberichtOphalen($id)
    {
        $data['titel'] = 'Nieuwsbericht';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens (O), Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe';

        $data['nieuwsbericht'] = $this->nieuwsbericht_model->getById($id);

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'nieuwsberichten_beheren/overzicht_nieuwsbericht',
            'footer' => 'main_footer');

        $this->template->load('main_master', $partials, $data);
    }

    public function deleteNieuwsbericht($id)
    {
        $this->nieuwsbericht_model->delete($id);

        redirect('Nieuwsberichten/nieuwsberichtenOphalen');
    }

    public function updateNieuwsbericht()
    {
        $id = $this->input->post('id');

        $gebruikerData = new stdClass();

        $gebruikerData->bericht = $this->input->post('bericht');
        $gebruikerData->foto = $this->input->post('foto');

        $this->nieuwsbericht_model->update($id, $gebruikerData);

        redirect('Nieuwsberichten/nieuwsberichtenOphalen');
    }

    public function insertNieuwsbericht()
    {
        $gebruikerData = new stdClass();

        $id = $this->nieuwsbericht_model->insert($gebruikerData);

        redirect('Nieuwsberichten/nieuwsberichtOphalen/' . $id);
    }

}