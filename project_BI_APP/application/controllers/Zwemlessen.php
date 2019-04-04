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
            $this->load->model("lessen/klant_model", "klant_model");
            $this->load->library('session');
        }

        /**
        @brief keuze functie dat de pagina met keuze knoppen laad
        @post de keuze pagina wordt geladen
        */

        public function keuze()
        {
            $data["titel"] = "Zwemlessen";
            $data["teamleden"] = "";
            $partials = array('hoofding' => 'zwemlessen/aanmelden_zwemlessen_header',
                'inhoud' => 'zwemlessen/keuze_inschrijvingen',
                'footer' => 'zwemlessen/aanmelden_zwemlessen_footer');
            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief laad het gekozen formulier in en toont de view met het formulier
         * @param form
         * @post de pagina met het gekozen form wordt geladen
         */
        public function Index($form)
        {
            $data["titel"] = "Zwemlessen";
            $data["teamleden"] = "";
            $data["zwemniveaus"] = $this->zwemniveau_model->getAllById();
            $partials = array('hoofding' => 'zwemlessen/aanmelden_zwemlessen_header',
                'inhoud' => 'zwemlessen/' . $form,
                'footer' => 'zwemlessen/aanmelden_zwemlessen_footer'
            );
            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief de functie voegt een klant toe indien deze nog niet bestaat in de database.
         * @brief de functie toont een pagina voor de keuze van de zwemlessen of een error pagina indie de klant al bestaat
         * @post De klant is toegevoegd in de klant-tabel en het systeem toont de bijbehorende pagina
         */

        public function addKlant()
        {
            $this->load->model("lessen/klant_model", "klant_model");
            $this->load->model("lessen/Zwemniveau_model", "zwemniveau_model");
            $klant = new stdClass();
            $klant->voornaam = $this->input->post("voornaam");
            $klant->achternaam = $this->input->post("achternaam");
            $klant->email = $this->input->post("email");
            $klant->geboortedatum = $this->input->post("geboortedatum");
            $klant->zwemniveauId = $this->input->post("zwemniveau");
            $klant->actief = '1';
            if ($this->klant_model->addKlant($klant)) {
                $this->session->set_flashdata('klantId', $klant->id);
                $this->session->set_flashdata('zwemniveauId', $klant->zwemniveauId);
                redirect('zwemlessen/keuze_zwemlessen');
            } else {
                redirect('Zwemlessen/reeds_toegevoegd_error');
            }
        }

        /**
         * @brief de succesmail functie laad de pagina voor de succesmail te tonen
         * @post de pagina wordt geladen.
         */
        public function succesmail()
        {
            $data["titel"] = "succesmail";
            $data["teamleden"] = "";
            $partials = array(
                'inhoud' => 'zwemlessen/succesmail',
                'footer' => 'zwemlessen/aanmelden_zwemlessen_footer');
            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief de bestaandeKlant functie laad de pagina voor de bestaande_klant.
         * @post de pagina van de bestaande_klant wordt getoond.
         */
        public function bestaandeKlant(){

            $data["titel"] = "Zwemlessen";
            $data["teamleden"] = "";
            $partials = array('hoofding' => 'zwemlessen/aanmelden_zwemlessen_header',
                'inhoud' => 'zwemlessen/bestaande_klant',
                'footer' => 'zwemlessen/aanmelden_zwemlessen_footer');
            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief de reeds_toegevoegd_error functie laad de pagina voor de reeds_toegevoegd_error.
         * @post de pagina van de reeds_toegevoegd_error wordt getoond.
         */
        public function reeds_toegevoegd_error()
        {
            $data["titel"] = "Zwemlessen";
            $data["teamleden"] = "";
            $partials = array('hoofding' => 'zwemlessen/aanmelden_zwemlessen_header',
                'inhoud' => 'zwemlessen/reeds_toegevoegd_error',
                'footer' => 'zwemlessen/aanmelden_zwemlessen_footer');
            $this->template->load('main_master', $partials, $data);
        }

        public function keuze_zwemlessen_bevestigen(){
            $klantId = $this->input->post("klantId");
            $gekozengroepenIds = $this->input->post("gekozenGroepen");

        }
        public function keuze_zwemlessen()
        {
            $klantId = $this->session->flashdata('klantId');
            $zwemniveauId = $this->session->flashdata('zwemniveauId');
            $data['titel'] = 'Keuze zwemlessen';
            $data['teamleden'] = '';
            $data['klant'] = $this->klant_model->getById($klantId);
            $data["lesgroepen"] = $this->lesgroep_model->getLesgroepByZwemniveaId($zwemniveauId);
            $partials = array('hoofding' => 'zwemlessen/aanmelden_zwemlessen_header',
                'inhoud' => 'zwemlessen/keuze_zwemlessen',
                'footer' => 'zwemlessen/aanmelden_zwemlessen_footer');
            $this->template->load('main_master', $partials, $data);

        }

        public function bevestigAnnuleerZwemles($klantId)
        {
            $data["titel"] = "Inschrijving annuleren";
            $data["klantId"] = $klantId;
            $data["teamleden"] = "Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)";
            $partials = array('hoofding' => 'zwemlessen/aanmelden_zwemlessen_header',
                'inhoud' => 'zwemlessen/bevestig_annuleer_zwemles',
                'footer' => 'zwemlessen/aanmelden_zwemlessen_footer');
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
            $data["teamleden"] = "Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)";
            $partials = array('hoofding' => 'zwemlessen/aanmelden_zwemlessen_header',
                'inhoud' => 'zwemlessen/bevestiging_annuleer_zwemles',
                'footer' => 'zwemlessen/aanmelden_zwemlessen_footer');
            $this->template->load('main_master', $partials, $data);
        }

        public function emailBevestigingAnnuleerZwemles($klantId)
        {
            $data['titel'] = 'Inbox';
            $data['gebruiker'] = $this->klant_model->getById($klantId);
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'email_header',
                'inhoud' => 'zwemlessen/email_bevestiging_annuleer_zwemles',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

    }
