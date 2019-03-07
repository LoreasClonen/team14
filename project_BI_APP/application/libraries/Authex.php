<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authex
{
    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->model('Lessen/Inlogger_model', 'Inlogger_model');
    }

    function activeer($id)
    {
        // nieuwe gebruiker activeren
        $CI =& get_instance();

        $CI->Inlogger_model->updateGeactiveerd($id);

    }

    function isAangemeld()
    {
        // gebruiker is aangemeld als sessievariabele gebruiker_id bestaat
        $CI =& get_instance();

        if ($CI->session->has_userdata('gebruiker_id')) {
            return true;
        } else {
            return false;
        }
    }

    function getGebruikerInfo()
    {
        // geef gebruiker-object als gebruiker aangemeld is
        $CI =& get_instance();

        if (!$this->isAangemeld()) {
            return null;
        } else {
            $id = $CI->session->userdata('gebruiker_id');
            return $CI->Inlogger_model->get($id);
        }
    }

    function meldAan($email, $wachtwoord)
    {
        // gebruiker aanmelden met opgegeven naam en wachtwoord
        $CI =& get_instance();

        $gebruiker = $CI->Inlogger_model->getGebruiker($email, $wachtwoord);

        if ($gebruiker == null) {
            return false;
        }
        else
        {

            $CI->session->set_userdata('inlogger_id', $gebruiker->id);
            return true;
        }
    }

    function meldAf()
    {
        // afmelden, dus sessievariabele wegdoen
        $CI =& get_instance();

        $CI->session->unset_userdata('inlogger_id');
    }

    function registreer($naam, $email, $wachtwoord)
    {
        // nieuwe gebruiker registreren als email nog niet bestaat
        $CI =& get_instance();

        if ($CI->Inlogger_model->controleerEmailVrij($email)) {
            $id = $CI->Inlogger_model->insert($naam,$email, $wachtwoord);
            return $id;
        } else {
            return 0;
        }
    }


}
