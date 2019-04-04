<?php
    /**
     * Created by PhpStorm.
     * User: shari
     * Date: 28/02/2019
     * Time: 8:50
     */

    class Klas_model extends CI_Model
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
         * @brief geeft alle klassen terug in de klas tabel
         * @pre Er bestaat een Klas_model klasse
         * @post Er is een array met 0 of meerdere klassen teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('klas');
            return $query->result();
        }

        /**
         * functie GetByName(klasnaam)
         * @brief geeft alle klassen terug met een bepaalde naam
         * @pre Er bestaat een Klas_model klasse
         * @post Er is een array met 0 of meerdere klassen teruggegeven
         * @param $klasnaam
         * @return array
         */
        function getByName($klasnaam)
        {
            $this->db->where('klasnaam', $klasnaam);
            $query = $this->db->get('klas');
            return $query->result();
        }

        function getAllByNameWhereSchoolId($schoolId)
        {
            $this->db->where('schoolId', $schoolId);
            $query = $this->db->get('klas');
            return $query->result();
        }
    }