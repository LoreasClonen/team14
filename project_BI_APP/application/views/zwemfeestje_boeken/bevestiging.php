<div class="card-body text-center">
    <h5>Bevestiging</h5>
    <hr>
    <p class="card-text mt-4">U staat op het punt om een zwemfeestje te boeken. Hier kan u uw gegevens nog even
        nalezen.</p>
    <ul class="text-left">
        <li>Begeleider: <?php echo $zwemfeest->voornaam . " " . $zwemfeest->achternaam; ?></li>
        <li>Telefoonnummer van begeleider: <?php echo $zwemfeest->telefoonnr ?></li>
        <li>Datum van zwemfeest: [DATUM]</li>
        <li>Tijdstip: van [BEGINUUR] tot [EINDUUR]</li>
        <li>Aantal kinderen: <?php echo $zwemfeest->aantalKinderen ?></li>
        <li>Gerecht: <?php echo $gerecht->naam ?></li>
        <li>Opmerking: <?php echo $zwemfeest->opmerkingen ?></li>
        <li>Berekende prijs: <?php echo $kostprijs ?> Euro</li>
    </ul>
    <p class="card-text mb-4">U zal na het bevestigen een e-mail ontvangen als bevestiging van uw aanvraag.</p>

</div>
<div class="card-footer text-muted text-center">
    <?php
        echo anchor('Home/index', 'Annuleren', 'class="btn btn-secondary mr-2"');
        echo anchor('Zwemfeestjes/zwemfeestjeAangevraagd', 'Bevestigen', 'class="btn btn-primary"');
    ?>
</div>
