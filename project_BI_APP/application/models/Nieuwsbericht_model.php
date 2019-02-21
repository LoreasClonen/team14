<?php
/**
 * Created by PhpStorm.
 * User: Mats
 * Date: 21/02/2019
 * Time: 13:54
 */

class Nieuwsbericht_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
    @fn getAllById
    @brief constructor voor Nieuwsbericht_model
    @pre er bestaat een Nieuwsbericht_model
    @post er is array met 0 of meerdere nieuwsberichten aangemaakt
    @return returnt een array
     */

    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('nieuwsbericht');
        return $query->result();
    }

}