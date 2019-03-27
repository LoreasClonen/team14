<?php
    /**
     * @Class Zwemniveau_Model
     * @property Klant_model $klant_model
     */

    class Zwemniveau_model extends CI_Model
    {
        /**
         * functie constructor Zwemniveau_model()
         * @brief constructor voor de klasse Zwemniveau_model
         * @post Er is een Zwemniveau_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
        }

        /**
         * functie getAllByID()
         * @brief geeft alle zwemniveaus terug in de zwemniveau tabel
         * @pre Er bestaat een Zwemniveau_model klasse
         * @post Er is een array met 0 of meerdere zwemniveaus teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('zwemniveau');
            return $query->result();
        }

        /**
         * functie getById($id)
         * @brief geeft een zwemniveau terug aan de hand van een Id
         * @pre Er bestaat een Zwemniveau model klasse en een zwemniveau met overeenkomstige id
         * @post Er is een array van 1 zwemniveau teruggegeven
         * @return array
         */
        function getById($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('zwemniveau');
            return $query->row();
        }

        function getByName($name){
            $this->db->where('niveauNaam', $name);
            $query = $this->db->get('zwemniveau');
            return $query->row();
        }

    }