<?php
/**
 * @Class Klant_Model
 */

class Klant_model extends CI_Model
{
    /**
     * functie constructor Klant_model()
     * @brief constructor voor de klasse Klant_model
     * @post Er is een Klant_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('/Lessen/Zwemniveau_model', 'zwemniveau_model');

    }

    /**
     * functie getAllByID()
     * @brief geeft alle klanten terug in de klant tabel
     * @pre Er bestaat een Klant_model klasse
     * @post Er is een array met 0 of meerdere klanten teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('klant');
        return $query->result();
    }

    /**
     * functie get($id)
     * @brief geeft 1 specifieke klant terug in de klant tabel
     * @pre Er bestaat een Klant model klasse en een klant met overeenkomstige id
     * @post Er is een array met 1 klant teruggegeven
     * @return array
     */
    function getById($id){
        $this->db->where('id',$id );
        $query = $this->db->get('klant');
        return $query->row();
    }

    /**
     * functie get($id)
     * @brief geeft alle klanten met bijhorende zwemniveau terug in de klant tabel
     * @pre Er bestaat een Klant model klasse, een Zwemniveau model klasse, een klant met overeenkomstige id en een zwemniveau met overeenkomstige id
     * @post Er is een array met 0 of meerdere klanten teruggegeven
     * @return array
     */
    function getAllByVoornaamWithZwemniveau($zwemniveauId)
    {

        $this->db->where('zwemniveauId', $zwemniveauId);
        $query = $this->db->get('klant');
        $zwemniveaus = $query->result();

        foreach ($zwemniveaus as $zwemniveau) {
            $zwemniveau->zwemniveau = $this->zwemniveau_model->getById($zwemniveau->zwemniveauId);
        }
        return $zwemniveau;
    }
}