<?php
    foreach ($zwemfeestMomenten as $zwemfeestMoment)
    {
        echo "<button>" . anchor('Zwemgroepen/getZwemgroep/' . $zwemfeestMoment->id, $zwemfeestMoment->id . ' ' . $zwemfeestMoment->datum) . " </button>";
    }


    echo smallDivAnchor('Zwemgroepen/zwemgroepToevoegenLaden', 'Zwemgroep toevoegen', 'class="btn btn-primary"');


?>