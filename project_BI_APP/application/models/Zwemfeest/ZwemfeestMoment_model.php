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
    }

    /**
     * functie getAllByID()
     * @brief geeft alle zwemfeestmomenten terug in de zwemfeestmoment tabel
     * @pre Er bestaat een ZwemfeestMoment_model klasse
     * @post Er is een array met 0 of meerdere zwemfeestmomenten teruggegeven
     * @return array
     */
    function getAllByDatum()
    {
        $this->db->order_by('datum', 'asc');
        $query = $this->db->get('zwemfeestMoment');
        return $query->result();
    }


}

