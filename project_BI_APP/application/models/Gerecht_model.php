<?php
/**
 * Created by PhpStorm.
 * User: Loreas
 * Date: 21/02/2019
 * Time: 14:42
 */

class Gerecht_model extends CI_Model
{
    /**
     * @fn functie constructor Gerecht_model()
     * @brief constructor voor de klasse Gerecht_model
     * @post Er is een Gerecht_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @fn functie getAllByID()
     * @brief geeft alle gerechten terug in de gerecht tabel
     * @pre Er bestaat een Gerecht_model klasse
     * @post Er is een array met 0 of meerdere gerechten teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('Gerecht');
        return $query->result();
    }

    /**
     * @fn functie GetByName(naam)
     * @brief geeft alle gerechten terug met een bepaalde naam
     * @pre Er bestaat een Gerecht_model klasse
     * @post Er is een array met 0 of meerdere gerechten teruggegeven
     * @param $naam
     * @return array
     */
    function getByName($naam)
    {
        $query = $this->db->where('name',$naam);
        return $query->result();
    }
}

