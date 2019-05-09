<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * @property Template $template
     * @property Authex $authex
     * @property Klant_model $klant_model
     * @property Zwemniveau_model $zwemniveau_model
     * @property Beschikbaarheid_model $beschikbaarheid_model
     * @property Lesgroep_model $lesgroep_model
     */
    class Zwemmer extends CI_Controller
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
            $this->load->model('Lessen/Klant_model', 'klant_model');
            $this->load->model('Lessen/Lesgroep_model', 'lesgroep_model');
            $this->load->model('Lessen/Beschikbaarheid_model', 'beschikbaarheid_model');
            $this->load->model('Lessen/Zwemniveau_model', 'zwemniveau_model');
            $this->load->helper('form');
            $this->load->library('form_validation');
        }

        /**
         * @brief De functie zwemmerOphalen geeft een overzicht van een zwemmer weer waar je de gegevens kan aanpassen. De functie haalt de gegevens uit de tabellen beschikbaarheid, zwemniveau, klant en lesgroep.
         * @param $id
         * @pre Er bestaat een klant_model klasse, zwemniveau_model klasse, een beschikbaarheid_model klasse en een lesgroep_model klasse
         * @post De pagina overzicht_zwemmer wordt weergeven
         */
        public function zwemmerOphalen($id)
        {
            $zwemmer = $this->klant_model->getById($id);
            $data['zwemmer'] = $zwemmer;

            $data['titel'] = 'Overzicht zwemmer';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';

            $data['zwemniveau'] = $this->zwemniveau_model->getById($zwemmer->zwemniveauId);

            $zwemgroepen = $this->beschikbaarheid_model->getByKlantId($id);
            $groepsnamen = array();

            foreach ($zwemgroepen as $zwemgroep) {
                array_push($groepsnamen, $this->lesgroep_model->get($zwemgroep->lesgroepId));
            }
            $data['zwemgroep'] = $groepsnamen;

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemmers_beheren/overzicht_zwemmer',
                'footer' => 'main_footer');

            $this->template->load('inlogger_master', $partials, $data);
        }

        /**
         * @brief Geeft een pagina weer die zwemmers oplijst in een tabel
         * @pre er bestaat een Zwemmer controller, een Klant model klasse met functie getAllByAchternaamWithLesgroepWithZwemniveauWhereActief
         * @post Er word een pagina weergegeven die alle zwemmers in een tabel weergeeft
         */
        public function zwemmersOphalen()
        {
            $data['zwemmers'] = $this->klant_model->getAllByAchternaamWithLesgroepWithZwemniveauWhereActief();

            $data['titel'] = 'Overzicht zwemmers';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemmers_beheren/overzicht_zwemmers',
                'footer' => 'main_footer');

            $this->template->load('inlogger_master', $partials, $data);
        }

        public function haalAjaxOp_ZwemmerVerwijderen()
        {
            $id = $this->input->get('id');

            $data["zwemmer"] = $this->klant_model->getById($id);

            $this->load->view("zwemmers_beheren/ajax_zwemmer_verwijderen", $data);
        }

        public function zwemmerVerwijderen($id)
        {
            $this->klant_model->deleteKlant($id);

            redirect('zwemmer/zwemmersOphalen');
        }

        public function zwemmerBewerken($id)
        {
            $zwemmer = $this->klant_model->getById($id);
            $data['zwemmer'] = $zwemmer;

            $data['titel'] = 'Overzicht zwemmer';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';

            $data['zwemniveau'] = $this->zwemniveau_model->getById($zwemmer->zwemniveauId);

            $zwemgroepen = $this->beschikbaarheid_model->getByKlantId($id);
            $groepsnamen = array();

            foreach ($zwemgroepen as $zwemgroep) {
                array_push($groepsnamen, $this->lesgroep_model->get($zwemgroep->lesgroepId));
            }
            $data['zwemgroep'] = $groepsnamen;

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemmers_beheren/bewerken_zwemmer',
                'footer' => 'main_footer');

            $this->template->load('Inlogger_master', $partials, $data);
        }


        public function updateZwemmer($klantId)
        {
            $this->load->model("lessen/klant_model", "klant_model");

            $klant = new stdClass();
            $klant->voornaam = $this->input->post("voornaam");
            $klant->achternaam = $this->input->post("achternaam");
            $klant->email = $this->input->post("email");
            $klant->geboortedatum = $this->input->post("geboortedatum");
            $klant->straatnaam = $this->input->post("straatnaam");
            $klant->huisnummer = $this->input->post("huisnummer");
            $klant->postcode = $this->input->post('postcode');
            $klant->actief = '1';

            $this->form_validation->set_rules('voornaam', 'Voornaam', 'trim|required|min_length[2]|max_length[20]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('achternaam', 'Achternaam', 'trim|required|min_length[2]|max_length[20]');
            $this->form_validation->set_rules('geboortedatum', 'Geboortedatum', 'required');
            $this->form_validation->set_rules('straatnaam', 'Straatnaam', 'trim|required');
            $this->form_validation->set_rules('huisnummer', 'Huisnummer', 'trim|required|numeric|min_length[1]|max_length[4]');
            $this->form_validation->set_rules('postcode', 'Postcode', 'trim|required|numeric|min_length[4]|max_length[4]');


            if ($this->form_validation->run() == true) {
                $data['error'] = Null;
                $this->klant_model->updateKlant($klant, $klantId);
                redirect('Zwemmer/zwemmersOphalen/' . $klantId);
            } else {
                $this->session->set_flashdata('error', validation_errors());
                redirect('zwemmer/zwemmerBewerken/' . $klantId);

            }
        }

    }