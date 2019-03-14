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
    echo form_dropdown('weekdag', $dataWeekdag);

    echo form_label('Zwemniveau', 'zwemniveau');
    $dataZwemniveau = array(
            // Hier moeten de zwemniveaus ingelezen worden
    );
    echo form_dropdown('zwemniveau', $dataZwemniveau);

    echo form_label('Max. Grootte', 'maxGrootte');
    $dataGrootte = array(
        'id' => 'maxGrootte',
        'name' => 'maxGrootte',
        'class' => 'form-control',
        'placeholder' => 'grootte',
        'required' => 'required',
        'size' => '2');
    echo form_input($dataGrootte);

    echo form_label('Beginuur', 'beginuur');
    $dataBeginuur = array(
        'id' => 'beginuur',
        'name' => 'beginuur',
        'class' => 'form-control',
        'required' => 'required',
        'size' => '5');
    echo form_input($dataBeginuur);

    echo form_label('Einduur', 'einduur');
    $dataEinduur = array(
        'id' => 'einduur',
        'name' => 'einduur',
        'class' => 'form-control',
        'required' => 'required',
        'size' => '5');
    echo form_input($dataEinduur);

    echo form_hidden('inlogger', ''/*inloggerId hier*/);

    echo form_submit(array("value" => "Toevoegen", "class" => "btn btn-primary my-3", "id" => "voegZwemgroepToe"));
    echo form_close();

    ?>
</div>