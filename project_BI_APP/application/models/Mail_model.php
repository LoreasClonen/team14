<?php
/**
 * Created by PhpStorm.
 * User: Mats
 * Date: 21/02/2019
 * Time: 13:44
 */

class Mail_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     @fn getAllById
     @brief constructor voor Mail_model
     @pre er bestaat een Mail_model
     @post er is array met 0 of meerdere mails aangemaakt
     @return returnt een array
     */

    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('mail');
        return $query->result();
    }

}
