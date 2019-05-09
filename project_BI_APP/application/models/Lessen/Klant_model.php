<?php
    /**
     *
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
         * functie getAllByAchternaamWithLesgroepWithZwemniveaWhereActief()
         * @brief geeft alle klanten terug in de klant tabel samen met hun zwemniveau en de lesgroep waarin ze zitten
         * @pre Er bestaat een Klant_model klasse
         * @post Er is een array met 0 of meerdere klanten teruggegeven
         * @return array
         */
        function getAllByAchternaamWithLesgroepWithZwemniveauWhereActief()
        {
            $this->db->where('actief', 1);
            $this->db->order_by('achternaam', 'asc');
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

        /**
         * @brief controleert of een klant al bestaat of nog niet en of deze actief is
         * @pre Er bestaat een Klant model klasse
         * @post geeft true terug als de klant al bestaat
         * @param $email
         * @param $voornaam
         * @param $achternaam
         * @param $actief (optioneel)
         * @return Boolean
         */
        private function klantbestaatAl($email, $voornaam, $achternaam, $actief = 0)
        {
            $this->db->where('email', $email);
            $this->db->where('voornaam', $voornaam);
            $this->db->where('achternaam', $achternaam);
            if ($actief != 0) {
                $this->db->where('actief', 1);
            }
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
            if (!($this->klantbestaatAl($klant->email, $klant->voornaam, $klant->achternaam))) {
                $this->db->insert('klant', $klant);
                $this->db->insert_id();
                return true;
            } else {
                return false;
            }
        }


        /**
         * @brief werkt een bepaalde klant bij
         * @pre Er bestaat een Klant_model klasse
         * @post Er is een klant uit de database bijgewerkt
         * @param $klant
         */
        function updateKlant($klant, $klantId = -1)
        {
            if($klantId != -1){
                $klant->id = $klantId;
            }
            if ($this->klantbestaatAl($klant->email, $klant->voornaam, $klant->achternaam, 1)) {
                $this->db->where('id', $klant->id);
                $this->db->update('klant', $klant);

            }
        }

        /**
         * @brief werkt een bepaalde klant zijn status bij
         * @pre Er bestaat een Klant_model klasse
         * @post Er is een klant uit de database bijgewerkt
         * @param $id
         * @param $actief
         */
        function updateStatus($id, $actief)
        {
            $this->db->where('id', $id);
            $this->db->set('actief', $actief);
            $this->db->update('klant');
        }

        /**
         * @brief geeft 1 specifieke klant terug in de klant tabel
         * @pre Er bestaat een Klant model klasse en een klant met overeenkomstige voornaam, achternaam en email
         * @post Er is een array met 1 klant teruggegeven
         * @param $voornaam
         * @param $achternaam
         * @param $email
         * @return array
         */
        function getKlantId($voornaam, $achternaam, $email)
        {
            $this->db->where('email', $email);
            $this->db->where('voornaam', $voornaam);
            $this->db->where('achternaam', $achternaam);
            $query = $this->db->get('klant');
            return $query->row();
        }

        /**
         * functie deleteKlant(id)
         * @brief verwijdert een bepaalde klant en bijhorende beschikbaarheid
         * @pre Er bestaat een klant_model klasse
         * @post Er is een klant en een beschikbaarheid uit de database verwijderd
         * @param $id
         */
        function deleteKlant($id)
        {
            $this->db->where('klantId', $id);
            $this->db->delete('beschikbaarheid');
            $this->db->where('id', $id);
            $this->db->delete('klant');
        }
    }

