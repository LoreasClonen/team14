<?php
/**
 * Created by PhpStorm.
 * User: Mats
 * Date: 21/02/2019
 * Time: 13:44
 */

class Mail_model extends CI_Model
{
    /**
     * functie constructor Mail_model()
     * @brief constructor voor de klasse Mail_model
     * @post Er is een Mail_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * functie getAllById
     * @brief geeft alle mails terug in de mailtabel
     * @pre er bestaat een Mail_model klasse
     * @post er is een array met 0 of meerdere mails teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('mail');
        return $query->result();
    }

}
