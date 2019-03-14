<?php

    /**
     * @class Lessen
     * @brief Controller-klasse voor lessen
     *
     * Controller klasse met alle methodes die gebruikt worden voor alles wat te maken heeft met inloggers, zwemlessen en klanten
     */
    class Lessen extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Lessen/Lesgroep_model', 'lesgroep_model');
            $this->load->helper('form');
        }

        public function verwijderZwemles($id)
        {
            
        }
    }