<?php
    /**
     * @Class Inlogger_Model
     */

    class Inlogger_model extends CI_Model
    {
        /**
         * functie constructor Inlogger_model()
         * @brief constructor voor de klasse Inlogger_model
         * @post Er is een Inlogger_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
        }

        /**
         * @brief geeft alle inloggers terug in de inlogger tabel
         * @pre Er bestaat een Inlogger_model klasse
         * @post Er is een array met 0 of meerdere inlogger teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('inlogger');
            return $query->result();
        }

        /**
         * @brief geeft alle inloggers terug in de inlogger tabel
         * @pre Er bestaat een Inlogger_model klasse
         * @post Er is een array met 0 of meerdere inlogger teruggegeven
         * @return array
         */
        function getAllByAchternaam()
        {
            $this->db->order_by('achternaam', 'asc');
            $query = $this->db->get('inlogger');
            return $query->result();
        }

        /**
         * @brief geeft 1 specifieke inlogger terug met als id $id in de inlogger tabel
         * @pre Er bestaat een Inlogger_model klasse
         * @post Er is een array met 1 inlogger teruggegeven
         * @return array
         */
        function getById($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('inlogger');
            return $query->row();
        }

        /**
         * @brief geeft 1 specifieke inlogger terug met als e-mail $email in de inlogger tabel
         * @pre Er bestaat een Inlogger_model klasse
         * @post Er is een array met 1 inlogger teruggegeven
         * @return array
         */
        function getByEmail($email)
        {
            $this->db->where('email', $email);
            $query = $this->db->get('inlogger');
            return $query->row();
        }

        /**
         * functie getGebruiker($email, $wachtwoord)
         * @brief geeft 1 specifieke inlogger terug
         * @pre Er bestaat een Inlogger_model klasse
         * @post Er is 1 inlogger object teruggegeven.
         * @post Er is geen inlogger gevonden en er wordt null teruggegeven
         * @return object
         */
        function getGebruiker($email, $wachtwoord)
        {
            $this->db->where('email', $email);
            $this->db->where('actief', 1);
            $query = $this->db->get('inlogger');

            if ($query->num_rows() == 1) {
                $gebruiker = $query->row();
                /** wachtwoord verify gebruiken voor test of wachtwoord klopt*/
                if (password_verify($wachtwoord, $gebruiker->wachtwoord)) {
                    return $gebruiker;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }

        function emailBestaat($email)
        {
            $this->db->where('email', $email);
            $query = $this->db->get('inlogger');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * @brief update actief in de inlogger tabel
         * @pre Er bestaat een Inlogger model klasse en een inlogger met overeenkomstige id
         * @post Er is een array met 1 inlogger geüpdate
         * @param $id
         * @param $gebruikerActief
         */
        function updateActief($id, $gebruikerActief)
        {
            $this->db->where('id', $id);
            $this->db->set('actief', $gebruikerActief);
            $this->db->update('inlogger');
        }

        /**
         * functie delete(id)
         * @brief verwijdert een bepaalde inlogger
         * @pre Er bestaat een Inlogger_model klasse
         * @post Er is een inlogger uit de database verwijdert
         * @param $id
         */
        function delete($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('inlogger');
        }

        /**
         * functie update(id, gebruikerData)
         * @brief werkt een bepaalde inlogger bij
         * @pre Er bestaat een Inlogger_model klasse
         * @post Er is een inlogger uit de database bijgewerkt
         * @param $id
         * @param $gebruikerData
         */
        function update($id, $gebruikerData)
        {
            $this->db->where('id', $id);
            $this->db->update('inlogger', $gebruikerData);
        }

        /**
         * @brief maakt een nieuwe inlogger aan
         * @pre Er bestaat een Inlogger_model klasse
         * @post Er is een inlogger in de database toegevoegd
         * @param $inlogger
         * @return id van de nieuwe inlogger
         */
        function insert($inlogger)
        {
            $this->db->insert('inlogger', $inlogger);
            return $this->db->insert_id();
        }


    }