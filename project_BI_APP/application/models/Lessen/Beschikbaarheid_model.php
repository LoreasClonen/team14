<?php
/**
 * @Class Beschikbaarheid_Model
 */

class Beschikbaarheid_model extends CI_Model
{
    /**
     * functie constructor Beschikbaarheid_model()
     * @brief constructor voor de klasse Beschikbaarheid_model
     * @post Er is een Beschikbaarheid_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * functie getAllByID()
     * @brief geeft alle beschikbaarheden terug in de beschikbaarheid tabel
     * @pre Er bestaat een Beschikbaarheid_model klasse
     * @post Er is een array met 0 of meerdere beschikbaarheden teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('klantId', 'asc');
        $query = $this->db->get('beschikbaarheid');
        return $query->result();
    }
}