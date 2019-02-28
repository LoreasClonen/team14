<?php
    /**
     * @Class Producttype_model
     */

    class Producttype_model extends CI_Model
    {
        /**
         * functie constructor Producttype_model()
         * @brief constructor voor de klasse Producttype_model
         * @post Er is een Producttype_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
        }

        /**
         * functie getAllByID()
         * @brief geeft alle producttypes terug in de producttype tabel
         * @pre Er bestaat een Producttype_model klasse
         * @post Er is een array met 0 of meerdere producttypes teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('naam', 'asc');
            $query = $this->db->get('Producttype');
            return $query->result();
        }

        /**
         * functie GetByNaam(naam)
         * @brief geeft alle producttypes terug met een bepaalde naam
         * @pre Er bestaat een Producttype_model klasse
         * @post Er is een array met 0 of meerdere producttypes teruggegeven
         * @param $naam
         * @return array
         */
        function getByNaam($naam)
        {
            $this->db->where('naam', $naam);
            $query = $this->db->get('Producttype');
            return $query->result();
        }


    }

