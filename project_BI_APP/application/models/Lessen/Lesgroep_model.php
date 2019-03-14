<?php
/**
 * @Class Lesgroep_Model
 */

class Lesgroep_model extends CI_Model
{
    /**
     * functie constructor Lesgroep_model()
     * @brief constructor voor de klasse Lesgroep_model
     * @post Er is een Lesgroep_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lessen/Inlogger_model', 'Inlogger_model');

    }

    /**
     * functie getAllByID()
     * @brief geeft alle lesgroepen terug in de lesgroep tabel
     * @pre Er bestaat een Lesgroep_model klasse
     * @post Er is een array met 0 of meerdere lesgroepen teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('lesgroep');
        return $query->result();
    }

    /**
     * functie get($id)
     * @brief geeft 1 specifieke lesgroep terug in de lesgroep tabel
     * @pre Er bestaat een Lesgroep model klasse en een lesgroep met overeenkomstige id
     * @post Er is een array met 1 lesgroep teruggegeven
     * @return array
     */
    function getAllByWeekdag()
    {
        $this->db->order_by('weekdag', 'asc');
        $query = $this->db->get('lesgroep');
        return $query->result();

        /*$lesgroepen = $query->result();

        $this->load->model('Inlogger_model');

        foreach ($lesgroepen as $lesgroep) {
            $lesgroep->inlogger =
                $this->inlogger_model->get($lesgroep->inloggerId);
        }
        return $lesgroepen; */
    }
}