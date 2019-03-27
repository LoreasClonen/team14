<?php
$lijstBerichten = "";

foreach ($nieuwsberichten as $bericht) {
    $arrayBerichten[] = $bericht->bericht;
}

foreach ($nieuwsberichten as $foto) {
    $arrayFotos[] = $foto->foto;
}

for ($i=0; $i < count($arrayBerichten); $i++){
    $lijstBerichten .= "<div>" . $arrayBerichten[$i] . toonAfbeelding("images/nieuwsberichten/$arrayFotos[$i]") . "</div>";
}





?>

<div class="col-8 offset-2 col-lg-3 offset-lg-0 py-5 px-3 text-center">

    <?php echo smallDivAnchor('zwemlessen/keuze', 'Zwemles aanvragen', 'class="btn btn-primary"'); ?>
    <?php echo smallDivAnchor('les1/toonTabs', 'Zwemfeestje boeken', 'class="btn btn-primary"'); ?>
    <?php echo smallDivAnchor('les1/valideer', 'Webshop', 'class="btn btn-primary"'); ?>
</div>

<div class="col-8 offset-2 col-lg-9 offset-lg-0 py-5 px-3 text-center">
    <h3 id="jquery" class="mt-4">Nieuwsberichten:</h3>
    <div><?php

    echo $lijstBerichten;
    ?>
    </div>
</div>