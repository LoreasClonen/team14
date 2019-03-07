<div class="col-12 mt-3">
    <?php
    $attributes = array('name' => 'zwemgroep_toevoegen', 'id' => 'zwemgroepToevoegenFormulier', 'role' => 'form');
    echo form_open('Zwemgroepen/ControleerZwemgroep', $attributes);


    echo "<hr />";

    echo form_label('Groepsnaam', 'groepsnaam');
    $dataNaam = array(
        'id' => 'groepsnaam',
        'name' => 'groepsnaam',
        'class' => 'form-control',
        'placeholder' => 'groepsnaam',
        'required' => 'required',
        'size' => '30');
    echo form_input($dataNaam);

    echo form_label('Weekdag', 'weekdag');
    $dataWeekdag = array(
        'maandag' => 'Maandag',
        'dinsdag' => 'Dinsdag',
        'woensdag' => 'Woensdag',
        'donderdag' => 'Donderdag',
        'vrijdag' => 'Vrijdag',
        );
    echo form_dropdown('weekdagen', $dataWeekdag);

    echo form_submit(array("value" => "Toevoegen", "class" => "btn btn-primary my-3", "id" => "voegZwemgroepToe"));
    echo form_close();

    ?>
</div>