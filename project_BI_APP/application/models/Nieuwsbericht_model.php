<?php
/**
 * Created by PhpStorm.
 * User: Mats
 * Date: 21/02/2019
 * Time: 13:54
 */

class Nieuwsbericht_model extends CI_Model
{
    /**
     * functie constructor Nieuwsbericht_model()
     * @brief constructor voor de klasse Nieuwsbericht_model
     * @post Er is een Nieuwsbericht_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * functie getAllById
     * @brief geeft alle nieuwsberichten terug in de nieuwsberichttabel
     * @pre er bestaat een nieuwsbericht_model klasse
     * @post er is een array met 0 of meerdere nieuwsberichten teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('nieuwsbericht');
        return $query->result();
    }

}