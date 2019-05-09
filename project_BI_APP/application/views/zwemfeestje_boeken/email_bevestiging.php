<div class="container">
    <!-- Button trigger modal -->
    <div class="text-center">
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
            <div class="container">
                <div class="row">
                    <div class="col-3 mr-2"><i class="fas fa-user-circle display-4"></i></div>
                    <div class="col text-left">Kempenrust</br>
                        Zwemfeest <?php echo date('d/m/Y', strtotime($zwemfeestMoment->datum)) ?></li>
                    </div>
                </div>
            </div>
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Zwemfeest <?php echo date('d/m/Y', strtotime($zwemfeestMoment->datum)) ?></li></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-2"><i class="fas fa-user-circle display-4"></i></div>
                            <div class="col text-left">Kempenrust <br>
                                &lt;no-reply@kempenrust.be&gt;
                            </div>
                        </div>
                        <p>Ontvanger: <?php echo $zwemfeest->email ?></p>
                        <hr>
                        <p>Beste <?php echo $zwemfeest->voornaam . " " . $zwemfeest->achternaam; ?></p>
                        <p>U heeft zonet een aanvraag ingediend voor een zwemfeestje
                            op <?php echo date('d/m/Y', strtotime($zwemfeestMoment->datum)) ?></li>.</p>
                        <p>Gelieve na te kijken of volgende gegevens kloppen:</p>
                        <ul>
                            <li>Telefoonnummer van begeleider: <?php echo $zwemfeest->telefoonnr ?></li>
                            <li>Datum van
                                zwemfeest: <?php echo date('d/m/Y', strtotime($zwemfeestMoment->datum)) ?></li>
                            <li>Tijdstip:
                                van <?php echo date('H:i', strtotime($zwemfeestMoment->beginuur)) . " tot " . date('H:i', strtotime($zwemfeestMoment->einduur)) ?></li>
                            <li>Aantal kinderen: <?php echo $zwemfeest->aantalKinderen ?></li>
                            <li>Gerecht: <?php echo $zwemfeest->gerecht->naam ?></li>
                            <li>Opmerking: <?php echo $zwemfeest->opmerkingen ?></li>
                            <li>Berekende prijs: <?php echo $kostprijs ?> Euro</li>
                        </ul>
                        <p>Indien de gegevens incorrect zijn gelieve dan een e-mail te sturen naar
                            <a href="mailto:bestuur@kempenrust.be">bestuur@kempenrust.be</a></p>
                        <p>Indien u het zwemfeest wenst te annuleren klik dan op volgende
                            link: <?php echo anchor('Zwemfeestjes/deleteZwemfeestje/' . $zwemfeestMoment->id . '/' . $zwemfeest->id, 'zwemfeest annuleren'); ?></p>
                        <p>Met vriendelijke groeten</p>
                        <p>Zwembad Kempenrust</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                </div>
            </div>
        </div>
    </div>
</div>
