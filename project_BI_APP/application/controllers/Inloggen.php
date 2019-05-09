<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * @property Template $template
     * @property Authex $authex
     */
    class inloggen extends CI_Controller
    {
        // +----------------------------------------------------------
        // | project app-bi
        // +----------------------------------------------------------
        // | 2 ITF - 2018-2019
        // +----------------------------------------------------------
        // | Inloggen controller
        // +----------------------------------------------------------
        // | Team 14
        // +----------------------------------------------------------

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Lessen/Inlogger_model', 'Inlogger_model');
            $this->load->helper('form');
            $this->load->library('session');
        }

        /**
         * @brief Laad de hoofdpagina na het aanmelden
         *
         * @post de hoofdpagina wordt geladen
         */
        public function meldAan()
        {
            $data['titel'] = 'Inloggen';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();

            $data['teamleden'] = 'Loreas Clonen (O), Mats Mertens (T), Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe';


            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'inloggen/inloggen_form',
                'footer' => 'main_footer');


            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief Controleert het aanmelden voordat er effectief wordt doorverwezen naar de hoofdpagina
         * @post de user wordt ofwel ingelogd ofwel wordt er een foutpagina geladen.
         */

        public function controleerAanmelden()
        {
            $email = $this->input->post('email');
            $wachtwoord = $this->input->post('wachtwoord');

            if ($this->authex->meldAan($email, $wachtwoord)) {
                redirect('Home/index');
            } else {
                redirect('Inloggen/toonFout');
            }
        }

        /**
         * @brief Toont een foutpagina
         *
         * @post de pagina met een foutmelding wordt geladen
         */
        public function toonFout()
        {
            $data['titel'] = 'Fout';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (O), Mats Mertens (T), Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe';


            $partials = array('hoofding' => 'main_header',
                'inhoud' => '/inloggen/inloggen_fout',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief De huidige aangemelde persoon wordt afgemeld
         *
         * @post de hoofdpagina wordt geladen en de gebruiker is afgemeld
         */
        public function meldAf()
        {
            $this->authex->meldAf();
            redirect('Home/index');
        }

        /**
         * @brief Er wordt de 'wachtwoord_vergeten' pagina geladen
         *
         * @post de wachtwoord_vergetn pagina wordt geladen
         */
        public function wachtwoordVergeten()
        {
            $data['titel'] = 'Uw wachtwoord herstellen';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';


            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'inloggen/wachtwoord_vergeten',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief Er wordt een E-mail weergeven die een link geeft naar de plaats om een nieuw wachtwoord in te stellen.
         * @post De email_wachtwoord_vergeten pagina wordt geladen.
         */
        public function mailWachtwoordVergeten()
        {
            $data['titel'] = 'Inbox';
            $data['teamleden'] = 'Loreas Clonen (T), Mats Mertens, Shari Nuyts, Sebastiaan Reggers, Steven Van Gansberghe (O)';

            $email = $this->input->post('email');
            $data['gebruiker'] = $this->Inlogger_model->getByEmail($email);

            $partials = array('hoofding' => 'email_header',
                'inhoud' => 'inloggen/email_wachtwoord_vergeten',
                'footer' => 'main_footer');

            if ($this->Inlogger_model->emailBestaat($email)) {
                $this->template->load('main_master', $partials, $data);
            } else {
                redirect('Inloggen/toonFout');
            }
        }

        /**
         * @brief Deze functie bekijkt of een inlogger al bestaat via zijn emailadres
         * @param $email
         * @post Er wordt een true of false waarde teruggegeven
         */
        function inloggerBestaat($email)
        {
            $this->Inlogger_model->emailBestaat($email);
        }

        /**
         * @brief de functie nieuwPaswoord zorgt ervoor dat de gebruiker een nieuw wachtwoord kan instellen
         * @param $id
         * @post toont het nieuw_wachtwoord formulier
         */

        public function nieuwPaswoord($id)
        {
            $data['titel'] = 'Nieuw wachtwoord ingeven';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['teamleden'] = 'Loreas Clonen, Mats Mertens, Shari Nuyts (O), Sebastiaan Reggers, Steven Van Gansberghe (T)';
            $data['melding'] = $this->session->flashdata('melding');
            $this->session->set_flashdata('id', $id);

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'nieuw_wachtwoord_form',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }

        /**
         * @brief de functie nieuwWachtwoordControleren gaat nakijken of de beide invulvelden exact dezelfde data bevatten
         * @post geeft een succesmelding als het wachtwoord aanpassen gelukt is en een foutmelding als de invulvelden niet overeen komen
         */

        public function nieuwWachtwoordControleren()
        {
            $poging1 = $this->input->post('poging1');
            $poging2 = $this->input->post('poging2');
            $id = $this->session->flashdata('id');
            $this->session->set_flashdata('id', $id);

            if ($poging1 == $poging2) {
                $wachtwoord = password_hash($poging1, PASSWORD_DEFAULT);

                $gebruikerData = array('wachtwoord' => $wachtwoord);
                $this->Inlogger_model->update($id, $gebruikerData);

                $gelukt = "<div class='alert alert-success' role='alert'>Uw wachtwoord is opnieuw ingesteld!</div>";
                $this->session->set_flashdata('melding', $gelukt);
                redirect('inloggen/nieuwPaswoord/' . $id);
            } else {
                $fout = "<div class='alert alert-danger' role='alert'>Uw wachtwoorden komen niet overeen. Probeer het opnieuw.</div>";
                $this->session->set_flashdata('melding', $fout);
                redirect('inloggen/nieuwPaswoord/' . $id);
            }
        }
    }
