<?php

    /**
     * @Class Gerecht_model
     */

    class ZwemfeestMoment_model extends CI_Model
    {
        /**
         * functie constructor ZwemfeestMoment_model()
         * @brief constructor voor de klasse ZwemfeestMoment_model
         * @post Er is een ZwemfeestMoment_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
            $this->load->model('/Zwemfeest/Zwemfeest_model', 'zwemfeest_model');
            $this->load->model('/Zwemfeest/Gerecht_model', 'gerecht_model');

        }

        /**
         * functie getAllByID()
         * @brief geeft alle zwemfeestmomenten terug in de zwemfeestmoment tabel
         * @pre Er bestaat een ZwemfeestMoment_model klasse
         * @post Er is een array met 0 of meerdere zwemfeestmomenten teruggegeven
         * @return array
         */
        function getAllByDatumWithZwemfeest()
        {
            $this->db->order_by('datum', 'asc');        // Sorteren op datum is logischer dan sorteren op naam in dit geval
            $query = $this->db->get('zwemfeestMoment');
            $zwemfeestMomenten = $query->result();

            $this->load->model('zwemfeest_model');

            foreach ($zwemfeestMomenten as $zwemfeestMoment) {
                $zwemfeestMoment->zwemfeest = $this->zwemfeest_model->getById($zwemfeestMoment->zwemfeestId);
            }
            return $zwemfeestMomenten;
        }

        /**
         * functie getByIdWithEverything(id)
         * @brief geeft een bepaald zwemfeestmoment terug, gecombineerd met de daarbij horende zwemfeest en gerecht data
         * @pre Er bestaat een ZwemfeestMoment_model klasse
         * @post Er is een array met 1 bepaald zwemfeestMoment en de daarbij horende gerecht en zwemfeest data
         * @param $id
         * @return array
         */
        function getByIdWithEverything($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('zwemfeestMoment');
            $zwemfeestMoment = $query->row();

            $this->load->model('zwemfeest_model');
            $zwemfeestMoment->zwemfeest = $this->zwemfeest_model->getById($zwemfeestMoment->zwemfeestId);

            $this->load->model('gerecht_model');
            $zwemfeestMoment->gerecht = $this->gerecht_model->getById($zwemfeestMoment->zwemfeestId);

            return $zwemfeestMoment;
        }

        /**
         * functie delete(id)
         * @brief verwijdert een bepaald zwemfeestMoment
         * @pre Er bestaat een ZwemfeestMoment_model klasse
         * @post Er is een zwemfeestMoment uit de database verwijdert
         * @param $id
         */
        function delete($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('zwemfeestMoment');
        }

        function add($zwemfeestMomentdata, $zwemfeestId)
        {
            $this->db->set('zwemfeestId', $zwemfeestId);
            $this->db->insert('zwemfeestMoment', $zwemfeestMomentdata);
            return $this->db->insert_id();
        }

        /**
         * functie getByZwemfeestId($zwemfeestId)
         * @brief geeft 1 specifiek zwemfeestmoment terug in de zwemfeestmoment tabel
         * @pre Er bestaat een zwemfeestmoment model klasse en een zwemfeestmoment met overeenkomstige zwemfeestzid
         * @post Er is een array met 1 zwemfeestmoment teruggegeven
         * @return array
         */
        function getByZwemfeestId($zwemfeestId)
        {
            $this->db->where('zwemfeestId', $zwemfeestId);
            $query = $this->db->get('zwemfeestMoment');
            return $query->row();
        }
    }

