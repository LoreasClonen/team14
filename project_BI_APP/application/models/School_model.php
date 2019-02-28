<?php
    /**
     * @Class School_model
     */

    class School_model extends CI_Model
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
         * @brief geeft alle scholen terug in de school tabel
         * @pre Er bestaat een School_model klasse
         * @post Er is een array met 0 of meerdere scholen teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('schoolnaam', 'asc');
            $query = $this->db->get('school');
            return $query->result();
        }

        /**
         * functie GetByName(schoolnaam)
         * @brief geeft alle scholen terug met een bepaalde naam
         * @pre Er bestaat een School_model klasse
         * @post Er is een array met 0 of meerdere scholen teruggegeven
         * @param $schoolnaam
         * @return array
         */
        function getByName($schoolnaam)
        {
            $this->db->where('schoolnaam',$schoolnaam);
            $query = $this->db->get('school');
            return $query->result();
        }
    }