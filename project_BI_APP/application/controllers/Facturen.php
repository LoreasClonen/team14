<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property CI_Input $input
 * @property Authex $authex
 * @property School_model $school_model
 * @property Les_model $les_model
 * @property Klas_model $klas_model
 * @property Factuur_model factuur_model
 */
class Facturen extends CI_Controller
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
        $this->load->model('School/School_model', 'school_model');
        $this->load->model('School/Factuur_model', 'factuur_model');
        $this->load->model('School/Les_model', 'les_model');
        $this->load->model('School/Klas_model', 'klas_model');
        $this->load->helper('notation');
        $this->load->helper('form');
    }
    /**
     * @brief toont alle scholen met een link naar hun facturen
     * @pre Er bestaat een Factuur klasse
     * @post de pagina wordt geladen
     */
    public function getScholen()
    {
        $data['scholen'] = $this->school_model->getAllBySchoolnaam();

        $data['titel'] = 'Overzicht scholen';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts (T), Sebastiaan Reggers, Steven Van Gansberghe';

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'facturen_beheren/overzicht_scholen',
            'footer' => 'main_footer');

        $this->template->load('facturen_beheren/facturen_master', $partials, $data);
    }
    /**
     * @brief Laad een pagina met een bepaalde school en zijn overzicht
     * @param schoolId
     * @post de pagina met de gekozen school wordt geladen
     */
    public function getSchool($schoolId)
    {
        $data['titel'] = 'Facturen';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (O), Shari Nuyts (T), Sebastiaan Reggers, Steven Van Gansberghe';

        $data['school'] = $this->school_model->getById($schoolId);

        $data['facturen'] = $this->factuur_model->getBySchoolIdWithSchool($schoolId);

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'facturen_beheren/overzicht_facturen',
            'footer' => 'main_footer');

        $this->template->load('facturen_beheren/facturen_master', $partials, $data);
    }
    /**
     * @brief herlaad de pagina na het updaten van de datum
     * @param schoolId
     * @post de pagina met de gekozen school wordt geladen
     */
    public function updateDatumBetaling($schoolId)
    {
        $data['id'] = $this->input->post('id');
        $data['datumBetaald']= $this->input->post('datum');

        $this->factuur_model->updateDatumBetaald($data);

        redirect('Facturen/getSchool/' . $schoolId);
    }

    /**
     * @brief Verwijdert de datum van de betaling en herlaad de pagina
     * @param schoolId
     * @param id
     * @post de pagina met de gekozen school wordt geladen
     */
    public function deleteDatumBetaling($id, $schoolId)
    {
        $this->factuur_model->deleteDatumBetaald($id);

        redirect('Facturen/getSchool/' . $schoolId);
    }
    /**
     * @brief Laad een pagina met een bepaalde school en zijn facturen die nog niet gegenereerd zijn
     * @param schoolId
     * @post de pagina met de gekozen school wordt geladen
     */
    public function haalOngefactureerdeLessenOp($schoolId)
    {
        $data['titel'] = 'Lessen';
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (T), Shari Nuyts, Sebastiaan Reggers (O), Steven Van Gansberghe';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $data['klassen'] = $this->klas_model->getAllWithLessenWhereFactuurIdIsNull($schoolId);

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'facturen_beheren/overzicht_lessen_ongefactureerd',
            'footer' => 'main_footer');

        $this->template->load('facturen_beheren/facturen_master', $partials, $data);
    }
    /**
     * @brief Laad een pagina met de facturen van een school
     *
     * @post de pagina met de gekozen factuur wordt geladen
     */

    public function toonFactuurOverzicht()
    {
        $data['titel'] = 'Factuur Overzicht';
        $data['teamleden'] = 'Loreas Clonen, Mats Mertens (T), Shari Nuyts, Sebastiaan Reggers (O), Steven Van Gansberghe';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $lesIds = $this->input->post('lessen[]');

        $lessen = array();
        foreach ($lesIds as $lesId)
        {
            array_push($lessen, $this->les_model->getLes($lesId));
        }

        $totaalprijs = 0;
        foreach ($lessen as $les) {
            $totaalprijs += $les->prijsPerKind * $les->leerlingenAantal;
        }

        $data['totaalprijs'] = $totaalprijs;
        $data['lessen'] = $lessen;

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'facturen_beheren/bevestig_factuur',
            'footer' => 'main_footer');

        $this->template->load('facturen_beheren/facturen_master', $partials, $data);
    }
}