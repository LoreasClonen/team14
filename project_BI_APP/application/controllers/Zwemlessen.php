<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * @property Template $template
     * @property Authex $authex
     */


    /**
     * @file
     * @brief php-file voor de zwemlessen klasse
     * @class
     * @brief Deze klasse is een controller en bevat alle functies ivm met zwemlessen.
     * @author Team 14
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
            $this->load->model('Lessen/Zwemniveau_model', 'zwemniveau_model');
            $this->load->model("Lessen/Klant_model", "klant_model");
            $this->load->model("lessen/Beschikbaarheid_model", "klant_model");
            $this->load->library('session');
            $this->load->library('form_validation');
        }

        /**
        @brief keuze functie dat de pagina met keuze knoppen laad
        @post de keuze pagina wordt geladen
        */

        public function keuze()
        {
            $data["titel"] = "Zwemlessen";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data["teamleden"] = "Loreas Clonen (O), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe";
            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemlessen/keuze_inschrijvingen',
                'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief laad het gekozen formulier in en toont de view met het formulier
         * @param form
         * @post de pagina met het gekozen form wordt geladen
         */
        public function index($form)
        {
            $data["titel"] = "Zwemlessen";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data["teamleden"] = "Loreas Clonen (O), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe";
            $data["zwemniveaus"] = $this->zwemniveau_model->getAllById();
            $data["form"] = $form;
            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemlessen/' . $form,
                'footer' => 'main_footer'
            );
            $this->session->set_flashdata('form',$form);
            $data['error']=$this->session->flashdata('error');
            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief de functie voegt een klant toe indien deze nog niet bestaat in de database.
         * @brief de functie toont een pagina voor de keuze van de zwemlessen of een error pagina indie de klant al bestaat
         * @post De klant is toegevoegd in de klant-tabel en het systeem toont de bijbehorende pagina
         */

        public function addKlant()
        {
            $form = $this->session->flashdata('form');
            $this->load->model("lessen/klant_model", "klant_model");
            $this->load->model("lessen/Zwemniveau_model", "zwemniveau_model");
            $klant = new stdClass();
            $klant->voornaam = $this->input->post("voornaam");
            $klant->achternaam = $this->input->post("achternaam");
            $klant->email = $this->input->post("email");
            $klant->geboortedatum = $this->input->post("geboortedatum");
            $klant->zwemniveauId = $this->input->post("zwemniveau");
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


            if($this->form_validation->run()==true) {
                $data['error'] = Null;


                if ($this->klant_model->addKlant($klant)) {
                    $this->session->set_flashdata('zwemniveauId', $klant->zwemniveauId);
                    $this->session->set_flashdata('klant', $klant);
                    $this->klant_model->addKlant($klant);
                    redirect('zwemlessen/keuze_zwemlessen');
                } else {
                    redirect('Zwemlessen/reeds_toegevoegd_error');
                }
            }
            else {

                    $this->session->set_flashdata('error', validation_errors());
                    redirect('zwemlessen/index/' . $form);
            }
        }

        /**
         * @brief de succesmail functie laad de pagina voor de succesmail te tonen
         * @post de pagina wordt geladen.
         */
        public function succesmail()
        {
            $data["titel"] = "succesmail";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data["teamleden"] = "Loreas Clonen (O), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe";
            $partials = array(
                'inhoud' => 'zwemlessen/succesmail',
                'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief de bestaandeKlant functie laad de pagina voor de bestaande_klant.
         * @post de pagina van de bestaande_klant wordt getoond.
         */
        public function bestaandeKlant(){

            $data["titel"] = "Zwemlessen";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data["teamleden"] = "Loreas Clonen (O), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe";
            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemlessen/bestaande_klant',
                'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief de reeds_toegevoegd_error functie laad de pagina voor de reeds_toegevoegd_error.
         * @post de pagina van de reeds_toegevoegd_error wordt getoond.
         */
        public function reeds_toegevoegd_error()
        {
            $data["titel"] = "Zwemlessen";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data["teamleden"] = "Loreas Clonen (O), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe";
            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemlessen/reeds_toegevoegd_error',
                'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
        }

        public function keuze_zwemlessen_bevestigen($klantId){

            $gekozengroepenIds = $this->input->post("gekozenGroepen");
            //update de beschikbaarheidstabel
            $data['klantId'] = $klantId;
            $this->beschikbaarheid_model->nieuweKlantToevoegen($klantId, $gekozengroepenIds);
            $data['titel'] = 'Mailbox';
            $data['teamleden'] = '';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data["teamleden"] = "Loreas Clonen (O), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe";
            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemlessen/bevestigings_mail',
                'footer' => 'main_footer');


            $this->template->load('main_master', $partials, $data);


        }
        public function keuze_zwemlessen()
        {
            $klant = $this->session->flashdata('klant');
            $zwemniveauId = $this->session->flashdata('zwemniveauId');
            $data['titel'] = 'Keuze zwemlessen';
            $data['teamleden'] = '';
            $data['klant'] = $this->klant_model->getKlantId($klant->voornaam, $klant->achternaam, $klant->email);
            $data["lesgroepen"] = $this->lesgroep_model->getLesgroepByZwemniveauId($zwemniveauId);
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data["teamleden"] = "Loreas Clonen (O), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe";
            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemlessen/keuze_zwemlessen',
                'footer' => 'main_footer');


            $this->template->load('main_master', $partials, $data);

        }

        public function bevestigAnnuleerZwemles($klantId = -1)
        {
            if($klantId == -1) {
                $klantId = $this->session->flashdata('klantId');
            }
            $data["titel"] = "Inschrijving annuleren";
            $data["klantId"] = $klantId;
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data["teamleden"] = "Loreas Clonen (O), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe";
            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemlessen/bevestig_annuleer_zwemles',
                'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
        }

        public function annuleerZwemles($klantId)
        {

            $this->beschikbaarheid_model->delete($klantId);
            $this->klant_model->updateStatus($klantId, 0);

            redirect('zwemlessen/bevestigingAnnuleerZwemles/' . $klantId);
        }

        public function bevestigingAnnuleerZwemles($klantId)
        {
            $data["titel"] = "Inschrijving geannuleerd";
            $data["klantId"] = $klantId;
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data["teamleden"] = "Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)";
            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemlessen/bevestiging_annuleer_zwemles',
                'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
        }

        public function emailBevestigingAnnuleerZwemles()
        {
            $klantId = $this->session->flashdata('klantId');
            $data['titel'] = 'Inbox';
            $data['gebruiker'] = $this->klant_model->getById($klantId);
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'email_header',
                'inhoud' => 'zwemlessen/email_bevestiging_annuleer_zwemles',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

        public function gaNaarHelp() {
            $data['titel'] = 'Help';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (T), Sebastiaan Reggers (O), Steven Van Gansberghe';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemlessen/help_aanmelden_zwemlessen',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

    }

