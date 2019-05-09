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
            $query = $this->db->get('gerecht');
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
            $query = $this->db->where('naam', $naam);
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
            $query = $this->db->where('prijs', $prijs);
            return $query->result();
        }

        /**
         * functie GetById(id)
         * @brief geeft een gerecht terug met een bepaalde id
         * @pre Er bestaat een Gerecht_model klasse
         * @post Er is een array met 1 gerecht teruggegeven
         * @param $id
         * @return array
         */
        function getById($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('gerecht');
            return $query->row();
        }

        /**
         * functie delete(id)
         * @brief verwijdert een bepaalde maaltijd
         * @pre Er bestaat een gerecht_model klasse
         * @post Er is een maaltijd uit de database verwijderd
         * @param $id
         */
        function delete($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('gerecht');
        }


        function addGerecht($gerecht)
        {
            $this->db->insert('gerecht', $gerecht);
            $this->db->insert_id();
        }
    }

