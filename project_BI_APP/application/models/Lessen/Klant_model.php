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

            foreach ($klanten as $klant) {
                $klant->zwemniveau =
                    $this->zwemniveau_model->getById($klant->zwemniveauId);

                $klant->beschikbaarheid =
                    $this->beschikbaarheid_model->getByKlantId($klant->id);

                $klant->lesgroep =
                    $this->lesgroep_model->get($klant->beschikbaarheid->lesgroepId);
            }
            return $klanten;
        }


    function addKlant($klant){
        $this->db->insert('klant',$klant);
        return $this->db->insert_id();
    }
}

