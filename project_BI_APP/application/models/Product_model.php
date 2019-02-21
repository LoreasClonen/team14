<?php

    class Product_model extends CI_Model
    {

        // +----------------------------------------------------------
        // | Lekkerbier - Product_model
        // +----------------------------------------------------------
        // | 2 ITF - 2018-2019
        // +----------------------------------------------------------
        // | Product model
        // +----------------------------------------------------------
        // | M. Decabooter, J. Janssen
        // +----------------------------------------------------------

        function __construct()
        {
            parent::__construct();
        }

        function get($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('bier_product');
            return $query->row();
        }

        function getAllByNaam()
        {
            $this->db->order_by('naam', 'asc');
            $query = $this->db->get('bier_product');
            return $query->result();
        }

        function getAllByNaamWhereSoort($soortId)
        {
            $this->db->where('soortId', $soortId);
            $this->db->order_by('naam', 'asc');
            $query = $this->db->get('bier_product');
            return $query->result();
        }

        function getAllByNaamWhereBrouwerij($brouwerijId)
        {
            $this->db->where('brouwerijId', $brouwerijId);
            $this->db->order_by('naam', 'asc');
            $query = $this->db->get('bier_product');
            return $query->result();
        }

        function getWithSoortEnBrouwerij($id)
        {
        }

    }

?>