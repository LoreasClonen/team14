<?php
    /**
     * Created by PhpStorm.
     * User: shari
     * Date: 28/02/2019
     * Time: 8:50
     */

    class Klas_model extends CI_Model
    {
        /**
         * functie constructor School_model()
         * @brief constructor voor de klasse School_model
         * @post Er is een School_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
        }

        /**
         * functie getAllByID()
         * @brief geeft alle klassen terug in de klas tabel
         * @pre Er bestaat een Klas_model klasse
         * @post Er is een array met 0 of meerdere klassen teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('klas');
            return $query->result();
        }

        /**
         * functie GetByName(klasnaam)
         * @brief geeft alle klassen terug met een bepaalde naam
         * @pre Er bestaat een Klas_model klasse
         * @post Er is een array met 0 of meerdere klassen teruggegeven
         * @param $klasnaam
         * @return array
         */
        function getByName($klasnaam)
        {
            $this->db->where('klasnaam', $klasnaam);
            $query = $this->db->get('klas');
            return $query->result();
        }

        /**
         * functie getAllByNameWhereSchoolId(schoolId)
         * @brief geeft alle klassen terug die bij een bepaalde school horen
         * @pre Er bestaat een Klas_model klasse
         * @post Er is een array met 0 of meerdere klassen teruggegeven voor die bepaalde school
         * @param $schoolId
         * @return array
         */

        function getAllByNameWhereSchoolId($schoolId)
        {

            $this->db->where('schoolId', (int)$schoolId);
            $this->db->order_by('klasnaam', 'DESC');
            $query = $this->db->get('klas');

            return $query->result();

        }

        /**
         * @brief voegt een klas toe
         * @pre Er bestaat een Klas_model klasse
         * @post Er is een klas toegevoegd aan het Klas_model
         * @param $klas
         */
        function addKlas($klas)
        {
            $this->db->insert('klas', $klas);
            $this->db->insert_id();
        }


        /**
         * functie GetById(id)
         * @brief geeft klas terug met een bepaalde id
         * @pre Er bestaat een Klas_model klasse
         * @post Er is een array met 0 of meerdere klassen teruggegeven
         * @param $id
         * @return array
         */
        function getById($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('klas');
            return $query->row();
        }

        /**
         * functie delete(id)
         * @brief verwijdert een bepaalde klas en bijhorende lessen
         * @pre Er bestaat een klas_model klasse
         * @post Er is een klas en een aantal lessen uit de database verwijderd
         * @param $id
         */
        function delete($id)
        {
            $this->db->where('klasId', $id);
            $this->db->delete('les');
            $this->db->where('id', $id);
            $this->db->delete('klas');
        }

        /**
         * @brief geeft alle klassen terug met alle bijhorende lessen wanneer factuurId NULL is
         * @pre Er bestaat een Klas_model klasse, een Les_model klasse en een Factuur_model klasse
         * @post Er is een array met 0 of meerdere klassen teruggegeven met bijhorende lessen
         * @param $schoolId
         * @return array
         */
        function getAllWithLessenWhereFactuurIdIsNull($schoolId)
        {
            $this->db->where('schoolId', $schoolId);
            $query = $this->db->get('klas');
            $klassen = $query->result();

            $this->load->model('les_model');
            foreach ($klassen as $klas) {
                $klas->lessen = $this->les_model->getAllWhereFactuurIdIsNullPerKlas($klas->id);
            }

            return $klassen;
        }
    }

