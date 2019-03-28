<?php
    /**
     * @Class Beschikbaarheid_Model
     */

    class Beschikbaarheid_model extends CI_Model
    {

        /**
         * functie constructor Beschikbaarheid_model()
         * @brief constructor voor de klasse Beschikbaarheid_model
         * @post Er is een Beschikbaarheid_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
            $this->load->model('/Lessen/Klant_model', 'klant_model');
            $this->load->model('/Lessen/Lesgroep_model', 'lesgroep_model');
        }

        /**
         * functie getAllByID()
         * @brief geeft alle beschikbaarheden terug in de beschikbaarheid tabel
         * @pre Er bestaat een Beschikbaarheid_model klasse
         * @post Er is een array met 0 of meerdere beschikbaarheden teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('klantId', 'asc');
            $query = $this->db->get('beschikbaarheid');
            return $query->result();
        }

        /**
         * functie getByKlantId($id)
         * @brief geeft alle beschikbaarheden waarvoor klantId gelijk is aan $id
         * @pre Er bestaat een Beschikbaarheid model klasse en een beschikbaarheid met overeenkomstige klantId
         * @post Er is een array met 1 of meerdere beschikbaarheden teruggegeven
         * @return array
         */
        function getByKlantId($klantId)
        {
            $this->db->where('klantId', $klantId);
            $query = $this->db->get('beschikbaarheid');
            return $query->result();
        }

        /**
         * functie getByLesgroepIdWithKlant($id)
         * @brief geeft alle beschikbaarheden waarvoor lesgroepId = $id met bijhorende klant terug in de lesgroep tabel
         * @pre Er bestaat een Beschikbaarheid model klasse, een Klant model klasse, een beschikbaarheid met overeenkomstige lesgroepId en een klant met overeenkomstige id
         * @post Er is een array met 1 of meerdere beschikbaarheden teruggegeven
         * @return array
         */
        function getByLesgroepIdWithKlant($id)
        {
            $this->db->where('lesgroepId', $id);
            $query = $this->db->get('beschikbaarheid');
            $beschikbaarheden = $query->result();

            foreach ($beschikbaarheden as $beschikbaarheid) {
                $beschikbaarheid->klant = $this->klant_model->getById($beschikbaarheid->klantId);
            }
            return $beschikbaarheden;
        }


    }

