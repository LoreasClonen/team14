<div class="col-12 mt-3">
    <?php
        $attributes = array('name' => 'inloggen', 'id' => 'inlogFormulier', 'role' => 'form');
        echo form_open('Inloggen/ControleerAanmelden', $attributes);


        echo "<hr />";
        echo form_label('Mijzelf', 'Mijzelf');
        echo form_radio('Mijzelf');
        echo form_label('Mijn kind', 'Kind');
        echo form_radio('Kind');


    echo form_label('voornaam', 'voornaam');
    $dataVoornaam = array('id' => 'voornaam',
        'name' => 'voornaam',
        'class' => 'form-control',
        'placeholder' => 'voornaam',
        'required' => 'required',
        'size' => '30');
    echo form_input($dataVoornaam);

    echo form_label('achternaam', 'achternaam');
    $dataAchternaam = array('id' => 'achternaam',
        'name' => 'achternaam',
        'class' => 'form-control',
        'placeholder' => 'achternaam',
        'required' => 'required',
        'size' => '30');
    echo form_input($dataAchternaam);

    echo form_label('email', 'email');
    $dataEmail = array('id' => 'email',
        'name' => 'email',
        'class' => 'form-control',
        'placeholder' => 'e-mail',
        'required' => 'required',
        'size' => '30');
    echo form_input($dataEmail); ?>
    <!-- Datepicker try -->
    <div class = "row" data-provide="datepicker">
    <?php
    echo form_label('geboortedatum', 'geboortedatum');
    $dataGeboortedatum = array('id' => 'geboortedatum',
        'name' => 'geboortedatum',
        'class' => 'form-control',
        'placeholder' => 'dag/maand/jaar',
        'required' => 'required',
        'size' => '30');
    echo form_input($dataEmail); ?>
</div>

<?php
    echo form_submit(array("value" => "Inloggen", "class" => "btn btn-primary my-3", "id" => "logIn"));
    echo smallDivAnchor('Inloggen/wachtwoordVergeten', 'Wachtwoord vergeten', 'class="btn btn-primary"');
    echo form_close();
?>
</div>


