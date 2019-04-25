<?php
    /**
     * @Class Beschikbaarheid_Model
     * @property Klant_model $klant_model
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

        function getByStatusIdLesgroepIdWithKlant($statusId, $lesgroepId) {
            $this->db->where('lesgroepId', $lesgroepId);
            $this->db->where('statusId', $statusId);
            $query = $this->db->get('beschikbaarheid');
            $personen = $query->result();

            foreach ($personen as $persoon) {
                $persoon->klant = $this->klant_model->getById($persoon->klantId);
            }
            return $personen;
        }

        /**
         * functie getAllByLesgroepID($lesgroepId)
         * @brief geeft alle actiev klanten van een bepaalde lesgroep terug in de klant tabel
         * @pre Er bestaat een Klant model klasse
         * @post Er is een array met 0 of meer zwemmers teruggegeven
         * @param $lesgroepId
         * @return array
         */
        function getAllByLesgroepIdWhereActief($lesgroepId)
        {
            $this->db->where('lesgroepId', $lesgroepId);
            $this->db->where('statusId', 2);
            $query = $this->db->get('beschikbaarheid');
            return $query->result();
        }

        function delete($klantId)
        {
            $this->db->where('klantId', $klantId);
            $this->db->delete('beschikbaarheid');
        }

        function updateStatusId($zwemgroepId, $klantId, $statusId) {
            $this->db->where('lesgroepId', $zwemgroepId);
            $this->db->where('klantId', $klantId);

            $this->db->set('statusId', $statusId);
            $this->db->update('beschikbaarheid');
        }

        function nieuweKlantToevoegen($klantId, $gekozengroepIds){
            $data['statusId'] = 1;
            $data['klantId'] = $klantId;
            foreach($gekozengroepIds as $groepId){
                $data['lesgroepId'] = $groepId;
                $this->db->insert('beschikbaarheid', $data);
            }

            return true;
        }
    }

