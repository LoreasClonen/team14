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

    /**
     * @brief geeft 1 specifiek nieuwsbericht terug in de nieuwsbericht tabel
     * @pre Er bestaat een Nieuwsbericht model klasse en een nieuwsbericht met overeenkomstige id
     * @post Er is een array met 1 nieuwsbericht teruggegeven
     * @return array
     */
    function getById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('nieuwsbericht');
        return $query->row();
    }

    /**
     * functie delete(id)
     * @brief verwijdert een bepaald nieuwsbericht
     * @pre Er bestaat een Nieuwsbericht_model klasse
     * @post Er is een nieuwsbericht uit de database verwijdert
     * @param $id
     */
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('nieuwsbericht');
    }
}