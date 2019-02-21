<?php

    /**
     * @property Bestellijn_model $bestellijn_model
     */
    class Bestelling_model extends CI_Model
    {

        // +----------------------------------------------------------
        // | Lekkerbier - Bestelling_model.php
        // +----------------------------------------------------------
        // | 2 ITF - 2018-2019
        // +----------------------------------------------------------
        // | Bestelling model
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
            $query = $this->db->get('bier_bestelling');
            return $query->row();
        }

        function getAllByNaamLikeNaam($zoekstring)
        {
            $this->db->like('naam', $zoekstring, 'after');
            $this->db->order_by('naam', 'asc');
            $query = $this->db->get('bier_bestelling');
            return $query->result();
        }

        function getAllByNaamLikeNaamBeperktIdEnNaam($zoekstring)
        {
            $this->db->select('id , naam as value');
            $this->db->like('naam', $zoekstring, 'after');
            $this->db->order_by('naam', 'asc');
            $query = $this->db->get('bier_bestelling');
            return $query->result();
        }

        function getAllByDatumWhereId_DatumVan_DatumTot($bestellingId, $datumvan, $datumtot)
        {
            if ($bestellingId != 0) {
                $this->db->where('id', $bestellingId);
            }
            if ($datumvan != "") {
                $this->db->where('datum >=', toYYYYMMDD($datumvan));
            }
            if ($datumtot != "") {
                $this->db->where('datum <=', toYYYYMMDD($datumtot));
            }

            $this->db->order_by('datum', 'asc');
            $query = $this->db->get('bier_bestelling');
            return $query->result();
        }

        function insert($bestelling)
        {
            $this->db->insert('bier_bestelling', $bestelling);
            return $this->db->insert_id();
        }

        function update($bestelling)
        {
            $this->db->where('id', $bestelling->id);
            $this->db->update('bier_bestelling', $bestelling);
        }

        function delete($id)
        {
            $this->load->model('bestellijn_model');
            if ($this->bestellijn_model->countLijnen($id) == 0) {
                $this->db->where('id', $id);
                $this->db->delete('bier_bestelling');
                return 1;
            } else {
                return 0;
            }
        }

    }
