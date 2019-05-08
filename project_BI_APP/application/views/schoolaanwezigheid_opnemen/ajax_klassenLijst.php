<?php

        // Invulveld om het aantal aanwezige leerlingen in te vullen
        echo form_label("Aantal zwemmers", "leerlingenAantal");
        $dataAantal = array('id' => 'leerlingenAantal',
            'name' => 'leerlingenAantal',
            'class' => 'form-control',
            'placeholder' => 'aantal zwemmers',
            'required' => 'required',
            'size' => '30');
        echo form_input($dataAantal);

        // Geeft een invulveld voor de correcte datum
        echo form_label('Datum les', 'datumLes');
        $dataDatumLes = array('id' => 'datumLes',
            'name' => 'datumLes',
            'class' => 'form-control',
            'placeholder' => 'dag/maand/jaar',
            'required' => 'required',
            'size' => '30',
            'type' => 'date');
        echo form_input($dataDatumLes);

        // Dropdown met de verschillende klassen per school
        echo form_label("Klassen", "klasId");
        $options = array();
        $options[0] = "--Selecteer een klas--";
        foreach ($klassen as $klas) {
            $options[$klas->id] = $klas->klasnaam;
        }
        $dataKlassen = array(
            'id' => 'klasId',
            'name' => 'klasId',
            'class' => 'form-control');

        echo form_dropdown($dataKlassen, $options);




