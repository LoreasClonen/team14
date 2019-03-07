<?php
    /**
     * @Class Inlogger_Model
     */

    class Inlogger_model extends CI_Model
    {

        /**
         * functie constructor Inlogger_model()
         * @brief constructor voor de klasse Inlogger_model
         * @post Er is een Inlogger_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
        }

        /**
         * functie getAllByID()
         * @brief geeft alle inloggers terug in de inlogger tabel
         * @pre Er bestaat een Inlogger_model klasse
         * @post Er is een array met 0 of meerdere inlogger teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('Inlogger');
            return $query->result();
        }

    }
