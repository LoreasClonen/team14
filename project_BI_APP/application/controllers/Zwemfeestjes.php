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
        }

        public function getZwemfeestMomenten()
        {
            $data['zwemfeestMomenten'] = $this->zwemfeestMoment_model->getAllByDatumWithZwemfeest();

            $data['titel'] = 'Overzicht zwemfeestjes';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts (T), Sebastiaan Reggers, Steven Van Gansberghe';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'overzicht_zwemfeestjes/overzicht_zwemfeestjes',
                'footer' => 'main_footer');

            $this->template->load('overzicht_zwemfeestjes/zwemfeestjes_master', $partials, $data);
        }

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

            $this->template->load('overzicht_zwemfeestjes/zwemfeestjes_master', $partials, $data);
        }

        public function getZwemfeestjeVoorAnnuleren($zwemfeestId)
        {
            $data['zwemfeestje'] = $this->zwemfeestMoment_model->getByIdWithEverything($zwemfeestId);

            $data['titel'] = 'Overzicht zwemfeestje';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'overzicht_zwemfeestjes/zwemfeestje_annuleren',
                'footer' => 'main_footer');

            $this->template->load('overzicht_zwemfeestjes/zwemfeestjes_master', $partials, $data);
        }

        public function deleteZwemfeestje($zwemfeestMomentId, $zwemfeestId)
        {
            $this->zwemfeestMoment_model->delete($zwemfeestMomentId);
            $this->zwemfeest_model->delete($zwemfeestId);

            redirect('Zwemfeestjes/getZwemfeestjeVoorAnnuleren' . $zwemfeestId);
        }

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

        public function zwemfeestjeBoeken()
        {
            $data['gerechten'] = $this->gerecht_model->getAllById();

            $data['titel'] = 'Zwemfeestje boeken';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T - O), Mats Mertens, Shari Nuyts, Sebastiaan Reggers (T), Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemfeestje_boeken/zwemfeestje_toevoegen',
                'footer' => 'main_footer');

            $this->template->load('zwemfeestje_boeken/zwemfeestje_boeken_master', $partials, $data);
        }

        public function addZwemfeestje()
        {
            $zwemfeestData = new stdClass();

            $zwemfeestData->voornaam = $this->input->post('voornaam');
            $zwemfeestData->achternaam = $this->input->post('achternaam');
            $zwemfeestData->email = $this->input->post('email');
            $zwemfeestData->telefoonnr = $this->input->post('telefoonnr');
            $zwemfeestData->aantalKinderen = $this->input->post('aantalKinderen');
            $zwemfeestData->gerechtId = $this->input->post('gerecht');
            $zwemfeestData->opmerkingen = $this->input->post('opmerkingen');
            $zwemfeestData->isBevestigd = 0;

            $id = $this->zwemfeest_model->add($zwemfeestData);

            redirect('Zwemfeestjes/bevestigingAanvraag/' . $id);
        }

        public function bevestigingAanvraag($zwemfeestId)
        {
            $data['titel'] = 'Zwemfeestje boeken';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';
            $data['zwemfeestId'] = $zwemfeestId;

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'zwemfeestje_boeken/bevestiging',
                'footer' => 'main_footer');

            $this->template->load('zwemfeestje_boeken/zwemfeestje_boeken_master', $partials, $data);
        }

        public function emailBevestigingAanvraag($zwemfeestId)
        {
            $data['titel'] = 'Inbox';
            $data['zwemfeest'] = $this->zwemfeest_model->getByIdWithGerecht($zwemfeestId);
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $partials = array('hoofding' => 'email_header',
                'inhoud' => 'zwemfeestje_boeken/email_bevestiging',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }
    }