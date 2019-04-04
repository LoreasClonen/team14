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
            $this->load->model('/School/Factuur_model', 'factuur_model');
            $this->load->model('/School/Klas_model', 'klas_model');
            $this->load->model('/School/School_model', 'school_model');
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

        function addDatum($datumLes)
        {
            $this->db->insert('datumLes', $datumLes);
            $this->db->insert_id();
        }

        function addAantalZwemmers($aantalZwemmers)
        {
            $this->db->insert('leerlingenAantal', $aantalZwemmers);
            $this->db->insert_id();
        }
    }