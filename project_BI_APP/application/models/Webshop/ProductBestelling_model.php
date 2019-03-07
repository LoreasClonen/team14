<?php
    /**
     * @Class ProductBestelling_model
     */

    class ProductBestelling_model extends CI_Model
    {
        /**
         * functie constructor ProductBestelling_model()
         * @brief constructor voor de klasse ProductBestelling_model
         * @post Er is een ProductBestelling_model klasse aangemaakt
         *
         */
        function __construct()
        {
            parent::__construct();
        }

        /**
         * functie getAllByProductId()
         * @brief geeft alle aantallen van producten per bestelling terug in een tabel
         * @pre Er bestaat een ProductBestelling_model klasse
         * @post Er is een array met 0 of meerdere aantallen producten teruggegeven
         * @return array
         */
        function getAllByProductId()
        {
            $this->db->order_by('id', 'asc');
            $query = $this->db->get('productBestelling');
            return $query->result();
        }

        /**
         * functie getAllByProductId()
         * @brief geeft alle aantallen van producten per bestelling terug in een tabel
         * @pre Er bestaat een ProductBestelling_model klasse
         * @post Er is een array met 0 of meerdere aantallen producten teruggegeven
         * @return array
         */
        function getAllByBestellingId()
        {
            $this->db->order_by('bestellingId', 'asc');
            $query = $this->db->get('productBestelling');
            return $query->result();
        }

    }