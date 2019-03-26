<?php


class Zwemfeest_model extends CI_Model
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

     * @brief getAllByID() geeft alle gerechten terug in de gerecht tabel
     * @pre Er bestaat een Gerecht_model klasse
     * @post Er is een array met 0 of meerdere gerechten teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('zwemfeest');
        return $query->result();
    }

    /**
     * functie GetByVoornaam(voornaam)
     * @brief geeft alle zwemfeesten terug met een bepaalde voornaam
     * @pre Er bestaat een Gerecht_model klasse
     * @post Er is een array met 0 of meerdere gerechten teruggegeven
     * @param $voornaam
     * @return array
     */
    function GetByVoornaam($voornaam)
    {
        $query = $this->db->where('name',$voornaam);
        return $query->result();
    }

    /**
     * functie GetByAchternaam(achternaam)
     * @brief geeft alle zwemfeesten terug met een bepaalde achternaam
     * @pre Er bestaat een Gerecht_model klasse
     * @post Er is een array met 0 of meerdere gerechten teruggegeven
     * @param $achternaam
     * @return array
     */
    function getByAchternaam($achternaam)
    {
        $query = $this->db->where('achternaam',$achternaam);
        return $query->result();
    }
    /**
     * functie GetByEmail(email)
     * @brief geeft alle zwemfeesten terug met een bepaalde achternaam
     * @pre Er bestaat een Gerecht_model klasse
     * @post Er is een array met 0 of meerdere gerechten teruggegeven
     * @param $achternaam
     * @return array
     */
    function GetByEmail($email)
    {
        $query = $this->db->where('email',$email);
        return $query->result();
    }

}

