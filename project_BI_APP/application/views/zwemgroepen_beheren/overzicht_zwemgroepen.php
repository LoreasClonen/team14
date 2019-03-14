<?php
    foreach ($zwemgroepen as $zwemgroep)
    {
        echo "<button>" . $zwemgroep->id . ' ' . $zwemgroep->groepsnaam . " </button>";
    }


    echo smallDivAnchor('Zwemgroepen/zwemgroepToevoegen', 'Zwemgroep toevoegen', 'class="btn btn-primary"');





    ?>