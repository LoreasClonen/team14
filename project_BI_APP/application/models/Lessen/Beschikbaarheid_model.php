<?php
    /**
     * @Class Beschikbaarheid_Model
     */

    class Beschikbaarheid_model extends CI_Model
    {
<<<<<<< HEAD
        parent::__construct();
        $this->load->model('/Lessen/Klant_model', 'klant_model');
    }
=======
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
         * functie getAllByID()
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
>>>>>>> ef9add0f015425e46b7e42ed53655217214b6bfe

        function getByKlantId($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('beschikbaarheid');
            return $query->row();
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
<<<<<<< HEAD
        return $beschikbaarheden;
    }


}
=======

//        /**
//         * functie getByKlantIdWithLesgroep($id)
//         * @brief geeft alle beschikbaarheden waarvoor klant = $id met bijhorende lesgroep terug in de klant tabel
//         * @pre Er bestaat een Beschikbaarheid model klasse, een Klant model klasse, een beschikbaarheid met overeenkomstige lesgroepId en een klant met overeenkomstige id
//         * @post Er is een array met 1 of meerdere beschikbaarheden teruggegeven
//         * @return array
//         */
//        function getByKlantIdWithLesgroep($id)
//        {
//            $this->db->where('klantId', $id);
//            $query = $this->db->get('beschikbaarheid');
//            $beschikbaarheden = $query->result();
//
//            foreach ($beschikbaarheden as $beschikbaarheid) {
//                $beschikbaarheid->lesgroep = $this->lesgroep_model->getById($beschikbaarheid->lesgroepId);
//            }
//            return $beschikbaarheden;
//        }
    }
>>>>>>> ef9add0f015425e46b7e42ed53655217214b6bfe
