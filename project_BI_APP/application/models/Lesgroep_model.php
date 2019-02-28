<?php
/**
 * @Class Lesgroep_Model
 */

class Lesgroep_model extends CI_Model
{
    /**
     * functie constructor Lesgroep_model()
     * @brief constructor voor de klasse Lesgroep_model
     * @post Er is een Lesgroep_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * functie getAllByID()
     * @brief geeft alle lesgroepen terug in de lesgroep tabel
     * @pre Er bestaat een Lesgroep_model klasse
     * @post Er is een array met 0 of meerdere lesgroepen teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('Lesgroep');
        return $query->result();
    }
}