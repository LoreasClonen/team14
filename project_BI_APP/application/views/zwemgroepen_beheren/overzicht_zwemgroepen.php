<?php
    foreach ($zwemgroepen as $zwemgroep)
    {
        echo "<button>" . anchor('Zwemgroepen/getZwemgroep/' .$zwemgroep->id , $zwemgroep->id . ' ' . $zwemgroep->groepsnaam) . " </button>";
    }


    echo smallDivAnchor('Zwemgroepen/zwemgroepToevoegen', 'Zwemgroep toevoegen', 'class="btn btn-primary"');





    ?>