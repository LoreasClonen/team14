<?php
    /**
     * @Class Klant_Model
     * @property Zwemniveau_model $zwemniveau_model
     */

    class Klant_model extends CI_Model
    {
        /**
         * functie constructor Klant_model()
         * @brief constructor voor de klasse Klant_model
         * @post Er is een Klant_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
        }

        /**
         * functie getAllByID()
         * @brief geeft alle klanten terug in de klant tabel
         * @pre Er bestaat een Klant_model klasse
         * @post Er is een array met 0 of meerdere klanten teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('klant');
            return $query->result();
        }

        /**
         * functie getById($id)
         * @brief geeft 1 specifieke klant terug in de klant tabel
         * @pre Er bestaat een Klant model klasse en een klant met overeenkomstige id
         * @post Er is een array met 1 klant teruggegeven
         * @return array
         */
        function getById($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('klant');
            return $query->row();
        }

        /**
         * functie getAllByAchternaamWithLesgroepWithZwemniveau()
         * @brief geeft alle klanten terug in de klant tabel
         * @pre Er bestaat een Klant_model klasse
         * @post Er is een array met 0 of meerdere klanten teruggegeven
         * @return array
         */
        function getAllByAchternaamWithLesgroepWithZwemniveau()
        {
            $this->db->order_by('achternaam', 'asc');
            $query = $this->db->get('klant');
            $klanten = $query->result();

            $this->load->model('zwemniveau_model');

            foreach ($klanten as $klant) {
                $klant->zwemniveauId =
                    $this->zwemniveau_model->get($klant->zwemniveauId);
            }

            return $query->result();
        }
    }