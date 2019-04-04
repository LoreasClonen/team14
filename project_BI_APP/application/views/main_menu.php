<?php
    $lijstBerichten = "";

    foreach ($nieuwsberichten as $bericht) {
        $arrayBerichten[] = $bericht->bericht;
    }

    foreach ($nieuwsberichten as $foto) {
        $arrayFotos[] = $foto->foto;
    }

    for ($i = 0; $i < count($arrayBerichten); $i++) {
        $lijstBerichten .= "<div>" . $arrayBerichten[$i] . toonAfbeelding("images/nieuwsberichten/$arrayFotos[$i]") . "</div>";
    }


?>
<div class="row">
    <div class="container-fluid">

        <header class="jumbotron">
            <h1>Kempenrust</h1>
            <p>Welkom bij zwembad Kempenrust. Hier kan u terecht om makkelijk een zwemles te reserveren of om een
                zwemfeestje te boeken.</p>


    </div>
    <div class="row">
        <div class="col">
            <div class="container-fluid">

                <?php echo smallDivAnchor('zwemlessen/keuze', 'Zwemles aanvragen', 'class="btn btn-primary"'); ?>
                <?php echo smallDivAnchor('zwemfeestjes/zwemfeestjeBoeken', 'Zwemfeestje boeken', 'class="btn btn-primary"'); ?>
                <?php echo smallDivAnchor('les1/valideer', 'Webshop', 'class="btn btn-primary"'); ?>

            </div>
        </div>
        <div class="col">
            <div class="container-fluid text-center">
                <h3 id="jquery" class="mt-4">Nieuwsberichten:</h3>
                <div><?php

                        echo $lijstBerichten;
                    ?>
                </div>
            </div>
        </div>
    </div>