<?php
/**
 * @Class Inlogger_Model
 */

class Inlogger_model extends CI_Model
{
    /**
     * functie constructor Inlogger_model()
     * @brief constructor voor de klasse Inlogger_model
     * @post Er is een Inlogger_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * functie getAllByID()
     * @brief geeft alle inloggers terug in de inlogger tabel
     * @pre Er bestaat een Inlogger_model klasse
     * @post Er is een array met 0 of meerdere inlogger teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('inlogger');
        return $query->result();
    }

    function getById($id){
        $this->db->where('id',$id );
        $query = $this->db->get('inlogger');
        return $query->row();
    }
    /**
     * functie getGebruiker($email, $wachtwoord)
     * @brief geeft 1 specifieke inlogger terug
     * @pre Er bestaat een Inlogger_model klasse
     * @post Er is 1 inlogger object teruggegeven.
     * @post Er is geen inlogger gevonden en er wordt null teruggegeven
     * @return object
     */
    function getGebruiker($email, $wachtwoord){
        $this->db->where('email',$email);
        $this->db->where('actief', 1);
        $query = $this->db->get('inlogger');

        if ($query->num_rows() == 1){
            $gebruiker = $query->row();
    /** wachtwoord verify gebruiken voor test of wachtwoord klopt*/
            if (password_verify($wachtwoord,$gebruiker->wachtwoord)){
                return $gebruiker;
            }
            else{
                return null;
            }
        }
        else{
            return null;
        }
    }
}