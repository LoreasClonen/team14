<?php
    /**
     * @Class Product_model
     */

    class Product_model extends CI_Model
    {
        /**
         * functie constructor Product_model()
         * @brief constructor voor de klasse Product_model
         * @post Er is een Product_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
        }

        /**
         * functie getAllByID()
         * @brief geeft alle producten terug in de product tabel
         * @pre Er bestaat een Product_model klasse
         * @post Er is een array met 0 of meerdere producten teruggegeven
         * @return array
         */
        function getAllById()
        {
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('product');
            return $query->result();
        }

        /**
         * functie GetByNaam(naam)
         * @brief geeft alle producten terug met een bepaalde naam
         * @pre Er bestaat een Product_model klasse
         * @post Er is een array met 0 of meerdere producten teruggegeven
         * @param $naam
         * @return array
         */
        function getByNaam($naam)
        {
            $this->db->where('naam', $naam);
            $query = $this->db->get('product');
            return $query->result();
        }

        /**
         * functie GetByPrijs(prijs)
         * @brief geeft alle producten terug met een bepaalde prijs
         * @pre Er bestaat een Product_model klasse
         * @post Er is een array met 0 of meerdere producten teruggegeven
         * @param $prijs
         * @return array
         */
        function getByPrijs($prijs)
        {
            $this->db->where('prijs', $prijs);
            $query = $this->db->get('product');
            return $query->result();
        }

        /**
         * functie GetByFoto(foto)
         * @brief geeft alle producten terug met een bepaalde foto
         * @pre Er bestaat een Product_model klasse
         * @post Er is een array met 0 of meerdere producten teruggegeven
         * @param $foto
         * @return array
         */
        function getByFoto($foto)
        {
            $this->db->where('foto', $foto);
            $query = $this->db->get('product');
            return $query->result();
        }

        /**
         * functie GetByProducttypeId(producttypeId)
         * @brief geeft alle producten terug met een bepaalde producttypeId
         * @pre Er bestaat een Product_model klasse
         * @post Er is een array met 0 of meerdere producten teruggegeven
         * @param $producttypeId
         * @return array
         */
        function getByProducttypeId($producttypeId)
        {
            $this->db->where('producttypeId', $producttypeId);
            $query = $this->db->get('product');
            return $query->result();
        }

    }