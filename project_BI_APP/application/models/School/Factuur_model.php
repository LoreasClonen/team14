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
            $this->load->model('/School/School_model', 'school_model');
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
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('factuur');
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
            $this->db->where('naam', $naam);
            $query = $this->db->get('factuur');
            return $query->result();
        }

        /**
         * @brief geeft 1 specifieke factuur terug in de factuur tabel
         * @pre Er bestaat een Factuur model klasse en een factuur met overeenkomstige id
         * @post Er is een array met 1 factuur teruggegeven
         * @return array
         */
        function get($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('factuur');
            return $query->row();
        }

        /**
         * @brief geeft 1 specifieke lesgroep met bijhorende inlogger terug in de lesgroep tabel
         * @pre Er bestaat een Lesgroep model klasse, een Inlogger model klasse, een lesgroep met overeenkomstige id en een inlogger met overeenkomstige id
         * @post Er is een array met 1 lesgroep teruggegeven
         * @return array
         */
        function getSchoolIdWithSchool($schoolId)
        {

            $this->db->where('schoolId', $schoolId);
            $query = $this->db->get('factuur');
            $school = $query->row();

            $school->school = $this->school_model->get($school->inloggerId);

            return $school;
        }


    }