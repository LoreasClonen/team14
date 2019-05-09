<div class="col-12 mt-3">
    <?php

                $attributes = array('name' => 'opslaan', 'id' => 'AanpasFormulier', 'role' => 'form');
                echo form_open('zwemmer/updateZwemmer/' . $zwemmer->id, $attributes); ?>
    <hr />
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Leeftijd</th>
            <th scope="col">Niveau</th>
            <th scope="col">Zwemgroep</th>
<?php


        echo form_label('voornaam', 'voornaam');
        $dataVoornaam = array('id' => 'voornaam',
            'name' => 'voornaam',
            'class' => 'form-control',
            'value' => $zwemmer->voornaam,
            'required' => 'required',
            'size' => '30');
        echo form_input($dataVoornaam);

        echo form_label('achternaam', 'achternaam');
        $dataAchternaam = array('id' => 'achternaam',
            'name' => 'achternaam',
            'class' => 'form-control',
            'value' => $zwemmer->achternaam,
            'required' => 'required',
            'size' => '30');
        echo form_input($dataAchternaam);

        echo form_label('email', 'email');
        $dataEmail = array('id' => 'email',
            'name' => 'email',
            'class' => 'form-control',
            'value' => $zwemmer->email,
            'required' => 'required',
            'size' => '30');
        echo form_input($dataEmail);

        echo form_label('geboortedatum', 'geboortedatum');
        $dataGeboortedatum = array('id' => 'geboortedatum',
            'name' => 'geboortedatum',
            'class' => 'form-control',
            'value' => $zwemmer->geboortedatum,
            'required' => 'required',
            'size' => '30',
            'type' => 'date');
        echo form_input($dataGeboortedatum);
        //in 1 rij zetten
    ?>
    <div class="row">
        <div class="col-9">
            <?php
                echo form_label('straatnaam', 'straatnaam');
                $dataStraatnaam = array('id' => 'straatnaam',
                    'name' => 'straatnaam',
                    'class' => 'form-control',
                    'value' => $zwemmer->straatnaam,
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataStraatnaam);
            ?> </div>
        <div class="col-3">
            <?php
                echo form_label('Huisnummer', 'huisnummer');
                $dataHuisnummer = array('id' => 'huisnummer',
                    'name' => 'huisnummer',
                    'class' => 'form-control',
                    'value' => $zwemmer->huisnummer,
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataHuisnummer);
            ?> </div>
<<<<<<< HEAD
                <div class="col-3">
                    <?php
            echo form_label('Huisnummer', 'huisnummer');
            $dataHuisnummer = array('id' => 'huisnummer',
                'name' => 'huisnummer',
                'class' => 'form-control',
                'value' => $zwemmer->huisnummer,
                'required' => 'required',
                'size' => '30');
            echo form_input($dataHuisnummer);
                    ?> </div>
                </div> <?php
            echo form_label('postcode', 'postcode');
            $dataPostcode = array('id' => 'postcode',
                'name' => 'postcode',
                'class' => 'form-control',
                'value' => $zwemmer->postcode,
                'required' => 'required',
                'size' => '30');
            echo form_input($dataPostcode);
            echo form_submit(array("value" => "Opslaan", "class" => "btn btn-primary my-3", "id" => "slaOp"));
            echo form_close();
                ?>
=======
    </div> <?php
        echo form_label('postcode', 'postcode');
        $dataPostcode = array('id' => 'postcode',
            'name' => 'postcode',
            'class' => 'form-control',
            'value' => $zwemmer->postcode,
            'required' => 'required',
            'size' => '30');
        echo form_input($dataPostcode);
        echo form_submit(array("value" => "Opslaan", "class" => "btn btn-primary my-3", "id" => "Opslaan"));
        echo form_close();
    ?>
>>>>>>> 4781f9076a4e2677611eab8242770d2eca2c92d9
</div>