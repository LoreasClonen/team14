<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property Authex $authex
 */
class Zwemlessen extends CI_Controller
{
    // +----------------------------------------------------------
    // | project app-bi
    // +----------------------------------------------------------
    // | 2 ITF - 2018-2019
    // +----------------------------------------------------------
    // | Home controller
    // +----------------------------------------------------------
    // | Team 14
    // +----------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lessen/Lesgroep_model', 'lesgroep_model');
        $this->load->helper('form');
    }

    public function Index(){
        $data["titel"] = "Zwemlessen";
        $partials = array('hoofding' => 'zwemlessen/aanmelden_zwemlessen_header',
            'inhoud' => 'zwemlessen/aanmelden_zwemlessen_main',
            'footer' => 'zwemlessen/aanmelden_zwemlessen_footer'
            );
        $this->template->load('main_master', $partials, $data);
    }
}
