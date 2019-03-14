<?php
    foreach ($zwemgroepen as $zwemgroep)
    {
        echo "<button>" . anchor('Zwemgroepen/getZwemgroepen/' .$zwemgroep->id , $zwemgroep->id . ' ' . $zwemgroep->groepsnaam) . " </button>";
    }


    echo smallDivAnchor('Zwemgroepen/zwemgroepToevoegen', 'Zwemgroep toevoegen', 'class="btn btn-primary"');





    ?>