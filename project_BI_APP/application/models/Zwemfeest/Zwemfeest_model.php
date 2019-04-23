<?php


    class Zwemfeest_model extends CI_Model
    {
        /**
         * functie constructor Gerecht_model()
         * @brief constructor voor de klasse Gerecht_model
         * @post Er is een Gerecht_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
            $this->load->model('/Zwemfeest/Gerecht_model', 'gerecht_model');
        }

        /**
         * functie getAllById()
         * @brief getAllByID() geeft alle gerechten terug in de gerecht tabel
         * @pre Er bestaat een Gerecht_model klasse
         * @post Er is een array met 0 of meerdere gerechten teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('zwemfeest');
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
            $query = $this->db->get('zwemfeest');
            return $query->row();
        }

        /**
         * functie GetByVoornaam(voornaam)
         * @brief geeft alle zwemfeesten terug met een bepaalde voornaam
         * @pre Er bestaat een Gerecht_model klasse
         * @post Er is een array met 0 of meerdere gerechten teruggegeven
         * @param $voornaam
         * @return array
         */
        function GetByVoornaam($voornaam)
        {
            $query = $this->db->where('name', $voornaam);
            return $query->result();
        }

        /**
         * functie GetByAchternaam(achternaam)
         * @brief geeft alle zwemfeesten terug met een bepaalde achternaam
         * @pre Er bestaat een Gerecht_model klasse
         * @post Er is een array met 0 of meerdere gerechten teruggegeven
         * @param $achternaam
         * @return array
         */
        function getByAchternaam($achternaam)
        {
            $query = $this->db->where('achternaam', $achternaam);
            return $query->result();
        }

        /**
         * functie GetByEmail(email)
         * @brief geeft alle zwemfeesten terug met een bepaalde achternaam
         * @pre Er bestaat een Gerecht_model klasse
         * @post Er is een array met 0 of meerdere gerechten teruggegeven
         * @param $email
         * @return array
         */
        function GetByEmail($email)
        {
            $query = $this->db->where('email', $email);
            return $query->result();
        }

        /**
         * functie delete(id)
         * @brief verwijdert een bepaald zwemfeest
         * @pre Er bestaat een Zwemfeest_model klasse
         * @post Er is een zwemfeest uit de database verwijdert
         * @param $id
         */
        function delete($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('zwemfeest');
        }

        /**
         * functie update(id, zwemfeestData)
         * @brief werkt een bepaald zwemfeest bij
         * @pre Er bestaat een Zwemfeest_model klasse
         * @post Er is een zwemfeest uit de database bijgewerkt
         * @param $id
         * @param $zwemfeestData
         */
        function update($id, $zwemfeestData)
        {
            $this->db->where('id', $id);
            $this->db->update('zwemfeest', $zwemfeestData);
        }

        function add($zwemfeestdata)
        {
            $this->db->insert('zwemfeest', $zwemfeestdata);
            return $this->db->insert_id();
        }

        /**
         * functie getByIdWithGerecht($id)
         * @brief geeft 1 specifiek zwemfeest terug in de zwemfeest tabel samen met het gekozen gerecht
         * @pre Er bestaat een zwemfeest model klasse, een gerecht model klasse en een klant met overeenkomstige id
         * @post Er is een array met 1 klant teruggegeven
         * @return array
         */
        function getByIdWithGerecht($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('zwemfeest');
            $zwemfeest = $query->row();

            $zwemfeest->gerecht =
                $this->gerecht_model->getById($zwemfeest->gerechtId);

            return $zwemfeest;
        }
    }

