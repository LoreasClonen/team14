<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * @property Template $template
     * @property Soort_model $soort_model
     * @property Product_model $product_model
     */
    class Les1 extends CI_Controller
    {

        // +----------------------------------------------------------
        // | Lekkerbier
        // +----------------------------------------------------------
        // | 2 ITF - 201x-201x
        // +----------------------------------------------------------
        // | Les1 controller
        // +----------------------------------------------------------
        // | M. Decabooter, J. Janssen
        // +----------------------------------------------------------

        public function __construct()
        {
            parent::__construct();

            $this->load->helper('notation');
            $this->load->helper('form');
        }

        public function toonAccordion()
        {
            $data['titel'] = 'Accordion';

            $partials = array('hoofding' => 'les1/hoofding',
                'inhoud' => 'les1/accordion');

            $this->template->load('main_master', $partials, $data);
        }

        public function toonTabs()
        {
            $data['titel'] = 'Tabs';

            $partials = array('hoofding' => 'les1/hoofding',
                'inhoud' => 'les1/tabs');

            $this->template->load('main_master', $partials, $data);
        }

        public function toonSoortProductAccordion()
        {
            $data['titel'] = 'Soort/product accordion';

            $this->load->model('soort_model');
            $data['soorten'] = $this->soort_model->getAllWithProducten();

            $partials = array('hoofding' => 'les1/hoofding',
                'inhoud' => 'les1/soort_product_accordion');

            $this->template->load('main_master', $partials, $data);
        }

        public function toonSoortProductTabs()
        {
            $data['titel'] = 'Soort/product tabs';

            $this->load->model('soort_model');
            $data['soorten'] = $this->soort_model->getAllWithProducten();

            $partials = array('hoofding' => 'les1/hoofding',
                'inhoud' => 'les1/soort_product_tabs');

            $this->template->load('main_master', $partials, $data);
        }

        public function toonDetail($id)
        {
            $data['titel'] = 'Product detailgegevens';

            $this->load->model('product_model');
            $data['product'] = $this->product_model->getWithSoortEnBrouwerij($id);

            $partials = array('hoofding' => 'les1/hoofding',
                'inhoud' => 'les1/product_detail');

            $this->template->load('main_master', $partials, $data);
        }

        public function valideer()
        {
            $data['titel'] = 'Validatie';

            $partials = array('hoofding' => 'les1/hoofding',
                'inhoud' => 'les1/validatie');

            $this->template->load('main_master', $partials, $data);
        }

        public function behandelValidatie()
        {
            $data['titel'] = "Validatie";

            $partials = array('hoofding' => 'les1/hoofding',
                'inhoud' => 'les1/validatieOk');

            $this->template->load('main_master', $partials, $data);
        }

        public function toonButtons()
        {
            $data['titel'] = 'Buttons';

            $partials = array('hoofding' => 'les1/hoofding', 'inhoud' => 'les1/buttons');
            $this->template->load('main_master', $partials, $data);
        }

    }
