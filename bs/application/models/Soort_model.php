<?php

    /**
     * @property Product_model $product_model
     */
    class Soort_model extends CI_Model
    {

        // +----------------------------------------------------------
        // | Lekkerbier - Soort_model
        // +----------------------------------------------------------
        // | 2 ITF - 2018-2019
        // +----------------------------------------------------------
        // | Soort model
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
            $query = $this->db->get('bier_soort');
            return $query->row();
        }

        function getAllByNaam()
        {
            $this->db->order_by('naam', 'asc');
            $query = $this->db->get('bier_soort');
            return $query->result();
        }

        function getAllWithProducten()
        {
            $this->db->order_by('naam', 'asc');
            $query = $this->db->get('bier_soort');
            $soorten = $query->result();

            $this->load->model('product_model');

            foreach ($soorten as $soort) {
                $soort->producten =
                    $this->product_model->getAllByNaamWhereSoort($soort->id);
            }
            return $soorten;
        }

    }

?>