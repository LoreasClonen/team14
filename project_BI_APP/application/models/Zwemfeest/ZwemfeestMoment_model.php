<?php

/**
 * @Class Gerecht_model
 */

class ZwemfeestMoment_model extends CI_Model
{
    /**
     * functie constructor ZwemfeestMoment_model()
     * @brief constructor voor de klasse ZwemfeestMoment_model
     * @post Er is een ZwemfeestMoment_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('/Zwemfeest/Zwemfeest_model', 'zwemfeest_model');
        $this->load->model('/Zwemfeest/Gerecht_model', 'gerecht_model');

    }

    /**
     * functie getAllByID()
     * @brief geeft alle zwemfeestmomenten terug in de zwemfeestmoment tabel
     * @pre Er bestaat een ZwemfeestMoment_model klasse
     * @post Er is een array met 0 of meerdere zwemfeestmomenten teruggegeven
     * @return array
     */
    function getAllByDatumWithZwemfeest()
    {
        $this->db->order_by('datum', 'asc');
        $query = $this->db->get('zwemfeestMoment');
        $zwemfeestMomenten = $query->result();

        $this->load->model('zwemfeest_model');

        foreach ($zwemfeestMomenten as $zwemfeestMoment) {
            $zwemfeestMoment->zwemfeest = $this->zwemfeest_model->getById($zwemfeestMoment->zwemfeestId);
        }
        return $zwemfeestMomenten;
    }

    function getByIdWithEverything($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('zwemfeestMoment');
        $zwemfeestMoment = $query->row();

        $this->load->model('zwemfeest_model');
        $zwemfeestMoment->zwemfeest = $this->zwemfeest_model->getById($zwemfeestMoment->zwemfeestId);

        $this->load->model('gerecht_model');
        $zwemfeestMoment->gerecht = $this->gerecht_model->getById($zwemfeestMoment->zwemfeestId);

        return $zwemfeestMoment;
    }


}

