<?php
    /**
     * Created by PhpStorm.
     * User: shari
     * Date: 28/02/2019
     * Time: 8:58
     */

    class Les_model extends CI_Model
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
         * @brief geeft alle lessen terug in de les tabel
         * @pre Er bestaat een Les_model klasse
         * @post Er is een array met 0 of meerdere lessen teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('les');
            return $query->result();
        }

        /**
         * functie addLes()
         * @brief zet een nieuwe les in de database
         * @pre Er bestaat een table Les in de database
         * @param $lesData
         * @return mixed
         */

        function addLes($lesData)
        {
            $this->db->insert('les', $lesData);
            return $this->db->insert_id();
        }

        function getAllWhereFactuurIdIsNullPerKlas($klasId)
        {
            $this->db->where('klasId', $klasId);
            $this->db->where('factuurId', null);
            $this->db->order_by('datumLes', 'asc');
            $query = $this->db->get('les');
            return $query->result();
        }

        function getLes($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('les');
            return $query->row();
        }

    }