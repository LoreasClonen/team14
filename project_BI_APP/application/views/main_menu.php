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

<div id="overlay">
    <div id="layover"><p id="text">Welkom op Kempenrust, we helpen je even op weg.</p>
        <div><button type="button" class="btn btn-primary" disabled>Zwemles aanvragen</button><p class="layover_text"><i class="fas fa-arrow-right"></i> Om makkelijk een zwemles aan te vragen kan je de knop "Zwemles aanvragen" gebruiken.</p></div>

        <div><button type="button" class="btn btn-primary" disabled>Zwemfeestje boeken</button><p class="layover_text"><i class="fas fa-arrow-right"></i> Om makkelijk een zwemfeestje te boeken kan je de knop "Zwemfeestje boeken" gebruiken.</p></div><hr><hr>

        <div><p>De nieuwsberichten houden u op de hoogte van eventuele aflastingen en andere mededelingen.</p></div>
    </div>
</div>

<div class="container">
    <div class="container-fluid">

        <header class="jumbotron">
            <h1>Kempenrust</h1>
            <p>Welkom bij zwembad Kempenrust. Hier kan u terecht om makkelijk een zwemles te reserveren of om een
                zwemfeestje te boeken. <i class="fas fa-info-circle" id="overlayknop"></i></p>



    </div>
    <div class="row">
        <div class="col-6 text-center">
            <div class="container-fluid text-left">
                <h3 class="mt-4">Menu:</h3>
                <div>
                    <?php echo smallDivAnchor('zwemlessen/keuze', 'Zwemles aanvragen', 'class="btn btn-primary"'); ?>
                    <?php echo smallDivAnchor('zwemfeestjes/zwemfeestjeBoeken', 'Zwemfeestje boeken', 'class="btn btn-primary"'); ?>
                </div>
            </div>
        </div>
        <div class="col-6 text-center">
            <div class="container-fluid text-left">
                <h3 id="jquery" class="mt-4">Nieuwsberichten:</h3>
                <div><?php

                        echo $lijstBerichten;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>