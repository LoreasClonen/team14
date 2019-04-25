<?php

        // Invulveld om het aantal aanwezige leerlingen in te vullen
        echo form_label("Aantal zwemmers");
        $dataAantal = array('id' => 'leerlingenAantal',
            'name' => 'leerlingenAantal',
            'class' => 'form-control',
            'placeholder' => 'aantal zwemmers',
            'required' => 'required',
            'size' => '30');
        echo form_input($dataAantal);

        // Dropdown met de verschillende klassen per school
        echo form_label("Klassen");
        $options = array();
        $options[0] = "--Selecteer een klas--";
        foreach ($klassen as $klas) {
            $options[$klas->id] = $klas->klasnaam;
        }
        $dataKlassen = array(
            'id' => 'klasnaam',
            'name' => 'klasnaam',
            'class' => 'form-control');

        echo form_dropdown($dataKlassen, $options);


