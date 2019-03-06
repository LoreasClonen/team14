<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * @property Template $template
     */
    class Home extends CI_Controller
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
        }

        public function index()
        {
            $data['titel'] = 'Zwembad informatie';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'main_menu');
            $this->template->load('main_master', $partials, $data);
        }
    }
