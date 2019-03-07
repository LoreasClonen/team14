<?php
/**
 * @Class Klant_Model
 */

class Klant_model extends CI_Model
{
    /**
     * functie constructor Klant_model()
     * @brief constructor voor de klasse Klant_model
     * @post Er is een Klant_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * functie getAllByID()
     * @brief geeft alle klanten terug in de klant tabel
     * @pre Er bestaat een Klant_model klasse
     * @post Er is een array met 0 of meerdere klanten teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('klant');
        return $query->result();
    }
}