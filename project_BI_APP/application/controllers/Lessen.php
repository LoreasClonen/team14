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
            $this->load->model('Lessen/Status_model');

            $data['titel'] = 'Registratie zwemles annuleren';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'registratie_annuleren',
                'voetnoot' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
        }
    }