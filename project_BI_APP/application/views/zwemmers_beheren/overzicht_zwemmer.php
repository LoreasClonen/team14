<div class="col-12 mt-3">
    <?php
        $attributes = array('name' => 'overzicht_zwemmer', 'id' => 'overzichtZwemmerFormulier', 'role' => 'form');
        echo form_open('', $attributes);


        echo "<hr />";

        echo form_label('Voornaam', 'voornaam');
        $dataVoornaam = array(
            'id' => 'voornaam',
            'name' => 'voornaam',
            'class' => 'form-control',
            'placeholder' => '',
            'required' => 'required',
            'size' => '30');
        echo form_input($dataVoornaam);

        echo form_label('Achternaam', 'achternaam');
        $dataNaam = array(
            'id' => 'achternaam',
            'name' => 'achternaam',
            'class' => 'form-control',
            'placeholder' => '',
            'required' => 'required',
            'size' => '30');
        echo form_input($dataNaam);

        echo form_label('Zwemniveau', 'zwemniveau');
        $dataZwemniveau = array(
            'id' => 'zwemniveau',
            'name' => 'zwemniveau',
            'class' => 'form-control',
            'placeholder' => '',
            'required' => 'required',
            'size' => '30');
        echo form_input($dataZwemniveau);

        echo form_input('zwemniveau', $dataZwemniveau);

        echo form_submit(array("value" => "Opslaan", "class" => "btn btn-primary my-3", "id" => "slaZwemmerOp"));
        echo form_close();

    ?>
</div>