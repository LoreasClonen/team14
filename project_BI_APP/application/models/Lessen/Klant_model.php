<?php
    /**
     * @Class Klant_Model
     * @property Zwemniveau_model $zwemniveau_model
     * @property Beschikbaarheid_model $beschikbaarheid_model
     * @property Lesgroep_model $lesgroep_model
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
            $this->load->model('/Lessen/Zwemniveau_model', 'zwemniveau_model');
            $this->load->model('/Lessen/Beschikbaarheid_model', 'beschikbaarheid_model');
            $this->load->model('/Lessen/Lesgroep_model', 'lesgroep_model');

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
         * @brief geeft alle klanten terug in de klant tabel samen met hun zwemniveau en de lesgroep waarin ze zitten
         * @pre Er bestaat een Klant_model klasse
         * @post Er is een array met 0 of meerdere klanten teruggegeven
         * @return array
         */
        function getAllByAchternaamWithLesgroepWithZwemniveau()
        {
            $this->db->order_by('actief desc, achternaam asc');
            $query = $this->db->get('klant');
            $klanten = $query->result();

            foreach ($klanten as $klant) {
                $klant->heeftLesgroep = false;

                $klant->zwemniveau =
                    $this->zwemniveau_model->getById($klant->zwemniveauId);

                $klant->beschikbaarheden =
                    $this->beschikbaarheid_model->getByKlantId($klant->id);

                foreach ($klant->beschikbaarheden as $beschikbaarheid) {
                    if ($beschikbaarheid->statusId == 2) {
                        $klant->lesgroep = $this->lesgroep_model->get($beschikbaarheid->lesgroepId);
                        $klant->heeftLesgroep = true;
                    }
                }
            }
            return $klanten;
        }

        private function klantbestaatAl($email)
        {
            $this->db->where('email', $email);
            $query = $this->db->get('klant');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        /** addKlant()
         * @brief voegt een nieuwe klant toe aan de database in de klant tabel
         * @pre Er bestaat een Klant model klasse
         * @post Er is een rij toegevoegd in de klant tabel
         * @return true
         */
        function addKlant($klant)
        {
            if (!($this->klantbestaatAl($klant->email))) {
                $this->db->insert('klant', $klant);
                $this->db->insert_id();
                return true;
            } else {
                return false;
            }

        }

        function updateStatus($id, $actief)
        {
            $this->db->where('id', $id);
            $this->db->set('actief', $actief);
            $this->db->update('klant');
        }

    }

