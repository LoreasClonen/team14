<?php

/**
 * @Class Gerecht_model
 */

class Gerecht_model extends CI_Model
{
    /**
     * functie constructor Gerecht_model()
     * @brief constructor voor de klasse Gerecht_model
     * @post Er is een Gerecht_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * functie getAllByID()
     * @brief geeft alle gerechten terug in de gerecht tabel
     * @pre Er bestaat een Gerecht_model klasse
     * @post Er is een array met 0 of meerdere gerechten teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('Gerecht');
        return $query->result();
    }

    /**
     * functie GetByName(naam)
     * @brief geeft alle gerechten terug met een bepaalde naam
     * @pre Er bestaat een Gerecht_model klasse
     * @post Er is een array met 0 of meerdere gerechten teruggegeven
     * @param $naam
     * @return array
     */
    function getByName($naam)
    {
        $query = $this->db->where('naam',$naam);
        return $query->result();
    }

    /**
     * functie GetByPrice(prijs)
     * @brief geeft alle gerechten terug met een bepaalde prijs
     * @pre Er bestaat een Gerecht_model klasse
     * @post Er is een array met 0 of meerdere gerechten teruggegeven
     * @param $prijs
     * @return array
     */
    function getByPrice($prijs)
    {
        $query = $this->db->where('prijs',$prijs);
        return $query->result();
    }
}
