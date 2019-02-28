<?php
/**
 * @Class Status_Model
 */

class Status_model extends CI_Model
{
    /**
     * functie constructor Status_model()
     * @brief constructor voor de klasse Status_model
     * @post Er is een Status_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * functie getAllByID()
     * @brief geeft alle statussen terug in de status tabel
     * @pre Er bestaat een Status_model klasse
     * @post Er is een array met 0 of meerdere statussen teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('Status');
        return $query->result();
    }
}