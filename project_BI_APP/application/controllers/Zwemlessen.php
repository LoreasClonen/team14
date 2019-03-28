<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Template $template
 * @property Authex $authex
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
    }
    public function keuze(){
        $data["titel"]= "Zwemlessen";
        $data["teamleden"]= "";
        $partials = array('hoofding' => 'zwemlessen/aanmelden_zwemlessen_header',
            'inhoud' => 'zwemlessen/keuze_inschrijvingen',
            'footer' => 'zwemlessen/aanmelden_zwemlessen_footer');
        $this->template->load('main_master', $partials, $data);
    }
    public function Index($form){
        $data["titel"] = "Zwemlessen";
        $data["teamleden"]= "";
        $data["zwemniveaus"] = $this->zwemniveau_model->getAllById();
        $partials = array('hoofding' => 'zwemlessen/aanmelden_zwemlessen_header',
            'inhoud' => 'zwemlessen/' . $form,
            'footer' => 'zwemlessen/aanmelden_zwemlessen_footer'
            );
        $this->template->load('main_master', $partials, $data);
    }
    public function addKlant(){
        $this->load->model("lessen/klant_model", "klant_model");
        $this->load->model("lessen/Zwemniveau_model", "zwemniveau_model");


        $klant = new stdClass();
        $klant->voornaam = $this->input->post("voornaam");
        $klant->achternaam = $this->input->post("achternaam");
        $klant->email = $this->input->post("email");
        $klant->geboortedatum = $this->input->post("geboortedatum");
        $klant->zwemniveauId = $this->input->post("zwemniveau");
        $klant->actief = '1';
        if($this->klant_model->addKlant($klant)){
            redirect('zwemlessen/succesmail');
        }
        else{
            redirect('zwemlessen/reeds_toegevoegd');
        }
    }

    public function succesmail(){
        $data["titel"]= "succesmail";
        $data["teamleden"]= "";
        $partials = array(
            'inhoud' => 'zwemlessen/succesmail',
            'footer' => 'zwemlessen/aanmelden_zwemlessen_footer');
        $this->template->load('main_master', $partials, $data);
    }

    public function reeds_toegevoegd(){
        $data["titel"]= "Zwemlessen";
        $data["teamleden"]= "";
        $partials = array('hoofding' => 'zwemlessen/aanmelden_zwemlessen_header',
            'inhoud' => 'zwemlessen/reeds_toegevoegd',
            'footer' => 'zwemlessen/aanmelden_zwemlessen_footer');
        $this->template->load('main_master', $partials, $data);
    }

}
