<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @class Extra
 * @brief Controller-klasse voor extra functionaliteiten
 * @property Mail_model $mail_model
 * @property Nieuwsbericht_model $nieuwsberichten_model
 * @property Template $template
 *
 * Controller klasse met alle methodes die gebruikt worden voor alles wat te maken heeft met het sturen van mails
 */

class Extra extends CI_Controller
{
    public function stuurMail($mailtype, $ontvanger)
    {
        $this->load->model('mail_model');
        $mail[] = $this->mail_model->getByMailtype($mailtype);

        $onderwerp = $mail->onderwerp;
        $zender = "sebastiaan@reggers.org"; //Voorlopig vast gecodeerd
        $hoofding = "MIME-Version: 1.0" . "\r\n" . "Content-type: text/html;charset=UTF-8" . "\r\n" . "From: " . $zender . "\r\n";
        $inhoud = $mail->mailtekst;

        mail($ontvanger, $onderwerp, $inhoud, $hoofding);
    }

    public function toonNieuwsberichten()
    {
        $this->load->model('nieuwsberichten_model');
        $data['nieuwsberichten'] = $this->nieuwsberichten_model->getAllById();
    }
}