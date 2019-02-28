<?php
/**
 * @Class Bestelling_model
 */

class Bestelling_model extends CI_Model
{
    /**
     * functie constructor Bestelling_model()
     * @brief constructor voor de klasse Bestelling_model
     * @post Er is een Bestelling_model klasse aangemaakt
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * functie getAllByID()
     * @brief geeft alle bestellingen terug in de bestelling tabel
     * @pre Er bestaat een Bestelling_model klasse
     * @post Er is een array met 0 of meerdere bestellingen teruggegeven
     * @return array
     */
    function getAllById()
    {
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('Bestelling');
        return $query->result();
    }

    /**
     * functie GetByNaam(naam)
     * @brief geeft alle bestellingen terug met een bepaalde naam
     * @pre Er bestaat een Bestelling_model klasse
     * @post Er is een array met 0 of meerdere bestellingen teruggegeven
     * @param $naam
     * @return array
     */
    function getByNaam($naam)
    {
        $this->db->where('naam', $naam);
        $query =  $this->db->get('Bestelling');
        return $query->result();
    }

    /**
     * functie GetByEmail(email)
     * @brief geeft alle bestellingen via een bepaalde email
     * @pre Er bestaat een Bestelling_model klasse
     * @post Er is een array met 0 of meerdere bestellingen teruggegeven
     * @param $email
     * @return array
     */
    function GetByEmail($email)
    {
        $query = $this->db->where('email',$email);
        return $query->result();
    }

    /**
     * functie GetByDatum(datum)
     * @brief geeft alle bestellingen op een bepaalde datum
     * @pre Er bestaat een Bestelling_model klasse
     * @post Er is een array met 0 of meerdere bestellingen teruggegeven
     * @param $datum
     * @return array
     */
    function GetByDatum($datum)
    {
        $query = $this->db->where('datum',$datum);
        return $query->result();
    }

    /**
     * functie GetByDatumAfhalen(datumAfhalen)
     * @brief geeft alle bestellingen op een bepaalde afhaaldatum
     * @pre Er bestaat een Bestelling_model klasse
     * @post Er is een array met 0 of meerdere bestellingen teruggegeven
     * @param $datumAfhalen
     * @return array
     */
    function GetByDatumAfhalen($datumAfhalen)
    {
        $query = $this->db->where('datumAfhalen',$datumAfhalen);
        return $query->result();
    }

    /**
     * functie GetByBestellingnr(bestellingnr)
     * @brief geeft alle bestellingen via een bepaalde bestellingnummer
     * @pre Er bestaat een Bestelling_model klasse
     * @post Er is een array met 0 of meerdere bestellingen teruggegeven
     * @param $bestellingnr
     * @return array
     */
    function GetByBestellingnr($bestellingnr)
    {
        $query = $this->db->where('bestellingnr',$bestellingnr);
        return $query->result();
    }

    /**
     * functie GetByTelefoonnr(telefoonnr)
     * @brief geeft alle bestellingen via een bepaalde telefoonnummer
     * @pre Er bestaat een Bestelling_model klasse
     * @post Er is een array met 0 of meerdere bestellingen teruggegeven
     * @param $telefoonnr
     * @return array
     */
    function GetByTelefoonnr($telefoonnr)
    {
        $query = $this->db->where('telefoonnr',$telefoonnr);
        return $query->result();
    }
}

