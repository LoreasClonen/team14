<?php
/**
 * @Class Zwemniveau_Model
 */

class Zwemniveau_model extends CI_Model
{
    /**
     * functie constructor Zwemniveau_model()
     * @brief constructor voor de klasse Zwemniveau_model
     * @post Er is een Zwemniveau_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * functie getAllByID()
     * @brief geeft alle zwemniveaus terug in de zwemniveau tabel
     * @pre Er bestaat een Zwemniveau_model klasse
     * @post Er is een array met 0 of meerdere zwemniveaus teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('zwemniveau');
        return $query->result();
    }

    /**
     * functie get($id)
     * @brief geeft 1 specifieke zwemniveau terug in de zwemniveau tabel
     * @pre Er bestaat een Zwemniveau model klasse en een zwemniveau met overeenkomstige id
     * @post Er is een array met 1 zwemniveau teruggegeven
     * @return array
     */
    function getById($id){
        $this->db->where('id',$id );
        $query = $this->db->get('zwemniveau');
        return $query->row();
    }
}