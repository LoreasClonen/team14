<?php
    /**
     * Created by PhpStorm.
     * User: shari
     * Date: 28/02/2019
     * Time: 8:54
     */

    class Factuur_model extends CI_Model
    {
        /**
         * functie constructor School_model()
         * @brief constructor voor de klasse School_model
         * @post Er is een School_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
        }

        /**
         * functie getAllByID()
         * @brief geeft alle facturen terug in de factuur tabel
         * @pre Er bestaat een Factuur_model klasse
         * @post Er is een array met 0 of meerdere facturen teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('naam', 'asc');
            $query = $this->db->get('Factuur');
            return $query->result();
        }

        /**
         * functie GetByName(naam)
         * @brief geeft alle facturen terug met een bepaalde naam
         * @pre Er bestaat een Factuur_model klasse
         * @post Er is een array met 0 of meerdere facturen teruggegeven
         * @param $naam
         * @return array
         */
        function getByName($naam)
        {
            $query = $this->db->where('naam',$naam);
            return $query->result();
        }
    }