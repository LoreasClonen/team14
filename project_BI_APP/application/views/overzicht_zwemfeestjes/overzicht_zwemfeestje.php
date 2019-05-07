<div class="col-12 mb-2">
    <?php
    echo '<hr />';

    $attributes = array('name' => 'overzicht_zwemfeestje', 'id' => 'zwemfeestjeAanpassenFormulier', 'role' => 'form');
    echo form_open('Zwemfeestjes/updateZwemfeestje', $attributes);

    echo '<div class="row">';
    echo '<div class="col-8">' . anchor("Zwemfeestjes/getZwemfeestMomenten", "Terug", "class='btn btn-secondary'") . '</div>';
    echo '<div class="col-4">' . anchor("Zwemfeestjes/deleteZwemfeestje/" . $zwemfeestje->id . "/" . $zwemfeestje->zwemfeest->id, "Verwijderen", "class='btn btn-danger'") . " ";
    echo form_submit(array("value" => "Opslaan", "class" => "btn btn-primary", "id" => "updateZwemfeestje")) . '</div>';
    echo '</div>';

    echo '<hr />';

    echo '<h3>' . $zwemfeestje->datum . ' van ' . $zwemfeestje->beginuur . ' tot ' . $zwemfeestje->einduur . '</h3>';

    echo form_label('Geboekt door:', 'klant');
    echo "\n";
    $dataVoornaam = array(
        'id' => 'voornaam',
        'name' => 'voornaam',
        'class' => 'form-control',
        'type' => 'text',
        'value' => $zwemfeestje->zwemfeest->voornaam,
        'required' => 'required',
        'size' => '50'
    );
    $dataAchternaam = array(
        'id' => 'achternaam',
        'name' => 'achternaam',
        'class' => 'form-control',
        'type' => 'text',
        'value' => $zwemfeestje->zwemfeest->achternaam,
        'required' => 'required',
        'size' => '50'
    );

    echo "\n";
    echo '<div class="row">' . "\n\t";
    echo '<div class="col-3">' . "\n\t\t" . form_input($dataVoornaam) . "\t" . '</div>' . "\n\t";
    echo '<div class="col-3">' . "\n\t\t" . form_input($dataAchternaam) . "\t" . '</div>' . "\n";
    echo '</div>';

    echo form_label('E-mail:', 'email');
    $dataEmail = array(
        'id' => 'email',
        'name' => 'email',
        'class' => 'form-control',
        'type' => 'email',
        'value' => $zwemfeestje->zwemfeest->email,
        'required' => 'required',
        'size' => '50'
    );
    echo form_input($dataEmail);

    echo form_label('Tel:', 'telefoonnr');
    $dataTel = array(
        'id' => 'telefoonnr',
        'name' => 'telefoonnr',
        'class' => 'form-control',
        'type' => 'tel',
        'value' => $zwemfeestje->zwemfeest->telefoonnr,
        'required' => 'required',
        'size' => '50'
    );
    echo form_input($dataTel);

    echo form_label('Aantal kinderen:', 'aantalKinderen');
    $dataAantal = array(
        'id' => 'aantalKinderen',
        'name' => 'aantalKinderen',
        'class' => 'form-control',
        'type' => 'number',
        'value' => $zwemfeestje->zwemfeest->aantalKinderen,
        'required' => 'required',
        'size' => '50'
    );
    echo form_input($dataAantal);

    echo form_label('Maaltijd:', 'gerecht');
    $inhoudGerecht = array();
    foreach ($gerechten as $gerecht) {
        $inhoudGerecht[$gerecht->id] = $gerecht->naam;
    }
    $dataGerecht = array(
        'id' => 'gerecht',
        'name' => 'gerecht',
        'class' => 'form-control',
        'required' => 'required');
    echo form_dropdown($dataGerecht, $inhoudGerecht, $zwemfeestje->gerecht->id);

    echo form_label('Opmerkingen:', 'opmerkingen');
    $dataOpmerkingen = array(
        'id' => 'opmerkingen',
        'name' => 'opmerkingen',
        'class' => 'form-control',
        'value' => $zwemfeestje->zwemfeest->opmerkingen,
        'rows' => '5',
        'size' => '255'
    );
    echo form_textarea($dataOpmerkingen);

    echo form_hidden('zwemfeestId', $zwemfeestje->zwemfeest->id);
    echo form_close();
    ?>
</div>