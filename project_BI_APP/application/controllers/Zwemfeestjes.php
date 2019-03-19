<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property Authex $authex
 * @property Zwemfeest_model $zwemfeest_model
 */
class Zwemfeestjes extends CI_Controller
{
    // +----------------------------------------------------------
    // | project app-bi
    // +----------------------------------------------------------
    // | 2 ITF - 2018-2019
    // +----------------------------------------------------------
    // | Zwemmer controller
    // +----------------------------------------------------------
    // | Team 14
    // +----------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Zwemfeest/ZwemfeestMoment_model', 'zwemfeestMoment_model');
        $this->load->helper('form');
    }

    public function zwemfeestjesOphalen()
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

}