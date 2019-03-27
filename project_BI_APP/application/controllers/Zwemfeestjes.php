<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property Authex $authex
 * @property ZwemfeestMoment_model $zwemfeestMoment_model
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
        $this->load->helper('notation_helper');
    }

    public function zwemfeestMomentenOphalen()
    {
        $data['zwemfeestMomenten'] = $this->zwemfeestMoment_model->getAllByDatumWithZwemfeest();

        $data['titel'] = 'Overzicht zwemfeestjes';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts (T), Sebastiaan Reggers, Steven Van Gansberghe';

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'overzicht_zwemfeestjes/overzicht_zwemfeestjes',
            'footer' => 'main_footer');

        $this->template->load('main_master', $partials, $data);
    }

}