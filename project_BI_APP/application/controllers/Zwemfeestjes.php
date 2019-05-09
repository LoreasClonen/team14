<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * @property Template $template
     * @property CI_Input $input
     * @property Authex $authex
     * @property ZwemfeestMoment_model $zwemfeestMoment_model
     * @property Zwemfeest_model $zwemfeest_model
     * @property Gerecht_model $gerecht_model
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
            $this->load->model('Zwemfeest/Gerecht_model', 'gerecht_model');
            $this->load->model('Zwemfeest/Zwemfeest_model', 'zwemfeest_model');
            $this->load->helper('form');
            $this->load->helper('notation');
            $this->load->library('session');
            $this->load->library('form_validation');
        }

        /**
         * functie getZwemfeestMomenten
         * @brief haalt alle zwemfeestmomenten op
         * @pre er bestaat een Zwemfeestjes klasse
         * @post de pagina zwemfeestjes_master wordt geladen
         * @param
         */
        public function getZwemfeestMomenten()
        {
            $data['zwemfeestMomenten'] = $this->zwemfeestMoment_model->getAllByDatumWithZwemfeest();

            $data['titel'] = 'Overzicht zwemfeestjes';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts (T), Sebastiaan Reggers, Steven Van Gansberghe';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'overzicht_zwemfeestjes/overzicht_zwemfeestjes',
                'footer' => 'main_footer');

            $this->template->load('admin_master', $partials, $data);
        }

        /**
         * functie getZwemfeestje
         * @brief haalt een bepaald zwemfeestje
         * @pre er bestaat een Zwemfeestjes klasse
         * @post de pagina zwemfeestjes_master wordt geladen
         * @param $id
         */
        public function getZwemfeestje($id)
        {
            $data['zwemfeestje'] = $this->zwemfeestMoment_model->getByIdWithEverything($id);
            $data['gerechten'] = $this->gerecht_model->getAllById();

            $data['titel'] = 'Overzicht zwemfeestje';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens (T), Shari Nuyts, Sebastiaan Reggers (O), Steven Van Gansberghe';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'overzicht_zwemfeestjes/overzicht_zwemfeestje',
                'footer' => 'main_footer');

            $this->template->load('admin_master', $partials, $data);
        }

        /**
         * functie getZwemfeestjeVoorAnnuleren
         * @brief haalt een zwemfeestmoment van een zwemfeestje dat geannuleerd wordt op
         * @pre er bestaat een Zwemfeestjes klasse
         * @post de pagina zwemfeestjes_master wordt geladen
         * @param $zwemfeestId
         */
        public function getZwemfeestjeVoorAnnuleren($zwemfeestId)
        {
            $data['zwemfeestje'] = $this->zwemfeestMoment_model->getByIdWithEverything($zwemfeestId);

            $data['titel'] = 'Overzicht zwemfeestje';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'overzicht_zwemfeestjes/zwemfeestje_annuleren',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

        /**
         * functie deleteZwemfeestje
         * @brief verwijdert een bepaald zwemfeestje en het bijhorende zwemfeestmoment
         * @pre er bestaat een Zwemfeestjes klasse
         * @post een zwemfeest en een zwemfeestmoment worden verwijderd
         * @param $zwemfeestMomentId
         * @param $zwemfeestId
         */
        public function deleteZwemfeestje($zwemfeestMomentId, $zwemfeestId)
        {
            $this->zwemfeestMoment_model->delete($zwemfeestMomentId);
            $this->zwemfeest_model->delete($zwemfeestId);

            redirect('Zwemfeestjes/getZwemfeestjeVoorAnnuleren/' . $zwemfeestId);
        }

        /**
         * functie updateZwemfeestje
         * @brief update een bepaald zwemfeestje
         * @pre er bestaat een Zwemfeestjes klasse
         * @post een zwemfeest wordt geüpdated
         */
        public function updateZwemfeestje()
        {
            $zwemfeestId = $this->input->post('zwemfeestId');

            $zwemfeestData = new stdClass();

            $zwemfeestData->voornaam = $this->input->post('voornaam');
            $zwemfeestData->achternaam = $this->input->post('achternaam');
            $zwemfeestData->email = $this->input->post('email');
            $zwemfeestData->telefoonnr = $this->input->post('telefoonnr');
            $zwemfeestData->aantalKinderen = $this->input->post('aantalKinderen');
            $zwemfeestData->gerechtId = $this->input->post('gerecht');
            $zwemfeestData->opmerkingen = $this->input->post('opmerkingen');

            $this->zwemfeest_model->update($zwemfeestId, $zwemfeestData);

            redirect('Zwemfeestjes/getZwemfeestMomenten');
        }

        /**
         * functie zwemfeestjeBoeken
         * @brief haalt alle info voor het boeken van een zwemfeestje op
         * @pre er bestaat een Zwemfeestjes klasse
         * @post de pagina zwemfeestjes_master wordt geladen
         */
        public function zwemfeestjeBoeken()
        {
            $data['gerechten'] = $this->gerecht_model->getAllById();

            $data['titel'] = 'Zwemfeestje boeken';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T - O), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe (O)';

            $data['foutUur'] = $this->session->flashdata('foutUur');
            $data['fouteDatum'] = $this->session->flashdata('fouteDatum');
            $data['error'] = $this->session->flashdata('error');
            $data['zwemfeest'] = $this->session->flashdata('zwemfeestData');
            $data['zwemfeestMoment'] = $this->session->flashdata('zwemfeestMomentData');

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemfeestje_boeken/zwemfeestje_toevoegen',
                'footer' => 'main_footer');

            $this->template->load('card_master', $partials, $data);
        }

        /**
         * functie aanvragenZwemfeestje
         * @brief boekt een zwemfeestje
         * @pre er bestaat een Zwemfeestjes klasse
         * @post boekt het zwemfeestje
         */
        public function aanvragenZwemfeestje()
        {
            $zwemfeestData = new stdClass();
            $zwemfeestMomentData = new stdClass();

            $zwemfeestData->voornaam = $this->input->post('voornaam');
            $zwemfeestData->achternaam = $this->input->post('achternaam');
            $zwemfeestData->email = $this->input->post('email');
            $zwemfeestData->telefoonnr = $this->input->post('telefoonnr');
            $zwemfeestData->aantalKinderen = $this->input->post('aantalKinderen');
            $zwemfeestData->gerechtId = $this->input->post('gerecht');
            $zwemfeestData->opmerkingen = $this->input->post('opmerkingen');
            $zwemfeestData->isBevestigd = 0;

            $zwemfeestMomentData->datum = $this->input->post('datum');
            $zwemfeestMomentData->beginuur = $this->input->post('beginuur');
            $zwemfeestMomentData->einduur = $this->input->post('einduur');

            $this->form_validation->set_rules('voornaam', 'Voornaam', 'trim|required|min_length[2]|max_length[20]');
            $this->form_validation->set_rules('achternaam', 'Achternaam', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('telefoonnr', 'Telefoonnummer', 'trim|required|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('aantalKinderen', 'Hoeveel kinderen komen er?', 'trim|required|numeric');
            $this->form_validation->set_rules('opmerkingen', 'Opmerkingen?', 'trim|max_length[200]');
            $this->form_validation->set_rules('datum', 'Datum', 'trim|required');
            $this->form_validation->set_rules('beginuur', 'Beginuur', 'trim|required');
            $this->form_validation->set_rules('einduur', 'Einduur', 'trim|required');

            if ($this->form_validation->run() == true) {
                $data['error'] = Null;
                if ($zwemfeestMomentData->beginuur > $zwemfeestMomentData->einduur || date('d/m/Y', $zwemfeestMomentData->datum) < date('d/m/Y')) {
                    if ($zwemfeestMomentData->beginuur > $zwemfeestMomentData->einduur) {
                        $foutUur = "<div class='alert alert-danger' role = 'alert' >Het einduur mag niet later zijn dan het beginuur .</div >";
                    }
                    if (date('d/m/Y', $zwemfeestMomentData->datum) < date('d/m/Y')) {
                        $fouteDatum = "<div class='alert alert-danger' role = 'alert' >De datum mag niet eerder zijn dan vandaag. Kies een datum later dan vandaag.</div >";
                    }
                    $this->session->set_flashdata('foutUur', $foutUur);
                    $this->session->set_flashdata('fouteDatum', $fouteDatum);
                    redirect('Zwemfeestjes/zwemfeestjeBoeken');
                } else {
                    redirect('Zwemfeestjes/bevestigAanvraag');
                }

            } else {
                $error = "<div class='alert alert-danger' role = 'alert' >" . validation_errors() . "</div>";
                $this->session->set_flashdata('error', $error);
                redirect('Zwemfeestjes/zwemfeestjeBoeken');
            }
        }

        /**
         * functie bevestigAanvraag
         * @brief haalt alle info van de boeking op en toont een bevestigingspagina
         * @pre er bestaat een Zwemfeestjes klasse
         * @post toont de bevestigingspagina
         */
        public function bevestigAanvraag()
        {
            $data['titel'] = 'Zwemfeestje boeken';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $zwemfeestData = $this->session->flashdata('zwemfeestData');
            $zwemfeestMomentData = $this->session->flashdata('zwemfeestMomentData');
            $gerecht = $this->gerecht_model->getById($zwemfeestData->gerechtId);
            $this->session->set_flashdata('zwemfeestData', $zwemfeestData);
            $this->session->set_flashdata('zwemfeestMomentData', $zwemfeestMomentData);

            $data['zwemfeest'] = $zwemfeestData;
            $data['zwemfeestMoment'] = $zwemfeestMomentData;
            $data['gerecht'] = $gerecht;
            $data['kostprijs'] = $gerecht->prijs * $zwemfeestData->aantalKinderen;

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemfeestje_boeken/bevestiging',
                'footer' => 'main_footer');

            $this->template->load('card_master', $partials, $data);
        }

        /**
         * functie zwemfeestjeAangevraagd
         * @brief maakt een bevestigingsmail van de boeking
         * @pre er bestaat een Zwemfeestjes klasse
         * @post stuurt de bevestigingsmail door naar emailBevestigingAanvraag
         */
        public function zwemfeestjeAangevraagd()
        {
            $zwemfeestData = $this->session->flashdata('zwemfeestData');
            $zwemfeestMomentData = $this->session->flashdata('zwemfeestMomentData');
            $zwemfeestId = $this->zwemfeest_model->add($zwemfeestData);
            $this->zwemfeestMoment_model->add($zwemfeestMomentData, $zwemfeestId);
            redirect('zwemfeestjes/emailBevestigingAanvraag/' . $zwemfeestId);
        }

        /**
         * functie emailBevestigingAanvraag
         * @brief toont een bevestigingsmail van de boeking
         * @pre er bestaat een Zwemfeestjes klasse
         * @post toont de bevestigingsmail
         * @param $zwemfeestId
         */
        public function emailBevestigingAanvraag($zwemfeestId)
        {
            $zwemfeest = $this->zwemfeest_model->getByIdWithGerecht($zwemfeestId);
            $zwemfeestMoment = $this->zwemfeestMoment_model->getByZwemfeestId($zwemfeestId);

            $data['titel'] = 'Inbox';
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $data['zwemfeest'] = $zwemfeest;
            $data['zwemfeestMoment'] = $zwemfeestMoment;
            $data['kostprijs'] = $zwemfeest->gerecht->prijs * $zwemfeest->aantalKinderen;

            $partials = array('hoofding' => 'email_header',
                'inhoud' => 'zwemfeestje_boeken/email_bevestiging',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

        /**
         * functie toonMaaltijden
         * @brief toont een overzicht van de maaltijden
         * @pre er bestaat een Zwemfeestjes klasse
         * @post toont de pagina instellingen zwemfeestjes
         */
        public function toonMaaltijden()
        {
            $data['maaltijden'] = $this->gerecht_model->getAllById();

            $data['titel'] = 'Instellingen zwemfeestjes';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'instellingen_beheren/instellingen_zwemfeestjes',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

        /**
         * functie haalAjaxOp_Maaltijd
         * @brief toont een bepaalde Maaltijd
         * @pre er bestaat een Zwemfeestjes klasse
         * @post toont de maaltijd op de pagina
         */
        public function haalAjaxOp_Maaltijd()
        {
            $id = $this->input->get('id');

            $data["maaltijd"] = $this->gerecht_model->getById($id);

            $this->load->view("instellingen_beheren / ajax_maaltijd", $data);
        }

        /**
         * functie maaltijdVerwijderen
         * @brief verwijdert een bepaalde Maaltijd
         * @pre er bestaat een Zwemfeestjes klasse
         * @post verwijdert het gerecht
         * @param $id
         */
        public function maaltijdVerwijderen($id)
        {
            $this->gerecht_model->delete($id);

            redirect('Zwemfeestjes/toonMaaltijden');
        }

        /**
         * functie maaltijdToevoegenPagina
         * @brief toont de maaltijd toevoegen pagina
         * @pre er bestaat een Zwemfeestjes klasse
         * @post toont de card_master
         */
        public function maaltijdToevoegenPagina()
        {
            $data['titel'] = 'Maaltijd toevoegen';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'instellingen_beheren/maaltijd_toevoegen_pagina',
                'footer' => 'main_footer');

            $this->template->load('card_master', $partials, $data);
        }

        /**
         * functie maaltijdToevoegen
         * @brief voegt een maaltijd toe
         * @pre er bestaat een Zwemfeestjes klasse
         * @post toont de maaltijden
         */
        public function maaltijdToevoegen()
        {
            $maaltijd = new stdClass();
            $maaltijd->naam = $this->input->post("naam");
            $maaltijd->prijs = $this->input->post("prijs");

            $this->gerecht_model->addGerecht($maaltijd);
            redirect('Zwemfeestjes/toonMaaltijden');
        }
    }